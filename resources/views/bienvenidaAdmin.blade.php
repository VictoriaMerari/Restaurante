@extends('template.masterCliente')
@section('contenido_central')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" >
        <br><br><br>
        <div class="section-title">
          <p>Administrador {{$user -> nombre}}</p>
        </div>
<br>

<br>
        <div class="row">
            <!-- PAISES -->
          <div class="col-lg-4" align="center">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! route('paises.index')!!}">
              <span>Paises</span>
              <img src="{!! asset('estilos/imagenes/pais.png') !!}" width="120" height=120>
            </a>
            </div>
          </div>
          <!-- END PAISES -->

        <!-- ENTIDADES -->
             <div class="col-lg-4" align="center">
                <div class="box" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ route('entidades.index') }}">
                  <span>Entidades</span>
                  <img src="{!! asset('estilos/imagenes/pais.png') !!}" width="120" height=120>
                </a>
                </div>
              </div>
        <!-- END ENTIDADES -->

        <!-- MUNICIPIOS -->
        <div class="col-lg-4" align="center">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('municipios')!!}">
              <span>Municipios</span>
              <img src="{!! asset('estilos/imagenes/pais.png') !!}" width="120" height=120>
            </a>
            </div>
          </div>
         <!-- END MUNICIPIOS -->

        <!-- USUARIOS -->
        <div class="col-lg-4" align="center">
            <br>
             <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('users')!!}">
                 <span>Usuarios</span>
                 <img src="{!! asset('estilos/imagenes/usuario.png') !!}" width="140" height=140>
                 </a>
             </div>
        </div>
        <!-- END USUARIOS -->

        <!-- TIPOS DE USUARIO -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('tipos_usuario')!!}">
                <span>Tipos de usuario</span>
                <img src="{!! asset('estilos/imagenes/tipos_usuario.png') !!}" width="140" height=140>
                </a>
            </div>
        </div>
        <!-- END TIPOS DE USUARIOS -->

        <!-- OPINIONES -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('correos')!!}">
                <span style="font-size: 25px">Opiniones</span>
                <img src="{!! asset('estilos/imagenes/calificaciones.png') !!}" width="135" height=140>

            </a>
            </div>
        </div>
        <!-- OPINIONES -->

        <!-- VENTAS -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('ventas')!!}">
                <span>Ventas</span>
                <img src="{!! asset('estilos/imagenes/venta.png') !!}" width="180" height=170>
                </a>
            </div>
        </div>
        <!-- VENTAS -->

         <!-- METODOS DE PAGO -->
         <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('metodos_pago')!!}">
                <span>Métodos de pago</span>
                <img src="{!! asset('estilos/imagenes/metodosPagoSF.png') !!}" width="170" height=170>
            <br>
            </a>
            </div>
        </div>
        <!-- METODOS DE PAGO -->

        <!-- DETALLES VENTA -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('detalles_venta')!!}">
                <span>Detalles de venta</span>
                <img src="{!! asset('estilos/imagenes/detalleVenta.png') !!}" width="170" height=170>
                </a>
            </div>
        </div>
        <!-- DETALLES VENTA  -->

        <!-- MENUS -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('menus')!!}">
                <span>Menu</span>
                <img src="{!! asset('estilos/imagenes/menu.png') !!}" width="170" height=170>
                </a>
            </div>
        </div>
        <!-- MENUS  -->

        <!-- FOTOS MENUS -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('fotos_menu')!!}">
                <span>Fotos de menu</span>
                <img src="{!! asset('estilos/imagenes/fotos.png') !!}" width="190" height=170>
                </a>
            </div>
        </div>
        <!-- FOTOS MENUS  -->

        <!--CATEGORIAS -->
        <div class="col-lg-4" align="center">
            <br>
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <a href="{!! asset('categorias')!!}">
                <span style="font-size: 25px">Categorías de platillos</span>
                <img src="{!! asset('estilos/imagenes/categoria.png') !!}" width="150" height="170">
                </a>
            </div>
        </div>
        <!-- CATEGORIAS  -->



        </div>

      </div>
    </section><!-- End Why Us Section -->


@endsection()

