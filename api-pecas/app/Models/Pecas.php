<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pecas extends Model
{   
    protected $table = 'tb_pecas';
    protected $primaryKey = 'co_peca';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'co_peca',
        'nome_peca',
        'descricao_peca',
        'disponibilidade_peca',
        'preco_peca',
        'imposto',
        'co_fabricante'
    ];


}