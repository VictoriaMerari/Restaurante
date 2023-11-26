@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
        <div class="section-title" >
          <p >
            <FONT SIZE=10>
                Crear Pais
            </FONT>

        </p>
          <br />
<table >
    <tr>
        <td align="justify">
    {!! Form::open(['url'=>'/paises']) !!}
        {!! Form::label ('nombre','Nombre del pais') !!}
        <br>
        {!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre del pais']) !!}
        <br>
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />

        {!! Form::label ('clave','Clave del pais') !!}
        <br>
        {!! Form::text ('clave',null,['placeholder'=>'Ingresa clave del pais']) !!}
        <br>
        @error('clave')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('paises') !!}">REGRESAR</a>
        {!! Form::submit('Guardar Pais', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        {!! Form::close() !!}
    </td>
    </tr>
</table>
</div>

    </section><!-- End Contact Section -->
@endsection()
