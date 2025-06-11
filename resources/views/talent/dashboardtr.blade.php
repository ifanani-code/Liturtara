@extends('layout.default')

@section('content')
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Dashboard Talent</h1>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="p-4 bg-white shadow rounded">
                    <h2 class="text-lg font-semibold">Token</h2>
                    <p class="text-2xl text-blue-500">{{ $token->amount}}</p>
                </div>
                @php
$points = $userPoint->points;

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
                <div class="p-4 bg-white shadow rounded">
                    <h2 class="text-lg font-semibold">Poin</h2>
                    <p class="text-2xl text-green-500">{{ $points }}</p>
                    <p class="text-sm text-gray-500">Level: {{ $level }}</p>
                </div>
        </div>

            <h2 class="text-xl font-semibold mb-2">List Kasus Tersedia</h2>
            <div class="bg-white shadow rounded p-4">
                @foreach ($cases as $case)
                    <div class="border-b py-2 cursor-pointer hover:bg-gray-50"
                        onclick="handleCaseClick({{ $user->is_verified }}, '{{ $case->title }}')">
                        <strong>{{ $case->title }}</strong> <br>
                        <span class="text-sm text-gray-600">
                            By {{ $case->user->profile->full_name ?? 'Unknown Owner' }}
                        </span>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

        <!-- Modal -->
        <div id="tokenModal" class="fixed inset-0 hidden justify-center items-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
                <h2 class="text-xl font-bold mb-4">Akses Ditolak</h2>
                <p class="mb-4">Kamu belum melakukan top-up minimal 5 token untuk mengakses kasus ini.</p>
                <a href"#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Top-Up
                    Sekarang</a>
                <button onclick="closeModal()" class="ml-2 px-4 py-2 border border-gray-300 rounded">Tutup</button>
            </div>
        </div>


        <script>
            function handleCaseClick(isVerified, caseTitle) {
                if (isVerified == 0) {
                    document.getElementById("tokenModal").classList.remove("hidden");
                } else {
                    // Redirect to case detail (ganti route sesuai kebutuhan)
                    window.location.href = `/cases/${encodeURIComponent(caseTitle)}`;
                }
            }

            function closeModal() {
                document.getElementById("tokenModal").classList.add("hidden");
            }
        </script>
@endsection

