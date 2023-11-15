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
        'nomeCompleto',
        'apelido',
        'dataNascimento',
        'idade',
        'genero',
        'posicao',
        'cpf',
        'rg',
        'peso',
        'altura',
        'nomeUniforme',
        'numeroUniforme',
        'tamanhoUniforme',
        'numeroCalcado',
        'caminhoImagem',
        'user_id',
        'categoria_id',
        'ativo'
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
