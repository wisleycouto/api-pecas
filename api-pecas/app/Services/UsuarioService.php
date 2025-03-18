<?php

namespace App\Services;

use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;


class UsuarioService
{

    public function cadastrarUsuario(array $data)
    {
        $validatedData = validator($data, [
           'nome' => 'sometimes|required|string',
            'nome_empresarial' => 'sometimes|required|string',
            'email' => 'sometimes|required|string',
            'telefone' => 'sometimes|required|string'
                        
        ])->validate();

        return Usuario::create($validatedData);
    }

    public function atualizaUsuario(array $data, $co_usuario)
    {
        $validatedData = validator($data, [
            'nome' => 'sometimes|required|string',
            'nome_empresarial' => 'sometimes|required|string',
            'email' => 'sometimes|required|string',
            'telefone' => 'sometimes|required|string'
            
        ])->validate();

        $usuario = Usuario::find($co_usuario);
        if ($usuario) {
            $usuario->update($validatedData);
            return $usuario;
        } else {
            throw new \Exception('Usuario não encontrada', 404);
        }
    }






    }

 

