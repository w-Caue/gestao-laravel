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
        Schema::create('PEDIDOS_ITENS', function (Blueprint $table) {
            $table->id('ID');
            $table->foreignId('PEDIDO_ID');
            $table->foreignId('PRODUTO_ID');
            $table->integer('QUANTIDADE');
            $table->double('VALOR', 10, 2);
            $table->double('DESCONTO', 5, 2)->nullable();
            $table->double('TOTAL', 9, 2)->nullable();
            $table->timestamps();

            #foreign key tabela pedidos
            $table->foreign('PEDIDO_ID')->references('ID')->on('PEDIDOS');
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
        Schema::dropIfExists('PEDIDOS_ITENS');
        Schema::enableForeignKeyConstraints();
    }
};
