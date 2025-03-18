<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     */
    public $table = 'tb_usuario';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('co_usuario');
            $table->string('nome');
            $table->string('nome_empresarial');
            $table->string('email')->unique();
            $table->string('telefone')->unique();
            $table->string(column: 'imagem')->nullable()->default(NULL);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */ public function down()
    {
        Schema::drop($this->table);
    }
};
