<div wire:loading.delay {{ $attributes }}
    class="fixed inset-0 z-[9999] bg-gray-900/40 dark:bg-black/60 backdrop-blur-md transition-all duration-300 m-0 p-0">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/95 dark:bg-neutral-800/95 backdrop-blur-xl border border-gray-200 dark:border-neutral-700/60 shadow-2xl rounded-2xl p-6 flex flex-col items-center justify-center gap-4">
        <div class="relative w-14 h-14 flex items-center justify-center">
            <div class="absolute inset-0 border-4 border-blue-100 dark:border-blue-900/50 rounded-full"></div>
            <div class="absolute inset-0 border-4 border-blue-600 dark:border-blue-500 rounded-full border-t-transparent animate-spin"></div>
            <div class="absolute inset-2 bg-blue-50 dark:bg-blue-900/30 rounded-full animate-pulse"></div>
        </div>
        <div class="flex flex-col items-center">
            <span class="text-sm font-bold text-gray-700 dark:text-gray-200 tracking-widest uppercase">Procesando</span>
            <span class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5 whitespace-nowrap">Por favor, espere un momento...</span>
        </div>
    </div>
</div>
