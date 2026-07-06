<select
    {{ $attributes->merge([
        'class' => 'block w-full border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-2.5 pr-8',
    ]) }}>

    {{ $slot }}

</select>
