<x-admin-layout>
    <x-slot name="header">
        Tambah Produk Baru
    </x-slot>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.products._form', ['submitText' => 'Tambah Produk'])
    </form>
</x-admin-layout>
