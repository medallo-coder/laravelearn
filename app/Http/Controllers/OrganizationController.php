<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Persona;

class OrganizationController extends Controller
{
    //mostrar el formulario 
    public function create(){
        return view('FormOrganizaciones');
    }

    //guardar datos
    public function store(Request $request) {
         $data = $request->validate([
            'nombre_organizacion' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
        ]);

        Organization::create($data);

        return redirect()->route('zonas.index');
    }

    //lista de datos
    public function index() {
       $organizaciones = Organization::all();
       return view('listaOrganizaciones',compact('organizaciones'));
       
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $organizaciones = Organization::findOrFail($id);
        return view('EditarOrganizacion', compact('organizaciones'));
    }






    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre_organizacion' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            // 'person_id' => 'nullable|exists:people,id', // si quieres mantenerlo opcional
        ]);

        $organizacion = Organization::findOrFail($id);

        // Si quieres asignar person_id automáticamente, lo haces aquí:
        $data['person_id'] = $organizacion->person_id; // opcional

        $organizacion->update($data);

        return redirect()->route('zonas.index')
                        ->with('success', 'Organización actualizada correctamente');
    }


}
