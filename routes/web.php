<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\DatabaseSetupController;
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

Route::get('/database-setup', [DatabaseSetupController::class, 'index'])->name('database.setup');
Route::post('/database-setup/run', [DatabaseSetupController::class, 'run'])->name('database.setup.run');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Módulos principales protegidos por permisos
    Route::get('/admin/olts', [AdminController::class, 'olts'])->name('admin.olts')->middleware('can:admin.olts.index');
    Route::get('/admin/olts/{olt}/show', [AdminController::class, 'show'])->name('admin.olts.show')->middleware('can:admin.olts.show');

    Route::get('/admin/antenas', [AdminController::class, 'antenas'])->name('admin.antenas')->middleware('can:admin.antenas.index');
    Route::get('/admin/recibos', [AdminController::class, 'recibos'])->name('admin.recibos')->middleware('can:admin.recibos.index');
    Route::get('/admin/payments', [AdminController::class, 'payments'])->name('admin.payments')->middleware('can:admin.payments.index');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports')->middleware('can:admin.reports.index');
    
    Route::get('/admin/yape-notifications', \App\Http\Livewire\Admin\Yape\ShowNotifications::class)->name('admin.yape.notifications')->middleware('can:admin.yape.notifications');

    Route::get('/admin/client-network/{network}/show', [AdminController::class, 'shownetwork'])->name('admin.network.show')->middleware('can:admin.networks.show');
    Route::get('/admin/recibo/{recibo}/print', [AdminController::class, 'print'])->name('admin.recibo.print')->middleware('can:admin.recibos.print');

    Route::put('/admin/spliters/{spliter}/delete', [AdminController::class, 'deletespliter'])->name('admin.spliters.delete')->middleware('can:admin.spliters.delete');

    Route::get('/admin/marcas', [AdminController::class, 'marcas'])->name('admin.marcas')->middleware('can:admin.marcas.index');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products')->middleware('can:admin.products.index');

    // Módulo de Usuarios, Roles y Permisos
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users')->middleware('can:admin.users.index');
    Route::get('/admin/roles', [AdminController::class, 'roles'])->name('admin.roles')->middleware('can:admin.roles.index');
    Route::get('/admin/permissions', [AdminController::class, 'permissions'])->name('admin.permissions')->middleware('can:admin.roles.index');
});
