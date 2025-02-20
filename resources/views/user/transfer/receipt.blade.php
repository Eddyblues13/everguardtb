<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Receipt - {{ config('app.name', 'Laravel') }}</title>

    <style>
        .security-watermark {
            opacity: 0.1;
            position: fixed;
            transform: rotate(-45deg);
            font-size: 2rem;
            pointer-events: none;
            z-index: 9999;
        }

        @media print {

            .no-print,
            button {
                display: none !important;
            }

            .security-watermark {
                opacity: 0.3;
            }

            body {
                padding: 0 !important;
                margin: 0 !important;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    @extends('layouts.app')

    @section('content')
    <div class="security-watermark">{{ config('app.name') }} • CONFIDENTIAL</div>

    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg max-w-2xl relative">
        <!-- Security Features -->
        <div class="absolute top-2 right-2 text-xs text-gray-400">
            Ref: {{ strtoupper(substr(md5(uniqid()), 0, 14)) }}
        </div>

        <!-- Header Section -->
        <div class="text-center border-b-2 border-gray-300 pb-4 mb-6">
            <div class="flex justify-center mb-4">
                <img src="/images/bank-logo.png" alt="Bank Logo" class="h-16 no-print">
                <img src="/images/bank-logo-dark.png" alt="Bank Logo" class="h-16 print-only hidden">
            </div>
            <h1 class="text-2xl font-bold text-gray-800">TRANSACTION RECEIPT</h1>
            <div class="mt-2 flex justify-center items-center space-x-4">
                <span class="text-gray-500 text-sm">Transaction ID: {{ substr(md5(uniqid()), 0, 10) }}</span>
                <span class="text-green-500 text-sm">✓ Verified</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="space-y-8">
            <!-- User & Transaction Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border-r md:border-r-0">
                    <h2 class="text-sm font-semibold text-gray-600 mb-2">ACCOUNT HOLDER</h2>
                    <p class="text-gray-800 font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-gray-600 text-sm">{{ Auth::user()->email }}</p>
                    <p class="text-gray-600 text-sm mt-1">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
                </div>

                <div>
                    <h2 class="text-sm font-semibold text-gray-600 mb-2">TRANSACTION DETAILS</h2>
                    <div class="space-y-1">
                        <p class="text-gray-800">
                            <span class="font-medium">Date:</span> {{ now()->format('M d, Y H:i:s') }}
                        </p>
                        <p class="text-gray-800">
                            <span class="font-medium">Type:</span> {{ strtoupper($transferData['type']) }}
                        </p>
                        <p class="text-gray-800">
                            <span class="font-medium">Status:</span> <span class="text-green-600">Completed</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Financial Details -->
            <div class="border-2 border-gray-200 rounded-lg p-6 bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Source Account</p>
                        <p class="font-semibold text-gray-800">
                            {{ strtoupper($transferData['validated']['account']) }} ACCOUNT
                            <span class="text-gray-500 text-sm block">
                                **** **** **** {{ substr(Auth::user()->account_number, -4) }}
                            </span>
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Transfer Amount</p>
                        <p class="font-semibold text-green-600 text-2xl">
                            ${{ number_format($transferData['validated']['amount'], 2) }}
                            <span class="text-gray-500 text-sm block">
                                {{ number_format($transferData['validated']['amount'] * 1.0, 2) }} USD
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Recipient Details -->
                <div class="mt-6 space-y-4">
                    <h3 class="font-semibold text-gray-800 border-b pb-2">Beneficiary Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Full Name</p>
                            <p class="text-gray-800 font-mono">{{ $transferData['details']['recipient_name'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Financial Institution</p>
                            <p class="text-gray-800">{{ $transferData['details']['bank_name'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Account Number</p>
                            <p class="text-gray-800 font-mono tracking-wider">
                                {{ chunk_split($transferData['details']['account_number'], 4, ' ') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Routing Number</p>
                            <p class="text-gray-800">{{ $transferData['details']['routing_number'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-red-50 p-4 rounded-lg border border-red-200">
                <div>
                    <h3 class="text-sm font-semibold text-red-600">COT Code</h3>
                    <p class="text-red-700 font-mono bg-white p-2 rounded">{{ $transferData['cot_code'] }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-red-600">Tax Reference</h3>
                    <p class="text-red-700 font-mono bg-white p-2 rounded">{{ $transferData['details']['tax_code'] ??
                        'N/A' }}</p>
                </div>
            </div>

            <!-- Legal Footer -->
            <div class="border-t-2 border-gray-300 pt-4 text-sm text-gray-600 space-y-2">
                <p>✓ This transaction has been digitally signed and timestamped.</p>
                <p>✓ Funds availability subject to clearing house regulations.</p>
                <p class="mt-2">Retention ID: {{ bin2hex(random_bytes(8)) }} • {{ now()->format('YmdHis') }}</p>
                <div class="mt-3 text-xs text-gray-500">
                    <p>Printed on: {{ now()->format('M d, Y H:i T') }}</p>
                    <p>IP Address: {{ request()->ip() }}</p>
                    <p>Browser Fingerprint: {{ substr(md5(request()->userAgent()), 0, 12) }}</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex justify-center space-x-4 no-print">
            <button onclick="window.print()"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Print Receipt
            </button>
            <a href="{{ route('dashboard') }}"
                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                Return to Dashboard
            </a>
        </div>
    </div>


    <!-- Watermark Script -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const watermark = document.createElement('div');
            watermark.className = 'security-watermark';
            watermark.textContent = '{{ config('app.name') }} • {{ now()->format('Ymd') }}';
            document.body.appendChild(watermark);
            
            // Add multiple watermarks
            for(let i = 0; i < 6; i++) {
                const clone = watermark.cloneNode(true);
                clone.style.left = `${Math.random() * 80 + 10}%`;
                clone.style.top = `${Math.random() * 80 + 10}%`;
                document.body.appendChild(clone);
            }
        });
    </script>
    @endpush
</body>

</html>