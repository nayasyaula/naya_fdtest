@extends('layouts.app')

@section('header')
    Buku Publik
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto">
        <form method="GET" class="flex flex-wrap gap-4 mb-6 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                <input type="text" name="author" placeholder="Cari Author" value="{{ request('author') }}"
                    class="w-48 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Upload</label>
                <input type="date" name="uploaded_date" value="{{ request('uploaded_date') }}"
                    class="w-48 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                <select name="rating"
                    class="w-32 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
                    <option value="">Semua</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <button type="submit"
                    class="inline-block bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                    Filter
                </button>
            </div>
        </form>

        @if ($books->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($books as $book)
                    <a href="{{ route('details', $book) }}"
                        class="block bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition p-4">
                        @if ($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="cover"
                                class="w-full h-[500px] object-cover rounded mb-3">
                        @endif

                        <h3 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600">
                            📚 <span class="font-medium">{{ $book->author }}</span>
                        </p>
                        <p class="text-sm text-yellow-500">⭐ {{ $book->rating }}/5</p>
                        <p class="text-xs text-gray-400 mt-1">📅 {{ $book->created_at->format('d M Y') }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $books->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 mt-12">
                <p>📭 Tidak ada buku ditemukan.</p>
            </div>
        @endif
    </div>
@endsection
