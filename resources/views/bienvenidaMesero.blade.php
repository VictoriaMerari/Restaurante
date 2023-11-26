@extends('template.masterCliente')

@section('contenido_central')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <br><br>

        <div class="container" data-aos="zoom-in">

            <div class="text-center">
                <h1 style="color: #CDA434;">Pedidos</h1>
                <br>
                <div class="row">
                    @foreach ($v as $dev)
                        <div class="col-md-4 mb-4">
                            <div class="card text-white" style="background: linear-gradient(to right, #CDA434, #8e6f1b);">
                                <div class="card-body">
                                    <h5 class="card-title">ID Venta: {{ $dev->id }}</h5>
                                    <p class="card-text">Usuario: {{ $dev->users->nombre }}</p>
                                    <p class="card-text">Subtotal: {{ $dev->subtotal }}</p>
                                    <p class="card-text">Total: {{ $dev->total }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent"
                    href="{{ route('ajax') }}">
                    <div class="bi bi-arrow-left-short" style="font-size: 15px"> REGRESAR</div>
                </a>

            </div>
        </div>

    </section><!-- End Why Us Section -->
@endsection()
