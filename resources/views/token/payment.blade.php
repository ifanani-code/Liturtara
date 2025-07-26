@extends('layout.default')
@section('title', 'Payment')
@section('content')
@include('layout.navbar_after')
<head>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

    <div class="max-w-5xl mx-auto my-8 flex flex-col md:flex-row gap-6">
        {{-- Left: Payment Details --}}
        <div class="md:w-1/2 p-6 bg-white shadow-md rounded-md">
            <h2 class="text-xl font-semibold mb-4 text-navy">Detail Payment</h2>

            {{-- Informasi Pengguna --}}
            <table class="w-full text-left text-sm border-collapse mb-6">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th colspan="2" class="py-2 px-4 text-md">User's Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 font-medium w-1/3">Name</td>
                        <td class="py-2 px-4">{{ $profile->full_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-medium">Phone Number</td>
                        <td class="py-2 px-4">{{ $profile->phone_number ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Detail Topup --}}
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th colspan="2" class="py-2 px-4 text-md">Top Up Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 font-medium w-1/2">Token Amount</td>
                        <td class="py-2 px-4">{{ $transaction->token_amount }} Token</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-medium">Each Token's Price</td>
                        <td class="py-2 px-4">Rp {{ number_format(2500, 0, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-medium">Total (Before Tax)</td>
                        <td class="py-2 px-4">Rp {{ number_format($price, 0, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-medium">Tax 11%</td>
                        <td class="py-2 px-4">Rp {{ number_format($price * 0.11, 0, '.', ',') }}</td>
                    </tr>
                    <tr class="font-bold border-t">
                        <td class="py-2 px-4">Total Price</td>
                        <td class="py-2 px-4 text-navy">Rp {{ number_format($transaction->total_price, 0, '.', ',') }}</td>
                    </tr>
                </tbody>
            </table>

            <button id="pay-button" class="mt-6 w-full p-3 bg-navy text-white rounded-md hover:bg-navy-dark transition">
                Pay
            </button>
        </div>

        {{-- Right: Snap Container --}}
        <div id="snap-container" class="flex justify-center md:w-1/2 bg-white shadow-md rounded-md p-6">
            {{-- <p class="text-gray-500 text-center">Form pembayaran akan muncul di sini setelah klik tombol "Bayar"</p> --}}
        </div>
    </div>

    @include('layout.footer')

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.embed('{{ $snapToken }}', {
                embedId: 'snap-container',
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = "{{ route('token.topup.success') }}"
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
@endsection
