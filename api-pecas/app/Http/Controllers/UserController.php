<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
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


     public function login(Request $request) 
     {
         $credentials = $request->only('email', 'password');
     
         if (Auth::attempt($credentials)) {
             $user = Auth::user();
             $token = $user->createToken('authToken')->accessToken;
     
             return response()->json([
                 'success' => true,
                 'message' => 'Login realizado com sucesso!!!',
                 'data' => [
                     'user' => $user,
                     'token' => $token
                 ]
             ]);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Credenciais inválidas'
             ], 400);
         }
     }


     public function atualizaUser(Request $request, $co_user)
     {
        try {

            $user = $this->userService->atualizaUser($request->all(),$co_user);

                return response()->json([
                    'success' => true,
                    'message' => 'O usuario foi atualizado com sucesso!!!',
                    'data' => $user


                ]);

        } catch (\Exception $e) {

        return response()-json([
            'success' => false,
            'message' => 'Erro na atualização',
            'error' => utf8_encode($e->getMessage())],
            $e->getCode() ?: 400);

          }
        }


        public function deleteUser($co_user)
        {
            try {
                $this->userService->deleteUser($co_user);
        
                return response()->json([
                    'success' => true,
                    'message' => 'Usurio deletado com sucesso!'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Deu ruim ',
                    'error' => utf8_encode($e->getMessage())
                ], $e->getCode() ?: 400);
            }
        } 














     }
















 



            






 







    



