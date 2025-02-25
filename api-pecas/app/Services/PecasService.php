<?php

namespace App\Services;

use App\Models\Pecas;
use App\Http\Requests\PecasRequest;


class PecasService
{

    public function cadastrarPeca(array $data)
    {
        $validatedData = validator($data, [
            'nome_peca' => 'required|string',
            'descricao_peca' => 'required|string',
            'disponibilidade_peca' => 'required|int',
            'preco_peca' => 'required|int',
            'imposto' => 'int',
            'co_fabricante' => 'required|string'
        ])->validate();

        return Pecas::create($validatedData);
    }

    public function atualizaPeca(array $data, $co_peca)
    {
        $validatedData = validator($data, [
            'nome_peca' => 'sometimes|required|string',
            'descricao_peca' => 'sometimes|required|string',
            'disponibilidade_peca' => 'sometimes|required|int',
            'preco_peca' => 'sometimes|required|int',
            'imposto' => 'sometimes|int',
            'co_fabricante' => 'sometimes|required|string'
        ])->validate();

        $peca = Pecas::find($co_peca);
        if ($peca) {
            $peca->update($validatedData);
            return $peca;
        } else {
            throw new \Exception('Peça não encontrada', 404);
        }
    }






    }

 

