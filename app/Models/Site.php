<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Site extends Model
{
    use HasFactory;

    protected $table = "site";

    protected $fillable = [
        'id',
        'keywords',
        'description',
        'facebook',
        'instagram',
        'email',
        'telefone',
        'whatsapp',
        'endereco',
        'mapa',
        'codigos_head',
        'codigos_body',
        'codigos_footer',
    ];

    protected static function booted(): void
    {
        self::updated(static function (): void {
            Cache::forget('SiteBaseController::site');
        });
    }
}
