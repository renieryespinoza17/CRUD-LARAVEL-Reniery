@extends('layouts.app')
@section('contenido')
    <h1>Editar mascota</h1>
    <form method="POST" action="{{ route('mascotas.update', $mascota->id) }}">
        @csrf
        @method('PUT')
        <p><label for="codigo">Código</label><br>
            <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $mascota->codigo) }}" required>
        </p>
        <p><label for="nombre">Nombre</label><br>
            <input id="nombre" name="nombre" type="text" maxlength="80" value="{{ old('nombre', $mascota->nombre) }}"
                required>
        </p>
        <p><label for="especie">Especie</label><br>
            <select id="especie" name="especie" required>
                <option value="">Seleccione</option>
                @foreach (['perro', 'gato', 'otro'] as $opcion)
                    <option value="{{ $opcion }}" @selected(old('especie', $mascota->especie) === $opcion)>
                        {{ ucfirst($opcion) }}
                    </option>
                @endforeach
            </select>
        </p>
        <p><label for="propietario">Propietario</label><br>
            <input id="propietario" name="propietario" type="text" maxlength="100"
                value="{{ old('propietario', $mascota->propietario) }}" required>
        </p>
        <p><label for="fecha_nacimiento">Fecha de nacimiento</label><br>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
                value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento->format('Y-m-d')) }}" required>
        </p>
        <button type="submit">Actualizar</button>
        <a href="{{ route('mascotas.index') }}">Cancelar</a>
    </form>
@endsection