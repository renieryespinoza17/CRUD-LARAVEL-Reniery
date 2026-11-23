@extends ('layouts.app')
@section('contenido')

<h1>Inicia Sesion</h1>
<form method="POST" action="{{ route('login.store') }}">
@csrf
<p> <label for="username">Usuario</label><br>
<input id="username" name="username" type="text"
value="{{ old('username') }}" required></p>
<p><label for="password">Contrasena</label><br>
<input id="password" name="password" type="password" required></p>
<button type="submit">Ingresar</button>
</form>

@endsection