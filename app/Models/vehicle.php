<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['placa', 'chassi', 'marca', 'modelo', 'ano', 'cor', 'combustivel', 'km', 'status', 'observacao'];
}
