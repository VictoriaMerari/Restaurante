@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" align="center">

        <div class="section-title" >
          <h2>Listado de Categorias</h2>
          <br>
    <a  class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="categorias/create">Crear una nueva Categoria</a>
   <br><br>
    <table align="center">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
        @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->id !!}</td>
            <td>{!! $categoria->nombre !!}</td>
            <td>{!! $categoria->descripcion !!}</td>
            <td>{!! $categoria->status !!}</td>
            <td>
                <a href="{!! 'categorias/'.$categoria->id !!}">Detalle</a>
                <a href="{!! 'categorias/'.$categoria->id.'/edit' !!}">Editar</a>

                {!! Form::open(['method' => 'DELETE' , 'url' => '/categorias/'.$categoria->id]) !!}
                    {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}


            </td>
        </tr>
        @endforeach
    </table>
    <br />
    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>
        </div>
      </div>
    </section><!-- End Contact Section -->
@endsection()
