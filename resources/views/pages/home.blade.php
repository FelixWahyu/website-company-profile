<x-frontend-layout>
    <x-slot name="title">
        Selamat Datang - {{ $settings['site_name'] ?? config('app.name') }}
    </x-slot>

    <section x-data="{ current: 0, slides: ['/images/banner/supermarket.jpg', '/images/banner/wedding.jpg'] }" x-init="setInterval(() => current = (current + 1) % slides.length, 5000)" class="relative w-full h-[85vh] md:h-[90vh] overflow-hidden">
        <!-- Background Images -->
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-[1200ms] ease-in-out"
                :style="`background-image: url('${slide}')`" x-show="current === index" x-transition:enter="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100" x-transition:leave-end="opacity-0">
            </div>
        </template>

        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Hero Content -->
        <div
            class="relative z-10 flex flex-col items-center justify-center text-center text-white h-full px-6 sm:px-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 leading-tight drop-shadow-lg">
                Selamat Datang
                Toko Akur Plastik & Wedding Planner
            </h1>
            <p class="text-lg mb-2">Solusi Lengkap untuk Kehidupan Anda
                Dari kebutuhan sehari-hari hingga momen spesial Anda, kami siap melayani dengan sepenuh hati.</p>
            <p class="text-lg">Menyediakan produk supermarket berkualitas dan layanan wedding impian Anda dalam satu
                atap.</p>
        </div>

        <!-- Dots (indikator slide) -->
        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3 z-10">
            <template x-for="(slide, index) in slides" :key="index">
                <button class="w-3 h-3 rounded-full transition-all"
                    :class="current === index ? 'bg-blue-500 w-4' : 'bg-white/70 hover:bg-white'"
                    @click="current = index"></button>
            </template>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Layanan Utama Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div
                    class="bg-white rounded-lg border border-gray-200 shadow-xl overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="{{ asset('images/banner/supermarket.jpg') }}" alt="Lorong Supermarket"
                        class="w-full h-64 object-cover">
                    <div class="p-8">
                        <h3 class="font-bold text-2xl text-gray-900 mb-3">Supermarket Harian</h3>
                        <p class="text-gray-600 mb-6">Temukan semua kebutuhan harian Anda, dari bahan makanan segar
                            hingga perlengkapan rumah tangga, dengan kualitas terbaik dan harga terjangkau.</p>
                        <a href="{{ route('shop') }}"
                            class="inline-block bg-gray-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-indigo-700 transition-colors">
                            Lihat Produk
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Dekorasi Pernikahan" class="w-full h-64 object-cover">
                    <div class="p-8">
                        <h3 class="font-bold text-2xl text-gray-900 mb-3">Wedding Service</h3>
                        <p class="text-gray-600 mb-6">Wujudkan pernikahan impian Anda bersama tim profesional kami.
                            Dari perencanaan hingga dekorasi, kami siap melayani setiap detailnya.</p>
                        <a href="{{ route('wedding') }}"
                            class="inline-block bg-gray-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-pink-600 transition-colors">
                            Lihat Paket Wedding
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- @if ($promotions->isNotEmpty())
        <section class="py-12 bg-gray-100">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Promosi Spesial</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($promotions as $promo)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="{{ $promo->link ?? '#' }}" target="_blank">
                                <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}"
                                    class="w-full h-56 object-cover">
                                <div class="p-6">
                                    <h3 class="font-bold text-xl text-gray-800">{{ $promo->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}

    <div x-data="{ showModal: false }" @keydown.escape.window="showModal = false">

        <!-- [A] Section Ulasan -->
        @if (isset($testimonials) && $testimonials->isNotEmpty())
            <section class="py-16 bg-white">
                <div class="container mx-auto px-6">

                    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2 md:mb-0">
                            Apa Kata Pelanggan Kami
                        </h2>

                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            @if ($totalReviews > 0)
                                <div class="flex flex-col justify-start gap-1">
                                    <p class="font-bold text-3xl text-gray-800">{{ number_format($averageRating, 1) }}
                                    </p>
                                    <div class="flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-6 h-6 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">{{ $totalReviews }} ulasan</p>
                                    </div>
                                </div>
                            @endif

                            <div>
                                @auth
                                    @if (Auth::user()->role == 'customer')
                                        <button @click="showModal = true"
                                            class="inline-block bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-400 transition-colors">
                                            Tulis Ulasan
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="inline-block bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg hover:bg-gray-400 transition-colors">
                                        Login untuk Tulis Ulasan
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 border border-gray-200">
                        @foreach ($testimonials as $testimonial)
                            <div class="bg-white border-b p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-4">
                                        @php
                                            $avatarUrl = $testimonial->user->avatar
                                                ? asset('storage/' . $testimonial->user->avatar)
                                                : 'https://ui-avatars.com/api/?name=' .
                                                    urlencode($testimonial->user->name) .
                                                    '&background=random';
                                        @endphp
                                        <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ $avatarUrl }}"
                                            alt="{{ $testimonial->user->name }}">
                                        <div>
                                            <p class="font-bold text-gray-900">{{ $testimonial->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="text-gray-600 italic mb-4">"{{ $testimonial->comment }}"</p>
                                </div>
                                <div>
                                    @if ($testimonial->replies->isNotEmpty())
                                        @foreach ($testimonial->replies as $reply)
                                            <div class="pt-4 border-t border-gray-200 bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <img class="w-8 h-8 rounded-full object-cover mr-2"
                                                        src="{{ $reply->user->avatar ? asset('storage/' . $reply->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($reply->user->name) . '&background=indigo&color=fff' }}"
                                                        alt="{{ $reply->user->name }}">
                                                    <p class="font-semibold text-sm text-indigo-700">
                                                        {{ $reply->user->name }} (Admin)</p>
                                                </div>
                                                <p class="text-sm text-gray-600">{{ $reply->reply_comment }}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        @endif

        @auth
            <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                aria-labelledby="modal-title" role="dialog" aria-modal="true">

                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showModal = false"></div>

                <div x-show="showModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="relative z-10 bg-white rounded-lg shadow-xl w-full max-w-xl max-h-[90vh] overflow-y-auto">

                    <div class="flex justify-between items-center p-6 border-b border-gray-200">
                        <h2 id="modal-title" class="text-2xl font-bold text-gray-800">Tulis Ulasan Anda</h2>
                        <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6">
                        @if (session('testimonial_success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6"
                                role="alert">
                                <p class="font-bold">Terima Kasih!</p>
                                <p>{{ session('testimonial_success') }}</p>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'customer')
                            <form action="{{ route('testimonials.store') }}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Rating Anda:</label>
                                    <div class="flex flex-row-reverse justify-end items-center" x-data="{ rating: 0 }">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="modal-star{{ $i }}" name="rating"
                                                value="{{ $i }}" class="sr-only" x-model="rating" required>
                                            <label for="modal-star{{ $i }}"
                                                class="text-gray-300 peer-hover:text-yellow-400 hover:text-yellow-400 cursor-pointer"
                                                :class="{ 'text-yellow-400': rating >= {{ $i }} }">
                                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z" />
                                                </svg>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Ulasan
                                        Anda:</label>
                                    <textarea id="comment" name="comment" rows="4"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Ceritakan pengalaman Anda..." required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="text-right">
                                    <button type="submit"
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full focus:outline-none focus:shadow-outline transition-colors duration-300">
                                        Kirim Ulasan
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endauth
    </div>

</x-frontend-layout>
