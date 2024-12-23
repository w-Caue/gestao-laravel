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
        Schema::create('SERVICOS', function (Blueprint $table) {
            $table->id('ID');
            $table->string('DESCRICAO');
            $table->float('PRECO', 9, 2)->nullable();
            $table->string('IMAGEM')->nullable();
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
        Schema::dropIfExists('SERVICOS');
    }
};
