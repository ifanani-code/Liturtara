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
        <div class="bg-white rounded-lg shadow-md overflow-hidden relative min-h-[100px] flex flex-col justify-between">
            <div class="p-6 h-full flex flex-col">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-lg font-bold text-navy">{{ $case->title }}</h3>
                    <span class="absolute top-0 right-0 {{ $statusColor }} text-white text-xs font-medium px-3 py-1.5 rounded">
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
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        <span>{{ $case->user->profile->full_name ?? 'Unknown Owner' }}</span>
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
                            Report
                        </button>
                        <button class="bg-navy text-white px-4 py-2 rounded-md flex items-center text-sm"
                            {{-- onclick="handleCaseClick({{ $user->is_verified }}, '{{ $case->title }}')"> --}}>
                            View
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
