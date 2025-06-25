@extends('layouts.app')

@section('header')
    Daftar Buku
@endsection

@section('content')
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md shadow-sm text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('books.index') }}" class="flex flex-wrap gap-4 mb-6 items-end">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="title" placeholder="Cari Judul" value="{{ request('title') }}"
                class="w-48 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
        </div>

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
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }}
                    </option>
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

    <div class="mb-6 flex justify-between items-center flex-wrap gap-3">
        <h1 class="text-base font-semibold text-gray-800">Kelola buku milik Anda</h1>
        <a href="{{ route('books.create') }}"
            class="inline-block bg-green-200 hover:bg-blue-300 text-green-800 font-semibold text-sm px-4 py-2 rounded-md transition">
            Tambah Buku
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 bg-white rounded-md overflow-hidden shadow-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700">Thumbnail</th>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700">Judul</th>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700">Author</th>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700">Rating</th>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700">Uploaded</th>
                    <th class="px-4 py-3 border-b text-sm font-semibold text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 border-b">
                            @if ($book->thumbnail)
                                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Thumbnail"
                                    class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b text-gray-800">{{ $book->title }}</td>
                        <td class="px-4 py-3 border-b text-gray-600">{{ $book->author }}</td>
                        <td class="px-4 py-3 border-b text-yellow-500">⭐ {{ $book->rating }}</td>
                        <td class="px-4 py-3 border-b text-gray-500 text-sm">
                            {{ $book->created_at->format('d M Y') }}
                        </td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('books.show', $book) }}"
                                class="inline-block bg-blue-200 hover:bg-gray-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                                Lihat
                            </a>
                            <a href="{{ route('books.edit', $book) }}"
                                class="inline-block bg-yellow-200 hover:bg-blue-300 text-yellow-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                                Edit
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="bg-red-200 hover:bg-red-300 text-red-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500 text-sm">
                            Belum ada buku ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $books->appends(request()->query())->links() }}
    </div>
@endsection
