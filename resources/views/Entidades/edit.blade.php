@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
        <div class="section-title" >
          <p >
            <FONT SIZE=10>
               Editar Entidad
            </FONT>

        </p>
          <br />
<table >
    <tr>
        <td align="justify">
        {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/entidades/'.$entidad->id]) !!}

        {!! Form::label ('id_pais','Pais:') !!}
        {!! Form::select ('id_pais', $paises->pluck('nombre','id')->all() , $entidad->id_pais ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_pais')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <br />

        {!! Form::label ('nombre','Nombre de la entidad') !!}
        {!! Form::text ('nombre',$entidad->nombre,['placeholder'=>'Ingresa nombre de la entidad']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        <a  class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('entidades') !!}">REGRESAR</a>
        {!! Form::submit('Editar Entidad', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        {!! Form::close() !!}
    </td>
</tr>
</table>

</section><!-- End Contact Section -->
@endsection()


