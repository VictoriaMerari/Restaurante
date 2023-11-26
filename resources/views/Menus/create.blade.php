@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Crear Menu
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open(['url'=>'/menus']) !!}



        {!! Form::label ('nombre','Nombre del platillo') !!}
        {!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre del platillo']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('descripcion','Descripcion del platillo') !!}
        {!! Form::text ('descripcion',null,['placeholder'=>'Ingresa descripcion del platillo']) !!}
        <br />
        @error('descripcion')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('precio','Precio del platillo') !!}
        {!! Form::number ('precio',null,['placeholder'=>'Ingresa precio del platillo']) !!}
        <br />
        @error('precio')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('id_categoria','Categoria:') !!}
        {!! Form::select ('id_categoria', $categorias->pluck('nombre','id')->all() , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_categoria')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('menus') !!}">REGRESAR </a>
        {!! Form::submit('Guardar Menu', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
