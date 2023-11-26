@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Modificar Categoria
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/categorias/'.$categoria->id]) !!}


        {!! Form::label ('nombre','Nombre de la categoria') !!}
        {!! Form::text ('nombre',$categoria->nombre,['placeholder'=>'Ingresa nombre de la categoria']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('descripcion','Descripcion de la categoria') !!}
        {!! Form::text ('descripcion',$categoria->descripcion,['placeholder'=>'Ingresa la descripcion de la categoria']) !!}
        <br />
        @error('descripcion')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />


        <br />
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('categorias') !!}">REGRESAR</a>
        {!! Form::submit('Guardar Categoria', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        <br>

        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
