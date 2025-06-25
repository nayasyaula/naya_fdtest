<nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600 hover:text-blue-700 transition">
                    {{ config('app.name') }}
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition">
                        Dashboard
                    </a>
                    <a href="{{ route('books.index') }}"
                        class="text-sm font-medium {{ request()->is('books*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition">
                        Books
                    </a>
                    <a href="{{ route('users.index') }}"
                        class="text-sm font-medium {{ request()->is('users*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition">
                        Users
                    </a>
                @endauth
            </div>

            <div class="flex items-center space-x-4" x-data="{ open: false }" @click.away="open = false">
                @auth
                    <button @click="open = !open" type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-600 bg-white hover:text-blue-600 focus:outline-none transition duration-150">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ms-2 h-4 w-4 text-gray-500 transition" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute right-4 top-16 w-44 bg-white border border-gray-200 rounded-md shadow-md z-50"
                        style="display: none;">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profil Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
