<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Detalles_venta;
use App\Models\Ventas;
use App\Models\Menus;
use App\Models\Fotos_menu;
use App\Models\Categorias;

class AjaxController extends Controller
{
    public function ver_productos(){
        $categorias = Categorias::where('status',1)
        ->orderBy('nombre')->get();
        /*
        $menus = \DB::select(
            "select
            fotos_menu.id_menu as id_menu,
            menus.nombre as nom_menu,
            fotos_menu.ruta as ruta,
            categorias.nombre as nom_catego
            from fotos_menu, menus, categorias
            WHERE fotos_menu.id_menu = id_menu
            AND menus.id_categoria = id_categoria"
        );
        */

        $menus = \DB::table('fotos_menu')
        ->join('menus', 'fotos_menu.id_menu', '=', 'menus.id')
        ->join('categorias', 'menus.id_categoria', '=', 'categorias.id')
        ->select('fotos_menu.id_menu as id_menu',
         'menus.nombre as nom_menu',
         'menus.descripcion as descripcion',
         'menus.precio as precio',
          'fotos_menu.ruta as ruta',
           'categorias.nombre as nom_catego')
        ->get();

        return view ('Ajax.productos_en_venta')
        ->with('categorias',$categorias)
        ->with('menus',$menus);
    }

    public function ver_carrito(){
        $id_user=Auth::user()->id;

        $tot_venta_carrito= Ventas::where('status',1)
        ->where('id_user', $id_user)
        ->count();

        $venta = Ventas::where('status',1)
        ->where ('id_user', $id_user)
        ->get();

        $id_venta=0;

        foreach ($venta as $v) {
            $id_venta = $v->id;
        }

        $detalle_venta = Detalles_venta::where('status',1)
        ->where('id_venta', $id_venta)
        ->get();

        return view('Ajax.carrito_compras')
        ->with('venta', $venta)
        ->with('detalle_venta', $detalle_venta)
        ->with('tot_venta_carrito', $tot_venta_carrito);

    }
    public function agregar_carrito($id_menu){
        $id_user=Auth::user()->id;
        $fecha=date("Y-m-d");

        $tot_venta_carrito = Ventas::where('status',1)
                            ->where('id_user', $id_user)
                            ->count();

        if ($tot_venta_carrito==0) {
            \DB::table('ventas')
            ->insert([
                'id_user' =>$id_user,
                'fecha' => $fecha,
                'subtotal' => 0,
                'iva' => 0,
                'total' =>0,
                'id_metodo_pago' =>1,
                'descuento' =>1,
                'status' =>1,
            ]);
        }

        $venta = Ventas::where('status',1)
        ->where('id_user',$id_user)
        ->first();

        $id_venta=$venta->id;

        $menu= Menus::find($id_menu);

        \DB::table('detalles_venta')->insert([
            'id_venta' =>$id_venta,
            'id_menu' =>$id_menu,
            'cantidad' =>1,
            'precio_venta' =>$menu->precio,
            'status' =>1,
        ]);
        return "<h3> Pedido agregado</h3>";

    }

    public function add_del_producto($tipo,$id_menu){
        $id_user=Auth::user()->id;
        $venta = Ventas::where('status',1)
                ->where('id_user', $id_user)
                ->first();

        $id_venta = $venta->id;

        if ($tipo==1) {
            Detalles_venta::where('id_venta',$id_venta)
                ->where('id_menu',$id_menu)
                ->increment('cantidad',1);
        }
        if ($tipo==2) {
            Detalles_venta::where('id_venta',$id_venta)
                ->where('id_menu',$id_menu)
                ->decrement('cantidad',1);
        }
        if ($tipo==3) {
            Detalles_venta::where('id_venta', $id_venta)
            ->where('id_menu', $id_menu)
            ->delete();
        }

        $detalles_venta=Detalles_venta::where('status',1)
            ->where('id_venta',$id_venta)
            ->get();

            $registros="";
            $registros.="<table border='1'>";
            $registros.="<tr>";
            $registros.="<th>ID</th>";
            $registros.="<th>Producto</th>";
            $registros.="<th>Cantidad</th>";
            $registros.="<th>Precio</th>";
            $registros.="<th>Acciones</th>";
            $registros.="</tr>";

            foreach($detalles_venta as $detalle) {
                $registros.="<tr>";
                $registros.="<td>". $detalle->id ."</td>";
                $registros.="<td>". $detalle->menus->nombre ."</td>";
                $registros.="<td>". $detalle->cantidad ."</td>";
                $registros.="<td>". $detalle->precio_venta ."</td>";
                $registros.="<td>". ($detalle->cantidad * $detalle->precio_venta) ."</td>";
                $registros.="<td>";
                $registros.="<button class='btn btn-primary' ";
                $registros.="onclick='add_del_producto(1,". $detalle->id_menu ." ); '>";
                $registros.="<i class='fa fa-plus-circle'></i> Incrementar </button> ";

                $registros.="<button class='btn btn-success' ";
                $registros.="onclick='add_del_producto(2,". $detalle->id_menu ." ); '>";
                $registros.="<i class='fa fa-minus-circle'></i> Decrementar </button> ";

                $registros.="<button class='btn btn-danger' ";
                $registros.="onclick='add_del_producto(3,". $detalle->id_menu ." ); '>";
                $registros.="<i class='fa fa-minus-circle'></i> Eliminar </button> ";
                $registros.="</td>";
                $registros.="</tr>";
            }
            $registros.="</table>";

            return $registros;
    }

public function add_de_venta($id_venta){
    $pedido = Detalles_venta::where('id_venta',$id_venta)
            ->get();
    $menu_nombres = [];

        foreach ($pedido as $detalle) {

        $menu_nombres[] = Menus::find($detalle->id_menu);
        }


    $total = Detalles_venta::where('id_venta', $id_venta)

          ->sum(\DB::raw('cantidad * precio_venta'));

    Ventas::where('id', $id_venta)

      ->update([
        'subtotal' => $total,
        'iva' => .16,
        'total' => ($total*.16)+$total
    ]);



      return view('Ajax.confirmacion')
      ->with('pedido', $pedido)
      ->with('menu_nombres', $menu_nombres)
      ->with('subtotal',$total)
      ->with('iva', .16)
      ->with('total',($total*.16)+$total);

}
}
