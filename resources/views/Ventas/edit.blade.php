@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
        <div class="section-title" >
          <p >
            <FONT SIZE=10>
                Editar Venta
            </FONT>

        </p>
          <br />
<table >
    <tr>
        <td align="justify">
    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/ventas/'.$venta->id]) !!}
        {!! Form::label ('fecha','Ingresa la fecha') !!}
        <br>
        {!! Form::date ('fecha',$venta->fecha,['placeholder'=>'Ingresa la fecha']) !!}
        <br />
        @error('fecha')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('subtotal','Subtotal') !!}
        <br>
        {!! Form::text ('subtotal',$venta->subtotal ,['placeholder'=>'Ingresa subtotal']) !!}
        <br />
        @error('subtotal')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('iva','Iva') !!}
        <br>
        {!! Form::text ('iva',$venta->iva ,['placeholder'=>'Iva']) !!}
        <br />
        @error('iva')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('total','Total') !!}
        <br>
        {!! Form::text ('total',$venta->total ,['placeholder'=>'Ingresa total']) !!}
        <br />
        @error('total')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('descuento','Descuento') !!}
        <br>
        {!! Form::text ('descuento',$venta->descuento ,['placeholder'=>'Ingresa descuento']) !!}
        <br />
        @error('descuento')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('id_user','Usuarios:') !!}
        <br>
        {!! Form::select ('id_user', $users->pluck('nombre','id')->all() , $venta->id_user ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_user')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('id_metodo_pago','Metodo de pago:') !!}
        <br>
        {!! Form::select ('id_metodo_pago', $metodos_pago->pluck('forma_pago','id')->all() , $venta->id_metodo_pago ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_metodo_pago')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />


        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('ventas') !!}">REGRESAR</a>
        {!! Form::submit('Guardar venta', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
       {!! Form::close() !!}
    </td>
    </tr>
</table>
</div>

    </section><!-- End Contact Section -->
@endsection()
