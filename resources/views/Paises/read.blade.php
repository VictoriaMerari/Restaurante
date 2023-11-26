@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">
    <h1>Detalle de pais</h1>

    <h2>Nombre: {!! $pais->nombre !!}</h2>

    <h2>Clave: {!! $pais->clave !!}</h2>

    <h2>Status: {!! $pais->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('paises') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
