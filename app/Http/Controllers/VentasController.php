<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ventas;
use App\Models\User;
use App\Models\Metodos_pago;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Ventas::orderBy('id')->get();
        $user = Auth::user();
        return view('ventas.index')
        ->with('user', $user)
        ->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id','nombre')
                  ->orderBy('nombre')->get();
        $metodos_pago = Metodos_pago::select('id','forma_pago')
                  ->orderBy('id')->get();
        $user = Auth::user();
        return view('ventas.create')
        ->with('user', $user)
        ->with('users',$users)
		->with('metodos_pago',$metodos_pago);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'fecha' => ['required','date'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'iva' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
            'id_user' => ['required'],
            'id_metodo_pago' => ['required'],
            'descuento' => ['required', 'numeric', 'min:0']
        ]);

        Ventas::create([
            'fecha' => $request ->fecha,
            'subtotal' => $request ->subtotal,
            'iva' => $request ->iva,
            'total' => $request ->total,
            'id_user' => $request ->id_user,
            'id_metodo_pago' => $request ->id_metodo_pago,
            'descuento' => $request ->descuento,
            'status'=>1,
        ]);
        /*
        $datos = $request->all();
        Ventas::create($datos);
        */
        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = Ventas::find($id);
        $user = Auth::user();
        return view('ventas.read')
                ->with('user', $user)
                ->with('venta',$venta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta = Ventas::find($id);
        $users = User::select('id','nombre')
                  ->orderBy('nombre')->get();
        $metodos_pago = Metodos_pago::select('id','forma_pago')
                  ->orderBy('id')->get();
        $user = Auth::user();
        return view('ventas.edit')
               ->with('user', $user)
               ->with('venta', $venta)
               ->with('users', $users)
               ->with('metodos_pago',$metodos_pago);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $venta = Ventas::find($id);

        $request -> validate([
            'fecha' => ['required','date',Rule::in([today()->format('Y-m-d')])],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'iva' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
            'id_user' => ['required'],
            'id_metodo_pago' => ['required'],
            'descuento' => ['required', 'numeric', 'min:0']
        ]);
        $venta->update([
            'fecha' => $request ->fecha,
            'subtotal' => $request ->subtotal,
            'iva' => $request ->iva,
            'total' => $request ->total,
            'id_user' => $request ->id_user,
            'id_metodo_pago' => $request ->id_metodo_pago,
            'descuento' => $request ->descuento,
            'status'=>1,
        ]);

        /* $venta->update($datos); */
        return redirect('/ventas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = Ventas::find($id);
        $venta->destroy($id);
        return redirect('/ventas');
    }
}
