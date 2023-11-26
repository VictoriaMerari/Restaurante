@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">
    <h1>Detalle de entidad</h1>

    <h2>Clave de pais: {!! $entidad->id_pais !!}</h2>

    <h2>Pais: {!! $entidad->paises->nombre !!}</h2>

    <h2>Nombre: {!! $entidad->nombre !!}</h2>

    <h2>Status: {!! $entidad->status !!}</h2>

    <br />

    <a   class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('entidades') !!}">REGRESAR</a>

</div>
</section><!-- End Contact Section -->
@endsection()
