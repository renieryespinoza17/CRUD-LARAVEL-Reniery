@extends('layouts.app')
@section('contenido')
    <h1>Crear estudiante</h1>
    <form method="POST" action="{{ route('estudiantes.store') }}">
        @csrf
        <p><label for="numero_cuenta">Número de cuenta</label><br>
            <input id="numero_cuenta" name="numero_cuenta" type="text" maxlength="20" value="{{ old('numero_cuenta') }}"
                required>
        </p>
        <p><label for="nombre">Nombre</label><br>
            <input id="nombre" name="nombre" type="text" maxlength="100" value="{{ old('nombre') }}" required>
        </p>
        <p><label for="correo">Correo</label><br>
            <input id="correo" name="correo" type="email" value="{{ old('correo') }}" required>
        </p>
        <p><label for="fecha_nacimiento">Fecha de nacimiento</label><br>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" required>
        </p>
        <button type="submit">Guardar</button>
        <a href="{{ route('estudiantes.index') }}">Cancelar</a>
    </form>
@endsection