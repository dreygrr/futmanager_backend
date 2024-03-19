<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categoria;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Atleta;
use App\Models\Responsavel;
use App\Models\AtletaResponsavel;
use App\Models\ChamadaTipo;
use App\Models\Chamada;
use App\Models\Presencas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $userId = 0;

    private  function createPerfis(): void
    {
        Perfil::factory()->create([
             'perfil' => 'Administrador',
             'ativo' => true
         ]);
        Perfil::factory()->create([
             'perfil' => 'none',
             'ativo' => false
         ]);
        Perfil::factory()->create([
             'perfil' => 'Equipe',
             'ativo' => true
         ]);
        Perfil::factory()->create([
             'perfil' => 'Responsável',
             'ativo' => true
         ]);
        Perfil::factory()->create([
             'perfil' => 'Atleta',
             'ativo' => true
         ]);
    }

    private  function createAdministratorUser(): void
    {
         User::factory()->create([
             'name' => 'futmanager',
             'login' => 'futmanager@example.com',
             'password' => '12345',
             'perfil_id'=> '1',
             'ativo'=> true,
         ]);
         $this->userId++;
    }

    private  function createParentUsers(): void
    {

        User::factory()->create([
            'name' => 'responsavel1',
            'login' => 'responsavel1@example.com',
            'password' => '12345',
            'perfil_id'=> '4',
            'ativo'=> true,
            //'atleta_id' => 1
        ]);
        $this->userId++;
        Responsavel::factory()->create([
            'nomeCompleto' => 'responsavel1',
            'dataNascimento' => '1990-03-06',
            'cpf' => '111.111.111-11',
            'rg' => '11111',
            'user_id'=> $this->userId,
            'ativo'=> true
        ]);

        User::factory()->create([
            'name' => 'responsavel2',
            'login' => 'responsavel2@example.com',
            'password' => '12345',
            'perfil_id'=> '4',
            'ativo'=> true,
            //'atleta_id' => 2
        ]);
        $this->userId++;
         Responsavel::factory()->create([
            'nomeCompleto' => 'responsavel2',
            'dataNascimento' => '1987-03-21',
            'cpf' => '222.222.222-22',
            'rg' => '22222',
            'user_id'=> $this->userId,
            'ativo'=> true
         ]);

         User::factory()->create([
            'name' => 'responsavel3',
            'login' => 'responsavel3@example.com',
            'password' => '12345',
            'perfil_id'=> '4',
            'ativo'=> true,
            //'atleta_id' => 3
         ]);
         $this->userId++;
        Responsavel::factory()->create([
             'nomeCompleto' => 'responsavel3',
             'dataNascimento' => '1975-12-10',
             'cpf' => '333.333.333-33',
             'rg' => '33333',
             'user_id'=> $this->userId,
             'ativo'=> true
         ]);   
    }

    private  function createCategories(): void
    {
        Categoria::factory()->create([
             'categoria' => 'SUB-09',
             'caminhoImagem' => '/sub09.png',
             'ativo' => true
         ]);

         Categoria::factory()->create([
             'categoria' => 'SUB-11',
             'caminhoImagem' => '/sub11.png',
             'ativo' => true
         ]);

         Categoria::factory()->create([
             'categoria' => 'SUB-13',
             'caminhoImagem' => '/sub13.png',
             'ativo' => true
         ]);

         Categoria::factory()->create([
             'categoria' => 'SUB-15',
             'caminhoImagem' => '/sub15.png',
             'ativo' => true
         ]);
    }

    private  function createAthletesUsers(): void
    {
        User::factory()->create([
             'name' => 'aluno1',
             'login' => 'aluno1@example.com',
             'password' => '12345',
             'perfil_id'=> '5',
             'ativo'=> true
         ]);
        $this->userId++;
        Atleta::factory()->create([
             'nomeCompleto' => 'atleta1',
             'user_id'=> $this->userId,
             'categoria_id'=> '1',
             'ativo'=> true
         ]);
         AtletaResponsavel::factory()->create([
             'atleta_id' => '1',
             'responsavel_id'=> '1'
         ]);
        
         User::factory()->create([
             'name' => 'aluno2',
             'login' => 'aluno2@example.com',
             'password' => '12345',
             'perfil_id'=> '5',
             'ativo'=> true
         ]);
         $this->userId++;
        Atleta::factory()->create([
             'nomeCompleto' => 'atleta2',
             'user_id'=> $this->userId,
             'categoria_id'=> '1',
             'ativo'=> true
         ]);
        AtletaResponsavel::factory()->create([
             'atleta_id' => '2',
             'responsavel_id'=> '2'
         ]);

         User::factory()->create([
             'name' => 'aluno3',
             'login' => 'aluno3@example.com',
             'password' => '12345',
             'perfil_id'=> '5',
             'ativo'=> true
         ]);
         $this->userId++;
        Atleta::factory()->create([
             'nomeCompleto' => 'atleta3',
             'user_id'=> $this->userId,
             'categoria_id'=> '1',
             'ativo'=> true
         ]);
         AtletaResponsavel::factory()->create([
             'atleta_id' => '3',
             'responsavel_id'=> '3'
         ]);
    }

    private  function createClassroomCallType(): void
    {
        ChamadaTipo::factory()->create([
             'tipoChamada' => 'simples',
             'ativo'=> true
         ]);
        ChamadaTipo::factory()->create([
             'tipoChamada' => 'especial',
             'ativo'=> true
         ]);
    }

    private  function createClassroomCall(): void
    {
        Chamada::factory()->create([
            'categoria_id' => 1,
            'finalizada' => true
        ]);
        Chamada::factory()->create([
            'categoria_id' => 3,
            'finalizada' => false
         ]);
    }

    private function doClassroomCall(): void
    {
        Presencas::factory()->create([
            'chamada_id' => 1,
            'atleta_id' => 1,
            'presenca' => true
        ]);
        Presencas::factory()->create([
            'chamada_id' => 1,
            'atleta_id' => 2,
            'presenca' => false
        ]);
    }

    private  function createONGMembers(): void
    {
         User::factory()->create([
             'name' => 'membro1',
             'login' => 'membro1@example.com',
             'password' => '12345',
             'perfil_id'=> '3',
             'ativo'=> true
         ]);
         $this->userId++;

         User::factory()->create([
             'name' => 'membro2',
             'login' => 'membro2@example.com',
             'password' => '12345',
             'perfil_id'=> '3',
             'ativo'=> true
         ]);
         $this->userId++;         
    }


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createPerfis();
        $this->createAdministratorUser();
        $this->createCategories();
        $this->createClassroomCallType();

        $this->createONGMembers();

        $this->createParentUsers();
        $this->createAthletesUsers();

        $this->createClassroomCall();
        $this->doClassroomCall();
    }
}
