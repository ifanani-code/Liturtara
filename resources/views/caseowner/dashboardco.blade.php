@extends('layout.default')
@section('title', 'Dashboard Case Owner')
@section('content')
    <section class="bg-gray-100">
        <!-- Navbar -->
        @include('layout.caseowner.header_after')


        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-white via-blue-100 to-green-100 py-16 px-8 flex items-center justify-center">
            <div class="w-1/2">
                <h1 class="text-3xl font-bold text-navy">Welcome to Liturtara</h1>
                <p class="text-gray-600 mt-2">Enjoy our Case Owner service!</p>
                <a href="#">
                    <button class="mt-4 bg-navy text-white px-6 py-2 rounded-md hover:bg-[#000C3D]">
                        Explore Now →
                    </button>
                </a>
            </div>
            <div class="w-1/2 flex justify-center">
                <img src="caseowner.png" alt="Case Owner" class="w-80">
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-12 px-8">
            <h2 class="text-2xl font-bold text-navy text-center">Case Owner Service's</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg">Manage Cases</h3>
                    <p class="text-gray-600 mt-2">View and organize the cases you are working on.</p>
                    <button class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">View Cases</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg">Reports & Analysis</h3>
                    <p class="text-gray-600 mt-2">Get an in-depth report on your case.</p>
                    <button class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">View Report</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg">Account Settings</h3>
                    <p class="text-gray-600 mt-2">Manage your account information easily.</p>
                    <button class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">Manage Account</button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('layout.footer')

        <!-- JavaScript untuk Toggle Menu -->
        <script>
            document.getElementById("menu-toggle").addEventListener("click", function() {
                document.getElementById("menu").classList.toggle("hidden");
            });
        </script>

    </section>
@endsection
