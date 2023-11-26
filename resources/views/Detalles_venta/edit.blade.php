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

    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/detalles_venta/'.$detalle_venta->id]) !!}

        {!! Form::label ('id_venta','venta:') !!}
        {!! Form::select ('id_venta', $ventas->pluck('id','id')->all() , $detalle_venta->id_venta ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_venta')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />

        {!! Form::label ('id_menu','Platillo:') !!}
        {!! Form::select ('id_menu', $menus->pluck('nombre','id')->all() , $detalle_venta->id_menu ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_menu')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('cantidad','cantidad de platillo') !!}
        {!! Form::number('cantidad', $detalle_venta->cantidad, ['placeholder' => 'Ingresa cantidad']) !!}  <br />
        @error('cantidad')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('precio_venta','Precio') !!}
        {!! Form::text ('precio_venta', $detalle_venta->precio_venta ,['placeholder'=>'Ingresa precio']) !!}
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
