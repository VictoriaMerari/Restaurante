@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">

    <h1>Detalle de menu</h1>

    <h2>Nombre del platillo: {!! $menu->nombre !!}</h2>

    <h2>Descripcion: {!! $menu->descripcion !!}</h2>

    <h2>Precio: {!! $menu->precio !!}</h2>

    <h2>Categoria: {!! $menu->categorias->nombre !!}</h2>

    <h2>Status: {!! $menu->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('menus') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection()
