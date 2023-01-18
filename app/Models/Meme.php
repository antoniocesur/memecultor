<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'imgPlantilla', 'imgEjemplo'
    ];
    protected $attributes = [
        'imgEjemplo' => 'defecto.jpg',
    ];

}
