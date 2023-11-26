@extends('template.master_inicia_sesion')
@section('contenido_central')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

    <div class="container" >
        <div class="section-title" align="justify">
          <h2>Inicia sesion</h2>
          <br />
            <!-- Sección del LogIn Form -->
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {!! Form::open(['method' => 'POST','route'=>'auth.login']) !!}

    <!--    {!! Form::label ('correo','Correo') !!} -->
        {!! Form::text ('correo',null,['placeholder'=>'Ingresa tu correo']) !!}



    <!--    {!! Form::label ('password','Contraseña') !!} -->
        {!! Form::text ('password',null,['placeholder'=>'Ingresa tu contraseña']) !!}
        <br>
        @error('correo')
        {{$message}}
        @enderror
        @error('password')
                {{$message}}
            @enderror
        <br />
        <br />

        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenida') !!}">Regresar</a>
        {!! Form::submit('iniciar sesion', ['style' => 'background-color: transparent;' ,'class' => 'book-a-table-btn btn btn-primary btn-lg']) !!}
        <br> <br>
        <h2>¿No tienes una cuenta?</h2>
        <br>
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('users/create') !!}">Registrate</a>

        {!! Form::close() !!}
        <br>
       </div>

      </div>
    </section><!-- End Contact Section -->
@endsection()
