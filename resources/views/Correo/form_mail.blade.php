<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Entidades</title>
    <style>
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  color: #080808;
  background-color: #13121263;
  margin: 0;
  padding: 0;
}


/* Estilo para los enlaces */
a.button {
  background-color: #1a1d1a; /* color de fondo */
  border: none; /* sin borde */
  color: white; /* color de texto */
  padding: 10px 20px; /* padding (espacio interior) */
  text-align: center; /* centrar el texto */
  text-decoration: none; /* sin subrayado */
  display: inline-block; /* mostrar como bloque en línea */
  font-size: 16px; /* tamaño de fuente */
  margin: 4px 2px; /* margen */
  cursor: pointer; /* cursor tipo puntero */
}

input[type="submit"] {
    background-color: #1a1d1a; /* color de fondo */
  border: none; /* sin borde */
  color: white; /* color de texto */
  padding: 10px 20px; /* padding (espacio interior) */
  text-align: center; /* centrar el texto */
  text-decoration: none; /* sin subrayado */
  display: inline-block; /* mostrar como bloque en línea */
  font-size: 16px; /* tamaño de fuente */
  margin: 4px 2px; /* margen */
  cursor: pointer; /* cursor tipo puntero */
  display: inline-block;
}
input[type="text"] {
  width: 100%; /* ancho del campo de texto */
  padding: 12px 12px; /* espacio interno (padding) del campo de texto */
  margin: 8px 0; /* margen superior e inferior del campo de texto */
  box-sizing: border-box; /* tamaño de caja incluye borde y padding */
  border: 2px solid #ccc; /* borde del campo de texto */
  border-radius: 4px; /* radio de esquina del borde */
}

.contenedor {
  display: flex; /* establecer el contenedor como flex */
  justify-content: center; /* centrar horizontalmente el contenido */
  align-items: center; /* centrar verticalmente el contenido */
  height: 100vh; /* establecer la altura del contenedor como 100% de la altura de la ventana */
}

table {
  width: 100%; /* ancho de la tabla */
  margin: 0%; /* margen automático a los lados para centrarla horizontalmente */
}
td {
    background-color: #13121263;
    padding: 0 20px;

}
    </style>
</head>
<body >

<table class="contenedor" >
    <tr>
        <td>
            <h2>Opiniones</h2>
            <p>Cuentanos tu experiencia</p>
            <br>
        {!! Form::open(['url'=>'/enviar_correo','role'=>'form','method'=>'post']) !!}

        {!! Form::label ('destinatario','Para:') !!}
        <br>
        {!! Form::text ('destinatario',null,['placeholder'=>'Ingresa la dirección de destino',
        'required','class'=>'form-control']) !!}
        <br />
        <br />

        {!! Form::label ('asunto','Asunto:') !!}
        <br>
        {!! Form::text ('asunto',null,['placeholder'=>'Asunto',
        'required','class'=>'form-control']) !!}
        <br />
        <br />

        {!! Form::label ('contenido','Contenido:') !!}
        <br>
        {!! Form::textarea ('contenido',null,['placeholder'=>'Contenido','required',
            'class'=>'form-control']) !!}
        <br>

        {!! Form::label ('fecha','Fecha:') !!}
        <br>
        {!! Form::date ('fecha',null,['placeholder'=>'Contenido','required',
            'class'=>'form-control']) !!}
        <br>

        {!! Form::label ('status','Estatus:') !!}
        <br>
        {!! Form::select ('status',
        array('1'=>'Activo','0'=>'Baja') , null ,['placeholder'=>'Seleccionar ...']) !!}
        <br />
        <br />

            <div align="center">
        {!! Form::submit ('Enviar Correo') !!}

        <a class="button" href="{!! asset('bienvenida') !!}">Regresar</a>
    </div>
        {!! Form::close() !!}
        </td>
    </tr>
</table>



    </body>
    </html>
