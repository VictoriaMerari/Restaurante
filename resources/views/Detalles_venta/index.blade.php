@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado del detalle de ventas
            </FONT>
        </h2>
<br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="detalles_venta/create">Crear un detalle de venta</a>
   <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Id_venta</th>
            <th>Menu</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($detalles_venta as $detalle_venta)
        <tr>
            <td>{!! $detalle_venta->id !!}</td>
            <td>{!! $detalle_venta->id_venta !!}</td>
            <td>{!! $detalle_venta->menus->nombre !!}</td>
            <td>{!! $detalle_venta->cantidad !!}</td>
            <td>{!! $detalle_venta->precio !!}</td>
            <td>{!! $detalle_venta->status !!}</td>
            <td>
                <a href="{!! 'detalles_venta/'.$detalle_venta->id !!}">Detalle</a>
                <a href="{!! 'detalles_venta/'.$detalle_venta->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/detalles_venta/'.$detalle_venta->id]) !!}
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

