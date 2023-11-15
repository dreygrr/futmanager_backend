<?php

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeCompleto');
            $table->string('apelido');
            $table->date('dataNascimento');
            $table->integer('idade');
            $table->string('genero');
            $table->string('cpf');
            $table->string('rg');
            $table->string('nomeUniforme');
            $table->integer('numeroUniforme');
            $table->string('tamanhoUniforme');
            $table->integer('numeroCalcado');
            $table->longText('caminhoImagem');
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Categoria::class)->constrained();
            $table->boolean('ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atletas');
    }
};
