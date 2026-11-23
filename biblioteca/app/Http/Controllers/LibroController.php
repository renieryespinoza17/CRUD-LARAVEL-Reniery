<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id')->get();
    return view('libros.index',['libros' =>$libros]);
    }
}