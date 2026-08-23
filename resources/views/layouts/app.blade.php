<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clientes Internet') }}</title>

    <!-- Fonts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/sweetAlert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/animate/animate.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Scripts -->
    {{-- @vite ya incluye app.js --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Tilt+Neon&display=swap');

        * {
            font-family: "Kdam Thmor Pro", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        [x-cloak] {
            display: none !important;
        }

        .sidebar-transition {
            transition: width 0.3s ease, transform 0.3s ease;
        }

        .content-transition {
            transition: padding-left 0.3s ease;
        }
    </style>

    @livewireStyles
</head>

<body
    class="font-sans antialiased bg-gray-50 dark:bg-neutral-800 text-gray-800 dark:text-gray-100 transition-colors duration-200">

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        document.addEventListener('alpine:init', () => {
            Alpine.store('nav', {
                open: localStorage.getItem('sidebarOpen') !== 'false',
                mobileOpen: false,
                theme: localStorage.getItem('theme') || (document.documentElement.classList.contains(
                    'dark') ? 'dark' : 'light'),
                toggle() {
                    this.open = !this.open;
                    localStorage.setItem('sidebarOpen', this.open);
                },
                toggleTheme() {
                    this.theme = this.theme === 'dark' ? 'light' : 'dark';
                    localStorage.setItem('theme', this.theme);
                    if (this.theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });
        });
    </script>

    <div x-data class="flex min-h-screen">

        {{-- Sidebar (Livewire) --}}
        @livewire('navigation-menu')

        {{-- Main wrapper --}}
        <div class="flex flex-col flex-1 min-w-0 content-transition" :class="$store.nav.open ? 'lg:pl-52' : 'lg:pl-14'">

            {{-- Mobile top bar --}}
            <div
                class="lg:hidden flex items-center h-11 px-3 bg-white dark:bg-neutral-900 border-b border-gray-200 dark:border-neutral-700/50 sticky top-0 z-10 transition-colors duration-200">
                <button @click="$store.nav.mobileOpen = true"
                    class="text-gray-500 dark:text-neutral-400 hover:text-gray-900 dark:hover:text-white p-1.5 rounded-md hover:bg-gray-100 dark:hover:bg-neutral-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-3 text-gray-800 dark:text-white text-sm font-semibold truncate">
                    {{ config('app.name') }}
                </span>
            </div>

            @if (isset($header))
                <header
                    class="bg-white dark:bg-neutral-800 border-b border-gray-200 dark:border-neutral-700/50 transition-colors duration-200">
                    <div class="px-4 py-3 pb-2.5 font-semibold text-xl leading-tight text-gray-800 dark:text-neutral-200">
                        {{ $header }}</div>
                </header>
            @endif

            <main class="flex-1 p-3">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="{{ asset('assets/sweetAlert2/sweetalert2.all.min.js') }}"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
        window.addEventListener('toast', e => Toast.fire({
            icon: e.detail.icon,
            title: e.detail.title
        }));
        window.addEventListener('alert', e => Swal.fire({
            title: e.detail.title,
            text: e.detail.text,
            icon: e.detail.icon,
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'CERRAR',
            allowEscapeKey: true,
        }));
    </script>

    @yield('scripts')
</body>

</html>
