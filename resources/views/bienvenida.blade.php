@extends('template.master')

@section('contenido_central')
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start"  data-aos-delay="30">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bienvenido a <span>RestauranTec</span></h1>
          <h2>"¡¡ATREVETE A VIVIR UNA NUEVA EXPERIENCIA AL PEDIR TU ORDEN!!</h2>

          <div class="btns">
            <a href="{!! asset('form_enviar_correo')!!}" class="btn-menu animated fadeInUp scrollto">Danos tu opinión</a>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->
 <!-- ======= About Section ======= -->
 <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="20">
            <div class="about-img">
              <img src="{!! asset('estilos/img/about.jpg') !!}" alt="" height=280>
            </div>
          </div>
          <div class="section-title">
            <h2>Acerca de nosotros</h2>
            </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>RestauranTec una nueva forma de realizar tu pedido y pago del mismo</h3>
            <p class="fst-italic">
              ¡Sólo selecciona tus platillos y espera a que el mesero te lo lleve a tu mesa!
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Fácil y rápido</li>
              <li><i class="bi bi-check-circle"></i> Sin la necesidad de esperar a que el mesero tome tu orden</li>
              <li><i class="bi bi-check-circle"></i> Posibilidad de obtener grandes descuentos</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Instrucciones</h2>
          <p>Sigue estos simples pasos</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Inicia Sesión</h4>
              <p>Selecciona la opción de iniciar sesión, en caso de no estar registrado da clic sobre la opción de registrarse e ingresa tus datos</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Selecciona tus platillos</h4>
              <p>Visualiza los diferentes platillos y elige el de tu preferencias, puedes elegir la cantidad que deseas</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Paga</h4>
              <p>Da clic sobre la opción de pagar, visualiza la cantidad a pagar y confirma el pago </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


@endsection()

