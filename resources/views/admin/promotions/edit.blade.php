<x-admin-layout><x-slot name="header">Edit Slide Promosi</x-slot>
    <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')@include('admin.promotions._form', ['submitText' => 'Perbarui Slide'])</form>
</x-admin-layout>
