<div>
    <x-slot name="header">{{ __('Notificaciones Webhook de Yape') }}</x-slot>

    {{-- <div class="w-full flex justify-end items-start gap-3 mb-2">
        <div class="w-full max-w-sm">
            <x-label value="Buscar producto" />
            <x-input class="w-full block" wire:model.lazy="search" />
        </div>
    </div> --}}

    <div class="overflow-x-auto w-full pt-3">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>FECHA</th>
                    <th>TÍTULO</th>
                    <th class="text-left">CONTENIDO CAPTURADO</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($notifications) > 0)
                    @foreach ($notifications as $item)
                        <tr>
                            <td class="text-center uppercase w-[120px]">
                                {{ formatDate($item->created_at, 'DD MMM YYYY HH:mm:ss A') }}
                            </td>
                            <td class="text-center w-[150px]">
                                <span
                                    class="inline-block text-purple-700 dark:text-purple-400 font-bold px-2 py-1 rounded text-xs">
                                    {{ $item->title }}
                                </span>
                            </td>
                            <td class="text-left font-medium text-gray-700 dark:text-gray-300">
                                {{ $item->content }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">
                            No hay notificaciones registradas.
                        </td>
                    </tr>
                @endif
            </x-slot>
        </x-table>
        @if ($notifications->hasPages())
            <div class="sticky bottom-2 z-10 w-full mt-4">
                {{ $notifications->links() }}
            </div>
        @endif
    </div>
</div>
