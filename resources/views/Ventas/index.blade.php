@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de venta
            </FONT>
        </h2>
<br>
  <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="ventas/create">Agregar una nueva venta</a>
  <br>
  <br>
    <table >
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Iva</th>
            <th>Total</th>
            <th>Usuario</th>
            <th>Metodo de pago</th>
            <th>Descuento</th>
            <th>Acciones</th>
        </tr>
        @foreach($ventas as $venta)
        <tr>
            <td>{!! $venta->id !!}</td>
            <td>{!! $venta->fecha !!}</td>
            <td>{!! $venta->subtotal !!}</td>
            <td>{!! $venta->iva !!}</td>
            <td>{!! $venta->total !!}</td>
            <td>{!! $venta->users->nombre !!}</td>
            <td>{!! $venta->metodos_pago->forma_pago !!}</td>
            <td>{!! $venta->descuento !!}</td>
            <td>
                <a href="{!! 'ventas/'.$venta->id !!}">Detalle</a>
                <a href="{!! 'ventas/'.$venta->id.'/edit' !!}">Editar</a>
                {!! Form::open(['method' => 'DELETE' , 'url' => '/ventas/'.$venta->id]) !!}
                      {!! Form::submit('Eliminar') !!}
                        {!! Form::close() !!}

            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br> <br>
    <a  class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
 </div>
</div>
</section>
    @endsection()
