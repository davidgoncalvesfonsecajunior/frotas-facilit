<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = ['data_saida', 'data_retorno', 'observacoes', 'local_saida', 'local_destino', 'owner_id', 'vehicle_id', 'check', 'roteiro_viagem'];


    /**
     * accessors
     */


    public function getOwnerNomeAttribute()
    {
        return !$this->owner
            ? 'Organizador nâo encontrado'
            : $this->owner->nome;
    }

    public function locacao()
    {
        return $this->hasOne(locacao::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
