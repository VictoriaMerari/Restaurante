@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">

    <h1>Detalle de venta</h1>

    <h2>Id venta: {!! $detalle_venta->id_venta !!}</h2>

    <h2>cliente: {!! $detalle_venta->ventas->users->nombre !!}</h2>

    <h2>Platillo: {!! $detalle_venta->menus->nombre !!}</h2>

    <h2>Cantidad: {!! $detalle_venta->cantidad !!}</h2>

    <h2>Precio: {!! $detalle_venta->precio_venta !!}</h2>

    <h2>Status: {!! $detalle_venta->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('detalles_venta') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()

