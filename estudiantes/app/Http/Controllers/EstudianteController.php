<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id')->get();
        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    }
}