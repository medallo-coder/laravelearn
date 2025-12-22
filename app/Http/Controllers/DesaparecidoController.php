<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Characteristic;
use App\Models\Outfit;
class DesaparecidoController extends Controller
{
    // Mostrar lista de desaparecidos 
    public function index()
    {
        $humanos = User::where('rol_id', 1)->get();
        return view('listasDesaparecidos', compact('humanos'));
    }

    // Mostrar formulario para registrar desaparecido
    public function create()
    {
        return view('desaparecidos');
    }

    // Guardar nuevo desaparecido

public function store(Request $request)
{
    $request->validate([
        // FASE 1
        'nombres'            => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'apellidos'          => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'descripcion'        => 'required|string|max:300',
        'lugar_desaparicion' => 'required|string|max:255',
        'fecha_desaparicion' => 'required|date',

        // FASE 2
        'sexo'               => 'nullable|in:hombre,mujer',
        'edad'               => 'nullable|integer|digits_between:1,3',
        'estatura'           => 'nullable|string|max:50',
        'complexion'         => 'nullable|string|max:255',
        'color_piel'         => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'color_ojos'         => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'color_cabello'      => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'tipo_cabello'       => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'senas_particulares' => 'nullable|string',
        'implantes'          => 'nullable|string|max:255',
        'protesis'           => 'nullable|string|max:255',

        // FASE 3
        'parte_superior'     => 'nullable|string|max:255',
        'color_superior'     => 'nullable|string|max:255',
        'parte_inferior'     => 'nullable|string|max:255',
        'color_inferior'     => 'nullable|string|max:255',
        'calzado'            => 'nullable|string|max:255',
        'color_calzado'      => 'nullable|string|max:255',
        'accesorios'         => 'nullable|string|max:255',
    ], [
        'required' => 'Debe llenar todos los campos obligatorios',
    ]);

    DB::transaction(function () use ($request) {

        //   USER (persona principal)
        $user = User::create([
            'nombres'            => $request->nombres,
            'apellidos'          => $request->apellidos,
            'descripcion'        => $request->descripcion,
            'lugar_desaparicion' => $request->lugar_desaparicion,
            'fecha_desaparicion' => $request->fecha_desaparicion,
            'rol_id'             => 1,
        ]);

        //  CHARACTERISTICS
        Characteristic::create([
            'sexo'               => $request->sexo,
            'edad'               => $request->edad,
            'estatura'           => $request->estatura,
            'complexion'         => $request->complexion,
            'color_piel'         => $request->color_piel,
            'color_ojos'         => $request->color_ojos,
            'color_cabello'      => $request->color_cabello,
            'tipo_cabello'       => $request->tipo_cabello,
            'senas_particulares' => $request->senas_particulares,
            'implantes'          => $request->implantes,
            'protesis'           => $request->protesis,
            'persona_id'         => $user->id,
        ]);

        //  OUTFITS
        Outfit::create([
            'parte_superior' => $request->parte_superior,
            'color_superior' => $request->color_superior,
            'parte_inferior' => $request->parte_inferior,
            'color_inferior' => $request->color_inferior,
            'calzado'        => $request->calzado,
            'color_calzado'  => $request->color_calzado,
            'accesorios'     => $request->accesorios,
            'persona_id'     => $user->id,
        ]);
    });

    return redirect()
        ->route('desaparecidos.index')
        ->with('success', 'Desaparecido registrado correctamente');
}


    // Mostrar formulario de edición
    public function edit($id)
    {
        $humanos = User::findOrFail($id);
        return view('EditarDesaparecido', compact('humanos'));
    }

    // Actualizar datos
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        User::findOrFail($id)->update($data);

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Desaparecido actualizado correctamente');
    }

    // Eliminar desaparecido
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Desaparecido eliminado correctamente');
    }

    // Listar aparecidos (rol_id = 2)
    public function mostrar_info_aparecidos()
    {
        $humanos = User::where('rol_id', 2)->get();
        return view('listaAparecidos', compact('humanos'));
    }

    // Alternar rol_id (desaparecido ↔ aparecido)
    public function toggleEstado($id)
    {
        $humano = User::findOrFail($id);
        $humano->rol_id = ($humano->rol_id == 1) ? 2 : 1;
        $humano->save();

        return redirect()->route('desaparecidos.index')
                         ->with('success', 'Estado actualizado correctamente');
    }
}
