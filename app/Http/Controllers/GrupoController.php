<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{

   public function index()
   {
       $grupos = Grupo::all();
       return view('grupos', ['grupos' => $grupos]);
   }
   
   public function  store(Request $request)
   {
       
       $request->validate([
           'grupo' => 'required'
       ]);

       
       Grupo::create([
           'nombre' => $request->grupo
       ]);

       
       return redirect()->route('grupos');
   }

}