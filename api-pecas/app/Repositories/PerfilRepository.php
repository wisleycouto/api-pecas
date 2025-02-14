<?php

namespace App\Repositories;

use App\Models\Perfil;
use App\Repositories\IRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PerfilRepository implements IRepository
{
    public function __construct(
        protected Perfil $model
    ){}

    public function getAll(string $filter = null): Collection
    {
        return $this->model->get();
    }

    public function getById(string $id): Model|null
    {
        // TODO: Implement getById() method.
    }

    public function create(array $array): Model
    {
        $perfil = $this->model;
        $perfil->fill($array);
        $perfil->save();
        return $perfil;
    }

    public function delete(string $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function update(int $id, array $array): Model
    {
        $perfil = $this->model->findOrFail($id);
        $perfil->fill($array);
        $perfil->dt_alteracao = now();
        $perfil->save();
        return $perfil;
    }

    public function findOrCreate(array $where, array $array): ?Model
    {
        // TODO: Implement findOrCreate() method.
    }
}