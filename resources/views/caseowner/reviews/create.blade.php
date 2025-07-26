@extends('layout.default')
@section('title', 'Rate Solved case')
@section('content')
    @include('layout.navbar_after')
    <div class="h-[85vh]">
        <h2 class="text-2xl font-bold text-navy mt-6 text-center">Rate Solved Case</h2>
        <div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Give a rate for case: {{ $case->title }}</h2>

            <form method="POST" action="{{ route('caseowner.reviews.store', $case) }}" x-data="{ rating: 0 }">
                @csrf
                <label class="block mb-2 font-medium text-gray-700">
                    Rating<span class="text-red-500">*</span>
                </label>
                <div>
                    <input type="hidden" name="rating" x-model="rating" required>
                    <div class="flex space-x-1 text-yellow-300 text-2xl cursor-pointer">
                        <template x-for="star in 5" :key="star">
                            <svg :class="{ 'fill-yellow-300': star <= rating, 'fill-gray-300': star > rating }"
                                @click="rating = star" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.287 3.957c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.37 2.448c-.784.57-1.838-.197-1.539-1.118l1.287-3.957a1 1 0 00-.364-1.118L2.645 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.957z" />
                            </svg>
                        </template>
                    </div>
                </div>
                <label for="comment" class="block mb-2 font-medium">Comment:</label>
                <textarea name="comment" id="comment" rows="4" class="w-full border p-2 rounded mb-4"
                    placeholder="Write a comment..."></textarea>

                <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-blue-900">Send
                    Review</button>
            </form>
        </div>
    </div>
    @include('layout.contact')
    @include('layout.footer')
@endsection
