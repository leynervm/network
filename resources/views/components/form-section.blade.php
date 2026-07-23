@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-4']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-4 bg-white sm:p-4 shadow {{ isset($actions) ? 'sm:rounded-t-2xl' : 'sm:rounded-2xl' }}">
                <div class="grid grid-cols-6 gap-4">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-4 shadow sm:rounded-b-2xl">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
