@extends('template.master_inicia_sesion')
@section('contenido_central')

<section id="contact" class="contact" >
<div class="container" data-aos="fade-up" align="center">

    <div class="section-title">
        <h2>
            <FONT SIZE=5>
                Listado de Metodos de pago
            </FONT>
        </h2>
<br>
  <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="metodos_pago/create">Agregar una nueva forma de pago</a>
  <br>
  <br>
    <table >
        <tr>
            <th>ID</th>
            <th>Forma de pago</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
        @foreach($metodos_pago as $metodo_pago)
        <tr>
            <td>{!! $metodo_pago->id !!}</td>
            <td>{!! $metodo_pago->forma_pago !!}</td>
            <td>{!! $metodo_pago->status !!}</td>
            <td>
                <a href="{!! 'metodos_pago/'.$metodo_pago->id !!}">Detalle</a>
                <a href="{!! 'metodos_pago/'.$metodo_pago->id.'/edit' !!}">Editar</a>
                {!! Form::open(['method' => 'DELETE' , 'url' => '/metodos_pago/'.$metodo_pago->id]) !!}
                      {!! Form::submit('Eliminar') !!}
                        {!! Form::close() !!}

            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <br> <br>
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
 </div>
</div>
</section>
    @endsection()
