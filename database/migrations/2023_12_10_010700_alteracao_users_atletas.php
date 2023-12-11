<?php

use App\Models\Atleta;
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
            $table->foreignIdFor(Atleta::class)->nullable()->constrained();
            $table->longText('caminhoImagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['atleta_id']);
            $table->dropColumn('atleta_id');
            $table->dropColumn('caminhoImagem');
        });
    }
};
