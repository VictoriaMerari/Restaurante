@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
    <h1>Listado de Entidades  {{$user -> nombre}}</h1>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"  href="entidades/create">Crear un nueva Entidad</a>
    <br> <br>
    <table>
        <tr>
            <th>ID</th>
            <th>ID pais</th>
            <th>Clave de pais</th>
            <th>Nombre</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($entidades as $entidad)
        <tr>
            <td>{!! $entidad->id !!}</td>
            <td>{!! $entidad->id_pais !!}</td>
            <td>{!! $entidad->paises->clave !!}</td>
            <td>{!! $entidad->nombre !!}</td>
            <td>{!! $entidad->status !!}</td>
            <td>
                <a href="{!! 'entidades/'.$entidad->id !!}">Detalle</a>
                <a href="{!! 'entidades/'.$entidad->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/entidades/'.$entidad->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
</body>
</html>

