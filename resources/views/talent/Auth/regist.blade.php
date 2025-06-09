@extends('layout.default')
@section('title', 'Regist as Talent')
@section('content')
    <!-- Header -->
    @include("layout.talent.header_before")

    <main class="py-10 lg:py-0">
        <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            @if (session()->has("success"))
                <div class="text-xl ">
                    {{ session()->get("success") }}
                </div>
            @endif
            @if (session()->has("error"))
                <div class="text-xl">
                    {{ session()->get("error") }}
                </div>
            @endif
            <!-- Left Side (Image) -->
            <div class="flex justify-center lg:block">
                <img src="{{ asset('image/logo.svg') }}" alt="Liturtara Logo" class="max-w-full h-auto" />
            </div>

            <!-- Right Side (Form) -->
            <div class="max-w-md w-full space-y-6 mx-auto">
                <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Liturtara" class="h-10 mb-2 mx-auto" />
                <h2 class="text-2xl font-bold text-center">Sign Up Talent</h2>
                <form id="registerForm" class="space-y-4" action="{{ route('talent.register.post') }}" method="POST">
                    @csrf
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required />
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif

                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone number"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required />
                        @if ($errors->has('phone_number'))
                            <span class="text-danger">
                                {{ $errors->first('phone_number') }}
                            </span>
                        @endif

                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required />
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span>
                        @endif

                    <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" autocomplete=""
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        required />
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif

                    <button type="submit"
                        class="w-full bg-navy text-white p-3 rounded hover:bg-white">
                        Register
                    </button>

                    <div class="space-y-2 text-sm">
                        <label class="flex items-start gap-2">
                            <input type="checkbox" required class="mt-1">
                            Agree to <a href="#" class="underline text-navy">Terms & Conditions</a> and <a href="#"
                                class="underline text-navy">Privacy Policy</a>
                        </label>
                        <label class="flex items-start gap-2">
                            <input type="checkbox" required class="mt-1">
                            I agree to comply with the <strong>Personal Data Protection Law</strong>
                        </label>
                    </div>

                    <a href="{{ route("google.login", ["role" => "talent"]) }}"
                        class="flex items-center justify-center gap-3 w-full border p-3 rounded hover:bg-gray-100">
                        <img src="{{ asset('image/google.svg') }}" alt="Google" class="h-5" /> Sign up with Google
                    </a>

                    <p class="text-sm text-center">Already have an account?
                        <a href="{{ route('talent.login') }}" class="text-navy underline">Log in</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include("layout.footer")
@endsection
