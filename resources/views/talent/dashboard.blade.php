@extends('layout.default')
@section('title', 'Dashboard Talent Researcher')
@section('content')
    @include('layout.navbar_after')
    @include('layout.alert')

    <!-- Hero Section with Students Image -->
    <section class="w-full bg-gray-50 mt-10">
        <div class="max-w-6xl mx-auto px-4"> <!-- Added container for consistent margin -->
            <div class="relative w-full">
                <img src="{{ asset('image/men-women-carrying-backpack-searching-books-librCary 1.png') }}"
                    alt="Students in Library" class="w-full h-80 object-cover object-top rounded-t-lg" />
                <!-- Added object-top -->
                <div class="absolute bottom-0 left-0 p-8 text-navy">
                    <h1 class="text-3xl font-bold mb-2">Talent Researcher Service</h1>
                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                </div>
            </div>
        </div>
    </section>

    <main class="bg-gray-50">
        <div class="w-full">
            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200">
                <div class="max-w-6xl mx-auto px-4"> <!-- Added container for consistent margin -->
                    <nav class="flex space-x-10 py-3"> <!-- Removed pl-12 for alignment -->
                        <!-- Tabs Navigation -->
                        @php
                            $activeTab = request('tab', 'case-list');
                        @endphp

                        <a href="{{ route('talent.dashboard', ['tab' => 'case-list']) }}"
                            class="relative pb-2 text-sm font-semibold flex items-center transition-all duration-200
           {{ $activeTab === 'case-list' ? 'text-navy font-bold' : 'text-gray-600 hover:text-navy' }}">
                            Case List
                            @if ($activeTab === 'case-list')
                                <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-navy rounded"></span>
                            @endif
                        </a>

                        <a href="{{ route('talent.dashboard', ['tab' => 'explore-case']) }}"
                            class="relative pb-2 text-sm font-semibold flex items-center transition-all duration-200
           {{ $activeTab === 'explore-case' ? 'text-navy font-bold' : 'text-gray-600 hover:text-navy' }}">
                            Explore Case
                            @if ($activeTab === 'explore-case')
                                <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-navy rounded"></span>
                            @endif
                        </a>

                        <a href="{{ route('talent.dashboard', ['tab' => 'solution-status']) }}"
                            class="relative pb-2 text-sm font-semibold flex items-center transition-all duration-200
           {{ $activeTab === 'solution-status' ? 'text-navy font-bold' : 'text-gray-600 hover:text-navy' }}">
                            Solution Status
                            @if ($activeTab === 'solution-status')
                                <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-navy rounded"></span>
                            @endif
                        </a>

                    </nav>
                </div>
            </div>

            <!-- Section: Search Header -->
            <section class="py-10 bg-cover bg-center" style="background-image: url('/image/back.png');">
                <div class="max-w-6xl mx-auto px-4">
                    <h2 class="text-2xl font-bold text-navy mb-6 text-center">Find cases</h2>

                    <div class="flex justify-center mb-8">
                        <div class="relative w-full max-w-xl">
                            <form action="{{ route('talent.dashboard') }}" method="get">
                                <input name="search" type="text" placeholder="Search your case..."
                                    value="{{ $search}}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-navy" />
                                <button type="submit"
                                    class="absolute right-0 top-0 h-full px-5 bg-navy text-white rounded-r-md hover:bg-navy transition-all flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
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

            <!-- Section: Card List -->
            <section class="py-10">
                <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Sidebar filter -->
                    <div class="md:col-span-1 shadow-md h-fit rounded-lg">
                        @foreach (['Available', 'In-progress', 'Completed'] as $status)
                            <div>
                                <a href="{{ request()->fullUrlWithQuery(['status' => $status]) }}"
                                    class="block px-4 py-2 rounded {{ request('status') === $status ? 'bg-navy text-white font-semibold' : 'hover:bg-gray-100' }}">
                                    {{ $status }}
                                </a>
                            </div>
                        @endforeach
                        <a href="{{ route('talent.dashboard', ['tab' => $activeTab]) }}" class="block px-4 py-1 rounded">
                            Reset Filter
                        </a>
                    </div>

                    <!-- Case list -->
                    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 gap-6 mx-auto">
                        @include($tab_view)

                    </div>
                </div>
                <div class="m-4">
                    {{ $cases->links() }}
                </div>
            </section>
        </div>
    </main>

    {{-- report modal --}}
    <div id="reportModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-xl shadow-lg w-[370px] border-2 border-blue-200">
            <h2 class="text-xl font-bold text-navy mb-1">Report Case</h2>
            <p class="text-gray-700 mb-4">Why do you want to report this case</p>
            <label class="block text-sm font-medium text-gray-700 mb-1">Choose the reason</label>
            <select id="reportReason"
                class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>Reason</option>
                <option value="spam">Spam</option>
                <option value="inappropriate">Inappropriate Content</option>
                <option value="other">Other</option>
            </select>
            <label class="block text-sm font-medium text-gray-700 mb-1">Add a comment to the report:</label>
            <textarea id="reportText"
                class="w-full p-3 border border-gray-300 rounded-md bg-gray-50 mb-6 text-gray-700 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="3" placeholder="Start typing your comment here"></textarea>
            <div class="flex justify-end gap-3">
                <button id="closeReportModal"
                    class="px-6 py-2 border-2 border-navy text-navy rounded-md font-semibold bg-white hover:bg-blue-50 transition">Cancel</button>
                <button id="submitReportModal"
                    class="px-6 py-2 bg-navy text-white rounded-md font-semibold hover:bg-blue-900 transition">Submit</button>
            </div>
        </div>
    </div>

    {{-- denied modal --}}
    <div id="deniedModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-xl shadow-lg w-[370px] border-2 border-blue-200">
            <h2 class="text-xl font-bold text-navy mb-1">Access Denied</h2>
            <p class="text-gray-700 mb-4">You need to at least have a 5 token</p>
            <div class="flex justify-end gap-3">
                <button id="closeDeniedModal"
                    class="px-6 py-2 border-2 border-navy text-navy rounded-md font-semibold bg-white hover:bg-blue-50 transition">Close</button>
                <a href="{{ route('token.topup.form') }}"
                    class="px-6 py-2 bg-navy text-white rounded-md font-semibold hover:bg-blue-900 transition">Topup</a>
            </div>
        </div>
    </div>

    <script>
        const reportButtons = document.querySelectorAll('.reportButton');
        const reportModal = document.getElementById('reportModal');
        const deniedModal = document.getElementById('deniedModal');

        const closeReportModal = document.getElementById('closeReportModal');
        const submitReportModal = document.getElementById('submitReportModal');

        const closeDeniedModal = document.getElementById('closeDeniedModal');
        const submitDeniedModal = document.getElementById('submitDeniedModal');

        // Show report modal
        reportButtons.forEach(button => {
            button.addEventListener('click', () => {
                reportModal.classList.remove('hidden');
            });
        });

        // Close report modal
        closeReportModal.addEventListener('click', () => {
            reportModal.classList.add('hidden');
        });

        // Submit report
        submitReportModal.addEventListener('click', () => {
            const reportText = document.getElementById('reportText').value;
            alert(`Report submitted: ${reportText}`);
            reportModal.classList.add('hidden');
        });

        // View case access check
        function handleCaseClick(isVerified, caseTitle) {
            if (isVerified == 0) {
                deniedModal.classList.remove("hidden");
            } else {
                window.location.href = `/cases/${encodeURIComponent(caseTitle)}`;
            }
        }

        // Close denied modal
        closeDeniedModal.addEventListener('click', () => {
            deniedModal.classList.add('hidden');
        });
    </script>

    @include('layout.contact')
    @include('layout.footer')
@endsection
