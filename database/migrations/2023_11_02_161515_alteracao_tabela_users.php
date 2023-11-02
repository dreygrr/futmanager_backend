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
            $table->foreignIdFor(Perfil::class)->constrained();
            $table->renameColumn('email', 'login');
            $table->boolean('ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ativo');
            $table->renameColumn('login', 'email');
            $table->dropForeignIdFor("perfil_id");
        });
    }
};
