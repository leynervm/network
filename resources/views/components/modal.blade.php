@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
        '6xl' => 'sm:max-w-6xl',
        '7xl' => 'sm:max-w-7xl',
    ][$maxWidth ?? '2xl'];
@endphp

<div x-data="{
    show: @entangle($attributes->wire('model')).defer,
    init() {
        window.openModalsCount = window.openModalsCount || 0;
        this.$watch('show', value => {
            if (value) {
                window.openModalsCount++;
                if (window.openModalsCount === 1) {
                    document.body.style.overflow = 'hidden';
                } else {
                }
            } else {
                window.openModalsCount = Math.max(0, window.openModalsCount - 1);
                setTimeout(() => {
                    if (window.openModalsCount === 0) {
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }
                }, 300);
            }
        });
        if (this.show) {
            window.openModalsCount++;
            if (window.openModalsCount === 1) {
                document.body.style.overflow = 'hidden';
            } else {
            }
        }
    }
}" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-show="show"
    id="{{ $id }}" class="jetstream-modal fixed inset-0 overflow-y-auto p-1 sm:px-0 z-50"
    style="display: none;">
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-neutral-900/70 dark:bg-black/80 backdrop-blur-[2px] transition-opacity"></div>
    </div>

    <div x-show="show"
        class="w-full flex flex-col max-h-[97dvh] justify-center items-center sm:max-h-[95dvh] bg-white dark:bg-neutral-800 rounded-xl border border-gray-200/80 dark:border-neutral-700/60 overflow-hidden shadow-2xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto transition-colors duration-200"
        x-trap.inert="show" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>
</div>
