<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'CLIENTE',
        'VENDEDOR',
        'OBSERVACAO',
        'STATUS',
        'PAGAMENTO',
        'TOTAL',
        'DATA_CADASTRO',
    ];
}
