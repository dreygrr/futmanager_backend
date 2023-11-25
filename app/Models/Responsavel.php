<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Responsavel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomeCompleto',
        'dataNascimento',
        'cpf',
        'rg',
        'ativo',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function atletas()
    {
        return $this->belongsToMany(Atleta::class, 'atleta_responsavels', 'responsavel_id', 'atleta_id');
    }

    public function getDataNascimentoAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y'); // H:i:s
    }
}
