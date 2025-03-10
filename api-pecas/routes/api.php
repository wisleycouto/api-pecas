<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PecasController;
use App\Http\Controllers\UserController;





Route::group(['prefix' => 'user'], function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::put('/att/{co_user}', [UserController::class, 'atualizaUser']);
    Route::delete('/delete/{co_user}', [UserController::class, 'deleteUser']);

});


Route::group(['prefix' => 'pecas'], function () {
        Route::post("/cadastrar-peca", [PecasController::class, 'cadastrarPeca'])->name("pecas.cadastrar-peca");
        Route::get("/consultar-peca/{co_peca}", [PecasController::class, 'consultarPeca'])->name("pecas.consultar-peca");
        Route::put("/atualiza/{co_peca}", [PecasController::class, 'atualizaPeca'])->name("pecas.atualiza-peca");
        Route::delete("/deleta/{co_peca}", [PecasController::class, 'deletaPeca'])->name("pecas.deleta-peca");
    });


