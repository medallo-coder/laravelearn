<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\User;

class OrganizationController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        return view('FormOrganizaciones');
    }

    // Guardar datos
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_organizacion' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            // 'person_id' => 'nullable|exists:users,id' // opcional
        ]);

        Organization::create($data);

        return redirect()->route('zonas.index');
    }

    // Listar datos
    public function index()
    {
        $organizaciones = Organization::all();
        return view('listaOrganizaciones', compact('organizaciones'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $organizaciones = Organization::findOrFail($id);
        return view('EditarOrganizacion', compact('organizaciones'));
    }

    // Actualizar datos
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre_organizacion' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            // 'person_id' => 'nullable|exists:users,id'
        ]);

        $organizacion = Organization::findOrFail($id);

        // Mantener la relación existente
        $data['person_id'] = $organizacion->person_id;

        $organizacion->update($data);

        return redirect()->route('zonas.index')
                         ->with('success', 'Organización actualizada correctamente');
    }
}
