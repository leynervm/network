<x-guest-layout>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            LOGO
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>



    </x-authentication-card> --}}

    <!-- component -->
    <div class="relative min-h-screen flex flex-col justify-center items-center p-10 md:p-0 bg-white">
        <div class="relative w-full sm:max-w-sm">
            <div class="card bg-neutral-300 shadow-lg w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-neutral-400 shadow-lg w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl p-3 sm:p-6 bg-white shadow-md">
                <label class="block text-newtral-500 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-16 h-16 mx-auto bg-neutral-500 text-white p-3 rounded-2xl">
                        <path d="M9 22L6 15L3 22H9Z" />
                        <path
                            d="M18.1917 13.3352C19.4847 14.6282 20.1312 15.2747 19.9778 16.2732C19.9707 16.3193 19.9548 16.3994 19.9437 16.4447C19.7033 17.4259 19.0448 17.6987 17.7276 18.2443C16.5231 18.7432 15.2321 19 13.9283 19C12.6245 19 11.3334 18.7432 10.1289 18.2443C8.92433 17.7453 7.82984 17.014 6.90792 16.0921C5.986 15.1702 5.25468 14.0757 4.75574 12.8711C4.2568 11.6666 4 10.3755 4 9.07173C4 7.76794 4.2568 6.4769 4.75575 5.27235C5.30131 3.95524 5.5741 3.29668 6.55528 3.05633C6.60061 3.04523 6.68071 3.0293 6.72683 3.02221C7.72531 2.86878 8.3718 3.51527 9.66479 4.80826L18.1917 13.3352Z" />
                        <circle cx="19" cy="4" r="2" />
                        <path d="M12.5 7.13288L17.7134 5.5293L15.8766 10.5293" />
                    </svg>
                    <span class="block font-semibold text-md my-3">LOGIN</span>
                </label>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mt-2">
                        <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Usuario"
                            value="{{ old('email') }}"
                            class="block w-full text-xs sm:text-sm border-0 h-11 rounded-sm border-b border-gray-300 focus:border-gray-400 focus:ring-0"
                            required autofocus />
                    </div>

                    <div class="mt-3">
                        <label for="password"
                            class="block text-xs font-semibold text-gray-600 uppercase">Password</label>
                        <input id="password" type="password" name="password" placeholder="Contraseña"
                            autocomplete="current-password"
                            class="mt-1 block w-full text-xs sm:text-sm border-0 h-11 rounded-sm border-b border-gray-300 focus:border-gray-400 focus:ring-0"
                            required />
                    </div>

                    <div class="mt-7 flex flex-wrap gap-3 justify-center sm:justify-between">
                        <label for="remember_me" class="inline-flex  items-center cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        {{-- <div class="w-full inline-flex text-right"> --}}
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="underline inline-flex  text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        {{-- </div> --}}
                    </div>

                    <div class="mt-7">
                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button
                            class="bg-neutral-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner transform hover:-translate-x hover:scale-105 focus:outline-none transition ease-in-out duration-500">
                            <span class="inline-block mr-2">{{ __('Log in') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
