<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('id')->get();
        return view('tareas.index', ['tareas' => $tareas]);
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => [
                'required',
                Rule::in(['pendiente', 'en proceso', 'completada'])
            ],
        ]);

        $tarea = new Tarea();
        $tarea->titulo = $datos['titulo'];
        $tarea->descripcion = $datos['descripcion'];
        $tarea->responsable = $datos['responsable'];
        $tarea->fecha_limite = $datos['fecha_limite'];
        $tarea->estado = $datos['estado'];
        $tarea->save();

        return redirect()->route('tareas.index')
            ->with('exito', 'Tarea creada correctamente.');
    }

    public function edit(int $id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit', ['tarea' => $tarea]);
    }

    public function update(Request $request, int $id)
    {
        $tarea = Tarea::findOrFail($id);

        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => [
                'required',
                Rule::in(['pendiente', 'en proceso', 'completada'])
            ],
        ]);

        $tarea->titulo = $datos['titulo'];
        $tarea->descripcion = $datos['descripcion'];
        $tarea->responsable = $datos['responsable'];
        $tarea->fecha_limite = $datos['fecha_limite'];
        $tarea->estado = $datos['estado'];
        $tarea->save();

        return redirect()->route('tareas.index')
            ->with('exito', 'Tarea actualizada correctamente.');
    }

    public function destroy(int $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('exito', 'Tarea eliminada correctamente.');
    }
}