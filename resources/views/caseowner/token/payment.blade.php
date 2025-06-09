<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script type="text/javascript">
    window.onload = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                window.location.href = "{{ route('caseowner.token.topup.success') }}";
            },
            onPending: function (result) {
                alert('Silakan selesaikan pembayaran.');
            },
            onError: function (result) {
                alert('Terjadi kesalahan saat pembayaran.');
            }
        });
    };
</script>

<p>Loading payment gateway...</p>
