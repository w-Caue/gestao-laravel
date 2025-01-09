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
        Schema::create('IMAGENS', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PRODUTO_ID'); 
            $table->string('NOME');
            $table->string('PATH');
            $table->timestamps();

             #foreign key tabela produtos
            $table->foreign('PRODUTO_ID')->references('ID')->on('PRODUTOS');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('IMAGENS');
        Schema::enableForeignKeyConstraints();
    }
};
