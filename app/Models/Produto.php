<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class Produto extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $table = "produtos";

    protected $fillable = [
        'id',
        'ativo',
        'destaque',
        'id_categoria',
        'nome',
        'slug',
        'valor',
        'texto',
        'foto',
        'foto_thumb',
        'ordem'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nome',
                'onUpdate' => true
            ]
        ];
    }

        /**
     * Get the categoria that owns the Produto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(ProdutoFoto::class, 'id_produto', 'id')->orderBy('produtos_fotos.ordem', 'ASC')->orderBy('produtos_fotos.id', 'ASC');
    }

    public function scopeSearch(Builder $builder, string $string = "")
    {
        if($string){
            $builder->where('produtos.nome', 'LIKE', "%{$string}%");
        }

        return $builder;
    }

    public function scopeAtivo(Builder $query): void
    {
        $query->where('produtos.ativo', true);
    }

    public function scopeDestaque(Builder $query): void
    {
        $query->where('produtos.destaque', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDefault', function(Builder $builder) {
            $builder->orderBy('produtos.ordem', 'ASC');
            $builder->orderBy('produtos.id', 'DESC');
        });
    }
}
