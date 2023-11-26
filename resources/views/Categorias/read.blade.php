@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">

    <h1>Detalle de categoria</h1>

    <h2>Nombre del pais: {!! $categoria->nombre !!}</h2>

    <h2>Descripcion: {!! $categoria->descripcion !!}</h2>

    <h2>Status: {!! $categoria->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('categorias') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
