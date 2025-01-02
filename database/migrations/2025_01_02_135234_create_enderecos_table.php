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
        Schema::create('ENDERECOS', function (Blueprint $table) {
            $table->id('ID');
            $table->integer('CEP');
            $table->string('RUA', 100);
            $table->integer('NUMERO');
            $table->string('COMPLEMENTO', 70)->nullable();
            $table->string('BAIRRO', 20);
            $table->string('REFERENCIA', 100)->nullable();
            $table->timestamps();
        });

        #foreign key tabela clientes
        Schema::table('CLIENTES', function (Blueprint $table) {
            $table->foreignId('ENDERECO_ID')->nullable()->after('ATIVO'); 
            
            $table->foreign('ENDERECO_ID')->references('ID')->on('ENDERECOS');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        #foreign key tabela clientes
        Schema::table('CLIENTES', function (Blueprint $table) {
            $table->dropForeign('clientes_endereco_id_foreign');
            
            $table->dropColumn('ENDERECO_ID');
        });

        Schema::dropIfExists('ENDERECOS');
    }
};
