<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $valor
 * @property string $data
 * @property int $id_veiculo
 */

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';

    protected $fillable = [
        'id',
        'descricao',
        'valor',
        'data',
        'id_veiculo'
    ];

    protected $attributes = [
        'descricao' => null,
        'valor' => null,
        'data' => null,
        'id_veiculo' => null
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'id_veiculo');
    }
}
