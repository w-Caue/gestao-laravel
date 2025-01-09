<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PRODUTOS', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NOME', 100);
            $table->text('DESCRICAO', 200);
            $table->string('TAMANHO', 50);
            $table->double('PRECO1', 10, 2);
            $table->double('PRECO2', 10, 2);
            $table->integer('ESTOQUE')->nullable();
            $table->enum('ATIVO', ['S', 'N'])->default('S');
            $table->dateTime('DATA_CADASTRO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRODUTOS');
    }
};
