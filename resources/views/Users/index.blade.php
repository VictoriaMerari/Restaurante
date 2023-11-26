@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" align="center">

        <div class="section-title">
          <h2>Listado de Usuarios</h2>
          <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="users/create">Crear un nuevo Usuario</a>
    <br> <br>
    <table align="center" border="1">
        <tr >
            <th>ID</th>
            <th>Nombre</th>
            <th>Ap_paterno</th>
            <th>ap_materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>ID municipio</th>
            <th>Municipio</th>
            <th>Nivel Tipo_usuario</th>
            <th>Tipo de usuario</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
        @foreach($users as $user)
        <tr style="border: 1px solid rgb(250, 243, 243);">
            <td style="border: 1px solid rgb(245, 239, 239);">{!! $user->id !!}  </td>
            <td style="border: 1px solid rgb(245, 239, 239);"> {!! $user->nombre !!}</td>
            <td>{!! $user->ap_paterno !!}</td>
            <td>{!! $user->ap_materno !!}</td>
            <td>{!! $user->correo !!}</td>
            <td>{!! $user->telefono !!}</td>
            <td>{!! $user->id_municipio !!}</td>
            <td>{!! $user->municipios->nombre !!}</td>
            <td>{!! $user->tipos_usuario->nivel !!}</td>
            <td>{!! $user->tipos_usuario->nombre !!}</td>
            <td>{!! $user->status !!}</td>
            <td>
                <a href="{!! 'users/'.$user->id !!}">Detalle</a>
                <a href="{!! 'users/'.$user->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/users/'.$user->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
   
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">
        <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
       </a>
        </div>
      </div>
    </section><!-- End Contact Section -->
@endsection()
