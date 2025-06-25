@extends('layouts.app')

@section('header')
    Tambah Buku Baru
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto mt-6">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="text-sm">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Author</label>
                <input type="text" name="author" value="{{ old('author') }}"
                    class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none @error('author') border-red-500 @enderror">
                @error('author')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Rating (1–5)</label>
                <select name="rating"
                    class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none @error('rating') border-red-500 @enderror">
                    <option value="">Pilih Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
                @error('rating')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Thumbnail</label>
                <input type="file" name="thumbnail"
                    class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none @error('thumbnail') border-red-500 @enderror">
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('books.index') }}"
                    class="inline-block bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-block bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>
@endsection
