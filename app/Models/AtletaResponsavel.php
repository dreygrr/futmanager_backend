<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtletaResponsavel extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'atleta_id',
        'responsavel_id',
    ];

    public function atletas()
    {
        return $this->belongsToMany(Atleta::class, 'atleta_responsavels', 'responsavel_id', 'atleta_id');
    }
}
