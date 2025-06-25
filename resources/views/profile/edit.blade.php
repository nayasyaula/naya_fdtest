@extends('layouts.app')

@section('header')
    Profile
@endsection

@section('content')
    <div class="text-sm">
        <div class="max-w-4xl mx-auto space-y-6 px-4 sm:px-6 lg:px-8">

            <!-- Update Profile Info -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Optional: Delete Account -->
            {{-- 
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-base font-semibold text-gray-800 mb-4">Hapus Akun</h2>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            --}}

        </div>
    </div>
@endsection
