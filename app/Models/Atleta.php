<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Atleta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nm_atletaCompleto',
        'nm_apelido',
        'dt_nascimento',
        'nu_idade',
        'tp_genero',
        'nu_cpf',
        'nu_rg',
        'nm_camiseta',
        'nu_camiseta',
        'nu_calcado',
        'user_id',
        'categoria_id',
        'sn_ativo'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
