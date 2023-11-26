@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de Menu
            </FONT>
        </h2>
<br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="menus/create">Crear un nuevo Menu</a>
   <br> <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->nombre !!}</td>
            <td>{!! $menu->precio !!}</td>
            <td>{!! $menu->descripcion !!}</td>
            <td>{!! $menu->categorias->nombre !!}</td>
            <td>{!! $menu->status !!}</td>
            <td>
                <a href="{!! 'menus/'.$menu->id !!}">Detalle</a>
                <a href="{!! 'menus/'.$menu->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/menus/'.$menu->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"  href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>

     </div>
</div>
</section>
    @endsection()

