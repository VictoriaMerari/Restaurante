@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
        <div class="section-title" >
          <p >
            <FONT SIZE=10>
               Editar Municipio
            </FONT>

        </p>
          <br />
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function cambiar_combo(id_pais) {
        $("#id_entidad").empty();
        var ruta = "{{ asset('combo_entidad_muni') }}/"+id_pais;
        $.ajax({
          type:'GET',
          url: ruta,

          success:function(data){

            var entidades = data;

            $('#id_entidad').append('<option value="">Seleccionar ...</option>');

            for (var i = 0; i < entidades.length; i++){
              $('#id_entidad').append('<option value="' + entidades[i].id + '">' +
              entidades[i].nombre + '</option>');
            }
          }
        });
    }
</script>

<table >
    <tr>
        <td align="justify">

    {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/municipios/'.$municipio->id]) !!}

    {!! Form::label ('id_pais','Pais:',['class'=>'control-label']) !!}
    {!! Form::select ('id_pais', $paises->pluck('nombre','id')->all() , $municipio->entidades->id_pais
      ,['class'=>'form-control','placeholder'=>'Seleccionar ...','onchange'=>'cambiar_combo(this.value);']) !!}
    <br />

        {!! Form::label ('id_entidad','Entidad:') !!}
        {!! Form::select ('id_entidad', $entidades->pluck('nombre','id')->all() , $municipio->id_entidad ,['class'=>'form-control','placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_entidad')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        {!! Form::label ('nombre','Nombre del municipio') !!}
        <br>
        {!! Form::text ('nombre',$municipio->nombre,['class'=>'form-control','placeholder'=>'Ingresa nombre del municipio']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('municipios') !!}">REGRESAR</a>
        {!! Form::submit('Guardar Municipio', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}

        {!! Form::close() !!}

    </td>
</tr>
</table>

</section><!-- End Contact Section -->
@endsection()
