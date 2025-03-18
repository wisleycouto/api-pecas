<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{   
    protected $table = 'tb_usuario';
    protected $primaryKey = 'co_usuario';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'co_usuario',
        'nome',
        'nome_empresarial',
        'email',
        'telefone',
        'imagem'
        
    ];


}