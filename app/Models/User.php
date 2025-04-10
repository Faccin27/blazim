<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function search(string $busca, int $por_pagina): LengthAwarePaginator
    {
        $query = self::query();

        if (!empty($busca)) {

            $query->where('users.name', 'LIKE', "%{$busca}%");
            $query->orWhere('users.email', '=', $busca);
        }

        if (Auth::user()->role != 'super-admin') {
            $query->where('users.role', '<>', 'super-admin');
        }

        $query->orderBy('users.name', 'ASC');

        $users = $query->paginate($por_pagina == -1 ? PHP_INT_MAX : $por_pagina);

        return $users;
    }
}
