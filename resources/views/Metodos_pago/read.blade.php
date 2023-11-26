@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">
    <h1>Detalle de metodo de pago</h1>

    <h2>Forma de pago: {!! $metodo_pago->forma_pago !!}</h2>

    <h2>Status: {!! $metodo_pago->status !!}</h2>

    <br />

    <a   class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
    href="{!! asset('metodos_pago') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
