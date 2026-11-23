<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::orderBy('id')->get();
        return view('mascotas.index', ['mascotas' => $mascotas]);
    }
    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:50',
                'unique:mascotas,codigo'
            ],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', 'in:perro,gato,otro'],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
        ]);

        $mascota = new Mascota();
        $mascota->codigo = $datos['codigo'];
        $mascota->nombre = $datos['nombre'];
        $mascota->especie = $datos['especie'];
        $mascota->propietario = $datos['propietario'];
        $mascota->fecha_nacimiento = $datos['fecha_nacimiento'];
        $mascota->save();

        return redirect()->route('mascotas.index')
            ->with('exito', 'Mascota creada correctamente.');
    }

    public function edit(int $id)
{
    $mascota = Mascota::findOrFail($id);
    return view('mascotas.edit', ['mascota' => $mascota]);
}

public function update(Request $request, int $id)
{
    $mascota = Mascota::findOrFail($id);

    $datos = $request->validate([
        'codigo' => ['required', 'string', 'max:50',
            Rule::unique('mascotas', 'codigo')->ignore($mascota)],
        'nombre' => ['required', 'string', 'max:80'],
        'especie' => ['required', 'in:perro,gato,otro'],
        'propietario' => ['required', 'string', 'max:100'],
        'fecha_nacimiento' => ['required', 'date',
            'before_or_equal:today'],
    ]);

    $mascota->codigo = $datos['codigo'];
    $mascota->nombre = $datos['nombre'];
    $mascota->especie = $datos['especie'];
    $mascota->propietario = $datos['propietario'];
    $mascota->fecha_nacimiento = $datos['fecha_nacimiento'];
    $mascota->save();

    return redirect()->route('mascotas.index')
        ->with('exito', 'Mascota actualizada correctamente.');
}
}