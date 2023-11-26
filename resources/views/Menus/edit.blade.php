@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Editar menu
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/menus/'.$menu->id]) !!}



        {!! Form::label ('nombre','Nombre del platillo') !!}
        {!! Form::text ('nombre',$menu->nombre,['placeholder'=>'Ingresa nombre del platillo']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('descripcion','Descripcion del platillo') !!}
        {!! Form::text ('descripcion',$menu->descripcion,['placeholder'=>'Ingresa descripcion del platillo']) !!}
        <br />
        @error('descripcion')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('precio','Precio del platillo') !!}
        {!! Form::text ('precio',$menu->precio,['placeholder'=>'Ingresa precio del platillo']) !!}
        <br />
        @error('precio')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        {!! Form::label ('id_categoria','Categoria:') !!}
        {!! Form::select ('id_categoria', $categorias->pluck('nombre','id')->all() ,  $menu->id_categoria ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_categoria')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />

        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('menus') !!}">REGRESAR</a>
        {!! Form::submit('Guardar Menu', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        <br>
        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
