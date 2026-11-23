<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Libro;
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id')->get();
        return view('libros.index', ['libros' => $libros]);
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'unique:libros,codigo'],
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:100'],
            'anio_publicacion' => [
                'required',
                'integer',
                'between:1450,' . date('Y')
            ],
        ]);

        $libro = new Libro();
        $libro->codigo = $datos['codigo'];
        $libro->titulo = $datos['titulo'];
        $libro->autor = $datos['autor'];
        $libro->anio_publicacion = $datos['anio_publicacion'];
        $libro->save();

        return redirect()->route('libros.index')
            ->with('exito', 'Libro creado correctamente.');
    }

    public function edit(int $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', ['libro' => $libro]);
    }

    public function update(Request $request, int $id)
    {
        $libro = Libro::findOrFail($id);

        $datos = $request->validate([
            'codigo' => [
                'required',
                'string',
                Rule::unique('libros', 'codigo')->ignore($libro)
            ],
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:100'],
            'anio_publicacion' => [
                'required',
                'integer',
                'between:1450,' . date('Y')
            ],
        ]);

        $libro->codigo = $datos['codigo'];
        $libro->titulo = $datos['titulo'];
        $libro->autor = $datos['autor'];
        $libro->anio_publicacion = $datos['anio_publicacion'];
        $libro->save();

        return redirect()->route('libros.index')
            ->with('exito', 'Libro actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('exito', 'Libro eliminado correctamente.');
    }
}