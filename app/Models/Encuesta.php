<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'mascota_id',
        'colonia',
        'delegacion',
        'ciudad',
        'codigoPostal',
        'tipocasa',
        'edad',
        'edades',
        'profesion',
        'animales',
        'mascotasAntes',
        'gasto',
        'tiempo',
        'dormir',
        'paseo',
        'dejarMascota',
        'cambioCasa',
        'compromiso',
        'economia',
        'porqueAdopcion',
        'otraMascota',
        'celular',
        'email',
    ];
}
