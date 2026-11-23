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
}