@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de fotografias
            </FONT>
        </h2>
<br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="fotos_menu/create">Colocar nueva foto</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Platillo</th>
            <th>Imagen</th>
            <th>Ruta</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($fotos_menu as $foto_menu)
        <tr>
            <td>{!! $foto_menu->id !!}</td>
            <td>{!! $foto_menu->menus->nombre !!}</td>
            <td><img src="../storage/fotografias/{!! $foto_menu->ruta !!}" width="120" height="120" /> </td>
            <td>{!! $foto_menu->ruta !!}</td>
            <td>{!! $foto_menu->status !!}</td>
            <td>
                <a href="{!! 'fotos_menu/'.$foto_menu->id !!}">Detalle</a>
                <a href="{!! 'fotos_menu/'.$foto_menu->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/fotos_menu/'.$foto_menu->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
 </div>
</div>
</section>
    @endsection()

