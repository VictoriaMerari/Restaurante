@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de Tipos de usuarios
            </FONT>
        </h2>
<br>
  <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="tipos_usuario/create">Agregar un tipo de usuario</a>
  <br>
  <br>
    <table >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($tipos_usuario as $tipo_usuario)
        <tr>
            <td>{!! $tipo_usuario->id !!}</td>
            <td>{!! $tipo_usuario->nombre !!}</td>
            <td>{!! $tipo_usuario->nivel !!}</td>
            <td>{!! $tipo_usuario->descripcion !!}</td>
            <td>{!! $tipo_usuario->status !!}</td>
            <td>
                <a href="{!! 'tipos_usuario/'.$tipo_usuario->id !!}">Detalle</a>
                <a href="{!! 'tipos_usuario/'.$tipo_usuario->id.'/edit' !!}">Editar</a>
                {!! Form::open(['method' => 'DELETE' , 'url' => '/tipos_usuario/'.$tipo_usuario->id]) !!}
                      {!! Form::submit('Eliminar') !!}
                        {!! Form::close() !!}

            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br> <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
 </div>
</div>
</section>
    @endsection()
