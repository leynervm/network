<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center p-2 bg-red-600 border border-transparent rounded-lg font-semibold text-[10px] text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition disabled:opacity-25 ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
