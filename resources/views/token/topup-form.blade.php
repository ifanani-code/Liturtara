@extends('layout.default')
@section('title', 'Topup Token')
@section('content')
    @include('layout.navbar_after')
    <section class="">
        <form method="POST" action="{{ route('token.topup.checkout') }}"
            class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h2 class="text-2xl font-semibold mb-6 text-center text-navy">Top Up Token</h2>
            <div class="grid grid-cols-2 gap-4">
                @foreach ([5, 10, 20, 50] as $amount)
                    <label
                        class="border rounded-lg p-4 flex flex-col items-center justify-center cursor-pointer transition duration-200 hover:shadow-lg hover:border-navy">
                        <input type="radio" name="token_amount" value="{{ $amount }}" class="sr-only peer" required>
                        <div class="peer-checked:text-navy peer-checked:font-bold text-lg">{{ $amount }} Token</div>
                        <div class="text-sm text-gray-500 peer-checked:text-navy">Rp
                            {{ number_format($amount * 2500, 0, '.', ',') }}</div>
                    </label>
                @endforeach
            </div>

            <button type="submit"
                class="mt-6 w-full bg-navy hover:bg-navy-dark text-white py-2 px-4 rounded-lg text-lg transition duration-200">
                Purchase
            </button>
        </form>
    </section>
    @include("layout.footer")
@endsection
