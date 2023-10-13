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
            $table->string('nm_atletaCompleto');
            $table->string('nm_apelido');
            $table->date('dt_nascimento');
            $table->integer('nu_idade');
            $table->string('tp_genero');
            $table->string('nu_cpf');
            $table->string('nu_rg');
            $table->string('nm_camiseta');
            $table->integer('nu_camiseta');
            $table->integer('nu_calcado');
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Categoria::class)->constrained();
            $table->boolean('sn_ativo');
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
