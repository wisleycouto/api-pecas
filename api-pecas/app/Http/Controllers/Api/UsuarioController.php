<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\UsuarioService; 

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }


    public function cadastrarUsuario(Request $request)
    {
        try {
            $usuario = $this->usuarioService->cadastrarUsuario($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Usuario cadastrado com sucesso!!!',
                'data' => $usuario
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => utf8_encode($e->getMessage())
            ], $e->getCode() ?: 400);
        }
    }


         public function consultarUsuario($co_usuario)
         {
             $usuario = Usuario::find($co_usuario);
             if ($usuario) {
                 return response()->json($usuario);
             } else {
                 return response()->json(['message' => 'Usuario não encontrada'], 404);
             }
         }


         public function atualizaUsuario(Request $request, $co_usuario)
         {
             try {
                 $usuario = $this->usuarioService->atualizaUsuario($request->all(), $co_usuario);
     
                 return response()->json([
                     'success' => true,
                     'message' => 'Usuario Atualizado com sucesso!',
                     'data' => $usuario
                 ]);
             } catch (\Exception $e) {
                 return response()->json([
                     'success' => false,
                     'error' => utf8_encode($e->getMessage())
                 ], $e->getCode() ?: 400);
             }
         }     

         
    public function deletaUsuario($co_usuario)
    {
            $usuario = Usuario::find($co_usuario);
            if ($usuario) {
                $usuario->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Usuario deletada com sucesso!!!'
                ]);
            } else {
                return response()->json(['message' => 'Usuario não encontrada'], 404);
            }
  
    }

 }










        










        




 