
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0">RESTAURANTEC</h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="{!! route('infPersonal')!!}" class="book-a-table-btn scrollto d-none d-lg-flex">Informacion Personal</a>
      <form method="POST" action="{{ route('auth.logOut') }}">
        @csrf
        <button class="book-a-table-btn scrollto d-none d-lg-flex" style="background-color: transparent">
            Cerrar Sesión
        </button>
    </form>

    </div>
  </header><!-- End Header -->
