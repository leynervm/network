<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Clientes Internet') }}</title>
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Styles -->
</head>

<body class="">
    <div class="relative flex items-center justify-center min-h-screen">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-neutral-700 uppercase w-full px-3 text-sm tracking-wide focus:ring-2 focus:ring-neutral-300 py-2 rounded-md text-white shadow-md hover:shadow-inner transform hover:-translate-x hover:scale-105 focus:outline-none transition ease-in-out duration-500">
                        Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-neutral-700 uppercase w-full px-3 text-sm tracking-wide focus:ring-2 focus:ring-neutral-300 py-2 rounded-md text-white shadow-md hover:shadow-inner transform hover:-translate-x hover:scale-105 focus:outline-none transition ease-in-out duration-500">
                        {{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 bg-neutral-700 uppercase w-full px-3 text-sm tracking-wide focus:ring-2 focus:ring-neutral-300 py-2 rounded-md text-white shadow-md hover:shadow-inner transform hover:-translate-x hover:scale-105 focus:outline-none transition ease-in-out duration-500">
                            {{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
