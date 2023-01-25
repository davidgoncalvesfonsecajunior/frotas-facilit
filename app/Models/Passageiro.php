<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'rg', 'orgao_expedidor', 'poltrona',
        'reservabus_id'
    ];
    public function Reservabus()
    {
        return $this->belongsTo(Reservabus::class);
    }
}
