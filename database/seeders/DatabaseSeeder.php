<?php

namespace Database\Seeders;

use App\Models\Popup;
use App\Models\Site;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(User::query()->count() === 0){

            User::query()->create([
                'name' => 'Lovatel',
                'email' => 'projetos@lovatel.com.br',
                'password' => Hash::make('admin'),
                'role' => 'super-admin'
            ]);
        }

        if(Popup::query()->count() === 0){

            Popup::query()->create([
                'ativo' => false,
                'nome' => "",
                'url' => "",
                'foto' => ""
            ]);
        }

        if(Site::query()->count() === 0){

            Site::query()->create([
                'keywords' => "",
                'description' => "",
                'facebook' => "",
                'instagram' => "",
                'email' => "programacao2@lovatel.com.br",
                'telefone' => "",
                'whatsapp' => "(49) 99999-9999",
                'endereco' => "",
                'mapa' => "",
                'codigos_head' => "",
                'codigos_body' => "",
                'codigos_footer' => ""
            ]);
        }
    }
}
