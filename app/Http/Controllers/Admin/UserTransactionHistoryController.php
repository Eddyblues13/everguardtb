<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TransferHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserTransactionHistoryController extends Controller
{
    public function index($id)
    {
        // Fetch activities for the specific user
        $transfers = TransferHistory::where('user_id', $id)->get();
        return view('admin.user_transaction', compact('transfers'));
    }


    /**
     * Approve a transfer.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        DB::beginTransaction();
        try {
            // Find the transfer record
            $transfer = TransferHistory::findOrFail($id);

            // Check if the transfer is already approved or declined
            if ($transfer->status !== 'pending') {
                return redirect()->back()->with('error', 'This transfer cannot be approved because it is not in a pending state.');
            }

            // Update the transfer status to approved
            $transfer->status = 'approved';
            $transfer->completed_at = now(); // Set the completion time
            $transfer->save();

            DB::commit();

            return redirect()->back()->with('success', 'Transfer approved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while approving the transfer: ' . $e->getMessage());
        }
    }

    /**
     * Decline a transfer.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function decline($id)
    {
        DB::beginTransaction();
        try {
            // Find the transfer record
            $transfer = TransferHistory::findOrFail($id);

            // Check if the transfer is already approved or declined
            if ($transfer->status !== 'pending') {
                return redirect()->back()->with('error', 'This transfer cannot be declined because it is not in a pending state.');
            }

            // Update the transfer status to declined
            $transfer->status = 'declined';
            $transfer->save();

            DB::commit();

            return redirect()->back()->with('success', 'Transfer declined successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while declining the transfer: ' . $e->getMessage());
        }
    }

    /**
     * Delete a transfer.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // Find the transfer record
            $transfer = TransferHistory::findOrFail($id);

            // Delete the transfer
            $transfer->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Transfer deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while deleting the transfer: ' . $e->getMessage());
        }
    }
}
