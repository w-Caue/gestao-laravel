<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'descricao',
        'imagem',
        'preco',
        'inativo',
        'data_cadastro'
    ];
}
