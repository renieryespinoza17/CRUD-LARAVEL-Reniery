<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id')->get();
        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    }
    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'numero_cuenta' => [
                'required',
                'string',
                'max:20',
                'unique:estudiantes,numero_cuenta'
            ],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => [
                'required',
                'email',
                'max:255',
                'unique:estudiantes,correo'
            ],
            'fecha_nacimiento' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
        ]);

        $estudiante = new Estudiante();
        $estudiante->numero_cuenta = $datos['numero_cuenta'];
        $estudiante->nombre = $datos['nombre'];
        $estudiante->correo = $datos['correo'];
        $estudiante->fecha_nacimiento = $datos['fecha_nacimiento'];
        $estudiante->save();

        return redirect()->route('estudiantes.index')
            ->with('exito', 'Estudiante creado correctamente.');
    }
    public function edit(int $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', ['estudiante' => $estudiante]);
    }

    public function update(Request $request, int $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $datos = $request->validate([
            'numero_cuenta' => [
                'required',
                'string',
                'max:20',
                Rule::unique('estudiantes', 'numero_cuenta')
                    ->ignore($estudiante)
            ],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => [
                'required',
                'email',
                'max:255',
                Rule::unique('estudiantes', 'correo')->ignore($estudiante)
            ],
            'fecha_nacimiento' => [
                'required',
                'date',
                'before_or_equal:today'
            ],
        ]);

        $estudiante->numero_cuenta = $datos['numero_cuenta'];
        $estudiante->nombre = $datos['nombre'];
        $estudiante->correo = $datos['correo'];
        $estudiante->fecha_nacimiento = $datos['fecha_nacimiento'];
        $estudiante->save();

        return redirect()->route('estudiantes.index')
            ->with('exito', 'Estudiante actualizado correctamente.');
    }

}