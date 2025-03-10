<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;


class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRequest $request)
     { 
        try{
            $user = $this->userService->register($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Usuario cadastrado com sucesso !!!',
                'data' => $user
              
            ],201);
        } catch (\Exception $e) {
          return response()->json([
            'success' => false,
            'error' => utf8_encode($e->getMessage()),
            'message' => 'Tá batendo aqui essa mizera'
          ],400);      
        }    

     } 

     //Não Tá funcionando Legal 
     public function login($id, $name, $email) 
     {
         $user = User::find($id||$name||$email);
            if($user){
                return response()->json($user);
            } else {

             return response()->json (['message' => 'Usuario não encontrado'],400);

            }   

        }

    // Falta Fazer o service 
    public function atualizeUser(Request $request, $co_user)
    {
        try {
            $user= $this->userService->atualizeUser($request->all(), $co_user);

                return response()->json([
                    'success' => true,
                    'message' => 'Usuario Atualizado com sucesso!!!',
                    'data' => $user

                ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar',
                'error' => utf8_encode($e->getMessage())
            ], $e->getCode() ?: 400);
        }
    }

    // Falta Fazer o service 
    public function deleteUser($co_user)
    {
        $user = User::find($co_user);
        if ($user){
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Usuario deletado com sucesso !!!!'
            ]);

        } else {

            return response()->json(['message' => 'Usuario não encontrado']. 400);

        }

    }

}  

            






 







    



