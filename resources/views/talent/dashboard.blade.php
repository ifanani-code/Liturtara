@extends('layout.default')
@section('title', 'Dashboard Talent Researcher')
@section('content')
    @include('layout.talent.header_after')

    <!-- Hero Section with Students Image -->
    <section class="w-full bg-gray-50 mt-10">
        <div class="max-w-6xl mx-auto px-4"> <!-- Added container for consistent margin -->
            <div class="relative w-full">
                <img src="https://image.freepik.com/free-photo/men-women-carrying-backpack-searching-books-library_1150-24655.jpg"
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
                    <nav class="flex space-x-8 py-3"> <!-- Removed pl-12 for alignment -->
                        <!-- Tab Case List (aktif) -->
                        <a href="#" class="relative pb-2 text-sm font-semibold text-gray-900 flex items-center">
                            Case List
                            <span class="absolute left-0 -bottom-0.5 w-full h-1 bg-navy rounded"></span>
                        </a>
                        <!-- Tab Explore Case -->
                        <a href="#"
                            class="pb-2 text-sm font-semibold text-gray-600 hover:text-navy flex items-center">
                            Explore Case
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Section: Search Header -->
            <section class="py-10 bg-cover bg-center" style="background-image: url('/image/back.png');">
                <div class="max-w-6xl mx-auto px-4">
                    <h2 class="text-2xl font-bold text-navy mb-6 text-center">Find your case</h2>

                    <div class="flex justify-center mb-8">
                        <div class="relative w-full max-w-xl">
                            <input type="text" placeholder="Search your case..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-navy" />
                            <button
                                class="absolute right-0 top-0 h-full px-5 bg-navy text-white rounded-r-md hover:bg-navy transition-all flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <center>
                <div class="border-t border-navy w-10/12 mt-4"></div>
            </center>


            <!-- Section: Card List -->
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
                        <!-- Card 1: Available -->
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
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        <span>{{ $case->user->profile->full_name ?? 'Unknown Owner' }}</span>
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
                                            Report
                                        </button>
                                        <button
                                        class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm"
                                        onclick="handleCaseClick({{ $user->is_verified }}, '{{ $case->title }}')">
                                            View
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="py-6">
                <div class="max-w-6xl mx-auto px-4 flex items-center justify-between relative">
                    <!-- Kiri: Spacer -->
                    <div class="w-1/3"></div>
                    <!-- Tengah: Tombol Navigasi -->
                    <div <!-- Tombol Next -->
                        <button class="bg-navy text-white px-4 h-10 rounded-md flex items-center gap-2 hover:bg-blue-900">
                            Next
                            <span>→</span>
                        </button>
                    </div>

                    <!-- Kanan: Info halaman -->
                    <div class="w-1/3 flex justify-end items-center gap-2 text-sm text-gray-700">
                        <span>Page</span>
                        <input type="text" value="1" class="w-10 h-8 border rounded text-center text-sm" />
                        <span>from 2</span>
                    </div>

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
                    class="px-6 py-2 border-2 border-navy text-navy rounded-md font-semibold bg-white hover:bg-blue-50 transition">Cancel</button>
                <button id="submitDeniedModal"
                    class="px-6 py-2 bg-navy text-white rounded-md font-semibold hover:bg-blue-900 transition">Submit</button>
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

            // Submit denied action
            submitDeniedModal.addEventListener('click', () => {
                deniedModal.classList.add('hidden');
                alert('Access request logged or other action.');
            });

    </script>

    @include('layout.contact')
    @include('layout.footer')
@endsection
