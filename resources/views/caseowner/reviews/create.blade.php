@extends('layout.default')
@section('content')
    <div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Beri Review untuk Case: {{ $case->title }}</h2>

        <form method="POST" action="{{ route("caseowner.reviews.store", $case) }}">
            @csrf

            <label for="rating" class="block mb-2 font-medium">Rating (1-5):</label>
            <select name="rating" id="rating" class="w-full border p-2 rounded mb-4" required>
                <option value="">-- Pilih Rating --</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>

            <label for="comment" class="block mb-2 font-medium">Komentar (opsional):</label>
            <textarea name="comment" id="comment" rows="4" class="w-full border p-2 rounded mb-4"
                placeholder="Tulis komentar..."></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim Review</button>
        </form>
    </div>
@endsection
