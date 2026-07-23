@if ($errors->any())
    <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 10)" x-show="show" style="display: none;"
        x-transition:enter="transition-all ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-4 blur-sm scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 blur-0 scale-100"
        {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl bg-white/70 dark:bg-neutral-900/60 backdrop-blur-xl border border-red-200/80 dark:border-red-500/20 shadow-2xl dark:shadow-red-900/10 mb-4']) }}>

        <!-- Ambient Glow Effects -->
        <div
            class="absolute -top-12 -right-12 w-32 h-32 bg-red-400/20 dark:bg-red-500/10 blur-3xl rounded-full pointer-events-none">
        </div>
        <div
            class="absolute -bottom-12 -left-12 w-32 h-32 bg-rose-400/20 dark:bg-rose-500/10 blur-3xl rounded-full pointer-events-none">
        </div>

        <div class="relative p-2">
            <div class="flex flex-col items-start gap-2">
                <!-- Glowing Icon Container -->
                <div class="w-full flex gap-3 relative">
                    <div
                        class="relative flex items-center justify-center w-10 h-10 rounded-2xl bg-gradient-to-br from-red-50 to-red-100 dark:from-neutral-800 dark:to-neutral-900 border border-red-200 dark:border-red-500/30 text-red-600 dark:text-red-400 shadow-sm">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3
                        class="text-sm font-bold text-red-600 dark:text-neutral-100 tracking-wide mb-2 flex-1 flex items-center gap-2">
                        ¡Vaya! Se detectaron problemas.
                    </h3>
                </div>

                <!-- Content -->
                <div
                    class="flex-1 min-w-0 pt-0.5 text-[10px] text-red-600 dark:text-red-600 leading-normal font-medium">
                    <ul role="list" class="space-y-2">
                        @foreach ($errors->all() as $error)
                            <li
                                class="bg-red-50/50 dark:bg-red-500/5 px-3 py-2 rounded-lg border border-red-100 dark:border-red-500/10">
                                <span class="opacity-90">{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
