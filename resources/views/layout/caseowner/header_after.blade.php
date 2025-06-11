<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center relative">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <img src="{{ asset('image/LogoLiturtara1.png') }}" alt="Liturtara Logo" class="h-8">
        {{-- <img src="{{ asset('storage/liturtaralogo.svg') }}" alt="Liturtara Logo" class="h-8"> --}}
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
                {{ $token->amount}} Token
            </button>
        </a>

        <!-- Notification -->
        <div class="flex">
            <button id="notificationButton" class="relative">
                <img src="/image/bell.svg" alt="Notification" class="w-6 h-6" />
            </button>

            <!-- Notification Box -->
            <div id="notificationBox"
                class="hidden absolute right-80 mt-2 w-80 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden z-50">
                <div class="px-6 pt-5 pb-2 border-b border-gray-200">
                    <h4 class="font-bold text-blue-900 text-lg">Notification</h4>
                </div>
                <ul class="divide-y divide-gray-100">
                    <li class="flex items-start px-6 py-3 gap-3 hover:bg-gray-50 cursor-pointer">
                        <!-- Approved: check_circle -->
                        <span class="material-icons text-green-600 mt-1">check_circle</span>
                        <div class="flex-1">
                            <div class="text-sm text-gray-900 font-medium">Your solution has been approved</div>
                            <div class="text-xs text-gray-400 mt-0.5">2m</div>
                        </div>
                    </li>
                    <li class="flex items-start px-6 py-3 gap-3 hover:bg-gray-50 cursor-pointer">
                        <!-- Case: folder_open -->
                        <span class="material-icons text-blue-600 mt-1">folder_open</span>
                        <div class="flex-1">
                            <div class="text-sm text-gray-900 font-medium">Check out the latest case...</div>
                            <div class="text-xs text-gray-400 mt-0.5">4m</div>
                        </div>
                    </li>
                    <li class="flex items-start px-6 py-3 gap-3 hover:bg-gray-50 cursor-pointer">
                        <!-- Rejected: cancel -->
                        <span class="material-icons text-red-500 mt-1">cancel</span>
                        <div class="flex-1">
                            <div class="text-sm text-gray-900 font-medium">One of your solution has been
                                rejected</div>
                            <div class="text-xs text-gray-400 mt-0.5">1h</div>
                        </div>
                    </li>
                    <li class="flex items-start px-6 py-3 gap-3 hover:bg-gray-50 cursor-pointer">
                        <!-- Message: mail -->
                        <span class="material-icons text-blue-900 mt-1">mail</span>
                        <div class="flex-1">
                            <div class="text-sm text-gray-900 font-medium">New message from client</div>
                            <div class="text-xs text-gray-400 mt-0.5">3h</div>
                        </div>
                    </li>
                    <li class="flex items-start px-6 py-3 gap-3 hover:bg-gray-50 cursor-pointer">
                        <!-- Message: mail -->
                        <span class="material-icons text-blue-900 mt-1">mail</span>
                        <div class="flex-1">
                            <div class="text-sm text-gray-900 font-medium">New message from client</div>
                            <div class="text-xs text-gray-400 mt-0.5">3h</div>
                        </div>
                    </li>
                </ul>
                <a href="#"
                    class="block text-center bg-navy text-white py-3 font-semibold text-sm hover:bg-blue-900 transition">View
                    all notification</a>
            </div>
        </div>

        <!-- Point Button -->
        <a href="#">
            <button class="text-sm text-gray-700 hover:text-navy font-medium">
                {{ $userPoint->points}} Point
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

{{-- notification box --}}
<script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationBox = document.getElementById('notificationBox');

    notificationButton.addEventListener('click', () => {
        notificationBox.classList.toggle('hidden');
    });
</script>
