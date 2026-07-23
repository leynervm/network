<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\ServerInfoMail;

class SendServerInfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:send-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un reporte por correo con la IP pública y credenciales de la base de datos.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando recolección de datos del servidor...');

        // 1. Obtener IP pública
        try {
            $ip = Http::timeout(5)->get('https://api.ipify.org')->body();
        } catch (\Exception $e) {
            $ip = 'Error al obtener IP: ' . $e->getMessage();
        }

        // 2. Obtener configuración de base de datos
        $dbConfig = config('database.connections.' . config('database.default'));

        // 3. Determinar destinatario
        // Enviar al ADMIN_EMAIL definido en .env, si no existe usar un fallback.
        $toEmail = 'leynervega0413@gmail.com';
        // $toEmail = env('ADMIN_EMAIL', 'admin@example.com');

        $this->info("Enviando reporte a: {$toEmail}");

        // 4. Enviar correo
        try {
            Mail::to($toEmail)->send(new ServerInfoMail($ip, $dbConfig));
            $this->info('Correo enviado exitosamente.');
        } catch (\Exception $e) {
            $this->error('Error al enviar el correo: ' . $e->getMessage());
        }
    }
}
