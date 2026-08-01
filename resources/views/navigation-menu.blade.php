<div>
    {{-- ===== DESKTOP SIDEBAR ===== --}}
    <aside x-cloak
        class="hidden lg:flex fixed inset-y-0 left-0 z-30 flex-col bg-white dark:bg-neutral-900 border-r border-gray-200 dark:border-neutral-700/40 sidebar-transition overflow-hidden transition-colors duration-200"
        :class="$store.nav.open ? 'w-52' : 'w-14'">

        {{-- Header --}}
        <div class="flex items-center h-12 px-2 border-b border-gray-200 dark:border-neutral-700/40 shrink-0 transition-colors duration-200"
            :class="$store.nav.open ? 'justify-between' : 'justify-center'">
            <a x-show="$store.nav.open" href="{{ route('dashboard') }}" class="flex items-center gap-2 overflow-hidden">
                <span class="text-gray-800 dark:text-white text-xs font-semibold leading-tight truncate">
                    {{ config('app.name') }}
                </span>
            </a>

            <button @click="$store.nav.toggle()"
                class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-neutral-700 p-2 rounded-lg transition-colors shrink-0">
                <svg x-show="$store.nav.open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
                <svg x-show="!$store.nav.open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        {{-- Nav Links --}}
        <nav class="flex-1 overflow-y-auto overflow-x-hidden py-2 space-y-0.5 px-1.5">

            @php
                $links = [
                    ['route' => 'dashboard', 'label' => __('Inicio'), 'icon' => 'home'],
                    ['route' => 'admin.olts', 'label' => __('OLT Networks'), 'icon' => 'server'],
                    ['route' => 'admin.antenas', 'label' => __('Antenas'), 'icon' => 'signal'],
                    ['route' => 'admin.recibos', 'label' => __('Recibos'), 'icon' => 'document'],
                    ['route' => 'admin.payments', 'label' => __('Pagos'), 'icon' => 'creditcard'],
                    ['route' => 'admin.products', 'label' => __('Productos'), 'icon' => 'cube'],
                    ['route' => 'admin.yape.notifications', 'label' => __('Yape Webhook'), 'icon' => 'bell'],
                ];
            @endphp

            @foreach ($links as $link)
                @php $active = request()->routeIs($link['route']); @endphp
                <a href="{{ route($link['route']) }}" x-data="{ tooltip: false }"
                    @mouseenter="if(!$store.nav.open) tooltip = true" @mouseleave="tooltip = false"
                    :class="$store.nav.open ? 'gap-3' : 'justify-center'"
                    class="group relative flex items-center px-2 py-2 rounded-lg text-sm transition-all duration-150 {{ $active ? 'bg-neutral-600 dark:bg-neutral-700 text-white shadow-md' : 'text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white' }}">

                    {{-- Icon --}}
                    @if ($link['icon'] === 'home')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                        </svg>
                    @elseif($link['icon'] === 'server')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                        </svg>
                    @elseif($link['icon'] === 'signal')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                        </svg>
                    @elseif($link['icon'] === 'document')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    @elseif($link['icon'] === 'creditcard')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    @elseif($link['icon'] === 'cube')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    @elseif($link['icon'] === 'bell')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    @endif

                    {{-- Label --}}
                    <span x-show="$store.nav.open" x-transition:enter="transition-opacity duration-150"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="truncate text-xs font-medium leading-none whitespace-nowrap">
                        {{ $link['label'] }}
                    </span>

                    {{-- Tooltip when collapsed --}}
                    <span x-show="tooltip && !$store.nav.open" x-cloak
                        class="absolute left-full ml-2 px-2 py-1 bg-gray-800 dark:bg-neutral-800 text-white text-xs rounded-md shadow-lg whitespace-nowrap pointer-events-none z-50">
                        {{ $link['label'] }}
                    </span>
                </a>
            @endforeach
        </nav>

        {{-- User Section --}}
        <div
            class="border-t border-gray-200 dark:border-neutral-700/40 p-1.5 shrink-0 space-y-0.5 transition-colors duration-200">
            {{-- Theme Toggle Button --}}
            <button type="button" @click="$store.nav.toggleTheme()" x-data="{ tooltip: false }"
                @mouseenter="if(!$store.nav.open) tooltip = true" @mouseleave="tooltip = false"
                :class="$store.nav.open ? 'gap-3' : 'justify-center'"
                class="group relative w-full flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors">
                {{-- Sun Icon (shown when dark) --}}
                <svg x-show="$store.nav.theme === 'dark'" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 shrink-0 text-amber-500 dark:text-amber-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                {{-- Moon Icon (shown when light) --}}
                <svg x-show="$store.nav.theme !== 'dark'" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 shrink-0 text-neutral-700 dark:text-neutral-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                </svg>
                <span x-show="$store.nav.open" class="text-xs font-medium truncate">
                    <span x-show="$store.nav.theme === 'dark'">{{ __('Modo Claro') }}</span>
                    <span x-show="$store.nav.theme !== 'dark'">{{ __('Modo Oscuro') }}</span>
                </span>
                <span x-show="tooltip && !$store.nav.open" x-cloak
                    class="absolute left-full ml-2 px-2 py-1 bg-gray-800 dark:bg-neutral-800 text-white text-xs rounded-md shadow-lg whitespace-nowrap pointer-events-none z-50">
                    <span x-show="$store.nav.theme === 'dark'">{{ __('Modo Claro') }}</span>
                    <span x-show="$store.nav.theme !== 'dark'">{{ __('Modo Oscuro') }}</span>
                </span>
            </button>

            <a href="{{ route('profile.show') }}" :class="$store.nav.open ? 'gap-3' : 'justify-center'"
                class="flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('profile.show') ? 'bg-gray-100 dark:bg-neutral-700 text-gray-900 dark:text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span x-show="$store.nav.open" class="text-xs font-medium truncate">{{ Auth::user()->name }}</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" @click.prevent="$root.submit()"
                    :class="$store.nav.open ? 'gap-3' : 'justify-center'"
                    class="w-full flex items-center px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-red-50 dark:hover:bg-red-600/20 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span x-show="$store.nav.open"
                        class="text-xs font-medium truncate">{{ __('Cerrar sesión') }}</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MOBILE OVERLAY ===== --}}
    <div x-cloak x-show="$store.nav.mobileOpen" x-transition:enter="transition-opacity ease-linear duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="$store.nav.mobileOpen = false"
        class="lg:hidden fixed inset-0 z-20 bg-black/60" style="display:none;">
    </div>

    {{-- ===== MOBILE SIDEBAR DRAWER ===== --}}
    <aside x-cloak x-show="$store.nav.mobileOpen" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="lg:hidden fixed inset-y-0 left-0 z-30 w-64 flex flex-col bg-white dark:bg-neutral-900 border-r border-gray-200 dark:border-neutral-700/40 transition-colors duration-200"
        style="display:none;">

        {{-- Mobile Header --}}
        <div
            class="flex items-center justify-between h-12 px-3 border-b border-gray-200 dark:border-neutral-700/40 transition-colors duration-200">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 text-neutral-800 dark:text-neutral-200">
                    <path d="M9 22L6 15L3 22H9Z" />
                    <path
                        d="M18.1917 13.3352C19.4847 14.6282 20.1312 15.2747 19.9778 16.2732C19.7033 17.4259 19.0448 17.6987 17.7276 18.2443C16.5231 18.7432 15.2321 19 13.9283 19C12.6245 19 11.3334 18.7432 10.1289 18.2443C8.92433 17.7453 7.82984 17.014 6.90792 16.0921C5.986 15.1702 5.25468 14.0757 4.75574 12.8711C4.2568 11.6666 4 10.3755 4 9.07173C4 7.76794 4.2568 6.4769 4.75575 5.27235C5.30131 3.95524 5.5741 3.29668 6.55528 3.05633C7.72531 2.86878 8.3718 3.51527 9.66479 4.80826L18.1917 13.3352Z" />
                    <circle cx="19" cy="4" r="2" />
                </svg>
                <span
                    class="text-gray-800 dark:text-white text-xs font-semibold truncate">{{ config('app.name') }}</span>
            </div>
            <button @click="$store.nav.mobileOpen = false"
                class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white p-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-neutral-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Nav Links --}}
        <nav class="flex-1 overflow-y-auto py-2 space-y-0.5 px-1.5">
            @foreach ($links as $link)
                @php $active = request()->routeIs($link['route']); @endphp
                <a href="{{ route($link['route']) }}" @click="$store.nav.mobileOpen = false"
                    class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm transition-colors {{ $active ? 'bg-neutral-600 dark:bg-neutral-700 text-white shadow-md' : 'text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white' }}">
                    @if ($link['icon'] === 'home')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                        </svg>
                    @elseif($link['icon'] === 'server')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                        </svg>
                    @elseif($link['icon'] === 'signal')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                        </svg>
                    @elseif($link['icon'] === 'document')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    @elseif($link['icon'] === 'creditcard')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    @elseif($link['icon'] === 'cube')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    @elseif($link['icon'] === 'bell')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    @endif
                    <span class="text-xs font-medium truncate">{{ $link['label'] }}</span>
                </a>
            @endforeach
        </nav>

        {{-- Mobile User Section --}}
        <div
            class="border-t border-gray-200 dark:border-neutral-700/40 p-1.5 space-y-0.5 transition-colors duration-200">
            {{-- Theme Toggle Button Mobile --}}
            <button type="button" @click="$store.nav.toggleTheme(); $store.nav.mobileOpen = false"
                class="w-full flex items-center gap-3 px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors">
                <svg x-show="$store.nav.theme === 'dark'" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 shrink-0 text-amber-500 dark:text-amber-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                <svg x-show="$store.nav.theme !== 'dark'" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 shrink-0 text-neutral-700 dark:text-neutral-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                </svg>
                <span class="text-xs font-medium truncate">
                    <span x-show="$store.nav.theme === 'dark'">{{ __('Modo Claro') }}</span>
                    <span x-show="$store.nav.theme !== 'dark'">{{ __('Modo Oscuro') }}</span>
                </span>
            </button>

            <a href="{{ route('profile.show') }}"
                class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-gray-100 dark:hover:bg-neutral-700/60 hover:text-gray-900 dark:hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-xs font-medium truncate">{{ Auth::user()->name }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" @click.prevent="$root.submit()"
                    class="w-full flex items-center gap-3 px-2 py-2 rounded-lg text-sm text-gray-600 dark:text-neutral-400 hover:bg-red-50 dark:hover:bg-red-600/20 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="text-xs font-medium">{{ __('Cerrar sesión') }}</span>
                </button>
            </form>
        </div>
    </aside>
</div>
