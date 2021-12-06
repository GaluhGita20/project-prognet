<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logout', function () {
    return view('welcome')->name('logout');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // nasabah
    Route::get('/nasabah', [App\Http\Controllers\NasabahController::class, 'index'])->name('list-nasabah');

    Route::get('/nasabah/create', [App\Http\Controllers\NasabahController::class, 'add_nasabah'])->name('add_nasabah');
    Route::post('/nasabah/savenew', [App\Http\Controllers\NasabahController::class, 'save_newnasabah'])->name('save_newnasabah');

    Route::get('/nasabah-{id}/edit', [App\Http\Controllers\NasabahController::class, 'edit_nasabah'])->name('edit_nasabah');
    Route::post('/nasabah-{id}/update', [App\Http\Controllers\NasabahController::class, 'update_nasabah'])->name('update_nasabah');

    Route::post('/nasabah-{id}/dete', [App\Http\Controllers\NasabahController::class, 'delete_nasabah'])->name('delete_nasabah');

    // transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('view-transaksi');
    Route::get('/transaksi/user-{id}', [TransaksiController::class, 'list_transaksi_user'])->name('list-transaksi-user');
    Route::get('/transaksi/add-transaksi-{id}', [TransaksiController::class, 'create_trx'])->name('create_trx');
    Route::post('/transaksi/save-add-transaksi', [TransaksiController::class, 'savecreate_trx'])->name('savecreate_trx');

    //bunga
    Route::get('/bunga', [App\Http\Controllers\BungaController::class, 'index'])->name('list-bunga');
    
    Route::get('/bunga/create', [App\Http\Controllers\BungaController::class, 'add_bunga'])->name('add_bunga');
    Route::post('/bunga/savenew', [App\Http\Controllers\BungaController::class, 'save_newbunga'])->name('save_newbunga');

    Route::get('/bunga-{id}/edit', [App\Http\Controllers\BungaController::class, 'edit_bunga'])->name('edit_bunga');
    Route::post('/bunga-{id}/update', [App\Http\Controllers\BungaController::class, 'update_bunga'])->name('update_bunga');

    Route::post('/bunga-{id}/dete', [App\Http\Controllers\BungaController::class, 'delete_bunga'])->name('delete_bunga');
    

    // history
    Route::get('/history', [App\Http\Controllers\HomeController::class, 'view_history'])->name('list-history');

    

});

Auth::routes();


