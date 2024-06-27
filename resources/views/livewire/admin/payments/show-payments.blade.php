<div>
    <div class="w-full">
        <x-table>
            <x-slot name="thead">
                <tr>
                    <th>FECHA</th>
                    <th>MONTO</th>
                    <th>MES PAGO</th>
                    <th>FORMA PAGO</th>
                    <th>DETALLE</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @if (count($payments) > 0)
                    @foreach ($payments as $item)
                        <tr>
                            <td class="text-center uppercase">{{ formatDate($item->date) }}</td>
                            <td class="text-center">{{ number_format($item->amount, 2, '.', ', ') }}</td>
                            <td class="text-center uppercase">{{ formatDate($item->month, 'MMMM Y') }}</td>
                            <td class="text-center">
                                {{ $item->formapay->name }}
                                @if ($item->codetransferencia)
                                    <p class="text-[9px] text-neutral-500">N° OPERACIÓN :{{ $item->codetransferencia }}
                                    </p>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->detalle }}</td>
                        </tr>
                    @endforeach
                @endif
            </x-slot>
        </x-table>
    </div>
</div>
