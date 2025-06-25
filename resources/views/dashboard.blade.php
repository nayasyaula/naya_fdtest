@extends('layouts.app')

@section('header')
    Dashboard
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto mt-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Selamat Datang, {{ auth()->user()->name }}
        </h2>
        <div class="space-y-3 text-gray-700 text-sm">
            <div>
                <span class="font-medium">Email:</span>
                <span>{{ auth()->user()->email }}</span>
            </div>
            <div>
                <span class="font-medium">Status Verifikasi:</span>
                @if (auth()->user()->hasVerifiedEmail())
                    <span class="text-green-600 font-semibold ml-1">Terverifikasi</span>
                @else
                    <span class="text-red-600 font-semibold ml-1">Belum Verifikasi</span>
                @endif
            </div>
        </div>
    </div>
@endsection
