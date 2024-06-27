<x-app-layout>
    <div class="w-full shadow p-3 rounded-xl mb-8 text-xs hover:shadow-xl">
        <h1>
            <small>CODIGO : </small>
            {{ $network->code }}
        </h1>

        <h1>
            <small>FECHA ALTA : </small>
            {{ formatDate($network->date) }}
        </h1>

        <h1>
            <small>NUMERO PUERTO : </small>
            {{ $network->portnumber }}
        </h1>

        <h1>
            <small>CLIENTE : </small>
            {{ $network->client->name }} <small>{{ $network->client->document }}</small>
        </h1>

        <h1>
            <small>DIRECCIÓN : </small>
            {{ $network->direccion }} <small>{{ $network->typelocal }}</small>
        </h1>

        <h1>
            <small>SERVICIO : </small>
            {{ $network->type }}
        </h1>

        <h1>
            <small>CICLOS PAGO : </small>
            ÚLTIMO DÍA CADA MES
        </h1>

        <h1 class="text-2xl font-semibold"><small class="text-[10px]">
                COSTO SERVICIO S/. </small>{{ $network->price }}</h1>

        @if ($network->isSuspendido())
            <span class="bg-red-500 text-white text-[10px] p-1 rounded leading-3">
                SUSPENDIDO</span>
        @else
            <span class="bg-green-500 text-white text-[10px] p-1 rounded leading-3">
                ACTIVO</span>
        @endif
    </div>

    <div class="flex flex-col gap-3 my-8">
        <div>
            <h1 class="mb-5">EQUIPOS AGREGADOS</h1>
            <livewire:admin.equipos.create-equipo :network="$network" />
        </div>
        <div>
            <livewire:admin.equipos.show-equipos-network :network="$network" />
        </div>
    </div>

    <div>
        <livewire:admin.clientnetworks.show-client-recibos :network="$network" />
    </div>
</x-app-layout>
