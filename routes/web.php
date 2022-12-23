<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('/lista')->group(function () {
        Route::get('/veiculos/{idUser}', [App\Http\Controllers\VeiculosController::class, 'listarVeiculos'])
            ->name('listarVeiculos');
        Route::get('/manutencoes/{idVeiculo}', [App\Http\Controllers\ManutencoesController::class, 'listarManutencoes'])
            ->name('listarManutencoes');
    });

    Route::prefix('/detalhe')->group(function () {
        Route::get('/veiculo/{idVeiculo}', [App\Http\Controllers\VeiculosController::class, 'detalharVeiculo'])
            ->name('detalharVeiculo');
        Route::get('/manutencao/{idManutencao}', [App\Http\Controllers\ManutencoesController::class, 'detalharManutencao'])
            ->name('detalharManutencao');
    });

    Route::prefix('/deletar')->group(function () {
        Route::get('/veiculo/{idVeiculo}', [App\Http\Controllers\VeiculosController::class, 'deletarVeiculo'])
            ->name('deletarVeiculo');
        Route::get('/manutencao/{idManutencao}', [App\Http\Controllers\ManutencoesController::class, 'deletarManutencao'])
            ->name('deletarManutencao');
    });

    Route::prefix('/cadastrar')->group(function () {
        Route::post('/veiculo/{idUser}', [App\Http\Controllers\VeiculosController::class, 'criarVeiculo'])
            ->name('criarVeiculo');
        Route::post('/manutencao/{idVeiculo}', [App\Http\Controllers\ManutencoesController::class, 'criarManutencao'])
            ->name('criarManutencao');
    });

    Route::prefix('/editar')->group(function () {
        Route::post('/veiculo/{idVeiculo}', [App\Http\Controllers\VeiculosController::class, 'editarVeiculo'])
            ->name('editarVeiculo');
        Route::post('/manutencao/{idManutencao}', [App\Http\Controllers\ManutencoesController::class, 'editarManutencao'])
            ->name('editarManutencao');
    });
});
