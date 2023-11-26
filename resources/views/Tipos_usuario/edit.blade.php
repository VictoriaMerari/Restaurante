@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Editar un tipo de usuario
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/tipos_usuario/'.$tipo_usuario->id]) !!}


        {!! Form::label ('nombre','Nombre del tipo de usuario') !!}
        {!! Form::text ('nombre',$tipo_usuario ->nombre,['placeholder'=>'Ingresa nombre del tipo de usuario']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('nivel','nivel del tipo de usuario') !!}
        {!! Form::text ('nivel',$tipo_usuario ->nivel ,['placeholder'=>'Ingresa nivel del tipo de usuario']) !!}
        <br />
        @error('nivel')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('descripcion','descripcion del tipo de usuario') !!}
        {!! Form::text ('descripcion',$tipo_usuario ->descripcion ,['placeholder'=>'Ingresa descripcion del tipo de usuario']) !!}
        <br />
        @error('descripcion')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />
        <a   class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('tipos_usuario') !!}">REGRESAR</a>
        {!! Form::submit('Guardar', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        {!! Form::close() !!}
    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
