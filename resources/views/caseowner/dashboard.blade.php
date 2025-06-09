@extends('layout.default')

@section('title', 'Case Owner Dashboard')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

        {{-- session message --}}
        @if (session()->get('status'))
            <p>{{ session()->get('status') }}</p>
        @endif

        @if (session()->has('success'))
            <div>
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div>
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white shadow p-4 rounded">
                <h2 class="text-lg font-semibold">Token</h2>
                <p class="text-xl">{{ $token->amount ?? 0 }}</p>
            </div>
            @php
                $points = $userPoint->points ?? 0;

                if ($points <= 100) {
                    $level = 'Beginner';
                } elseif ($points <= 200) {
                    $level = 'Intermediate';
                } elseif ($points <= 300) {
                    $level = 'Advance';
                } else {
                    $level = 'Pro';
                }
            @endphp

            <div class="bg-white shadow p-4 rounded">
                <h2 class="text-lg font-semibold">Poin & Level</h2>
                <p class="text-xl">{{ $points }} Poin</p>
                <p class="text-sm text-gray-500">Level: {{ $level }}</p>
            </div>

        </div>

        <div class="bg-white shadow p-4 rounded">
            <h2 class="text-lg font-semibold mb-2">Cases Anda</h2>
            @php
                $groupedCases = $cases->groupBy('status');
            @endphp

            @forelse (['sent', 'approved', 'in progress', 'solved', 'rejected'] as $status)
                <h2 class="text-lg font-semibold mt-6 capitalize">{{ $status }}</h2>

                <table class="w-full table-auto border mb-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Level</th>
                            <th class="px-4 py-2 text-left">Reward Token</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groupedCases[$status] ?? [] as $case)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $case->title }}</td>
                                <td class="px-4 py-2">{{ $case->level ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $case->reward_token }}</td>
                                @if ($status === 'solved')
                                    <td class="px-4 py-2">
                                        @if ($case->review)
                                            <span class="text-green-600">Sudah direview</span>
                                        @else
                                            <a href="{{ route('caseowner.reviews.create', $case) }}"
                                                class="text-blue-600 underline">Beri Review</a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-center text-gray-500">Tidak ada case dengan status
                                    ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @empty
                <p class="text-center text-gray-500">Tidak ada case tersedia.</p>
            @endforelse

        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <a href="{{ route("caseowner.token.topup.form") }}">top up</a>
    </div>
@endsection
