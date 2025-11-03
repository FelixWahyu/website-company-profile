<x-admin-layout>
    <x-slot name="header">Pengaturan Website</x-slot>
    <div class="p-6 bg-white border-b border-gray-200">
        @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="site_logo" class="block text-sm font-medium text-gray-700">Logo Website</label>
                    <input type="file" name="site_logo" id="site_logo"
                        class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah logo.</p>
                    @error('site_logo')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    @if (isset($settings['site_logo']) && $settings['site_logo'])
                        <div class="mt-4">
                            <p class="text-sm font-medium text-gray-700">Logo Saat Ini:</p>
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo"
                                class="h-16 mt-2 rounded-md bg-gray-100 p-2">
                        </div>
                    @endif
                </div>
                <div>
                    <label for="site_name" class="block text-sm font-medium text-gray-700">Nama Website</label>
                    <input type="text" name="site_name" id="site_name"
                        value="{{ old('site_name', $settings['site_name'] ?? '') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="contact_whatsapp" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="contact_whatsapp" id="contact_whatsapp"
                        value="{{ old('contact_whatsapp', $settings['contact_whatsapp'] ?? '') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="contact_address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="contact_address" id="contact_address" rows="3"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="social_instagram" class="block text-sm font-medium text-gray-700">Link Instagram</label>
                    <input type="url" name="social_instagram" id="social_instagram"
                        value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="social_tiktok" class="block text-sm font-medium text-gray-700">Link TikTok</label>
                    <input type="url" name="social_tiktok" id="social_tiktok"
                        value="{{ old('social_tiktok', $settings['social_tiktok'] ?? '') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="social_facebook" class="block text-sm font-medium text-gray-700">Link Facebook</label>
                    <input type="url" name="social_facebook" id="social_facebook"
                        value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Simpan
                    Pengaturan</button>
            </div>
        </form>
    </div>
</x-admin-layout>
