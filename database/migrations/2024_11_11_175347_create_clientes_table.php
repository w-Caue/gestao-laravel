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
        Schema::create('CLIENTES', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NOME');
            $table->string('EMAIL')->unique()->nullable();
            $table->string('TELEFONE', 14)->nullable();
            $table->enum('FAVORITO', ['S', 'N'])->default('N');
            $table->enum('INATIVO', ['S', 'N'])->default('N');
            $table->dateTime('DATA_CADASTRO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CLIENTES');
    }
};
