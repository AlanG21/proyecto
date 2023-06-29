<?php

namespace App\Models;

use App\Models\Grupo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Alumna extends Model
{
    
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'grupo_id'];

    public function grupo()
    {   
        //conexion con el modelo de grupo
        return $this->belongsTo(Grupo::class);
    }
}
