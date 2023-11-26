@extends('template.master_inicia_sesion')
@section('contenido_central')

<div class="container" align="center" >
<br />
<div class="section-title" align="justify">
    <br>
      <h2>Información personal</h2>
      <div class="container text-center">
        <img src="{!! asset('estilos/img/iconos/perfil.png') !!}" width="180" height=180 text >
      </div>

    <table style=" border: 1px solid; #f0f0f0;" align="center">
        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >Nombre</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 200px; ">
                <h4 >{!! $user->nombre !!} {!! $user->ap_paterno !!} {!! $user->ap_materno !!}</h4>
            </td>
        </tr>
        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >Correo</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 200px;">
                <h4 >{!! $user->correo !!} </h4>
            </td>
        </tr>

        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >Telefono</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 500px;">
                <h4 >{!! $user->telefono !!} </h4>
            </td>
        </tr>

        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >País</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 500px;">
                <h4 >{!! $user->paises->nombre !!} </h4>
            </td>
        </tr>

        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >Entidad</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 500px;">
                <h4 >{!! $user->entidades->nombre !!} </h4>
            </td>
        </tr>

        <tr >
            <td style="background-color: #3a3737d0; width: 200px;">
                <h4 >Municipios</h4>
            </td>
            <td style="background-color: #c2bebe00; width: 500px;">
                <h4 >{!! $user->municipios->nombre !!} </h4>
            </td>
        </tr>

    </table>
    <br>
    <br>

     @if($user->tipos_usuario->nivel == 4)
     <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! route('ajax') !!}"> <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div> </a>
     @endif
     @if ($user->tipos_usuario->nivel == 3)
     <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! route('waiterWelcome') !!}"> <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div> </a>
     @endif
     @if ($user->tipos_usuario->nivel == 2)
     <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! route('chefWelcome') !!}"> <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div> </a>
     @endif
     @if ($user->tipos_usuario->nivel == 1)
     <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! route('adminWelcome') !!}"> <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div> </a>
     @endif

       <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! 'users/'.$user->id.'/edit' !!}">Editar</a>

 </div>
    </div>
@endsection()
