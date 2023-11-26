@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de Paises
            </FONT>
        </h2>
<br>
  <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="paises/create">Agregar un nuevo pais</a>
  <br>
  <br>
    <table >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($paises as $pais)
        <tr>
            <td>{!! $pais->id !!}</td>
            <td>{!! $pais->nombre !!}</td>
            <td>{!! $pais->clave !!}</td>
            <td>{!! $pais->status !!}</td>
            <td>
                <a href="{!! 'paises/'.$pais->id !!}">Detalle</a>
                <a href="{!! 'paises/'.$pais->id.'/edit' !!}">Editar</a>
                {!! Form::open(['method' => 'DELETE' , 'url' => '/paises/'.$pais->id]) !!}
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
