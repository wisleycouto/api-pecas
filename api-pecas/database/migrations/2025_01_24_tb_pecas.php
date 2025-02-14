<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pecas extends Migration
{
    /**
     * Run the migrations.
     */
    public $table = 'tb_pecas';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id('co_peca');
            $table->string('nome_peca');
            $table->string('descricao_peca');
            $table->Integer('disponibilidade_peca');
            $table->Integer('preco_peca');
            $table->string('co_fabricante');
            $table->string('imposto')->nullable()->default(NULL);;
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
