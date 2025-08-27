<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
Route::group(['middleware'=>'auth'],function(){
    
});
// Rota para EXIBIR o cardápio
Route::get('/menus/cardapio', [MainController::class, 'cardapioGet'])
    ->name('cardapio');

// Rota para a página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rota para PROCESSAR os dados do formulário de reserva
Route::post('/reserva', [mainController::class, 'reserva'])
    ->name('reserva');

// Rota para RECEBER os dados do formulário de contato
Route::post('/contato', [mainController::class, 'contato'])
    ->name('contato');