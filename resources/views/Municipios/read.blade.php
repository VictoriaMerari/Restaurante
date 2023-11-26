
@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">

    <h1>Detalle de municipio</h1>

    <h2>Id entidad: {!! $municipio->id_entidad !!}</h2>

    <h2>Nombre de la entidad: {!! $municipio->entidades->nombre !!}</h2>

    <h2>Nombre del pais: {!! $municipio->entidades->paises->nombre !!}</h2>

    <h2>Nombre: {!! $municipio->nombre !!}</h2>

    <h2>Status: {!! $municipio->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('municipios') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()

