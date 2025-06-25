@extends('layouts.app')

@section('header')
    Detail Buku
@endsection

@section('content')
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow">

        <div class="mb-4">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                Kembali ke halaman sebelumnya
            </a>
        </div>
        @if ($book->thumbnail)
            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}"
                class="w-full max-h-[400px] object-cover rounded mb-4">
        @else
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center rounded mb-4 text-gray-500">
                Tidak ada gambar
            </div>
        @endif

        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $book->title }}</h2>
        <p class="text-gray-600 mb-1"><span class="font-medium">Penulis:</span> {{ $book->author }}</p>
        <p class="text-gray-600 mb-2">
            <span class="font-medium">Rating:</span>
            <span class="text-yellow-500">⭐ {{ $book->rating }}</span>
        </p>

        <p class="text-gray-700 mb-4 whitespace-pre-line">{{ $book->description }}</p>

        <p class="text-xs text-gray-500">
            Diunggah pada: {{ $book->created_at->format('d M Y') }}
        </p>
    </div>
@endsection
