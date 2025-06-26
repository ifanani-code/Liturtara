<!-- resources/views/talent/cases/index.blade.php -->
@extends('layout.default')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Available Cases</h1>
    @foreach($cases as $case)
    <div class="bg-white p-4 mb-4 rounded shadow">
        <h2 class="text-lg font-semibold">{{ $case->title }}</h2>
        <p class="text-gray-700">{{ $case->description }}</p>
        <form action="{{ route('talent.submitProposal', $case->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="proposal_text" class="w-full border p-2 rounded mb-2" placeholder="Enter your proposal..." required></textarea>
            <button type="submit" class="bg-navy text-white px-4 py-2 rounded">Submit Proposal</button>
        </form>
    </div>
    @endforeach
</div>
@endsection
