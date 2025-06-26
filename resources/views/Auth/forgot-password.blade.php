@extends("layout.default")
@section("title", "Case Owner Sign In")
@section("content")
    {{-- @include("layout.caseowner.header_before") --}}
    <!-- Main Content -->
    <main class="container mx-auto py-8 px-4 md:px-0">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Left Side with Image and Curved Design -->
            <div class="flex justify-center lg:block">
                <img src="{{ asset('image/logo.svg') }}" alt="Liturtara Logo" class="max-w-full h-auto" />
            </div>

            <!-- Right Side with Login Form -->
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
                    {{-- session message --}}
                   @include('layout.alert-auth')
                    <!-- Perubahan di sini: mengubah justify-center menjadi justify-start -->
                    <div class="mb-6 flex justify-start">
                        <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="LITURTARA Logo" class="h-10">
                    </div>

                    <h2 class="text-2xl font-bold text-navy mb-6">Forgot Password</h2>

                    <form action="{{ route('password.request') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-navy">
                            @if ($errors->has('email'))
                                <span class="text-red-500">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>


                        <button type="submit" class="w-full bg-navy text-white py-2 rounded-md font-medium">Reset
                            Password</button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-700">
                            Return to
                            <a href="/" class="text-navy font-medium hover:underline">Log in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include("layout.footer")
@endsection
