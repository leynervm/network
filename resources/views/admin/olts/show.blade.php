<x-app-layout>
    <h1 class="my-5">
        {{ $olt->name }} <small> \ {{ $olt->outs }} SALIDAS</small>
    </h1>

    @if ($olt->outs - count($olt->spliters) > 0)
    <div class="mb-3">
        <livewire:admin.spliters.create-spliter :olt="$olt" />
    </div>
        
    @endif

    <div>
        <livewire:admin.spliters.show-spliters :olt="$olt" />
    </div>
</x-app-layout>
