@extends('layouts.app')
@section('contenido')
<h1>Editar estudiante</h1>
<form method="POST"
      action="{{ route('estudiantes.update', $estudiante->id) }}">
@csrf
@method('PUT')
<p><label for="numero_cuenta">Número de cuenta</label><br>
<input id="numero_cuenta" name="numero_cuenta" type="text" maxlength="20"
       value="{{ old('numero_cuenta', $estudiante->numero_cuenta) }}" required></p>
<p><label for="nombre">Nombre</label><br>
<input id="nombre" name="nombre" type="text" maxlength="100"
       value="{{ old('nombre', $estudiante->nombre) }}" required></p>
<p><label for="correo">Correo</label><br>
<input id="correo" name="correo" type="email"
       value="{{ old('correo', $estudiante->correo) }}" required></p>
<p><label for="fecha_nacimiento">Fecha de nacimiento</label><br>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
       value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento->format('Y-m-d')) }}"
       required></p>
<button type="submit">Actualizar</button>
<a href="{{ route('estudiantes.index') }}">Cancelar</a>
</form>
@endsection