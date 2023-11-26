@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Crear un nuevo metodo de pago
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open(['url'=>'/metodos_pago']) !!}

        {!! Form::label ('forma_pago','Dame la forma de pago') !!}
        {!! Form::text ('forma_pago',null,['placeholder'=>'Ingresa froma de pago']) !!}
        <br />
        @error('forma_pago')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        <a   class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('metodos_pago') !!}">REGRESAR</a>
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

