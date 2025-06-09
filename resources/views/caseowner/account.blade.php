@extends('layout.default')
@section('title', 'Case Owner Account')
@section('content')
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('storage/liturtaralogo.svg') }}" alt="Liturtara Logo" class="h-8">
        </div>
        <div class="flex space-x-6 justify-start">
            <a href="#" class="text-gray-700 hover:text-blue-700">Home</a>
            <a href="{{ route('serviceco') }}" class="text-gray-700 hover:text-blue-700">Service</a>
            <a href="#" class="text-gray-700 hover:text-blue-700">Contact Us</a>
            <a href="{{ route('accountco') }}">
                <button
                    class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                    Account
                </button>
            </a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="flex flex-1">
        <aside class="w-64 bg-white shadow-md min-h-screen p-6">
            <nav class="space-y-4">
                <a href="{{ route('accountco') }}"
                    class="block font-semibold text-white bg-blue-900 px-4 py-2 rounded-lg">Profile</a>
                <a href="{{ route('companyform') }}" class="block text-gray-700 hover:text-blue-700">Company</a>
                <a href="#" class="block text-gray-700 hover:text-blue-700">Project</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block text-red-600 hover:text-red-800">
                        Logout →
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Profil Section -->
        <main class="flex-1 p-10">
            <h1 class="text-2xl font-bold">
                Profile <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded ml-2">SMEs</span>
            </h1>
            <p class="text-lg text-gray-700 mt-1">Case Owner</p>

            <div class="bg-white shadow-md rounded-lg p-6 mt-4">
                <!-- Profile Image and Edit Buttons -->
                <div class="flex items-center space-x-4">
                    <div class="w-24 h-24 bg-gray-300 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/gambar1pp.png') }}" alt="Gambar" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <button
                            class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                            Change Photo
                        </button>
                        <button
                            class="border border-red-500 text-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white">
                            Delete
                        </button>
                    </div>
                </div>

                <div class="mt-6 space-y-4">
                    <!-- Full Name -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Full Name</label>
                        <div class="flex items-center space-x-4">
                            <input type="text" class="border px-4 py-2 rounded w-2/3" value="John Doe" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Date of Birth</label>
                        <div class="flex items-center space-x-4">
                            <input type="date" class="border px-4 py-2 rounded w-2/3" value="1999-10-10" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Domicile -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Domicile</label>
                        <div class="flex items-center space-x-4">
                            <input type="text" class="border px-4 py-2 rounded w-2/3" value="Kota Bandung" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="flex flex-col">
                        <label class="text-gray-700 mb-2">Gender</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="Laki-laki" class="form-radio text-blue-600">
                                <span>Male</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="Perempuan" class="form-radio text-blue-600">
                                <span>Female</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="Lainnya" class="form-radio text-blue-600">
                                <span>Others</span>
                            </label>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Phone Number</label>
                        <div class="flex items-center space-x-4">
                            <input type="text" class="border px-4 py-2 rounded w-2/3" value="081234567890" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Email</label>
                        <div class="flex items-center space-x-4">
                            <input type="text" class="border px-4 py-2 rounded w-2/3" value="liturtara@gmail.com" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col">
                        <label class="text-gray-700">Password</label>
                        <div class="flex items-center space-x-4">
                            <input type="text" class="border px-4 py-2 rounded w-2/3" readonly>
                            <button
                                class="border border-blue-700 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-700 hover:text-white">
                                Edit
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-center">
                <button class="mt-6 bg-blue-900 text-white px-6 py-2 rounded-md hover:bg-blue-800">Save</button>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-[#00114F] text-white py-20 px-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Logo, Alamat & Media Sosial -->
            <div>
                <img src="{{ asset('storage/liturtarawhite.svg') }}" alt="Liturtara Logo" class="h-12">
                <p class="text-sm mt-3">PT. Literasi Jaya Nusantara</p>
                <p class="text-sm mt-1">Email: info@liturtara.com</p>
                <p class="text-sm mt-1">Phone: +62 812-3456-7890</p>

                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-x"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white text-2xl"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Company, Service, Help (Sections) -->
            <div>
                <h3 class="font-semibold text-lg mb-3">Company</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Home Page</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">About</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">News</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-lg mb-3">Service</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Case Owner</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Talent Researcher</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-lg mb-3">Help</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Contact Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Terms and Conditions</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
@endsection
