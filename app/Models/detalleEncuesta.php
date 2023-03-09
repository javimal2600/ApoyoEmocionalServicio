<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleEncuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        'adopcion_id',
        'condiciones',
    ];
}
