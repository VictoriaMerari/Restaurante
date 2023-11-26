@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">
    <h1>Detalle de tipos de usuario</h1>

    <h2>Nombre: {!! $tipo_usuario->nombre !!}</h2>

    <h2>Nivel: {!! $tipo_usuario->nivel !!}</h2>

    <h2>Descripcion: {!! $tipo_usuario->descripcion !!}</h2>

    <h2>Status: {!! $tipo_usuario->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('tipos_usuario') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
