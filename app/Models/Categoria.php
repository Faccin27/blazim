<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Categoria extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $table = "categorias";

    protected $fillable = [
        'id',
        'id_marca',
        'nome',
        'slug',
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

    public function marca()
    {
        return $this->belongsTo(Marca::class, "id_marca");
    }

    public function scopeSearch(Builder $builder, string $string = "")
    {
        if ($string) {

            $builder->where('categorias.nome', 'LIKE', "%{$string}%");
        }

        return $builder;
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDefault', function (Builder $builder) {
            $builder->orderBy('categorias.ordem', 'ASC')->orderBy('categorias.id', 'DESC');
        });
    }
}
