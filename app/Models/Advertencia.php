<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertencia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data',
        'chamada_id',
        'atleta_id',
        'advertencia_tipo_id',
        'justificativa'
    ];

    public function chamada(): BelongsTo
    {
        return $this->belongsTo(Chamada::class);
    }

    public function advertencia_tipo(): BelongsTo
    {
        return $this->belongsTo(AdvertenciaTipo::class);
    }
}
