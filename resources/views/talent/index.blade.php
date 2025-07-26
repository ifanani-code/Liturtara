@extends('layout.default')

@section('title', 'Daftar Kasus')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Cari Kasus</h1>

    <form method="GET" action="{{ route('talent.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari berdasarkan judul..."
            value="{{ request('search') }}"
            class="border p-2 rounded w-full" />
    </form>

    @if($cases->count())
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-2">Judul</th>
                    <th class="text-left p-2">Kategori</th>
                    <th class="text-left p-2">Token</th>
                    <th class="text-left p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                    <tr class="border-b">
                        <td class="p-2 font-semibold">{{ $case->title }}</td>
                        <td class="p-2">{{ $case->category }}</td>
                        <td class="p-2">{{ $case->reward_token }} token</td>
                        <td class="p-2">
                            <span class="px-2 py-1 rounded bg-gray-200 text-sm">{{ $case->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $cases->withQueryString()->links() }}
        </div>
    @else
        <p class="text-gray-600">Tidak ada kasus yang ditemukan.</p>
    @endif
</div>
@endsection
