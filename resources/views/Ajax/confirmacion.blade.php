@extends('template.masterCliente')
@section('contenido_central')
    <br><br><br>

    <section>

        <div class="container" data-aos="zoom-in">

            <div class="text-center" >
                <h3>¡¡Pedido Completado, tu orden esta en preparación!!</h3>
                <br>
                <table border="1" align="center">
                    <tr>
                        <th>
                            <h4>Platillo &nbsp; &nbsp;</h4>
                        </th>
                        <th>
                            <h4>Categoria &nbsp; &nbsp;</h4>
                        </th>
                        <th>
                            <h4>Cantidad &nbsp;</h4>
                        </th>
                        <th>
                            <h4>Precio &nbsp;</h4>
                        </th>
                        <th>
                            <h4>Precio Total &nbsp;</h4>
                        </th>
                    </tr>
                    @foreach ($menu_nombres as $index => $nombre)
                        <tr>
                            <td>
                                <h5>{{ $nombre->nombre }}</h5>
                            </td>
                            <td>
                                <h5>{{ $nombre->categorias->nombre }}</h5>
                            </td>
                            <td>
                                <h5>{{ $pedido[$index]->cantidad }}</h5>
                            </td>
                            <td>
                                <h5>{{ $pedido[$index]->precio_venta }}</h5>
                            </td>
                            <td>
                                @php
                                    $tot=$pedido[$index]->precio_venta*$pedido[$index]->cantidad;
                                @endphp
                                <h5>{{$tot }}</h5>
                            </td>
                        </tr>
                    @endforeach
                </table>
<br>
                <h4>
                   Subtotal... ${{ $subtotal }}
                </h4>
                <h4>
                    Total... ${{ $total }}
                </h4>
                <h3>¡¡Disfrute su estancia!!</h3>
                <br>

                <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
                    href="{!! asset('ver_carrito') !!}">Regresar a pedido</a>

                <!-- <h2>Carrito de compras</h2> -->

            </div>




        </div>

    </section>
@endsection
