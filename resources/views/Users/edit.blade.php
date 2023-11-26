@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container" >
        <div class="section-title" align="justify">
          <h2>Perfil del usuario</h2>
          <p>Editar información</p>
          <br />
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cambiar_combo_entidad(id_pais) {
            $("#id_entidad").empty();
            $("#id_municipio").empty();
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

        function cambiar_combo_municipios(id_entidad) {
            $("#id_municipio").empty();
                var ruta = "{{ asset('combo_municipio') }}/"+id_entidad;
                $.ajax({
                type:'GET',
                url: ruta,

                success:function(data){

                var municipios = data;

                $('#id_municipio').append('<option value="">Seleccionar ...</option>');

                    for (var i = 0; i < municipios.length; i++){
                        $('#id_municipio').append('<option value="' + municipios[i].id + '">' +
                            municipios[i].nombre + '</option>');
                      }
                    }
                  });
        }
    </script>
          {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/users/'.$user->id]) !!}
       <!--  {!! Form::label ('nombre','Nombre ') !!} -->
        {!! Form::text ('nombre',$user->nombre,['placeholder'=>'Ingresa tu nombre']) !!}


      <!--  {!! Form::label ('ap_paterno','Apellido paterno') !!} -->
        {!! Form::text ('ap_paterno',$user->ap_paterno,['placeholder'=>'Ingresa tu apellido paterno']) !!}

     <!--   {!! Form::label ('ap_materno','Apellido materno') !!} -->
        {!! Form::text ('ap_materno',$user->ap_materno,['placeholder'=>'Ingresa tu apellido materno']) !!}
        <br>
        @error('nombre')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        @error('ap_paterno')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        @error('ap_materno')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />

    <!--    {!! Form::label ('correo','Correo') !!} -->
        {!! Form::text ('correo',$user->correo,['placeholder'=>'Ingresa tu correo']) !!}


    <!--    {!! Form::label ('telefono','Telefono') !!} -->
        {!! Form::text ('telefono',$user->telefono,['placeholder'=>'Ingresa tu telefono']) !!}


    <!--    {!! Form::label ('password','Contraseña') !!} -->
        {!! Form::text ('password',null,['placeholder'=>'Ingresa tu contraseña'])
        !!}
        <br>
        @error('correo')
            <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        @error('telefono')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
       @error('password')
       <small class="text-danger" role="alert"> {{$message}}</small>
       @enderror
        <br />

        {!! Form::label ('id_pais','Pais:',['class'=>'control-label']) !!}
        {!! Form::select ('id_pais', $paises->pluck('nombre','id')->all() , $user->municipios->entidades->id_pais,
        ['class'=>'form-control-sm','placeholder'=>'Seleccionar ...','onchange'=>'cambiar_combo_entidad(this.value);']) !!}
        <br />
          @error('id_pais')
          <small class="text-danger" role="alert"> {{$message}}</small>
          @enderror
          <br />

          {!! Form::label ('id_entidad','Entidad:',['class'=>'control-label']) !!}
          {!! Form::select ('id_entidad', $entidades->pluck('nombre','id')->all() , $user->municipios->id_entidad ,['class'=>'form-control-sm','placeholder'=>'Seleccionar Entidad...','onchange'=>'cambiar_combo_municipios(this.value);']) !!}
          <br />
        @error('id_entidad')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />
        {!! Form::label ('id_municipio','Municipio') !!}
        {!! Form::select ('id_municipio',  $entidades->pluck('nombre','id')->all() ,$user->id_municipio ,['class'=>'form-control-sm','placeholder'=>'Seleccionar Municipio...']) !!}
        <br />
        @error('id_municipio')
        <small class="text-danger" role="alert"> {{$message}}</small>
        @enderror
        <br />


            @if ($usuario != null )
              @if ($usuario->id_tipo_usuario == 1)
              {!! Form::label ('id_tipo_usuario','Tipos de usuario:') !!}
               {!! Form::select ('id_tipo_usuario', $tipos_usuario->pluck('nombre','id')->all() , $user->id_tipo_usuario ,['placeholder'=>'Seleccionar el tipo de usuario...']) !!}
             @endif
             @endif


       <br />
        <br />

        @if ($usuario !=null)
            @if ($usuario->id_tipo_usuario==1)
            <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('users') !!}">
                <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
            </a>
                @else @if ($usuario->id_tipo_usuario==4 || $user->tipos_usuario->nivel == 3 || $user->tipos_usuario->nivel == 2)
                <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('infPersonal') !!}">
                    <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
                </a>
                @endif
            @endif
        @endif



        {!! Form::submit('Guardar Usuario', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}

        {!! Form::close() !!}

        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection()
