@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-4 py-2.5 shrink-0 flex items-center justify-between font-semibold text-xs text-gray-800 dark:text-gray-100 bg-gray-50/80 dark:bg-neutral-700/40 border-b border-gray-200/80 dark:border-neutral-700/60 transition-colors duration-200">
        {{ $title }}
    </div>

    <div class="px-4 py-3 text-xs text-gray-600 dark:text-neutral-300 transition-colors duration-200 overflow-y-auto flex-1">
        {{ $content }}
    </div>

    @if (isset($footer))
        <div class="px-4 py-2.5 shrink-0 flex flex-row items-center justify-end gap-2 bg-gray-50/80 dark:bg-neutral-700/40 border-t border-gray-200/80 dark:border-neutral-700/60 text-right transition-colors duration-200">
            {{ $footer }}
        </div>
    @endif
</x-modal>
