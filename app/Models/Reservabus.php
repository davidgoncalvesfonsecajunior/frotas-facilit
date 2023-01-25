<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservabus extends Model
{
    use HasFactory;
    protected $fillable = ['local_saida', 'local_destino', 'data_saida', 'data_retorno', 'data_chegada', 'Passageiros', 'km', 'finalidade', 'diaria', 'motorista', 'nome_local', 'endereco', 'cidade', 'uf', 'contato', 'email', 'estacionamento', 'roteiro', 'objetivo', 'disciplinas', 'publico', 'servidores', 'check', 'vehicle_id', 'owner_id'];


    public function getOwnerNomeAttribute()
    {
        return !$this->owner
            ? 'Organizador nâo encontrado'
            : $this->owner->nome;
    }

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function passageiros()
    {
        return $this->hasMany(Passageiro::class, 'reservabus_id');
    }
}
