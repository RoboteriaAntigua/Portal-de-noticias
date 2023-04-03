<?php

use App\Http\Controllers\ladoClienteController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
|
*/
/*-* Controladores News *-*/
Route::controller(NewsController::class)->group(function(){
Route::get('News/modoEdicion', 'index')     ->name('News.modoEdicion');
Route::get('News/create','create')          ->name('News.create');
Route::get('News/{id}','show')              ->name('News.show');
Route::post('News/create/store','store')    ->name('News.store');
Route::get('News/{id}/edit','edit')         ->name('News.edit');
Route::put('News/{id}','update')            ->name('News.update');
Route::delete('News/{id}','destroy')        ->name('News.destroy');
Route::get('News/{id}','agregar_suscriptor')->name('News.agregar_suscriptor');

});


/*-* Controlador Readers *-*/
Route::controller(ReadersController::class)->group(function(){
Route::get('Readers/modoEdicion','index')   ->name('Readers.modoEdicion');
Route::get('Readers/create','create')      ->name('Readers.create');
Route::get('Readers/{id}','show')          ->name('Readers.show');
Route::post('Readers/create/store','store')->name('Readers.store');
Route::get('Readers/{id}/edit','edit')     ->name('Readers.edit');
Route::put('Readers/{id}','update')        ->name('Readers.update');
Route::delete('Readers/{id}','destroy')    ->name('Readers.destroy');
Route::post('Readers/{id}','agregar_suscripcion')      ->name('Readers.agregar_suscripcion');
});

/*-* Controlador Lado cliente *-*/
Route::controller(ladoClienteController::class)->group(function(){
    Route::get('/', 'index')            ->name('index');
    Route::get('/{id}','show')           ->name('show');
});
