<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetUbigeosTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ubigeo:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina la tabla ubigeos desactivando claves foráneas y borra su registro en la tabla migrations.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('ADVERTENCIA: Esto eliminará la tabla ubigeos de la base de datos.');

        if ($this->confirm('¿Estás seguro de que deseas proceder con el reinicio de ubigeos?', true)) {
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                Schema::dropIfExists('ubigeos');
                DB::table('migrations')->where('migration', '2024_03_23_221143_create_ubigeos_table')->delete();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                $this->info("ÉXITO: Tabla 'ubigeos' eliminada y registro de migración borrado correctamente.");
                $this->info("Ahora puedes ejecutar 'php artisan migrate' para recrear la tabla con la nueva estructura.");
            } catch (\Exception $e) {
                $this->error("ERROR al reiniciar ubigeos: " . $e->getMessage());
            }
        } else {
            $this->info('Operación cancelada.');
        }
    }
}
