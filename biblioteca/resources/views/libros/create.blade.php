@extends('layouts.app')
@section('contenido')
    <h1>Crear libro</h1>
    <form method="POST" action="{{ route('libros.store') }}">
        @csrf
        <p><label for="codigo">Código</label><br>
            <input id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" required>
        </p>
        <p><label for="titulo">Título</label><br>
            <input id="titulo" name="titulo" type="text" maxlength="150" value="{{ old('titulo') }}" required>
        </p>
        <p><label for="autor">Autor</label><br>
            <input id="autor" name="autor" type="text" maxlength="100" value="{{ old('autor') }}" required>
        </p>
        <p><label for="anio_publicacion">Año de publicación</label><br>
            <input id="anio_publicacion" name="anio_publicacion" type="number" value="{{ old('anio_publicacion') }}"
                required>
        </p>
        <button type="submit">Guardar</button>
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </form>
@endsection