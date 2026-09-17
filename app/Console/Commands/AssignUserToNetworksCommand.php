<?php

namespace App\Console\Commands;

use App\Models\Network;
use App\Models\User;
use Illuminate\Console\Command;

class AssignUserToNetworksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'network:assign-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muestra la lista de usuarios y asigna el usuario seleccionado a los registros de networks.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::select(['id', 'name', 'email'])->orderBy('id')->get();

        if ($users->isEmpty()) {
            $this->error('No hay usuarios registrados en la base de datos.');
            return Command::FAILURE;
        }

        $totalNetworks = Network::count();
        if ($totalNetworks === 0) {
            $this->warn('No existen registros en la tabla networks.');
            return Command::SUCCESS;
        }

        $this->info("--- LISTA DE USUARIOS REGISTRADOS ---");
        $this->table(
            ['ID', 'Nombre', 'Email'],
            $users->map(fn($u) => [$u->id, $u->name, $u->email])->toArray()
        );

        $options = [];
        foreach ($users as $user) {
            $options[$user->id] = "ID: {$user->id} | {$user->name} ({$user->email})";
        }

        $selectedChoice = $this->choice(
            'Selecciona el usuario que deseas vincular a los networks:',
            $options
        );

        // Identificar el ID seleccionado
        $selectedId = array_search($selectedChoice, $options);
        if ($selectedId === false && isset($options[$selectedChoice])) {
            $selectedId = $selectedChoice;
        }

        $selectedUser = $users->firstWhere('id', $selectedId);

        if (!$selectedUser) {
            $this->error('Usuario no encontrado.');
            return Command::FAILURE;
        }

        $nullCount = Network::whereNull('user_id')->count();

        $scope = $this->choice(
            "¿A qué registros deseas asignar el usuario [{$selectedUser->name}]?",
            [
                'all' => "A todos los registros de networks ({$totalNetworks} registros)",
                'null_only' => "Solo a los que no tienen usuario asignado ({$nullCount} registros)",
            ],
            'all'
        );

        $query = Network::query();
        if ($scope === 'null_only' || $scope === "Solo a los que no tienen usuario asignado ({$nullCount} registros)") {
            $query->whereNull('user_id');
        }

        $targetCount = $query->count();

        if ($targetCount === 0) {
            $this->info('No hay registros que coincidan con el criterio seleccionado.');
            return Command::SUCCESS;
        }

        if (!$this->confirm("¿Confirmas asignar el usuario [{$selectedUser->name}] (ID: {$selectedUser->id}) a {$targetCount} registro(s) de networks?", true)) {
            $this->warn('Operación cancelada.');
            return Command::SUCCESS;
        }

        $updated = $query->update(['user_id' => $selectedUser->id]);

        $this->newLine();
        $this->info("✓ ¡Éxito! Se han vinculado correctamente {$updated} registro(s) de networks al usuario [{$selectedUser->name}] (ID: {$selectedUser->id}).");

        return Command::SUCCESS;
    }
}
