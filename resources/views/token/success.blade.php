@extends("layout.default")
@section("title", "Payment Success")
@section("content")
@include("layout.navbar_after")
<div class="h-screen max-w-lg mx-auto mt-32 p-8 bg-white shadow-md rounded-lg text-center">
    <div class="flex justify-center mb-4">
        <svg class="w-16 h-16 text-navy" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12l2 2l4 -4m5 2a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z" />
        </svg>
    </div>

    <h1 class="text-3xl font-semibold text-navy">Payment Successful,
        Please Enjoy Liturtara's Service
    </h1>

    <a href="{{ route("token.topup.form") }}"
        class="mt-6 inline-block bg-navy hover:bg-blue-900 transition text-white font-medium px-6 py-3 rounded-lg">
        Back
    </a>
</div>
@include("layout.footer")
@endsection
