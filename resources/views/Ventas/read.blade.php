@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">
    <h1>Detalle de venta</h1>

    <h2>Nombre: {!! $venta->fecha !!}</h2>

    <h2>Subtotal: {!! $venta->subtotal !!}</h2>

    <h2>Iva: {!! $venta->iva !!}</h2>

    <h2>Total: {!! $venta->total !!}</h2>

    <h2>Nombre de usuario: {!! $venta->users->nombre !!}</h2>

    <h2>Metodo de pago: {!! $venta->metodos_pago->forma_pago !!}</h2>

    <h2>Descuento: {!! $venta->descuento !!}</h2>

    <h2>Status: {!! $venta->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('ventas') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
