<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-6 text-center">
        <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Company Profile' }}. All Rights Reserved.</p>
        <div class="flex justify-center space-x-4 mt-4">
            @if (!empty($settings['social_facebook']))
                <a href="{{ $settings['social_facebook'] }}" target="_blank"
                    class="text-white hover:text-indigo-400">Facebook</a>
            @endif
            @if (!empty($settings['social_instagram']))
                <a href="{{ $settings['social_instagram'] }}" target="_blank"
                    class="text-white hover:text-indigo-400">Instagram</a>
            @endif
            @if (!empty($settings['social_tiktok']))
                <a href="{{ $settings['social_tiktok'] }}" target="_blank"
                    class="text-white hover:text-indigo-400">TikTok</a>
            @endif
        </div>
    </div>
</footer>
