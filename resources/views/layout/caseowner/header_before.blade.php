<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center relative">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <a href="/">
            <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Liturtara Logo" class="h-8">
        </a>
    </div>

    <!-- Menu Navigasi (Left Side) -->
    <div class="hidden md:flex flex-row  md:space-x-4 flex-grow ml-6 text-sm">
        <a href="#" class="font-medium text-navy hover:text-blue-700 py-2 px-4">Home</a>
        <a href="#" class="font-medium text-navy hover:text-blue-700 py-2 px-4">About Us</a>
        <a href="#" class="font-medium text-navy hover:text-blue-700 py-2 px-4">Service</a>
        <a href="#" class="font-medium text-navy hover:text-blue-700 py-2 px-4">News</a>
        <a href="#" class="font-medium text-navy hover:text-blue-700 py-2 px-4">Our Contact</a>
    </div>

    <!-- Account Button (Right Side) -->
    <div class="flex justify-center items-center space-x-4">
        <!-- Account Button -->
        <a href="{{ route('caseowner.login') }}">
            <button
                class="text-sm font-medium border-2 border-navy text-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">
                Log in
            </button>
        </a>

        <!-- logout Button -->
        <a href="{{ route('caseowner.register') }}">
            <button
                class="text-sm font-medium px-4 py-2 bg-navy text-white rounded-md border-2 border-navy hover:bg-white hover:text-navy hover:border-2 hover:border-navy">
                Sign Up
            </button>
        </a>

        <!-- Tombol Burger Menu (Mobile) -->
        <button id="menu-toggle" class="md:hidden text-navy focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>
</nav>
