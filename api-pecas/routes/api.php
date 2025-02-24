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
    return 'Laravel: '.app()->version().' / App: Teste Brabo'.config('app.version');
});




Route::group([], function () {
        Route::post("/cadastrar-peca", [PecasController::class, 'cadastrarPeca'])->name("pecas.cadastrar-peca");
        Route::get("/consultar-peca/{co_peca}", [PecasController::class, 'consultarPeca'])->name("pecas.consultar-peca");
        Route::put("/atualiza/{co_peca}", [PecasController::class, 'atualizaPeca'])->name("pecas.atualiza-peca");
        Route::delete("/deleta/{co_peca}", [PecasController::class, 'deletaPeca'])->name("pecas.deleta-peca");
    });


