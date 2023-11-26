@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Comentarios
            </FONT>
        </h2>
<br>
 <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th>Contenido</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($correos as $correo)
        <tr>
            <td>{!! $correo->id !!}</td>
            <td>{!! $correo->destinatario !!}</td>
            <td>{!! $correo->asunto !!}</td>
            <td>{!! $correo->contenido !!}</td>
            <td>{!! $correo->fecha !!}</td>
            <td>{!! $correo->status !!}</td>
            <td>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/correos/'.$correo->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br> <br>
    <a href="{!! asset('bienvenidaAdmin') !!}">REGRESAR AL INICIO</a>
 </div>
</div>
</section>
    @endsection()

