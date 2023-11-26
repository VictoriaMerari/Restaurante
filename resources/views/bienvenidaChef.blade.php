@extends('template.masterCliente')
@section('contenido_central')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <br><br>

        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h3 style="color: #CDA434;">Pedidos del Día: {{ now()->format('d F Y') }}</h3>
                <br>

                <div class="card-container">
                    @php
                        $agrupadosPorId = collect($dv)->groupBy('id_venta');
                    @endphp

                    @foreach ($agrupadosPorId as $idVenta => $detallesVenta)
                        @php
                            // Filtra los detalles de venta por fecha actual
                            $detallesVenta = $detallesVenta->filter(function ($detalle_venta) {
                                return Carbon\Carbon::parse($detalle_venta->ventas->fecha)->isToday();
                            });
                        @endphp

                        @if ($detallesVenta->count() > 0)
                            <div class="card">
                                <h4>ID Venta: {{ $idVenta }}</h4>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>Menús</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detallesVenta as $detalle_venta)
                                            <tr>
                                                <td>{{ $detalle_venta->menus->nombre }}</td>
                                                <td>{{ $detalle_venta->menus->descripcion }}</td>
                                                <td>{{ $detalle_venta->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- Estilos CSS con fondo gris y letras blancas para las tarjetas -->
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background: linear-gradient( #CDA434, #513a05fc);
            color: #000000; /* Texto blanco */
            width: 300px; /* Ajusta el ancho según tus necesidades */
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
@endsection()
