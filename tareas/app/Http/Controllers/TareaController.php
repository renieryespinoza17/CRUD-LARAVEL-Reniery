<?php

namespace App\Http\Controllers;

use App\Models\Tarea;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('id')->get();
        return view('tareas.index', ['tareas' => $tareas]);
    }
}