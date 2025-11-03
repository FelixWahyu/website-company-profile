<x-admin-layout><x-slot name="header">Tambah Slide Promosi</x-slot>
    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.promotions._form', ['submitText' => 'Tambah Slide'])</form>
</x-admin-layout>
