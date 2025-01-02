<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'NOME',
        'EMAIL',
        'TELEFONE',
        'FAVORITO',
        'TIPO',
        'ENDERECO',
        'ATIVO',
        'DATA_CADASTRO',
    ];
}
