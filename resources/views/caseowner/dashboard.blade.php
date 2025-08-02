@extends('layout.default')
@section('title', 'Dashboard Case Owner')
@section('content')
    @include('layout.navbar_after')

    {{-- alert --}}
    @include('layout.alert')

    <!-- Hero Section -->
    <section class="w-full bg-gray-50 mt-10">
        <div class="max-w-6xl mx-auto px-4"> <!-- Added container for consistent margin -->
            <div class="relative w-full">
                <img src="{{ asset('image/medium-shot-business-ownerrs-posiing 1.png') }}" alt="Students in Library"
                    class="w-full h-80 object-cover object-top rounded-t-lg" />
                <!-- Added object-top -->
                <div class="absolute bottom-0 left-0 p-8 text-navy">
                    <h1 class="text-3xl font-bold mb-2">Case Owner Service</h1>
                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="bg-gray-50">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200">
            <div class="max-w-6xl mx-auto px-4">
                <nav class="flex space-x-8 py-3">
                    <!-- Tab Case List (aktif) -->
                    <a href="#" class="relative pb-2 text-sm font-semibold text-navy flex items-center">
                        Case Owner
                        <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-navy rounded"></span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Section: Search Header -->
        <section class="py-10 bg-cover bg-center" style="background-image: url('/image/Case Owner Back.png');">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-2xl font-bold text-navy mb-6 text-center">Find your case</h2>

                <div class="flex justify-center mb-8">
                    <div class="relative w-full max-w-xl">
                        <form action="{{ route('caseowner.dashboard') }}" method="get">
                            <input name="search" type="text" placeholder="Search your case..."
                                value="{{ $search }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-navy" />
                            <button type="submit"
                                class="absolute right-0 top-0 h-full px-5 bg-navy text-white rounded-r-md hover:bg-navy transition-all flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sidebar filter -->
                <div class="md:col-span-1 shadow-md h-fit rounded-lg">
                    @foreach (['Sent', 'Available', 'In-progress', 'Completed', 'Cancelled', 'Expired'] as $status)
                        <div>
                            <a href="{{ request()->fullUrlWithQuery(['status' => $status]) }}"
                                class="block px-4 py-2 rounded {{ request('status') === $status ? 'bg-navy text-white font-semibold' : 'hover:bg-gray-100' }}">
                                {{ $status }}
                            </a>
                        </div>
                    @endforeach
                    <a href="{{ route('caseowner.dashboard') }}" class="block px-4 py-1 rounded">
                        Reset Filter
                    </a>
                </div>

                <!-- Case list -->
                <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 gap-6 mx-auto">
                    @forelse ($cases as $case)
                        @php
                            $statusColor = match ($case->status) {
                                'Available' => 'bg-navy',
                                'In-progress' => 'bg-yellow-500',
                                'Cancelled' => 'bg-red-500',
                                'Expired' => 'bg-red-500',
                                'Completed' => 'bg-green-500',
                                default => 'bg-gray-500',
                            };
                        @endphp
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden relative w-[350px] flex flex-col justify-between">
                            <div class="p-6 h-full flex flex-col">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-bold text-navy">{{ $case->title }}</h3>
                                    <span
                                        class="absolute top-0 right-0 {{ $statusColor }} text-white text-xs font-medium px-3 py-1.5 rounded">
                                        {{ $case->status }}
                                    </span>
                                </div>

                                <div class="flex space-x-2 mb-3 flex-wrap">
                                    @foreach (explode(',', $case->category) as $cat)
                                        <span class="bg-white text-xs border border-gray-300 rounded px-3 py-1">
                                            {{ trim($cat) }}
                                        </span>
                                    @endforeach
                                </div>

                                <div class="flex items-center space-x-4 mb-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        <span>{{ optional($case->user->profile)->full_name ?? 'Unknown Owner' }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $case->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>

                                {{-- Clamp the description --}}
                                <p class="text-gray-600 text-sm mb-6 line-clamp-3 ">
                                    {{ $case->description }}
                                </p>

                                <div class="mt-auto flex justify-between items-center pt-4 border-t">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
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
                                                <button
                                                    class="bg-green-500 text-white px-4 py-2 rounded-md flex items-center text-sm hover:bg-navy-dark transition"
                                                    {{-- onclick="handleCaseClick({{ $user->is_verified }}, '{{ $case->title }}')"> --}}>
                                                    Reviewed
                                                </button>
                                            @else
                                                <a href="{{ route('caseowner.reviews.create', $case->id) }}"
                                                    class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm hover:bg-navy-dark transition"
                                                    Review <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    Review
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                        @else
                                            <button
                                                class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm hover:bg-navy-dark transition"
                                                {{-- onclick="handleCaseClick({{ $user->is_verified }}, '{{ $case->title }}')"> --}}>
                                                View
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if ($search)
                            <p
                                class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 gap-6 mx-auto items-center text-xl text-gray-400">
                                Case not found</p>
                        @else
                            <p
                                class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 gap-6 mx-auto items-center text-xl text-gray-400">
                                There's no uploaded cases</p>
                        @endif
                    @endforelse
                </div>
            </div>
            <div class="m-4">
                {{ $cases->links() }}
            </div>
        </section>
    </main>

    @include('layout.contact')
    @include('layout.footer')

    <!-- JavaScript untuk Toggle Menu -->
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>

@endsection
