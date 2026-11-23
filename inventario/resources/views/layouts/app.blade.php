<!DOCTYPE html>
<html>

<head><title>Inventario</title></head>
<body>
    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button> Cerrar sesion</button>

    </form>
    @endauth
    @foreach ($errors->all() as $error)
    <p>{{ $error }} </p>
    @endforeach 
    @yield('contenido')   
</body>
</html>