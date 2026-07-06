@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm']) !!}>
