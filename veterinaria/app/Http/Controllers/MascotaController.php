<?php

namespace App\Http\Controllers;

use App\Models\Mascota;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::orderBy('id')->get();
        return view('mascotas.index', ['mascotas' => $mascotas]);
    }
}