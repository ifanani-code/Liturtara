<form method="POST" action="{{ route("token.topup.checkout") }}">
    @csrf
    <h2 class="text-xl font-bold mb-4">Pilih Jumlah Token</h2>

    <div class="grid grid-cols-2 gap-4">
        @foreach([5, 10, 20, 50] as $amount)
            <label class="block border rounded p-4 cursor-pointer">
                <input type="radio" name="token_amount" value="{{ $amount }}" required>
                <div>{{ $amount }} Token</div>
                <div class="text-sm text-gray-500">Rp {{ number_format($amount * 2500, 0, ',', '.') }}</div>
            </label>
        @endforeach
    </div>

    <h3 class="text-lg mt-6 mb-2">Informasi Billing</h3>
    <input type="text" name="name" placeholder="Nama" class="border p-2 w-full mb-2" required>
    <input type="text" name="phone" placeholder="Nomor HP" class="border p-2 w-full mb-4" required>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Purchase</button>
</form>
