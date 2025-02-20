<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SavingsBalance;
use App\Models\CheckingBalance;
use App\Models\TransferHistory;
use Illuminate\Support\Facades\DB;
use App\Models\WireTransferHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class TransferController extends Controller
{
    public function showForm($type)
    {


        $validTypes = ['wire', 'local', 'internal', 'paypal', 'crypto', 'skrill'];

        if (!in_array($type, $validTypes)) {
            abort(404);
        }



        $user = Auth::user();
        $data['user'] = Auth::user();
        $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
        $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

        $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

        $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');

        $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');




        $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');



        $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');



        return view("user.transfer.{$type}",  $data);
    }

    public function processTransfer(Request $request)
    {
        $transferType = $request->type;
        $validationRules = $this->getValidationRules($transferType);

        $validated = $request->validate($validationRules);
        $user = Auth::user();

        DB::beginTransaction();
        try {
            $account = $validated['account'];
            $amount = $validated['amount'];

            // Fetch current balance
            $balance = ($account === 'savings')
                ? SavingsBalance::where('user_id', $user->id)->sum('amount')
                : CheckingBalance::where('user_id', $user->id)->sum('amount');

            if ($amount > $balance) {
                throw ValidationException::withMessages(['amount' => 'Insufficient funds in the selected account.']);
            }

            // Store data in session for tax confirmation
            Session::put('transfer_data', [
                'type' => $transferType,
                'validated' => $validated,
                'details' => $this->getTransferDetails($transferType, $validated)
            ]);

            DB::commit();

            $user = Auth::user();
            $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
            $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

            $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

            $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->where('type', 'credit')
                ->sum('amount');

            $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->where('type', 'debit')
                ->sum('amount');



            $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->where('type', 'credit')
                ->sum('amount');


            $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->where('type', 'debit')
                ->sum('amount');

            // Redirect to tax confirmation form
            return redirect()->route('transfer.confirmTax', [
                'transferType' => $transferType,
                'amount' => $amount
            ])->with($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }


    // public function confirmTax(Request $request)
    // {
    //     // Retrieve stored data from session
    //     $transferData = session('transfer_data');

    //     // Check if transfer data exists, otherwise redirect back
    //     if (!$transferData) {
    //         return redirect()->route('transfer.process')->with('error', 'Session expired, please start over.');
    //     }

    //     // Extract necessary variables
    //     $user = Auth::user();
    //     $account = $transferData['validated']['account'];
    //     $amount = $transferData['validated']['amount'];

    //     // If this is a POST request, validate and finalize the transfer
    //     if ($request->isMethod('post')) {
    //         $request->validate([
    //             'tax_code' => 'required|string|max:20',
    //         ]);

    //         // Merge tax code with transfer data
    //         $transferData['tax_code'] = $request->tax_code;

    //         // Deduct amount from selected account
    //         if ($account === 'savings') {
    //             SavingsBalance::where('user_id', $user->id)->decrement('amount', $amount);
    //         } else {
    //             CheckingBalance::where('user_id', $user->id)->decrement('amount', $amount);
    //         }

    //         // Store transaction in wire transfer history
    //         TransferHistory::create([
    //             'reference' => $this->generateReference(),
    //             'user_id' => $user->id,
    //             'type' => $transferData['type'],
    //             'amount' => $amount,
    //             'currency' => 'USD',
    //             'from_account' => $account,
    //             'details' => json_encode(array_merge($transferData['details'], ['tax_code' => $request->tax_code])),
    //             'status' => 'completed'
    //         ]);


    //         // Clear session data
    //         session()->forget('transfer_data');

    //         $user = Auth::user();
    //         $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
    //         $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

    //         $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

    //         $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
    //             ->whereYear('created_at', Carbon::now()->year)
    //             ->where('type', 'credit')
    //             ->sum('amount');

    //         $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
    //             ->whereYear('created_at', Carbon::now()->year)
    //             ->where('type', 'debit')
    //             ->sum('amount');



    //         $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
    //             ->whereYear('created_at', Carbon::now()->year)
    //             ->where('type', 'credit')
    //             ->sum('amount');


    //         $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
    //             ->whereYear('created_at', Carbon::now()->year)
    //             ->where('type', 'debit')
    //             ->sum('amount');

    //         return redirect()->route('home')->with('success', 'Transfer completed successfully.');
    //     }

    //     // Show the tax code form with retained data
    //     return view('transfers.tax_code', compact('transferData'));
    // }

    public function confirmTax(Request $request)
    {
        $transferData = session('transfer_data');

        if (!$transferData) {
            return redirect()->route('home')->with('error', 'Session expired, please start over.');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'tax_code' => 'required|string|max:20',
            ]);

            $user = Auth::user();
            // Verify tax code (replace with your validation logic)
            if ($request->tax_code !==  $user->code_one) {
                return back()->with('error', 'Invalid Tax Code. Please try again.');
            }

            $transferData['tax_code'] = $request->tax_code;
            session(['transfer_data' => $transferData]);

            return redirect()->route('transfer.confirmVAT');
        }

        $user = Auth::user();
        $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
        $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

        $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

        $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');

        $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');



        $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');


        $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');

        return view('user.transfer.tax-form', compact('transferData'), $data);
    }

    public function confirmVAT(Request $request)
    {
        $transferData = session('transfer_data');

        if (!$transferData) {
            return redirect()->route('transfer.process')->with('error', 'Session expired, please start over.');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'vat_code' => 'required|string|max:20',
            ]);

            $user = Auth::user();
            // Verify vat code (replace with your validation logic)
            if ($request->vat_code !== $user->code_two) {
                return back()->with('error', 'Invalid Vat Code. Please try again.');
            }

            $transferData['vat_code'] = $request->vat_code;
            session(['transfer_data' => $transferData]);

            return redirect()->route('transfer.confirmCOT');
        }

        $user = Auth::user();
        $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
        $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

        $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

        $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');

        $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');



        $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');


        $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');

        return view('user.transfer.vat-form', compact('transferData'), $data);
    }

    public function confirmCOT(Request $request)
    {
        $transferData = session('transfer_data');

        if (!$transferData) {
            return redirect()->route('transfer.process')->with('error', 'Session expired, please start over.');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'cot_code' => 'required|string|max:20',
            ]);

            $user = Auth::user();
            // Verify cot code (replace with your validation logic)
            if ($request->cot_code !==  $user->code_three) {
                return back()->with('error', 'Invalid Cot Code. Please try again.');
            }

            $transferData['cot_code'] = $request->cot_code;
            session(['transfer_data' => $transferData]);

            // Extract user and account details
            $user = Auth::user();
            $account = $transferData['validated']['account'];
            $amount = $transferData['validated']['amount'];

            // Deduct amount from selected account
            if ($account === 'savings') {
                SavingsBalance::where('user_id', $user->id)->decrement('amount', $amount);
            } else {
                CheckingBalance::where('user_id', $user->id)->decrement('amount', $amount);
            }

            // Store transaction in wire transfer history
            TransferHistory::create([
                'reference' => $this->generateReference(),
                'user_id' => $user->id,
                'type' => $transferData['type'],
                'amount' => $amount,
                'currency' => 'USD',
                'from_account' => $account,
                'details' => json_encode(array_merge($transferData['details'], ['tax_code' => $request->tax_code])),
                'status' => 'completed'
            ]);

            session()->forget('transfer_data');
            return view('user.transfer.receipt', compact('transferData'));
            //return redirect()->route('transfer.receipt');
        }

        $user = Auth::user();
        $data['savings_balance'] = SavingsBalance::where('user_id', $user->id)->sum('amount');
        $data['checking_balance'] = CheckingBalance::where('user_id', $user->id)->sum('amount');

        $data['currentMonth'] = Carbon::now()->format('M Y'); // Example: "Feb 2025"

        $data['totalSavingsCredit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');

        $data['totalSavingsDebit'] = SavingsBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');



        $data['totalCheckingCredit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'credit')
            ->sum('amount');


        $data['totalCheckingDebit'] = CheckingBalance::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('type', 'debit')
            ->sum('amount');

        return view('user.transfer.cot-form', compact('transferData'), $data);
    }

    public function showReceipt()
    {
        return view('user.transfer.receipt');
    }


    private function generateReference()
    {
        return 'TX-' . time() . '-' . Str::upper(Str::random(6));
    }

    private function getValidationRules($type)
    {
        $baseRules = [
            'type' => 'required|in:wire,local,interbank,paypal,crypto,skrill',
            'account' => 'required|in:savings,checking',
            'amount' => 'required|numeric|min:0.01',
            //'pin' => 'required|digits:4'
        ];

        $typeRules = [
            'wire' => [
                'name' => 'required|string|max:255',
                'acct' => 'required|regex:/^[A-Za-z0-9]+$/',
                'bank' => 'required|string|max:255',
                'swift' => 'nullable|string',
                'routing' => 'required|numeric',
                'address' => 'nullable|string|max:500',
                'remarks' => 'nullable|string|max:255'
            ],
            'local' => [
                'name' => 'required|string|max:255',
                'acct' => 'required|regex:/^[A-Za-z0-9]+$/',
                'bank' => 'required|string|max:255',
                'remarks' => 'nullable|string|max:255'
            ],
            'interbank' => [
                'name' => 'required|string|max:255',
                'acct' => 'required|regex:/^[A-Za-z0-9]+$/',
                'bank' => 'required|string|max:255',
                'routing' => 'required|numeric',
                'remarks' => 'nullable|string|max:255'
            ],
            'paypal' => [
                'email' => 'required|email',
                'remarks' => 'nullable|string|max:255'
            ],
            'crypto' => [
                'wallet_address' => 'required|string|max:255',
                'crypto_type' => 'required|string|in:bitcoin,ethereum,usdt',
                'remarks' => 'nullable|string|max:255'
            ],
            'skrill' => [
                'email' => 'required|email',
                'remarks' => 'nullable|string|max:255'
            ]
        ];

        return array_merge($baseRules, $typeRules[$type] ?? []);
    }

    private function getTransferDetails($type, $validated)
    {
        $typeDetails = [
            'wire' => [
                'name' => $validated['name'] ?? null,
                'acct' => $validated['acct'] ?? null,
                'bank' => $validated['bank'] ?? null,
                'swift' => $validated['swift'] ?? null,
                'routing' => $validated['routing'] ?? null,
                'address' => $validated['address'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ],
            'local' => [
                'name' => $validated['name'] ?? null,
                'acct' => $validated['acct'] ?? null,
                'bank' => $validated['bank'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ],
            'interbank' => [
                'name' => $validated['name'] ?? null,
                'acct' => $validated['acct'] ?? null,
                'bank' => $validated['bank'] ?? null,
                'routing' => $validated['routing'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ],
            'paypal' => [
                'email' => $validated['email'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ],
            'crypto' => [
                'wallet_address' => $validated['wallet_address'] ?? null,
                'crypto_type' => $validated['crypto_type'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ],
            'skrill' => [
                'email' => $validated['email'] ?? null,
                'remarks' => $validated['remarks'] ?? null
            ]
        ];

        return $typeDetails[$type] ?? [];
    }


    public function success()
    {
        return redirect()->route('home')->with('success', 'Transfer completed successfully.');
    }
}
