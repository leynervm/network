@props(['thead' => null, 'tbody' => null])
<table {{ $attributes->merge(['class' => 'w-full table text-[10px] border-collapse table-default']) }}>
    <thead class="bg-neutral-600 text-white">
        {{ $thead }}
    </thead>
    <tbody>
        {{ $tbody }}
    </tbody>
</table>
