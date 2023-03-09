<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;
    protected $fillable = [
        'mascota_id',
        'cliente_id',
        'fecha',
        'documentacion',
    ];
}
