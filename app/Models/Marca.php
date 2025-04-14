<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Marca extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $table = "marcas";

    protected $fillable = [
        'id',
        'nome',
        'slug',
        'foto',
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



    public function scopeSearch(Builder $builder, string $string = "")
    {
        if ($string) {

            $builder->where('marcas.nome', 'LIKE', "%{$string}%");
        }

        return $builder;
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDefault', function(Builder $builder) {
            $builder->orderBy('marcas.ordem', 'ASC')->orderBy('marcas.id', 'DESC');
        });
    }
}
