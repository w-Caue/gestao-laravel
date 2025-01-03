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
        Schema::create('PEDIDOS', function (Blueprint $table) {
            $table->id('ID');
            $table->foreignId('CLIENTE');
            $table->string('OBSERVACAO')->nullable();
            $table->foreignId('VENDEDOR');
            $table->string('PAGAMENTO', 1);
            $table->string('STATUS', 15);
            $table->double('TOTAL', 10, 2)->nullable();
            $table->dateTime('DATA_CADASTRO');
            $table->timestamps();

            #foreign key tabela clientes
            $table->foreign('CLIENTE')->references('ID')->on('CLIENTES');
            $table->foreign('VENDEDOR')->references('ID')->on('FUNCIONARIOS');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('PEDIDOS');
        Schema::enableForeignKeyConstraints();
    }
};
