<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-72 lg:flex-col">
    <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-white">
        <div class="flex flex-1 flex-col overflow-y-auto pt-2 pb-4">
            <div class="flex flex-shrink-0 items-center justify-center px-4">
                <a href="{{ route('admin.dashboard') }}">
                    @if (!empty($settings['site_logo']))
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}"
                            alt="{{ $settings['site_name'] ?? 'Logo' }}" class="w-36">
                    @else
                        <h1 class="text-2xl font-bold text-gray-800">{{ $settings['site_name'] ?? 'Company Profile' }}
                        </h1>
                    @endif
                </a>
            </div>
            <nav class="flex-1 space-y-1 bg-white px-3">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="group flex items-center px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-3 h-6 w-6 flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonials.index') }}"
                            class="group flex items-center px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="mr-3 size-6 flex-shrink-0 {{ request()->routeIs('admin.testimonials.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                            </svg>
                            Testimonials
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="group flex items-center px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="mr-3 size-6 flex-shrink-0 {{ request()->routeIs('admin.users.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            Data Users
                        </a>
                    </li>
                    <li><span class="px-4 py-2 text-xs font-semibold text-slate-400 uppercase">Manajemen Toko</span>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.products.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-3 h-6 w-6 flex-shrink-0 {{ request()->routeIs('admin.products.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="mr-3 size-6 {{ request()->routeIs('admin.categories.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.promo-slides.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.promo-slides.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="mr-3 size-6 {{ request()->routeIs('admin.promo-slides.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                            </svg>
                            Slide Promo Toko
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.promotions.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.promotions.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mr-3 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                            </svg>
                            Slide Promo Toko
                        </a>
                    </li> --}}
                    <li>
                        <span class="px-4 py-2 text-xs font-semibold text-slate-400 uppercase">Manajemen
                            Wedding</span>
                    </li>
                    <li>
                        <a href="{{ route('admin.wedding-packages.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.wedding-packages.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mr-3 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            Wedding Packages
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.galleries.index') }}"
                            class="group flex items-center space-x-3 px-4 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.galleries.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mr-3 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                            </svg>
                            Galleries
                        </a>
                    </li>
                    <li><span class="px-4 py-2 text-xs font-semibold text-slate-400 uppercase">Pengaturan</span>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.index') }}"
                            class="group flex items-center px-4 py-2 space-x-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="mr-3 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
