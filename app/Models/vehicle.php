<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['placa', 'chassi', 'marca', 'categoria_id', 'modelo', 'ano', 'cor', 'combustivel', 'km', 'status', 'observacao'];

    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(manutencao::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function reservabuses()
    {
        return $this->hasMany(Reservabus::class);
    }
}
