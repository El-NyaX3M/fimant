<h1>LOGIN</h1>
<form action="{{route('login')}}" method="post">
    @csrf
    <label for="email">Correo</label><br>
    <input type="email" name="email" id="email">
    <br><br>
    <label for="password">Contraseña</label><br>
    <input type="password" name="password" id="password">
    <input type="submit" name="Iniciar Sesión">
</form>