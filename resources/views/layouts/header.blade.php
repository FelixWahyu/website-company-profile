<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto py-1 px-6 flex justify-between items-center">
        <a href="/">
            @if (!empty($settings['site_logo']))
                <div class="flex gap-4 items-center">
                    <img src="{{ asset('storage/' . $settings['site_logo']) }}"
                        alt="{{ $settings['site_name'] ?? 'Logo' }}" class="w-16">
                    <h3 class="text-lg font-semibold">{{ $settings['site_name'] }}</h3>
                </div>
            @else
                <h1 class="text-2xl font-bold text-gray-800">{{ $settings['site_name'] ?? 'Company Profile' }}</h1>
            @endif
        </a>

        <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('home') }}"
                class="hover:text-indigo-600 {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-600' }}">Home</a>
            <a href="{{ route('shop') }}"
                class="hover:text-indigo-600 {{ request()->routeIs('shop') ? 'text-indigo-600' : 'text-gray-600' }}">Toko</a>
            <a href="{{ route('wedding') }}"
                class="hover:text-indigo-600 {{ request()->routeIs('wedding') ? 'text-indigo-600' : 'text-gray-600' }}">Wedding</a>
            <a href="{{ route('contact') }}"
                class="hover:text-indigo-600 {{ request()->routeIs('contact') ? 'text-indigo-600' : 'text-gray-600' }}">Kontak</a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 me-4 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Register</a>
            @else
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center text-gray-600 hover:text-indigo-600">
                        {{ Auth::user()->name }}
                        <svg class="ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Panel</a>
                        @endif
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </nav>
</header>
