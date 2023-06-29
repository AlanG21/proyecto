<?php
namespace App\Http\Controllers;

use App\Models\Alumna;
use App\Models\Grupo;
use Illuminate\Http\Request;

class AlumnaController extends Controller
{
  
    public function index()
    {
        $alumnas = Alumna::all();
        $grupos = Grupo::all();
        return view('alumnas', ['alumnas' => $alumnas, 'grupos' => $grupos]);
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'grupo_id' => 'required'
        ]);

        
        Alumna::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'grupo_id' => $request->grupo_id
        ]);

        
        return redirect()->route('alumnas');
    }
}