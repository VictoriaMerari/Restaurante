@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
             Agregar foto
          </FONT>

      </p>
        <br />
<table >
  <tr>
      <td align="justify">

    {!! Form::open(['url'=>'/fotos_menu/', 'enctype' =>'multipart/form-data']) !!}

        {!! Form::label ('id_menu','Platillo:') !!}
        {!! Form::select ('id_menu', $menus->pluck('nombre','id')->all() , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        <br />
        <br />

        {!! Form::hidden('ruta','fotografias') !!}

        {!! Form::label ('foto','seleccionar foto')!!}
        {!! Form::file('foto', null, ['accept'=> '.jpg,.jpeg,.bmp,.png,.doc,.docx']) !!}

        <br />
        <br />

        {!! Form::label ('status','Estatus:') !!}
        {!! Form::select ('status',
        array('1'=>'Activo','0'=>'Baja') , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        <br />
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('fotos_menu') !!}">REGRESAR</a>
         {!! Form::submit('Guardar Foto', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
