@extends('layouts.app')
@section('contenido')
    <h1>Crear tarea</h1>
    <form method="POST" action="{{ route('tareas.store') }}">
        @csrf
        <p><label for="titulo">Título</label><br>
            <input id="titulo" name="titulo" type="text" maxlength="150" value="{{ old('titulo') }}" required>
        </p>
        <p><label for="descripcion">Descripción</label><br>
            <textarea id="descripcion" name="descripcion" maxlength="500" rows="4" cols="40"
                required>{{ old('descripcion') }}</textarea>
        </p>
        <p><label for="responsable">Responsable</label><br>
            <input id="responsable" name="responsable" type="text" maxlength="100" value="{{ old('responsable') }}"
                required>
        </p>
        <p><label for="fecha_limite">Fecha límite</label><br>
            <input id="fecha_limite" name="fecha_limite" type="date" value="{{ old('fecha_limite') }}" required>
        </p>
        <p><label for="estado">Estado</label><br>
            <select id="estado" name="estado" required>
                <option value="">Seleccione</option>
                @foreach (['pendiente', 'en proceso', 'completada'] as $opcion)
                    <option value="{{ $opcion }}" @selected(old('estado') === $opcion)>
                        {{ ucfirst($opcion) }}
                    </option>
                @endforeach
            </select>
        </p>
        <button type="submit">Guardar</button>
        <a href="{{ route('tareas.index') }}">Cancelar</a>
    </form>
@endsection