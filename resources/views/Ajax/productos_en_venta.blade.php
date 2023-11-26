@extends('template.masterCliente')
@section('contenido_central')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function agregar_al_carrito(id_menu){
        var ruta = "{{ asset('agregar_carrito') }}/"+id_menu;

        $.ajax({
                type:'GET',
                url: ruta,

                success:function(data){
                    $("#respuesta").html(data);
                }
            });
    }
</script>

<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
<br><br><br>
    <div class="row" >

          <ul id="menu-flters" class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($categorias as $categoria)
                <li data-filter=".filter-{!! $categoria->nombre !!}">{!! $categoria->nombre !!}</li>
            @endforeach
          </ul>

          <div id="respuesta"></div>

      </div>

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($menus as $menu)
        <div class="col-lg-6 menu-item filter-{!! $menu->nom_catego !!}">
            <div class="menu-{!! $menu->nom_catego !!}">
            <img src="../storage/fotografias/{!! $menu->ruta !!}" class="menu-img" alt="">
            </div>
              <div class="menu-content">
                <a href="#"><h4>{!! $menu->nom_menu !!}</h4></a><span>$ {!! $menu->precio !!}</span>
              </div>
            <div class="menu-ingredients">
                <h5>{!! $menu->descripcion !!}</h5>
                <p> {!! $menu->nom_catego !!}</p>
                <button onclick="agregar_al_carrito({!! $menu->id_menu !!});" class="btn btn-primary btn-sm">
                Agregar al pedido
                </button>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <div align="center">
        <a class="book-a-table-btn btn btn-primary btn-lg" style="background-color: transparent" href="{!! asset('ver_carrito')!!}" >Ver el pedido</a>
    </div>

</div>
</section>
@endsection
