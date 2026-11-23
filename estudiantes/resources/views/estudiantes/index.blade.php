@extends('layouts.app')
@section('contenido')
    <h1>Registro de estudiantes</h1>
    <p><a href="{{ route('estudiantes.create') }}">Crear estudiante</a></p>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cuenta</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->numero_cuenta }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection