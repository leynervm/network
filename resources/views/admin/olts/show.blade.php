<x-app-layout>
    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 mb-3 border-b border-gray-200 dark:border-neutral-800" x-data="{ allOpen: true }">
        <h1 class="my-0 text-xl font-bold text-gray-800 dark:text-white font-mono uppercase tracking-wide">
            {{ $olt->name }} <small class="text-sm font-normal text-gray-500 dark:text-gray-400"> \ <span class="text-indigo-600 dark:text-indigo-400 font-bold">{{ $olt->outs }} SALIDAS</span></small>
        </h1>

        <button @click="allOpen = !allOpen; $dispatch('toggle-all-spliters', allOpen)" type="button"
            title="Expandir o contraer todas las cajas de splitters"
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white dark:bg-neutral-800 hover:bg-gray-100 dark:hover:bg-neutral-700 text-gray-700 dark:text-gray-200 text-xs font-mono font-bold transition-all border border-gray-300 dark:border-gray-700 shadow-sm">
            <span x-text="allOpen ? 'OCULTAR TODOS' : 'MOSTRAR TODOS'"></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="size-4 transition-transform duration-200" :class="allOpen ? 'rotate-180' : ''">
                <path fill-rule="evenodd"
                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    @if ($olt->outs - count($olt->spliters) > 0)
        <div class="mb-3">
            <livewire:admin.spliters.create-spliter :olt="$olt" />
        </div>
    @endif

    <div>
        <livewire:admin.spliters.show-spliters :olt="$olt" />
    </div>
</x-app-layout>
