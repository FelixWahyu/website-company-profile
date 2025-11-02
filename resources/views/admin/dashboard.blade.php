<x-admin-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div>
        <p>Selamat datang di Dashboard Admin!</p>
        <p class="mt-4">Dari sini Anda bisa mengelola seluruh konten website.</p>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg">Jumlah Pengunjung</h3>
                <p class="mt-2 text-gray-600">(Integrasi Google Analytics akan ditampilkan di sini)</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-lg">Produk/Paket Paling Sering Dilihat</h3>
                <p class="mt-2 text-gray-600">(Data chart akan ditampilkan di sini)</p>
            </div>
        </div>
    </div>
</x-admin-layout>
