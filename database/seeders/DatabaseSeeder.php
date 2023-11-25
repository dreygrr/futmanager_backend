<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categoria;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Atleta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Perfil::factory()->create([
        //     'perfil' => 'administrador',
        //     'ativo' => true
        // ]);

        // User::factory()->create([
        //     'name' => 'futmanager',
        //     'login' => 'futmanager@example.com',
        //     'password' => '12345',
        //     'perfil_id'=> '1',
        //     'ativo'=> true,
        // ]);

        Atleta::factory(10)->create();


        // Categoria::factory()->create([
        //     'nm_categoria' => 'SUB-09',
        //     'sn_ativo' => true
        // ]);

        // Categoria::factory()->create([
        //     'nm_categoria' => 'SUB-11',
        //     'sn_ativo' => true
        // ]);

        // Categoria::factory()->create([
        //     'nm_categoria' => 'SUB-13',
        //     'sn_ativo' => true
        // ]);

        // Categoria::factory()->create([
        //     'nm_categoria' => 'SUB-15',
        //     'sn_ativo' => true
        // ]);
    }
}
