<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Reporte de menus- <?= $date; ?></h3>
<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre </th>
                <th>Descripcion</th>
                <th>precio </th>
                <th>categoria </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $menu) { ?>
            <tr>
                <td><?= $menu->id; ?></td>
                <td><?= $menu->nombre; ?></td>
                <td><?= $menu->descripcion; ?></td>
                <td><?= $menu->precio; ?></td>
                <td><?= $menu->categorias->nombre; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
