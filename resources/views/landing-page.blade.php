@extends('layout.default')
@section('title', 'Welcome to Liturtara')
@section('content')
    <!-- Navbar -->
    <nav class="bg-white shadow-sm py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Logo" class="h-8" />
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-12 flex flex-col md:flex-row items-center">
        <!-- Left Image/Illustration -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
            <img src="{{ asset('image/Gambar1.png') }}" alt="Illustration" class="w-full max-w-md mx-auto" />
        </div>

        <!-- Role Login Box -->
        <div class="w-full md:w-1/2 max-w-md mx-auto bg-white rounded-lg p-8 shadow-lg">
            <div class="mb-6">
                <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Logo" class="h-10 mb-4" />
                <h2 class="text-2xl font-bold text-navy">Sign in as</h2>
            </div>

            <!-- Dropdown and Form -->
            <form id="roleForm">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-700">Select your role</label>
                <select id="role" name="role" required
                    class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-navy mb-4">
                    <option value="" disabled selected>-- Choose Role --</option>
                    <option value="{{ route('caseowner.login') }}">Case Owner</option>
                    <option value="{{ route('talent.login') }}">Talent</option>
                    <option value="{{ route('reviewer.login') }}">Reviewer</option>
                </select>

                <button type="submit" class="w-full bg-navy text-white py-2 rounded hover:bg-blue-900 transition">Sign
                    In</button>
            </form>

            <p class="mt-6 text-sm text-gray-700">Or register if you don't have an account yet:</p>
            <ul class="mt-2 text-sm list-disc list-inside text-navy space-y-1">
                <li><a href="{{ route('caseowner.register') }}" class="hover:underline">Register as Case Owner</a></li>
                <li><a href="{{ route('talent.register') }}" class="hover:underline">Register as Talent</a></li>
                <li><a href="{{ route('reviewer.register') }}" class="hover:underline">Register as Reviewer</a></li>
            </ul>
        </div>
    </main>
    <script>
        document.getElementById('roleForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const selected = document.getElementById('role').value;
            if (selected) {
                window.location.href = selected;
            }
        });
    </script>

    @include('layout.footer')
@endsection
