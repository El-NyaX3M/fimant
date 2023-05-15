<h1>REGISTER</h1>
<form action="{{route('register.create')}}" method="post">
    @csrf
    <label for="name">Nombre: </label>
    <input type="text" name="name" id="name">
    <br><br>
    <label for="email">Correo: </label>
    <input type="email" name="email" id="email">
    <br><br>
    <label for="password">Contraseña: </label>
    <input type="password" name="password" id="password">
    <br><br>
    <label for="repPass">Repetir Contraseña: </label>
    <input type="password" name="repPass" id="repPass">
    <br><br>
    <input type="submit" name="Enviar" id="Enviar">
</form>