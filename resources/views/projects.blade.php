<x-app-layout>
<h1>PROJECTS</h1>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" name="Cerrar sesión" value="Cerrar Sesión">
</form>
</x-app-layout>