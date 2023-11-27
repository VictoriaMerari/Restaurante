@extends('template.master_inicia_sesion')

@section('contenido_central')

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reportes en PDF</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 mt-4 mt-lg-0">
            <table  width="200%" style="margin: 0 auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reporte</th>
                        <th>Ver</th>
                        <th>Descargar</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ver menu</td>
                        <td>
                            <a href="{!! asset('menus_nombre/1')!!}" target="_blank">
                            <button class="btn btn-block btn-primary btn-xs">Ver</button>
                            </a>
                        </td>
                        <td>
                            <a href="{!! asset('menus_nombre/2')!!}" target="_blank">
                            <button class="btn btn-block btn-success btn-xs">Descarga</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ver ticket</td>
                        <td>
                            <a href="{!! asset('ticket/1')!!}" target="_blank">
                            <button class="btn btn-block btn-primary btn-xs">Ver</button>
                            </a>
                        </td>
                        <td>
                            <a href="{!! asset('ticket/2')!!}" target="_blank">
                            <button class="btn btn-block btn-success btn-xs">Descarga</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <a  class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('bienvenidaAdmin') !!}">REGRESAR</a>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

@endsection()
