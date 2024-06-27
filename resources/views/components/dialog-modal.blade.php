@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="text-lg p-2 flex justify-between font-medium text-neutral-900 bg-neutral-200">
        {{ $title }}
    </div>

    <div class="p-2 mt-4 text-sm text-gray-600">
        {{ $content }}

        @if (isset($footer))
            <div class="flex flex-row justify-end bg-gray-100 text-right">
                {{ $footer }}
            </div>
        @endif
    </div>
</x-modal>
