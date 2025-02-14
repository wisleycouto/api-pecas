<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PecasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return 'Laravel: '.app()->version().' / App: '.config('app.version');
});


Route::group(['prefix' => 'pecas'], function () {
       Route::post("/consultar-pecas", [PecasController::class, 'consultarPecas'])->name("pecas.consultar-pecas");
    
});

