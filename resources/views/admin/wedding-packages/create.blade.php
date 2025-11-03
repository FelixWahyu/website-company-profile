<x-admin-layout>
    <x-slot name="header">Tambah Paket Wedding Baru</x-slot>
    <form action="{{ route('admin.wedding-packages.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.wedding-packages._form', ['submitText' => 'Tambah Paket'])
    </form>
</x-admin-layout>
