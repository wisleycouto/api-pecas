<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PecasController;
use App\Http\Controllers\Api\UsuarioController;

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
   # return 'Laravel: '.app()->version().' / App: Teste Brabo'.config('app.version');
    return 'Laravel: '.app()->version().' / App: '.config('app.version');
});




Route::group([], function () {
        Route::post("/cadastrar-peca", [PecasController::class, 'cadastrarPeca'])->name("pecas.cadastrar-peca");
        Route::get("/consultar-peca/{co_peca}", [PecasController::class, 'consultarPeca'])->name("pecas.consultar-peca");
        Route::put("/atualiza/{co_peca}", [PecasController::class, 'atualizaPeca'])->name("pecas.atualiza-peca");
        Route::delete("/deleta/{co_peca}", [PecasController::class, 'deletaPeca'])->name("pecas.deleta-peca");
        Route::post("/cadastrar-usuario", [UsuarioController::class, 'cadastrarUsuario'])->name("pecas.cadastrar-usuario");
       # Route::get("/consultar-usuario", [UsuarioController::class, 'consultarUsuario'])->name("pecas.consultar-usuario"); 
        Route::put("/atualiza-usuario/{co_usuario}", [UsuarioController::class, 'atualizaUsuario'])->name("pecas.atualiza-usuario");
        Route::delete("/deleta-usuario/{co_usuario}", [UsuarioController::class, 'deletaUsuario'])->name("pecas.deleta-usuario");
        Route::get("/consultar-usuario/{co_usuario}", [UsuarioController::class, 'consultarUsuario'])->name("pecas.consultar-usuario");
    });


