<?php

namespace App\Services;

use App\Models\Pecas;
use App\Http\Requests\PecasRequest;


class PecasService
{
    public function consultarPecas(PecasRequest $request)
    {
        // Implementação do método consultarPecas
        // Aqui você pode adicionar a lógica para consultar as peças com base no request

        // Exemplo de consulta:
        $query = Pecas::query();

        if ($request->has('nome_peca')) {
            $query->where('co_peca', 'like', '%' . $request->input('nome_peca') . '%');
        }

        return $query->get();
    }
}