<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locacao extends Model
{
    use HasFactory;

    protected $table = "locacoes";

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
