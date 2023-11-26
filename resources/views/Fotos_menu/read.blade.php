@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container"  align="center">

    <h1>Detalle de fotos</h1>

    <h2>Platillo: {!! $foto_menu->menus->nombre !!}</h2>

    <h2>Ruta <br>{!! $foto_menu->ruta !!}</h2>

    <h2>Imagen <br>
        <img src="../storage/app/fotografias/{!! $foto_menu->ruta !!}" width="120" height="120" />
        </h2>

    <h2>Status: {!! $foto_menu->status !!}</h2>

    <br />

    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('fotos_menu') !!}">REGRESAR</a>
</div>
</section><!-- End Contact Section -->
@endsection

