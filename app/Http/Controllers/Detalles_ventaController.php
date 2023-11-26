<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Detalles_venta;
use App\Models\Ventas;
use App\Models\Menus;

class Detalles_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalles_venta = Detalles_venta::where('status', 1)
                  ->orderBy('id')->get();
                  $user = Auth::user();
        return view('detalles_venta.index')
        ->with('user', $user)
	->with('detalles_venta', $detalles_venta);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ventas = Ventas::select('id','id_user')
                  ->orderBy('id')->get();
        $menus = Menus::select('id','nombre')
                  ->orderBy('id')->get();
                  $user = Auth::user();
        return view('detalles_venta.create')
        ->with('user', $user)
            ->with('ventas',$ventas)
		->with('menus',$menus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id_venta' => ['required'],
            'id_menu' => ['required'],
            'cantidad' => ['required', 'numeric', 'min:1'],
            'precio_venta' => ['required', 'numeric', 'min:0']
        ]);
        Detalles_venta::create([
            'id_venta' => $request ->id_venta,
            'id_menu' => $request ->id_menu,
            'cantidad' => $request ->cantidad,
            'precio_venta' => $request ->precio_venta,
            'status'=>1,
        ]);
        /*
        $datos = $request->all();
        Detalles_venta::create($datos);
        */
        return redirect('/detalles_venta');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle_venta = Detalles_venta::find($id);
        $user = Auth::user();
     return view('detalles_venta.read')
     ->with('user', $user)
                ->with('detalle_venta',$detalle_venta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detalle_venta = Detalles_venta::find($id);
        $ventas = Ventas::select('id','id_user')
                  ->orderBy('id')->get();
        $menus = Menus::select('id','nombre')
                  ->orderBy('id')->get();
                  $user = Auth::user();
        return view('detalles_venta.edit')
        ->with('user', $user)
               ->with('detalle_venta', $detalle_venta)
               ->with('ventas', $ventas)
               ->with('menus',$menus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalle_venta = Detalles_venta::find($id);

        $request -> validate([
            'id_venta' => ['required'],
            'id_menu' => ['required'],
            'cantidad' => ['required', 'numeric', 'min:0'],
            'precio_venta' => ['required', 'numeric', 'min:0']
        ]);
        $detalle_venta->update([
            'id_venta' => $request ->id_venta,
            'id_menu' => $request ->id_menu,
            'cantidad' => $request ->cantidas,
            'precio_venta' => $request ->precio_venta,
            'status'=>1,
        ]);
        /* $detalle_venta->update($datos); */
        return redirect('/detalles_venta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle_venta = Detalles_venta::find($id);
        $detalle_venta->status = 0;
        $detalle_venta->save();
        return redirect('/detalles_venta');
    }
}
