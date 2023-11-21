<?php

use App\Models\AdvertenciaTipo;
use App\Models\Atleta;
use App\Models\Chamada;
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
        Schema::create('advertencias', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->foreignIdFor(Chamada::class)->nullable()->constrained();
            $table->foreignIdFor(Atleta::class)->constrained();
            $table->foreignIdFor(AdvertenciaTipo::class)->constrained();
            $table->text('justificativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertencias');
    }
};
