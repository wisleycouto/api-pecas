<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    /**
     * Encontra um usuário pelo CPF ou cria um novo com os dados fornecidos
     *
     * @param array $data
     * @return User|null
     */

    public function findOrCreateUser(array $data): ?User
    {

       
        $user = User::firstOrCreate(
            ['nu_cpf' => $data['sub']],
            [
                'no_usuario' => $data['name'],
                'ds_email_gov_br' => $data['email'] ?? null,
                'ds_email_ldap' => $data['ds_email_ldap'] ?? null
            ]
        );

        if (!$user) {
            throw new \Exception("Não foi possivel criar ou encontrar o usuário.");
        }

        return $user;
    }

    public function findOrCreateUserLdap($data): ?User
    {

     
        $user = User::firstOrCreate(
            ['nu_cpf' => $data['cpf']],
            [
                'no_usuario' => $data['nome'],
                'ds_email_gov_br' =>  null,
                'ds_email_ldap' => $data['email'] ?? null
            ]
        );

        if (!$user) {
            throw new \Exception("Não foi possivel criar ou encontrar o usuário.");
        }

        return $user;
    }

    public function findByUser(string $identificador)
    {
        if ($this->isCpf($identificador)) {
            return $this->findByCpf($identificador);
        }

        return $this->findById($identificador);
    }

    public function findById($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            throw new ModelNotFoundException('Usuário não encontrado');
        }

        return $usuario;
    }

    public function findByCpf(string $cpf)
    {
        $usuario = User::where('nu_cpf', $cpf)->first();

        if (!$usuario) {
            throw new ModelNotFoundException('Usuário não encontrado');
        }

        return $usuario;
    }

    private function isCpf($identificador)
    {
        return strlen($identificador) === 11;
    }

}