@extends('layouts.app')
@section('contenido')
    <h1>Editar libro</h1>
    <form method="POST" action="{{ route('libros.update', $libro->id) }}">
        @csrf
        @method('PUT')
        <p><label for="codigo">Código</label><br>
            <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $libro->codigo) }}" required>
        </p>
        <p><label for="titulo">Título</label><br>
            <input id="titulo" name="titulo" type="text" maxlength="150" value="{{ old('titulo', $libro->titulo) }}"
                required>
        </p>
        <p><label for="autor">Autor</label><br>
            <input id="autor" name="autor" type="text" maxlength="100" value="{{ old('autor', $libro->autor) }}" required>
        </p>
        <p><label for="anio_publicacion">Año de publicación</label><br>
            <input id="anio_publicacion" name="anio_publicacion" type="number"
                value="{{ old('anio_publicacion', $libro->anio_publicacion) }}" required>
        </p>
        <button type="submit">Actualizar</button>
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </form>
@endsection