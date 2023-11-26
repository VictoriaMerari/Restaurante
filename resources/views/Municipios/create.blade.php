@extends('template.master_inicia_sesion')
@section('contenido_central')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container"  align="center">
    <div class="section-title" >
        <p >
          <FONT SIZE=10>
              Crear Municipio
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

    {!! Form::open(['url'=>'/municipios']) !!}
    {!! Form::label ('id_pais','Pais:',['class'=>'control-label']) !!}
    {!! Form::select ('id_pais', $paises->pluck('nombre','id')->all() , null,
    ['class'=>'form-control-sm','placeholder'=>'Seleccionar ...','onchange'=>'cambiar_combo(this.value);']) !!}
    <br />

        {!! Form::label ('id_entidad','Entidad:') !!}
        {!! Form::select ('id_entidad', array(' '=>'') , null ,['class'=>'form-control-sm','placeholder'=>'Seleccionar ...']) !!}
        <br />
        @error('id_entidad')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror

        {!! Form::label ('nombre','Nombre del municipio') !!}
        <br>
        {!! Form::text ('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa nombre del municipio']) !!}
        <br />
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('municipios') !!}">REGRESAR</a>
        {!! Form::submit('Guardar Municipio', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        <br>

        {!! Form::close() !!}

    </td>
</tr>
</table>
</div>
</div>
    </section><!-- End Contact Section -->
    @endsection()
