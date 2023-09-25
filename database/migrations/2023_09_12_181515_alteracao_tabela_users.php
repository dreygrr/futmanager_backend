<?php

use App\Models\Perfil;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Perfil::class);
            $table->foreignIdFor(User::class);
            $table->renameColumn('name', 'nm_usuario');
            $table->renameColumn('email', 'nm_login');
            $table->renameColumn('password', 'pw_senha');
            $table->boolean('sn_ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('minha_tabela', function (Blueprint $table) {
            $table->dropColumn('sn_ativo');
            $table->renameColumn('nm_usuario', 'name');
            $table->renameColumn('nm_login', 'email');
            $table->renameColumn('pw_senha', 'password');
            $table->dropForeignIdFor("perfil_id");
            $table->dropForeignIdFor("user_id");
        });
    }
};
