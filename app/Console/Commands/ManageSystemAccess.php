<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ManageSystemAccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:access';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registra un evento de acceso o restricción en el sistema.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->choice(
            '¿Qué acción deseas registrar en el sistema?',
            ['Activar', 'Suspender'],
            0 // Por defecto Activar
        );

        $description = $this->ask('Ingresa una descripción del evento (opcional)');
        
        $userId = $this->ask('Ingresa el ID del usuario que ejecuta la acción (dejar vacío si no aplica)');

        $status = $action === 'Activar' ? 1 : 0;

        \App\Models\Acceso::create([
            'status' => $status,
            'description' => $description,
            'date' => now(),
            'user_id' => $userId ?: null,
        ]);

        $statusText = $status === 1 ? 'ACTIVO' : 'SUSPENDIDO';
        $this->info("El registro de acceso ha sido creado exitosamente con el estado: {$statusText}.");
    }
}
