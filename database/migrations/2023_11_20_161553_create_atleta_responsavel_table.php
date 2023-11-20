<?php

use App\Models\Atleta;
use App\Models\Responsavel;
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
        Schema::create('atleta_responsavels', function (Blueprint $table) {
            $table->unsignedBigInteger('atleta_id');
            $table->unsignedBigInteger('responsavel_id');
            $table->timestamps();

            $table->foreign('atleta_id')->references('id')->on('atletas')->onDelete('cascade');
            $table->foreign('responsavel_id')->references('id')->on('responsavels')->onDelete('cascade');

            $table->primary(['atleta_id', 'responsavel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atleta_responsavels');
    }
};
