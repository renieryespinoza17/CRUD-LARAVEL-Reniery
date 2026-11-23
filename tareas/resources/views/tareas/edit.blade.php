@extends('layouts.app')
@section('contenido')
    <h1>Editar tarea</h1>
    <form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
        @csrf
        @method('PUT')
        <p><label for="titulo">Título</label><br>
            <input id="titulo" name="titulo" type="text" maxlength="150" value="{{ old('titulo', $tarea->titulo) }}"
                required>
        </p>
        <p><label for="descripcion">Descripción</label><br>
            <textarea id="descripcion" name="descripcion" maxlength="500" rows="4" cols="40"
                required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
        </p>
        <p><label for="responsable">Responsable</label><br>
            <input id="responsable" name="responsable" type="text" maxlength="100"
                value="{{ old('responsable', $tarea->responsable) }}" required>
        </p>
        <p><label for="fecha_limite">Fecha límite</label><br>
            <input id="fecha_limite" name="fecha_limite" type="date"
                value="{{ old('fecha_limite', $tarea->fecha_limite->format('Y-m-d')) }}" required>
        </p>
        <p><label for="estado">Estado</label><br>
            <select id="estado" name="estado" required>
                <option value="">Seleccione</option>
                @foreach (['pendiente', 'en proceso', 'completada'] as $opcion)
                    <option value="{{ $opcion }}" @selected(old('estado', $tarea->estado) === $opcion)>
                        {{ ucfirst($opcion) }}
                    </option>
                @endforeach
            </select>
        </p>
        <button type="submit">Actualizar</button>
        <a href="{{ route('tareas.index') }}">Cancelar</a>
    </form>
@endsection