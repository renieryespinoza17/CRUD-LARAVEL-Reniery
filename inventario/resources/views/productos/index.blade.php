@extends('layouts.app')
@section('contenido')
<h1>Inventario de productos</h1>
<table border="1">
<thead><tr>
<th>ID</th><th>Código</th><th>Nombre</th><th>Precio</th><th>Existencias</th>
</tr></thead>
<tbody>
@forelse ($productos as $producto)
<tr>
<td>{{ $producto->id }}</td>
<td>{{ $producto->codigo }}</td>
<td>{{ $producto->nombre }}</td>
<td>{{ number_format($producto->precio, 2) }}</td>
<td>
@if ($producto->existencias == 0)
Sin existencias
@else
{{ $producto->existencias }}
@endif
</td>
</tr>
@empty
<tr><td colspan="5">No hay productos registrados.</td></tr>
@endforelse
</tbody>
</table>
@endsection