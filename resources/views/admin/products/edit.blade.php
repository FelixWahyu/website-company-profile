<x-admin-layout>
    <x-slot name="header">
        Edit Produk: {{ $product->name }}
    </x-slot>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form', ['submitText' => 'Perbarui Produk'])
    </form>
</x-admin-layout>
