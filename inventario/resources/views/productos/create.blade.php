@extends('layouts.app')
@section('contenido')
    <h1>Crear producto</h1>
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf
        <p><label for="codigo">Código</label><br>
            <input id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" required>
        </p>
        <p><label for="nombre">Nombre</label><br>
            <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre') }}" required>
        </p>
        <p><label for="precio">Precio</label><br>
            <input id="precio" name="precio" type="number" step="0.01" value="{{ old('precio') }}" required>
        </p>
        <p><label for="existencias">Existencias</label><br>
            <input id="existencias" name="existencias" type="number" step="1" value="{{ old('existencias') }}" required>
        </p>
        <button type="submit">Guardar</button>
        <a href="{{ route('productos.index') }}">Cancelar</a>
    </form>
@endsection