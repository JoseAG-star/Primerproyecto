@extends ('layouts.app')
@section ('titulopagina', 'Empresa E-commerce')
@push('css')
<style>
    .fondo{

    }
</style>
@endpush

@section ('titulo')
Bienvenido a la pagina de EC
@endsection

@section ('subtitulo')
Explorando las oportunidades en Laravel 12
@endsection

@section('link1', 'Active')
@section('titulo1')
<h1>About me</h1>
@endsection
@section("descripcion_about")
({$descripcion_about})
@endsection
@section("Autor")
({$nombre})
@endsection
@section("actividad", $actividad)
@section("texto_ejemplo")
({$texto_ejemplo})
@endsection
@section("contenido_listado")
<h2>Listado de usuarios registrados</h2>
<ul>
    @if (isset($listadousuarios))
    <table id='tablausuarios' class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Calle</th>

            </tr>
        </thead>
        <tbody>
            @foreach(listadousuarios as $usuario)
            <tr>
                <td>({$usuario->name})</td>
                <td>({$usuario->email})</td>
                <td>({$usuario->telefono})</td>
                <td>({$usuario->calle})</td>
            </tr>
            @endforeach
        </tbody>
    </table>       
    @else
    <p>La variable de listado de usuarios no esta definida</p>
    @endif
</ul>
@endsection
