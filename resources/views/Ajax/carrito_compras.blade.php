@extends('template.masterCliente')
@section('contenido_central')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function add_del_producto(tipo, id_menu) {
            console.log('entra a la función');
            // "{{ asset('agregar_carrito') }}/"
            var ruta = "{{ asset('add_del_producto') }}/" + tipo + "/" + id_menu;
            console.log(ruta);
            $("#respuesta").html("");
            $.ajax({
                type: 'GET',
                url: ruta,
                success: function(data) {
                    $("#respuesta").html(data);
                },
                error: function(xhr, status, error) { // Manejar el error
                    console.log("Ocurrió un error: " + error);
                }
            });
        }

        function add_de_venta(id_venta) {

            var ruta = "add_de_venta/" + id_venta;

            $("#respuesta").html("");

            $.ajax({

                type: 'GET',

                url: ruta,

                success: function(data) {

                    $("#respuesta").html(data);

                }

            });

        }
    </script>



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" align="center">
            <div class="section-title">
                <p>
                    <font size="10">Carrito de pedidos</font>
                </p>
                <br />
                @if ($tot_venta_carrito == 0)
                    <div class="alert alert-danger">
                        Carrito de compras vacío, selecciona algún producto
                    </div>
                    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
                href="{!! asset('ajax') !!}">
                <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
            </a>
                @else
                    <div class="alert alert-success">
                        Lista de pedidos
                    </div>

                    <div id="respuesta">
                        <table border="1">
                            <tr>
                                <th>id</th>
                                <th>Platillo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach ($detalle_venta as $detalle)
                                <tr>
                                    <td>{!! $detalle->id !!}</td>
                                    <td>{!! $detalle->menus->nombre !!}</td>
                                    <td>{!! $detalle->cantidad !!}</td>
                                    <td>{!! $detalle->precio_venta !!}</td>
                                    <td>{!! $detalle->cantidad * $detalle->precio_venta !!}</td>
                                    <td>
                                        <button class="btn btn-primary"
                                            onclick="add_del_producto(1, {!! $detalle->id_menu !!} );">
                                            <i class="fa fa-plus-circle"></i> Incrementar
                                        </button>
                                        <button class="btn btn-success"
                                            onclick="add_del_producto(2, {!! $detalle->id_menu !!} );">
                                            <i class="fa fa-minus-circle"></i> Decrementar
                                        </button>
                                        <button class="btn btn-danger"
                                            onclick="add_del_producto(3, {!! $detalle->id_menu !!} );">
                                            <i class="fa fa-minus-circle"></i> Eliminar
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <br>
                    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
                href="{!! asset('ajax') !!}">
                <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
            </a>
                    <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
                    href="{{ route('add_de_venta', ['id_venta' => $venta[0]->id]) }}">
                    Comprar
                    </a>
                @endif




            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection
