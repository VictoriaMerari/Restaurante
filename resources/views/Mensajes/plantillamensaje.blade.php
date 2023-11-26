
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
  /*  width: 50%;ancho de la tabla */
  margin: 0%; /* margen automático a los lados para centrarla horizontalmente */
}
td {
    background-color: #13121263;
    padding: 0 50px;
}
    </style>
</head>
<body >

<table class="contenedor" >
    <tr>
        <td>
              <div class="section-title">
                  <h2>Mensaje</h2>
                  @if($var ==='1')
                      <div class ="alert alert-success">
                          {!! $msj !!}
                      </div>
                  @else
                      <div class="alert alert-danger">
                          {!! $msj !!}
                      </div>
                  @endif
                  <br>
                  <a class="button" href="{!! asset($ruta_boton) !!}">Regresar al inicio</a>
                      <br>
             </div>
        </td>
    </tr>
</table>



    </body>
    </html>
