<footer class="bg-gray-900 text-gray-300"> {{-- Warna lebih gelap --}}
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <div>
                <a href="{{ route('home') }}" class="flex items-center space-x-3 mb-4">
                    {{-- Jika Anda memiliki logo dari settings, tampilkan di sini --}}
                    @if (!empty($settings['site_logo']))
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo" class="h-10 w-10">
                    @endif
                    <span class="text-2xl font-bold text-white">{{ $settings['site_name'] ?? config('app.name') }}</span>
                </a>
                <p class="text-sm text-gray-400">
                    Solusi satu atap untuk kebutuhan supermarket dan perencanaan pernikahan impian Anda.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Layanan Kami</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:underline">Home</a></li>
                    <li><a href="{{ route('shop') }}" class="hover:text-white hover:underline">Toko</a></li>
                    <li><a href="#" class="hover:text-white hover:underline">Wedding</a></li>
                    <li><a href="#" class="hover:text-white hover:underline">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Hubungi Kami</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start">
                        {{-- Ikon Lokasi --}}
                        <svg class="w-5 h-5 text-blue-400 mr-3 flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        {{-- GANTI DENGAN ALAMAT ANDA --}}
                        <span class="text-gray-400">Jl. Kopral Kamsi, Dusun 4, Bobotsari, Kec. Bobotsari, Kabupaten
                            Purbalingga, Jawa Tengah 53353.</span>
                    </li>
                    <li class="flex items-center">
                        {{-- Ikon Telepon --}}
                        <svg class="w-5 h-5 text-blue-400 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.081l-2.003-.667a1.125 1.125 0 00-1.21.49l-1.028.96c-.145.136-.33.203-.518.203h-.379a.723.723 0 01-.716-.626l-.16-1.001c-.131-.823-.828-1.47-1.681-1.47h-.169c-.853 0-1.55.646-1.681 1.47l-.16 1.001c-.02.123-.08.24-.15.343l-.799.8c-.12.12-.28.187-.45.187h-.349a.69.69 0 01-.683-.6C6.736 15.155 6.276 15 5.84 15h-.348a.69.69 0 01-.683-.6v-.349c0-.436-.36-.796-.796-.796H3.75a2.25 2.25 0 01-2.25-2.25V6.75z" />
                        </svg>
                        {{-- GANTI DENGAN TELEPON ANDA --}}
                        <div class="flex flex-col">
                            <a href="#" class="hover:text-white text-gray-400">+62 877 4994 8627</a>
                            <a href="#" class="hover:text-white text-gray-400">+62 811 2604 875</a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        {{-- Ikon Email --}}
                        <svg class="w-5 h-5 text-blue-400 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        {{-- GANTI DENGAN EMAIL ANDA --}}
                        <a href="mailto:info@tokokaur.com" class="hover:text-white text-gray-400">info@tokokaur.com</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Ikuti Kami</h3>
                <div class="flex space-x-5">
                    @if (!empty($settings['social_facebook']))
                        <a href="{{ $settings['social_facebook'] }}" target="_blank"
                            class="text-gray-400 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width='32' height='32'
                                viewBox="0 0 16 16" id="facebook">
                                <path fill="#1976D2"
                                    d="M14 0H2C.897 0 0 .897 0 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V2c0-1.103-.897-2-2-2z">
                                </path>
                                <path fill="#FAFAFA" fill-rule="evenodd"
                                    d="M13.5 8H11V6c0-.552.448-.5 1-.5h1V3h-2a3 3 0 0 0-3 3v2H6v2.5h2V16h3v-5.5h1.5l1-2.5z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                    @if (!empty($settings['social_instagram']))
                        <a href="{{ $settings['social_instagram'] }}" target="_blank"
                            class="text-gray-400 hover:text-white">
                            <span class="sr-only">Instagram</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.87 28.87" width='32'
                                height='32' id="instagram">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="-1.84" x2="32.16" y1="30.47"
                                        y2="-3.03" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#fed576"></stop>
                                        <stop offset=".26" stop-color="#f47133"></stop>
                                        <stop offset=".61" stop-color="#bc3081"></stop>
                                        <stop offset="1" stop-color="#4c63d2"></stop>
                                    </linearGradient>
                                </defs>
                                <g id="Layer_2">
                                    <g id="Layer_1-2">
                                        <rect width="28.87" height="28.87" rx="6.48" ry="6.48"
                                            style="fill:url(#linear-gradient)"></rect>
                                        <g id="_Group_">
                                            <path id="_Compound_Path_"
                                                d="M10 5h9c.2.1.5.1.7.2a4.78 4.78 0 0 1 3.8 3.3 8 8 0 0 1 .3 1.5v8.8a6.94 6.94 0 0 1-1.2 3.1 5.51 5.51 0 0 1-4.5 1.9h-7.5a5.49 5.49 0 0 1-3.7-1.2A5.51 5.51 0 0 1 5 18.14v-7a7.57 7.57 0 0 1 .1-1.5 4.9 4.9 0 0 1 3.8-4.3zm-3.1 9.5v3.9a3.42 3.42 0 0 0 3.7 3.7q3.9.15 7.8 0c2.3 0 3.6-1.4 3.7-3.7q.15-3.9 0-7.8a3.52 3.52 0 0 0-3.7-3.7q-3.9-.15-7.8 0a3.42 3.42 0 0 0-3.7 3.7z"
                                                style="fill:#fff"></path>
                                            <path id="_Compound_Path_2"
                                                d="M9.64 14.54a4.91 4.91 0 0 1 4.9-4.9 5 5 0 0 1 4.9 4.9 4.91 4.91 0 0 1-4.9 4.9 5 5 0 0 1-4.9-4.9zm4.9-3.1a3.05 3.05 0 1 0 3 3 3 3 0 0 0-3-3z"
                                                style="fill:#fff"></path>
                                            <path id="_Path_"
                                                d="M18.34 9.44a1.16 1.16 0 0 1 1.2-1.2 1.29 1.29 0 0 1 1.2 1.2 1.2 1.2 0 0 1-2.4 0z"
                                                style="fill:#fff"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    @endif
                    @if (!empty($settings['social_tiktok']))
                        <a href="{{ $settings['social_tiktok'] }}" target="_blank"
                            class="text-gray-400 hover:text-white">
                            <span class="sr-only">TikTok</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width='38'
                                height='38' id="tiktok">
                                <path fill="#070201" fill-rule="evenodd"
                                    d="m60,12c0-4.42-3.58-8-8-8H12C7.58,4,4,7.58,4,12v40c0,4.42,3.58,8,8,8h40c4.42,0,8-3.58,8-8V12h0Z">
                                </path>
                                <path fill="#fe2c55" fill-rule="evenodd"
                                    d="m47.64,27.65c0,.3-.13.58-.37.77-.23.19-.53.22-.83.21-1.86-.05-4.77-.69-6.14-2v12.54c0,5.78-4.68,10.46-10.46,10.46h-1.08c-2.42,0-4.72-.88-6.58-2.39,1.43.71,3,1.13,4.63,1.13h1.08c5.78,0,10.46-4.68,10.46-10.46v-12.54c1.37,1.3,4.28,1.95,6.14,2,.3,0,.6-.02.83-.21.23-.19.37-.47.37-.77,0-1.42,0-3.78,0-5.02.38.11.77.2,1.16.29.46.1.79.5.79.97,0,1.24,0,3.61,0,5.02Zm-19.58,4.43c-.19.19-.44.29-.71.29-2.76,0-5,2.24-5,5,0,2.17,1.39,4,3.33,4.69-.85-.9-1.38-2.1-1.38-3.43,0-2.76,2.24-5,5-5,.27,0,.52-.1.71-.29.19-.19.29-.44.29-.71v-3c0-.26-.11-.52-.29-.71s-.44-.29-.71-.29h-.54c-.14,0-.27.04-.41.04v2.7c0,.27-.11.52-.29.71Zm13.67-12.69c-.83-.75-1.53-1.74-2.03-3.09-.15-.39-.52-.67-.94-.67h-.74c.87,1.91,2.16,3.03,3.71,3.75Z">
                                </path>
                                <path fill="#25f4ee" fill-rule="evenodd"
                                    d="m21.37,46.57c.25.25.55.45.82.67-1.01-.5-1.96-1.12-2.77-1.93-1.96-1.96-3.06-4.62-3.06-7.4v-.08c0-5.78,4.68-10.46,10.46-10.46h.54c.27,0,.52.11.71.29.19.19.29.44.29.71v.3c-5.58.22-10.05,4.78-10.05,10.42v.08c0,2.77,1.1,5.43,3.06,7.4Zm24.31-25.2h0c0-.47-.33-.88-.79-.97-1.12-.25-2.19-.55-3.17-1.01,1.11,1,2.47,1.57,3.95,1.98Zm-16.38,22.27c1.33,0,2.6-.53,3.54-1.46s1.46-2.21,1.46-3.54v-22c0-.55.45-1,1-1h2.72c-.09-.2-.19-.38-.27-.6-.15-.39-.52-.67-.94-.67h-3.46c-.55,0-1,.45-1,1v22c0,1.33-.53,2.6-1.46,3.54s-2.21,1.46-3.54,1.46c-.59,0-1.15-.12-1.67-.31.91.96,2.19,1.57,3.62,1.57Z">
                                </path>
                                <path fill="#fff" fill-rule="evenodd"
                                    d="m27.9,48.37c5.78,0,10.46-4.68,10.46-10.46v-12.54c1.37,1.3,4.28,1.95,6.14,2,.3,0,.6-.02.83-.21.23-.19.37-.47.37-.77,0-1.42,0-3.78,0-5.02-1.48-.41-2.84-.98-3.95-1.98-1.54-.72-2.84-1.85-3.71-3.75h-2.72c-.55,0-1,.45-1,1v22c0,1.33-.53,2.6-1.46,3.54s-2.21,1.46-3.54,1.46c-1.43,0-2.71-.61-3.62-1.57-1.93-.69-3.33-2.52-3.33-4.69,0-2.76,2.24-5,5-5,.27,0,.52-.1.71-.29.19-.19.29-.44.29-.71v-2.7c-5.58.22-10.05,4.78-10.05,10.42v.08c0,2.77,1.1,5.43,3.06,7.4.25.25.55.45.82.67,1.43.71,3,1.13,4.63,1.13h1.08Z">
                                </path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

        </div>

        <hr class="mt-12 mb-8 border-gray-700">
        <div class="text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Company Profile' }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
