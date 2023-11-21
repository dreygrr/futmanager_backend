<?php

use App\Models\Categoria;
use App\Models\ChamadaTipo;
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
        Schema::create('chamadas', function (Blueprint $table) {
            $table->id();
            $table->date('dataChamada');
            $table->time('horaChamada');
            $table->foreignIdFor(ChamadaTipo::class)->constrained();
            $table->foreignIdFor(Categoria::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->boolean('finalizada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamadas');
    }
};
