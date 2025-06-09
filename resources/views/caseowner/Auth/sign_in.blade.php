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
                    @if (session()->get("status"))
                        <p>{{ session()->get("status") }}</p>
                    @endif

                    @if (session()->has("success"))
                        <div>
                            {{ session()->get("success") }}
                        </div>
                    @endif
                    @if (session()->has("error"))
                        <div>
                            {{ session()->get("error") }}
                        </div>
                    @endif
                    <!-- Perubahan di sini: mengubah justify-center menjadi justify-start -->
                    <div class="mb-6 flex justify-start">
                        <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="LITURTARA Logo" class="h-10">
                    </div>

                    <h2 class="text-2xl font-bold text-navy mb-6">Log in Case Owner</h2>

                    <form action="{{ route('caseowner.login.post') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-navy">
                            @if ($errors->has('email'))
                                <span class="text-danger">
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
                                <span class="text-danger">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="w-full bg-navy text-white py-2 rounded-md font-medium">Log
                            in</button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-500">or</p>
                    </div>

                    <a href="{{ route("google.login", ["role" => "case owner"]) }}"
                        class="w-full mt-4 py-2 px-4 border border-gray-300 rounded-md flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                            </path>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                            </path>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                        </svg>
                        <span>Log in with Google</span>
                    </a>

                    <div class="mt-6 text-center">
                        <a href="{{ route('password.request') }}" class="text-navy hover:underline">Forgot password?</a>
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-gray-700">
                            New to Liturtara?
                            <a href="{{ route('caseowner.register') }}" class="text-navy font-medium hover:underline">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include("layout.footer")
@endsection
