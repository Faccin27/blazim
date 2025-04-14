<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFoto extends Model
{
    use HasFactory;

    protected $table  = "produtos_fotos";

    protected $fillable = [
        'id',
        'id_produto',
        'foto',
        'foto_thumb',
        'ordem'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    }
}
