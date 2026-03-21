@extends ('layouts.app')
@section ('titulopagina', 'Empresa E-commerce')
@push('css')
<style>
    .fondo{
background: #302886;
    }
    .img-responsive{
width: 100%;
height: 100%;
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
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($listadousuarios as $usuario)
            <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->calle}}</td>
                <td><button class='btn btn-primary' onclick="carga_modal({{$usuario->id}}, '{{$usuario->name}}', '{{$usuario->calle}}')" data-id="{{$usuario->id}}" data-nombre="{{$usuario->name}}" data-calle="{{$usuario->calle}}" data-toggle="modal" data-target="#myModal"><span class='fa fa-pencil'></span></button>
                <button class='btn btn-warning' onclick="desactivar_usuario({{$usuario->id}})"><span class='fa fa-ban'></span></button>
                <button class='btn btn-danger' onclick="eliminar_usuario({{$usuario->id}})"><span class='fa fa-trash'></span></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>       
    @else
    <p>La variable de listado de usuarios no esta definida</p>
    @endif
</ul>
@endsection
