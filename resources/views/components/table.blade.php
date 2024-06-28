@props(['thead' => null, 'tbody' => null])
<div class="w-full block overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full table text-[10px] border-collapse table-default']) }}>
        <thead class="bg-neutral-600 text-white">
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
</div>
