@extends('layout.default')
@section('title', 'Dashboard Case Owner')
@section('content')
    <section class="bg-gray-100">
        <!-- Navbar -->
        @include('layout.caseowner.header_after')

        {{-- alert --}}
        @include('layout.alert')

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
                    <button
                        class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">View
                        Cases</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg">Reports & Analysis</h3>
                    <p class="text-gray-600 mt-2">Get an in-depth report on your case.</p>
                    <button
                        class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">View
                        Report</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg">Account Settings</h3>
                    <p class="text-gray-600 mt-2">Manage your account information easily.</p>
                    <button
                        class="mt-4 text-navy border border-navy px-4 py-2 rounded-md hover:bg-navy hover:text-white">Manage
                        Account</button>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cases as $case)
                    @php
                        $statusColor = match ($case->status) {
                            'Available' => 'bg-navy',
                            'In-progress' => 'bg-yellow-500',
                            'Cancelled' => 'bg-red-500',
                            'Completed' => 'bg-green-500',
                            default => 'bg-gray-500',
                        };
                    @endphp
                    <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-navy">{{ $case->title }} </h3>
                                <span
                                    class="{{ $statusColor }} text-white text-xs font-medium px-2.5 py-1 rounded">{{ $case->status }}</span>
                            </div>
                            <div class="flex space-x-2 mb-3">
                                @foreach (explode(',', $case->category) as $cat)
                                    <span class="bg-white text-xs border border-gray-300 rounded px-3 py-1">
                                        {{ trim($cat) }}
                                    </span>
                                @endforeach
                            </div>
                            <div class="flex items-center space-x-4 mb-3 text-sm">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                    <span>{{ $profile->full_name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $case->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-6">
                                {{ $case->description }}
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $case->updated_at->format('d M Y') }}
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        class="reportButton border border-red-500 text-red-500 hover:text-red-700 px-4 py-2 rounded-md flex items-center text-sm">
                                        Delete
                                    </button>
                                    @if ($case->status == 'Completed')
                                        @if ($case->review)
                                            <span
                                                class="bg-green-500 text-white px-4 py-2 rounded-md flex items-center text-sm">
                                                Reviewed
                                            </span>
                                        @else
                                            <a href="{{ route('caseowner.reviews.create', $case) }}"
                                                class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm">
                                                Review
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    @else
                                        <a href="#"
                                            class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm">
                                            View
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
