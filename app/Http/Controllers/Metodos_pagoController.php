<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Metodos_pago;

class Metodos_pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos_pago = Metodos_pago::where('status', 1)
                  ->orderBy('id')->get();
                  $user = Auth::user();
        return view('metodos_pago.index')
            ->with('user', $user)
			->with('metodos_pago', $metodos_pago);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('metodos_pago.create')
        ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'forma_pago' =>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        Metodos_pago::create([
            'forma_pago' => $request ->forma_pago,
            'status' => 1,
          ]);
       /*  Metodos_pago::create($datos); */
        return redirect('/metodos_pago');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $metodo_pago = Metodos_pago::find($id);
        $user = Auth::user();
        return view('metodos_pago.read')
        ->with('user', $user)
        ->with('metodo_pago', $metodo_pago);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metodo_pago = Metodos_pago::find($id);
        $user = Auth::user();
        return view('metodos_pago.edit')
        ->with('user', $user)
        ->with('metodo_pago', $metodo_pago);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $metodo_pago = Metodos_pago::find($id);
        $request -> validate([
            'forma_pago' =>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        $metodo_pago->update([
            'forma_pago' => $request ->forma_pago,
            'status' => 1,
          ]);
       /*  $metodo_pago->update($datos); */
        return redirect('/metodos_pago');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Borrado lógico
        $metodo_pago = Metodos_pago::find($id);
        $metodo_pago->status = 0;
        $metodo_pago->save();

        return redirect('/metodos_pago');
    }
}
