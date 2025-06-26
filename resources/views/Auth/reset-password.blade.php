@extends("layout.default")
@section("title", "Case Owner Sign In")
@section("content")
    @include("layout.caseowner.header_before")
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

                    <h2 class="text-2xl font-bold text-navy mb-6">New Password</h2>

                    <form action="{{ route('password.update') }}" method="POST">
                        <input type="hidden" name="token" value="{{ $token }}">
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

                        <div class="mb-6 relative">
                            <label for="password" class="block text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-navy">
                                <button type="button" id="toggle-password"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-red-500">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>

                        <div class="mb-6 relative">
                            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm Password"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-navy">
                                <button type="button" id="toggle-password"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-red-500">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>


                        <button type="submit" class="w-full bg-navy text-white py-2 rounded-md font-medium">Reset
                            Password</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include("layout.footer")
@endsection
