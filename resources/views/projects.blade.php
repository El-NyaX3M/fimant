<x-app-layout>
<h1>PROJECTS</h1>
<label>{{Auth::user()->name}}</label>
<a href="{{route('projects.create')}}"><button>Crear Proyecto</button></a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" name="Cerrar sesión" value="Cerrar Sesión">
</form>

</x-app-layout>