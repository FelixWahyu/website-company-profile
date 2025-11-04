<x-frontend-layout>
    <x-slot name="title">
        Selamat Datang - {{ $settings['site_name'] ?? config('app.name') }}
    </x-slot>

    <section class="bg-indigo-700 text-white">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl font-bold mb-2">Solusi Terbaik untuk Kebutuhan Anda</h1>
            <p class="text-lg">Menyediakan produk supermarket berkualitas dan layanan wedding impian Anda dalam satu
                atap.</p>
        </div>
    </section>

    @if ($promotions->isNotEmpty())
        <section class="py-12">
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
    @endif

</x-frontend-layout>
