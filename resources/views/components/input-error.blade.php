@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-[10px] text-red-600']) }}>{{ $message }}</p>
@enderror
