<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'DESCRICAO',
        'IMAGEM',
        'PRECO',
        'INATIVO',
        'DATA_CADASTRO'
    ];
}
