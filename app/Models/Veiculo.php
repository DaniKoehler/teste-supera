<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property string $cor
 * @property string $ano
 * @property int $id_user
 */

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';

    protected $fillable = [
        'id',
        'placa',
        'marca',
        'modelo',
        'cor',
        'versao',
        'id_user'
    ];

    protected $attributes = [
        'placa' => null,
        'marca' => null,
        'modelo' => null,
        'cor' => null,
        'versao' => null,
        'id_user' => null
    ];
}
