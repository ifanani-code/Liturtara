<div class="text-center p-10">
    <h1 class="text-2xl font-bold text-green-600">Pembayaran Berhasil!</h1>
    <p class="mt-4">Token akan segera ditambahkan ke akun Anda.</p>
    <a href="{{ route(auth()->user()->role . '.dashboard') }}"
        class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded">
        Kembali ke Dashboard
    </a>
</div>
