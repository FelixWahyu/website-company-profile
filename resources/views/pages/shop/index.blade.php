<x-frontend-layout>
    <x-slot name="title">
        Toko Akur Plastik & Beras - {{ $settings['site_name'] ?? config('app.name') }}
    </x-slot>

    {{-- <section class="bg-blue-600 text-white">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl font-bold mb-3 mt-4">Toko Akur: Pusat Grosir Plastik & Beras</h1>
            <p class="text-lg max-w-2xl mx-auto">Solusi lengkap kebutuhan pokok dan kemasan untuk rumah tangga,
                warung, dan usaha katering Anda.</p>
        </div>
    </section> --}}

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-xl text-gray-800 mb-2">Tentang</h2>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Toko Akur Plastik & Beras</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Toko Akur telah menjadi mitra terpercaya bagi ratusan usaha
                        kuliner, warung, dan rumah tangga di Purbalingga. Kami bukan sekadar toko; kami adalah
                        pusat grosir yang berkomitmen menyediakan produk berkualitas.
                    </p>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Solusi Lengkap untuk Kehidupan Anda dari kebutuhan sehari-hari hingga momen spesial Anda, kami
                        siap melayani dengan sepenuh hati. Temukan produk kami yang berkualitas tinggi dengan harga
                        terjangkau untuk kebutuhan keluarga Anda. Kami berkomitmen menyediakan produk berkualitas setiap
                        hari. Kami bekerja sama dengan supplier lokal terbaik untuk memastikan setiap produk yang kami
                        tawarkan memenuhi standar kualitas. Dengan lokasi strategis dan jam operasional yang fleksibel,
                        kami siap melayani kebutuhan belanja keluarga Anda dengan pelayanan ramah dan harga yang
                        terjangkau.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Mulai dari beragam jenis beras pilihan hingga ribuan item plastik dan bahan kemasan, misi kami
                        adalah menyediakan semua kebutuhan Anda di satu tempat dengan harga yang jujur dan pelayanan
                        yang ramah.
                    </p>
                    {{-- <a href="#lokasi"
                        class="inline-block bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Kunjungi Toko Kami
                    </a> --}}
                </div>
                <div class="rounded-lg shadow-xl overflow-hidden">

                    <img src="{{ asset('images/banner/supermarket.jpg') }}"
                        alt="Suasana interior Toko Akur Plastik & Beras" class="w-full h-80 object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="p-2">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-center text-gray-800">Kenapa Memilih Kami</h2>
                <p class="text-gray-600 mt-2">Pilihan terlengkap untuk semua kebutuhan Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-12 mx-auto mb-4 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Plastik & Lainnya</h3>
                    <p class="text-gray-600 text-sm">Menyediakan berbagai jenis plastik berkualitas untuk kebutuhan
                        usaha dan rumah tangga Anda.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-12 mx-auto mb-4 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Produk Diary</h3>
                    <p class="text-gray-600 text-sm">Menyediakan berbagai pilihan produk unggulan dengan material
                        terbaik, dan ketahanan yang maksimal untuk mendukung kegiatan bisnis maupun kebutuhan pribadi
                        Anda.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Makanan dan Minuman</h3>
                    <p class="text-gray-600 text-sm">Menyediakan berbagai pilihan makanan dan minuman berkualitas yang
                        diolah dari bahan segar dan terbaik.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <svg class="w-12 h-12 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Kebutuhan Rumah Tangga</h3>
                    <p class="text-gray-600 text-sm">Menyediakan berbagai pilihan kebutuhan rumah tangga yang lengkap,
                        dan praktis. Mulai dari perlengkapan dapur, kebersihan, hingga kebutuhan harian lainnya.</p>
                </div>

            </div>
        </div>
    </section>

    @if ($promoSlides->isNotEmpty())
        <section class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-center text-gray-800">Promo & Diskon Terbaru</h2>
                    <p class="text-gray-600 mt-2">Jangan lewatkan penawaran spesial kami untuk Anda</p>
                </div>

                <div class="swiper promo-slider-event relative pb-10">
                    <div class="swiper-wrapper">

                        @foreach ($promoSlides as $slide)
                            <div class="swiper-slide">
                                <div
                                    class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full border border-gray-100">
                                    <div class="relative">
                                        @if ($slide->overlay_text)
                                            <span
                                                class="absolute top-4 right-4 bg-blue-500 text-white text-sm font-bold px-4 py-2 rounded-md z-10">
                                                {{ $slide->overlay_text }}
                                            </span>
                                        @endif
                                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}"
                                            class="w-full h-56 object-cover">
                                    </div>
                                    <div class="p-6 flex-grow flex flex-col">
                                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $slide->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-6 flex-grow">{{ $slide->description }}</p>
                                        <a href="{{ $slide->link }}" target="_blank"
                                            class="inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded-lg text-center hover:bg-blue-600 transition-colors">
                                            {{ $slide->button_text }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev text-gray-800 bg-white/50 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                    <div class="swiper-button-next text-gray-800 p-4 bg-white/50 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Katalog Produk Kami</h2>

            <div class="mb-10 p-6 bg-white rounded-lg shadow-md">
                <form action="{{ route('shop') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700">Cari Produk</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="search" id="search"
                                class="flex-1 block w-full rounded-l-md border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari beras, plastik, dsb..." value="{{ request('search') }}">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-r-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cari
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Filter Kategori</label>
                        <select id="category" name="category"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                            onchange="this.form.submit()"> {{-- Otomatis submit saat ganti filter --}}
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}" @selected(request('category') == $category->slug)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </form>
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-12">
                    <p class="text-xl text-gray-500">Oops! Produk tidak ditemukan.</p>
                    <p class="text-gray-400 mt-2">Coba ganti kata kunci pencarian atau filter kategori Anda.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">

                            <div class="relative">
                                @if ($product->is_promo)
                                    <span
                                        class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">Promo!</span>
                                @endif

                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}"
                                    alt="{{ $product->name }}" class="w-full h-56 object-cover">
                            </div>

                            <div class="p-6 flex-grow">
                                <span
                                    class="text-xs text-blue-600 font-semibold">{{ $product->category->name ?? 'N/A' }}</span>
                                <h3 class="font-bold text-xl text-gray-800 mb-2 mt-1">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit($product->description, 70) }}
                                </p>
                            </div>

                            <div class="p-6 bg-gray-50">
                                @if ($product->is_promo && $product->promo_price)
                                    <p class="text-lg text-gray-500 line-through">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                    <p class="text-2xl font-bold text-red-600">
                                        Rp {{ number_format($product->promo_price, 0, ',', '.') }}
                                    </p>
                                @else
                                    <p class="text-2xl font-bold text-blue-700">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $products->links() }} {{-- Tautan paginasi akan muncul di sini --}}
                </div>
            @endif
        </div>
    </section>

    {{-- <section class="py-20 bg-blue-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap Memenuhi Kebutuhan Anda?</h2>
            <p class="text-lg max-w-xl mx-auto mb-8">Dapatkan penawaran harga grosir terbaik hari ini. Hubungi kami
                via WhatsApp untuk info stok dan pengantaran, atau kunjungi toko kami langsung!</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="httpsa://wa.me/62812XXXXXXX" target="_blank"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-full text-lg transition-colors">
                    <i class="fab fa-whatsapp mr-2"></i> Hubungi (Grosir)
                </a>
                <a href="#lokasi"
                    class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-3 px-8 rounded-full text-lg transition-colors">
                    Lihat Lokasi Toko
                </a>
            </div>
        </div>
    </section> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // [UPDATE] Ubah class-nya ke '.promo-slider-event'
            const promoSlider = new Swiper('.promo-slider-event', {
                loop: true,
                spaceBetween: 30,

                slidesPerView: 1,
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    // [UPDATE] Tampilkan 3 slide di desktop
                    1024: {
                        slidesPerView: 3
                    }
                },

                autoplay: {
                    delay: 5000, // 5000 milidetik = 5 detik
                    disableOnInteraction: false, // Tetap autoplay setelah user interaksi (opsional)
                    pauseOnMouseEnter: true, // Berhenti saat mouse di atas slider (opsional)
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>

</x-frontend-layout>
