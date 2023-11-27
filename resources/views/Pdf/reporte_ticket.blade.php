<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        body {
            text-align: center;
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h1, h3 {
            margin: 10px 0;
            color: #333;
        }

        table {
            margin: 20px auto; /* Centrar la tabla */
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td:first-child {
            font-weight: bold;
        }

        td:last-child {
            font-weight: bold;
            color: #333;
        }

        tfoot td {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1 style="color: #4CAF50;">Restaurantec</h1>
    <h1 style="color: #333;">Informe total de ventas por día</h1>
    <h3 style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">Fecha de impresión - <?= date('d F Y', strtotime($date)); ?></h3>

    <table border="1">
        <thead>
            <tr>
                <th>Venta</th>
                <th>Subtotal $</th>
                <th>Total $</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $subtotalSum = 0;
            $totalSum = 0;
            $uniqueIdVentas = [];

            foreach ($data_detalle_venta as $det) {
                $id_venta = $det->id_venta;

                // Verifica si ya se mostró este id_venta
                if (!in_array($id_venta, $uniqueIdVentas)) {
                    $uniqueIdVentas[] = $id_venta;
                    $subtotalSum += $det->ventas->subtotal;
                    $totalSum += $det->ventas->total;

                    // Muestra la fila solo si es la primera ocurrencia del id_venta
                    echo "<tr>";
                    echo "<td>$id_venta</td>";
                    echo "<td>{$det->ventas->subtotal}</td>";
                    echo "<td>{$det->ventas->total}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td >Total</td>
                <td><?= $subtotalSum ?></td>
                <td><?= $totalSum ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
