@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Crear detalle venta
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open(['url'=>'/detalles_venta']) !!}

        {!! Form::label ('id_venta','venta:') !!}
        {!! Form::select ('id_venta', $ventas->pluck('id','id')->all() , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_venta')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />

        {!! Form::label ('id_menu','Platillo:') !!}
        {!! Form::select ('id_menu', $menus->pluck('nombre','id')->all() , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_menu')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('cantidad','cantidad de platillo') !!}
        {!! Form::number('cantidad', null, ['placeholder' => 'Ingresa cantidad']) !!}
        <br />
        @error('cantidad')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('precio_venta','Precio') !!}
        {!! Form::text ('precio_venta',null,['placeholder'=>'Ingresa precio']) !!}
        <br />
        @error('precio_venta')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('detalles_venta') !!}">REGRESAR</a>
        {!! Form::submit('Guardar', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}

        <br>
        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
