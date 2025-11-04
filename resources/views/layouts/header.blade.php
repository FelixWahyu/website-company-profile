<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/">
            @if (!empty($settings['site_logo']))
                <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}"
                    class="h-10">
            @else
                <h1 class="text-2xl font-bold text-gray-800">{{ $settings['site_name'] ?? 'Company Profile' }}</h1>
            @endif
        </a>

        <div class="hidden md:flex items-center space-x-6">
            <a href="/" class="text-gray-600 hover:text-indigo-600">Home</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Supermarket</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Wedding</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Galeri</a>
            <a href="#" class="text-gray-600 hover:text-indigo-600">Kontak</a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600">Login</a>
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
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </nav>
</header>
