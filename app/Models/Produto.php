<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'NOME',
        'DESCRICAO',
        'TAMANHO',
        'PRECO1',
        'PRECO2',
        'ESTOQUE',
        'ATIVO',
        'DATA_CADASTRO',
    ];
}
