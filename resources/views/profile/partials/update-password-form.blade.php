<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div>
            <label for="current_password" class="block font-medium text-sm text-gray-700">Current Password</label>
            <input type="password" name="current_password" id="current_password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                autocomplete="current-password" />

            @if ($errors->updatePassword->has('current_password'))
                <p class="text-sm text-red-600 mt-1">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        {{-- New Password --}}
        <div>
            <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                autocomplete="new-password" />

            @if ($errors->updatePassword->has('password'))
                <p class="text-sm text-red-600 mt-1">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                autocomplete="new-password" />

            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="text-sm text-red-600 mt-1">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </div>

        {{-- Submit Button --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                class="inline-block bg-indigo-200 hover:bg-indigo-300 text-indigo-800 font-semibold text-sm px-4 py-2 rounded-md transition">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">Saved.</p>
            @endif
        </div>
    </form>
</section>
