<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('dashboard', compact('services'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada

        Service::create([
            'short_description' => $request->input('short_description'),
            'long_description' => $request->input('long_description'),
            'price' => $request->input('price'),
            'registration_date' => now(),
            'features' => $request->input('features'),
        ]);

        return redirect()->route('dashboard');


        // Redireccionar o mostrar un mensaje de éxito
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('dashboard');



        // Redireccionar o mostrar un mensaje de éxito
    }

    


    
}
