<x-admin-layout>
    <x-slot name="header">Edit Paket: {{ $weddingPackage->name }}</x-slot>
    <form action="{{ route('admin.wedding-packages.update', $weddingPackage) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @include('admin.wedding-packages._form', ['submitText' => 'Perbarui Paket'])
    </form>
</x-admin-layout>
