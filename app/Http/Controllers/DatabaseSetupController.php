<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DatabaseSetupController extends Controller
{
    /**
     * Render the setup index page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $dbStatus = $request->get('db_status');
        $dbError = $request->get('db_error');
        
        $connection = config('database.default');
        $dbConfig = config("database.connections.{$connection}");
        
        $dbDetails = [
            'connection' => $connection,
            'host' => $dbConfig['host'] ?? 'N/A',
            'port' => $dbConfig['port'] ?? 'N/A',
            'database' => $dbConfig['database'] ?? 'N/A',
            'username' => $dbConfig['username'] ?? 'N/A',
        ];
        
        return view('database-setup', compact('dbStatus', 'dbError', 'dbDetails'));
    }

    /**
     * Run setup action.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function run(Request $request)
    {
        $action = $request->input('action');
        
        switch ($action) {
            case 'create_db':
                return $this->createDatabase();
            case 'migrate':
                return $this->runMigrations();
            case 'seed':
                return $this->runSeeders();
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Acción no válida.'
                ], 400);
        }
    }

    /**
     * Create database if missing.
     */
    protected function createDatabase()
    {
        $connection = config('database.default');
        $config = config("database.connections.{$connection}");
        
        if ($connection === 'sqlite') {
            $path = $config['database'];
            if ($path !== ':memory:' && !file_exists($path)) {
                try {
                    @mkdir(dirname($path), 0755, true);
                    @touch($path);
                    return response()->json([
                        'success' => true,
                        'message' => "Base de datos SQLite creada exitosamente en {$path}.",
                        'output' => "SQLite file '{$path}' created successfully."
                    ]);
                } catch (\Throwable $e) {
                    return response()->json([
                        'success' => false,
                        'message' => "Error al crear base de datos SQLite: " . $e->getMessage(),
                        'output' => $e->getMessage()
                    ], 500);
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'SQLite ya configurado.',
                'output' => 'SQLite connection active.'
            ]);
        }

        if ($connection === 'mysql') {
            $database = $config['database'];
            try {
                // Setup a temporary connection without database name selected
                $tempConfig = $config;
                $tempConfig['database'] = null; // Connect to MySQL server without selecting a DB
                config(['database.connections.mysql_setup' => $tempConfig]);
                
                DB::connection('mysql_setup')->getPdo();
                DB::connection('mysql_setup')->statement("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
                
                return response()->json([
                    'success' => true,
                    'message' => "Base de datos '{$database}' creada o verificada correctamente.",
                    'output' => "Database '{$database}' verified/created successfully."
                ]);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => "Error al crear la base de datos: " . $e->getMessage(),
                    'output' => $e->getMessage()
                ], 500);
            }
        }

        return response()->json([
            'success' => false,
            'message' => "Creación automática no soportada para el driver: {$connection}.",
            'output' => "Driver {$connection} does not support automatic DB creation. Please create it manually."
        ], 500);
    }

    /**
     * Run migration files.
     */
    protected function runMigrations()
    {
        try {
            // Run artisan migrate
            $exitCode = Artisan::call('migrate', [
                '--force' => true
            ]);
            $output = Artisan::output();
            
            if ($exitCode === 0) {
                return response()->json([
                    'success' => true,
                    'message' => 'Migraciones ejecutadas exitosamente.',
                    'output' => $output
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un problema al ejecutar las migraciones.',
                    'output' => $output
                ], 500);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Excepción durante las migraciones: ' . $e->getMessage(),
                'output' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Run seeder files.
     */
    protected function runSeeders()
    {
        try {
            // Run artisan db:seed
            $exitCode = Artisan::call('db:seed', [
                '--force' => true
            ]);
            $output = Artisan::output();
            
            if ($exitCode === 0) {
                return response()->json([
                    'success' => true,
                    'message' => 'Datos semilla (Seeders) ejecutados exitosamente.',
                    'output' => $output
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un problema al ejecutar los seeders.',
                    'output' => $output
                ], 500);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Excepción durante los seeders: ' . $e->getMessage(),
                'output' => $e->getMessage()
            ], 500);
        }
    }
}
