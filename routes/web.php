<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ReciboController;
use App\Http\Livewire\Admin\Boxnavs\ShowBoxnavs;
use App\Http\Livewire\Admin\Clientnetworks\ShowClientPayments;
use App\Http\Livewire\Admin\Clientnetworks\ShowClientRecibos;
use App\Http\Livewire\Admin\Clients\ShowClients;
use App\Http\Livewire\Admin\Mufas\ShowMufas;
use App\Http\Livewire\Admin\Networks\ShowNetworks;
use App\Http\Livewire\Admin\Payments\ShowPayments;
use App\Http\Livewire\Admin\Portolts\ShowPortolts;
use App\Http\Livewire\Admin\Products\ShowProducts;
use App\Http\Livewire\Admin\Recibos\ShowRecibos;
use App\Http\Livewire\Admin\Spliters\ShowSpliters;
use App\Models\Network;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/olts', [AdminController::class, 'olts'])->name('admin.olts');
    Route::get('/admin/olts/{olt}/show', [AdminController::class, 'show'])->name('admin.olts.show');
    // Route::get('/admin/olts/{olt}/spliter/{spliter}/boxnavs', [AdminController::class, 'boxnavs'])->name('admin.olts.boxnavs');

    Route::get('/admin/antenas', [AdminController::class, 'antenas'])->name('admin.antenas');
    Route::get('/admin/Recibos', [AdminController::class, 'recibos'])->name('admin.recibos');
    Route::get('/admin/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');


    Route::get('/admin/client-network/{network}/show', [AdminController::class, 'shownetwork'])->name('admin.network.show');
    Route::get('/admin/recibo/{recibo}/print', [AdminController::class, 'print'])->name('admin.recibo.print');

    Route::put('/admin/spliters/{spliter}/delete', [AdminController::class, 'deletespliter'])->name('admin.spliters.delete');

    Route::get('/admin/marcas', [AdminController::class, 'marcas'])->name('admin.marcas');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
});
