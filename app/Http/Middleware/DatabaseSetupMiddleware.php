<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatabaseSetupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only run setup helper in local environment
        if (config('app.env') !== 'local') {
            return $next($request);
        }

        $dbStatus = 'ok';
        $errorMessage = '';

        try {
            \DB::connection()->getPdo();
            
            // Check if migrations and users table exist
            if (!\Schema::hasTable('migrations') || !\Schema::hasTable('users')) {
                $dbStatus = 'pending_migrations';
            }
        } catch (\PDOException $e) {
            $errorMessage = $e->getMessage();
            if ($e->getCode() == 1049 || str_contains(strtolower($e->getMessage()), 'unknown database') || str_contains(strtolower($e->getMessage()), 'database does not exist')) {
                $dbStatus = 'db_missing';
            } else {
                $dbStatus = 'connection_error';
            }
        } catch (\Throwable $e) {
            $errorMessage = $e->getMessage();
            $dbStatus = 'connection_error';
        }

        // If the database needs setup
        if ($dbStatus !== 'ok') {
            // Force session driver to 'file' to prevent database session driver crash
            config(['session.driver' => 'file']);

            // If we are not already on the setup routes, redirect to setup
            if (!$request->is('database-setup') && !$request->is('database-setup/*')) {
                return redirect()->route('database.setup');
            }
            
            // Share database status and error message to the request/views
            $request->attributes->set('db_status', $dbStatus);
            $request->attributes->set('db_error', $errorMessage);
        } else {
            // If everything is OK and the user is trying to access setup, redirect to home
            if ($request->is('database-setup')) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
