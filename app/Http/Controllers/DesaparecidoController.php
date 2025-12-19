<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class DesaparecidoController extends Controller
{
    // Mostrar lista de desaparecidos
    public function index()
    {
        $humanos = Person::where('rol_id', 1)->get();
        return view('listasDesaparecidos', compact('humanos'));
    }

    // Mostrar formulario para registrar desaparecido
    public function create()
    {
        return view('desaparecidos'); // recomendable separar la vista
    }

    // Guardar nuevo desaparecido
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        $data['rol_id'] = 1; // Desaparecido

        Person::create($data);

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Desaparecido registrado correctamente');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $humanos = Person::findOrFail($id);
        return view('EditarDesaparecido', compact('humanos'));
    }





    // Actualizar datos
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);
        
        
        Person::findOrFail($id)->update($data);

        $humanos = Person::findOrFail($id);

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Desaparecido actualizado correctamente');
    }






    // Eliminar desaparecido
    public function destroy($id)
    {
        Person::findOrFail($id)->delete();

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Desaparecido eliminado correctamente');
    }

    // Listar aparecidos (rol_id = 2)
    public function mostrar_info_aparecidos()
    {
        $humanos = Person::where('rol_id', 2)->get();
        return view('listaAparecidos', compact('humanos'));
    }

    // Alternar rol_id (desaparecido ↔ aparecido)
    public function toggleEstado($id)
    {
        $humano = Person::findOrFail($id);
        $humano->rol_id = ($humano->rol_id == 1) ? 2 : 1;
        $humano->save();

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Estado actualizado correctamente');
    }
}
