<?php

namespace App\Models;

use App\Models\Alumna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    
    public function grupos()
    {
        //conexion con el modelo de alumna
        return $this->hasMany(Alumna::class);
    }
}
