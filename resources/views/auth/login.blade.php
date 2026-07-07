<x-guest-layout>
    <div x-data="{
        darkMode: document.documentElement.classList.contains('dark'),
        toggleTheme() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }" class="relative min-h-screen flex flex-col justify-center items-center p-4 sm:p-6 bg-neutral-100 dark:bg-neutral-950 transition-colors duration-300">
        
        <!-- Top Navigation Bar for Guest / Login -->
        <div class="absolute top-4 right-4 sm:top-6 sm:right-6 flex items-center gap-3">
            <a href="{{ url('/') }}" 
                class="text-xs font-medium text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white transition-colors flex items-center gap-1.5 bg-white/80 dark:bg-neutral-900/80 border border-neutral-300 dark:border-neutral-800 px-3 py-1.5 rounded-lg shadow-2xs">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Volver</span>
            </a>

            <!-- Theme Toggle Button -->
            <button @click="toggleTheme()" type="button" aria-label="Alternar tema claro u oscuro"
                class="p-1.5 sm:p-2 rounded-lg bg-white/80 dark:bg-neutral-900/80 text-neutral-700 dark:text-neutral-300 hover:bg-neutral-200/80 dark:hover:bg-neutral-800/80 border border-neutral-300 dark:border-neutral-800 transition-all duration-200 focus:outline-none shadow-2xs">
                <!-- Sun Icon -->
                <svg x-show="darkMode" x-cloak class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon Icon -->
                <svg x-show="!darkMode" x-cloak class="w-4 h-4 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>

        <div class="relative w-full max-w-sm">
            <!-- Subtle Rotated Accents (Neutral Palette) -->
            <div class="absolute inset-0 bg-neutral-300 dark:bg-neutral-800 rounded-2xl shadow-sm transform -rotate-3 sm:-rotate-4 transition-all duration-300"></div>
            <div class="absolute inset-0 bg-neutral-400 dark:bg-neutral-700 rounded-2xl shadow-sm transform rotate-3 sm:rotate-4 transition-all duration-300"></div>
            
            <!-- Main Login Card (Compact & Elegant) -->
            <div class="relative w-full rounded-2xl p-5 sm:p-7 bg-white dark:bg-neutral-900 border border-neutral-200/80 dark:border-neutral-800 shadow-xl transition-colors duration-300">
                
                <div class="text-center mb-5">
                    <div class="w-12 h-12 mx-auto bg-neutral-800 dark:bg-neutral-100 text-white dark:text-neutral-900 p-2.5 rounded-xl shadow-md flex items-center justify-center transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M9 22L6 15L3 22H9Z" />
                            <path d="M18.1917 13.3352C19.4847 14.6282 20.1312 15.2747 19.9778 16.2732C19.9707 16.3193 19.9548 16.3994 19.9437 16.4447C19.7033 17.4259 19.0448 17.6987 17.7276 18.2443C16.5231 18.7432 15.2321 19 13.9283 19C12.6245 19 11.3334 18.7432 10.1289 18.2443C8.92433 17.7453 7.82984 17.014 6.90792 16.0921C5.986 15.1702 5.25468 14.0757 4.75574 12.8711C4.2568 11.6666 4 10.3755 4 9.07173C4 7.76794 4.2568 6.4769 4.75575 5.27235C5.30131 3.95524 5.5741 3.29668 6.55528 3.05633C6.60061 3.04523 6.68071 3.0293 6.72683 3.02221C7.72531 2.86878 8.3718 3.51527 9.66479 4.80826L18.1917 13.3352Z" />
                            <circle cx="19" cy="4" r="2" />
                            <path d="M12.5 7.13288L17.7134 5.5293L15.8766 10.5293" />
                        </svg>
                    </div>
                    <h2 class="font-bold text-base sm:text-lg text-neutral-800 dark:text-white mt-2.5 tracking-wider uppercase">Iniciar Sesión</h2>
                    <p class="text-[11px] text-neutral-500 dark:text-neutral-400 mt-0.5">Acceso al Panel de Administración</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-3.5">
                    @csrf

                    <div>
                        <label for="email" class="block text-[11px] font-semibold text-neutral-600 dark:text-neutral-400 uppercase tracking-wider mb-1">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="usuario@dominio.com"
                            value="{{ old('email') }}"
                            class="block w-full text-xs sm:text-sm bg-neutral-50 dark:bg-neutral-800/60 border border-neutral-300 dark:border-neutral-700 text-neutral-900 dark:text-neutral-100 rounded-xl px-3.5 py-2.5 focus:border-neutral-500 dark:focus:border-neutral-400 focus:ring-1 focus:ring-neutral-500 transition-colors placeholder:text-neutral-400 dark:placeholder:text-neutral-500"
                            required autofocus />
                    </div>

                    <div>
                        <label for="password" class="block text-[11px] font-semibold text-neutral-600 dark:text-neutral-400 uppercase tracking-wider mb-1">Contraseña</label>
                        <input id="password" type="password" name="password" placeholder="••••••••"
                            autocomplete="current-password"
                            class="block w-full text-xs sm:text-sm bg-neutral-50 dark:bg-neutral-800/60 border border-neutral-300 dark:border-neutral-700 text-neutral-900 dark:text-neutral-100 rounded-xl px-3.5 py-2.5 focus:border-neutral-500 dark:focus:border-neutral-400 focus:ring-1 focus:ring-neutral-500 transition-colors placeholder:text-neutral-400 dark:placeholder:text-neutral-500"
                            required />
                    </div>

                    <div class="flex items-center justify-between pt-1 text-xs">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-neutral-300 dark:border-neutral-700 text-neutral-800 dark:text-neutral-200 bg-neutral-50 dark:bg-neutral-800 focus:ring-neutral-500 dark:focus:ring-neutral-400 focus:ring-offset-0"
                                name="remember">
                            <span class="ml-2 text-neutral-600 dark:text-neutral-400 font-medium">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white underline decoration-neutral-300 dark:decoration-neutral-700 transition-colors">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <x-validation-errors class="mb-3" />

                        @if (session('status'))
                            <div class="mb-3 font-medium text-xs text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/50 p-2.5 rounded-lg border border-emerald-200 dark:border-emerald-800">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="submit"
                            class="w-full py-2.5 px-4 rounded-xl bg-neutral-800 dark:bg-neutral-100 hover:bg-neutral-900 dark:hover:bg-white text-white dark:text-neutral-900 font-semibold text-xs sm:text-sm shadow-md hover:shadow-lg transform hover:-translate-y-0.5 focus:outline-none transition-all duration-200 flex items-center justify-center gap-2">
                            <span>{{ __('Log in') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-4 h-4">
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
