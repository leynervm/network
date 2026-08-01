<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YapeNotification;
use Illuminate\Support\Facades\Log;

class YapeWebhookController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Guardamos todo en la base de datos para pruebas
            $notification = YapeNotification::create([
                'title' => $request->input('title', 'Sin título'),
                'content' => $request->input('content', ''),
            ]);

            Log::info('Yape Webhook Recibido', ['id' => $notification->id, 'content' => $notification->content]);

            return response()->json([
                'status' => 'success',
                'message' => 'Notificación guardada correctamente',
                'data' => $notification
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error en Yape Webhook: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al procesar el webhook'
            ], 500);
        }
    }
}
