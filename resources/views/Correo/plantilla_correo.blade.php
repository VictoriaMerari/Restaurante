<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Correo</title>
    <style>

        .titulo{
            color:#ed6803;
            background: #ed9b03cd;
            font-family: 'Courier New', Courier, monospace;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;

        }

        .body{
            background-color: #ffffff;
        }

        .div_contenido{
            color:#000000;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: #989595b3;
            font-size: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .div_footer{
            color:#b01212;
            font-size: 16px;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            font-family: monospace;
            background-color: #989595b3;
        }

        </style>


</head>
<body class="body">
<div align="center">
<div class="titulo" >
    <h1>¡¡Opiniones de clientes!!</h1>
</div>
<hr>
<div class="div_contenido"><?= $contenido; ?></div>

<div class="div_footer" >
    ¡¡Importante!!<br/>
    Tomar en cuenta la opinión de los clientes para mejorar la experiencia<br/>
    _______________________________________________________________________<br/>

    RestauranTec<br/>

</div>
</div>
</body>
</html>
