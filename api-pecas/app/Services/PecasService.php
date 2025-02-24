<?php

namespace App\Services;

use App\Models\Pecas;
use App\Http\Requests\PecasRequest;


class PecasService
{

    public function cadastrarPeca(array $data)
    {
        return Pecas::create($data);
    }







    }

 

