<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manutencao extends Model
{
    use HasFactory;

    protected $table = "manutencoes";

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }
}
