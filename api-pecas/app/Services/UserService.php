<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function register(array $data)
    {
        $validator = Validator::make($data, [
            'nome' => 'required|string|max:255',
            'nome_empresarial' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_users',
            'telefone' => 'nullable|string|max:20|unique:tb_users',
            'imagem' => 'nullable|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'nome' => $data['nome'],
            'nome_empresarial' => $data['nome_empresarial'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'imagem' => $data['imagem'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function login(array $data)
    {
        if (!auth()->attempt($data->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }


    public function atualizaUser(array $data, $co_user)
    {

        $user = User::find($co_user);
        if (!$user){
            throw new \Exception('Usuario não encontrado', 400);

        }
        $user->fill($data);
        if (isset($data['password'])){
            $user->password = Hash::make($data['password']);
        }
        $user->save();
        return $user;

    }


    public function deleteUser($co_user)
    {

        $user = User::find($co_user);
        if (!$user) {
            throw new \Exception('Usuario nao tem em nenhum lugar!!', 400);

        }

        $user->delete();
        return true;

    }







}