<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center relative">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Liturtara Logo" class="h-8">
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
        <!-- Token Button -->
        <a href="#">
            <button class="text-sm text-gray-700 hover:text-navy font-medium">
                {{ $token->amount ?? 0 }} Token
            </button>
        </a>

        <!-- Notifikasi Lonceng -->
        <a href="#">
            <button class="text-sm text-gray-700 py-2 rounded-md hover:text-blue-700">
                <img src="{{ asset('image/bell.svg') }}" alt="Notifikasi" class="h-6 w-6">
            </button>
        </a>

        <!-- Point Button -->
        <a href="#">
            <button class="text-sm text-gray-700 hover:text-navy font-medium">
                {{ $userPoint->points ?? 0 }} Point
            </button>
        </a>

        <!-- Account Button -->
        <a href="#">
            <button
                class="text-sm font-medium border-2 border-navy text-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">
                Account
            </button>
        </a>

        <!-- logout Button -->
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit"
                class="text-sm font-medium px-4 py-2 bg-navy text-white rounded-md border-2 border-navy hover:bg-white hover:text-navy hover:border-2 hover:border-navy">
                Logout
            </button>
        </form>

        <!-- Tombol Burger Menu (Mobile) -->
        <button id="menu-toggle" class="md:hidden text-navy focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>
</nav>
