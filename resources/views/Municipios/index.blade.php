@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de Municipios
            </FONT>
        </h2>
<br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="municipios/create">Crear un nuevo Municipio</a>
<br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Id_entidad</th>
            <th>Entidad</th>
            <th>Pais</th>
            <th>Nombre</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($municipios as $municipio)
        <tr>
            <td>{!! $municipio->id !!}</td>
            <td>{!! $municipio->id_entidad !!}</td>
            <td>{!! $municipio->entidades->nombre !!}</td>
            <td>{!! $municipio->entidades->paises->nombre !!}</td>
            <td>{!! $municipio->nombre !!}</td>
            <td>{!! $municipio->status !!}</td>
            <td>
                <a href="{!! 'municipios/'.$municipio->id !!}">Detalle</a>
                <a href="{!! 'municipios/'.$municipio->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/municipios/'.$municipio->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br> <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR AL INICIO</a>
 </div>
</div>
</section>
    @endsection()

