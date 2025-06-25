@extends('layouts.app')

@section('header')
    Daftar User
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto">
        <form method="GET" action="{{ route('users.index') }}" class="flex flex-wrap gap-4 mb-6 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name/Email</label>
                <input type="text" name="search" placeholder="Cari nama atau email" value="{{ request('search') }}"
                    class="w-52 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Email</label>
                <select name="verified"
                    class="w-52 border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm">
                    <option value="">Semua Status</option>
                    <option value="yes" {{ request('verified') == 'yes' ? 'selected' : '' }}>Terverifikasi</option>
                    <option value="no" {{ request('verified') == 'no' ? 'selected' : '' }}>Belum Verifikasi</option>
                </select>
            </div>
            <div>
                <button type="submit"
                    class="inline-block bg-blue-200 hover:bg-blue-300 text-blue-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                    Filter
                </button>
            </div>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 bg-white rounded-md overflow-hidden shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-3 border-b text-sm font-semibold text-gray-700">Nama</th>
                        <th class="text-left px-4 py-3 border-b text-sm font-semibold text-gray-700">Email</th>
                        <th class="text-left px-4 py-3 border-b text-sm font-semibold text-gray-700">Status Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 border-b text-gray-800">{{ $user->name }}</td>
                            <td class="px-4 py-3 border-b text-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-3 border-b">
                                @if ($user->hasVerifiedEmail())
                                    <span class="text-green-600 font-medium">Terverifikasi</span>
                                @else
                                    <span class="text-red-500 font-medium">Belum</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-3 text-center text-gray-500">Tidak ada user ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
@endsection
