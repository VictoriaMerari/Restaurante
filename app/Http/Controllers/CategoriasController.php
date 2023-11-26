<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::where('status', 1)
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
        return view('categorias.index')
        ->with('user', $user)
        ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('categorias.create')
        ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nombre'=>['required','String','regex:/^[A-Za-z\s]+$/'],
            'descripcion'=>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        Categorias::create([
            'nombre'=> $request ->nombre,
            'descripcion'=> $request ->descripcion,
            'status'=>1,
        ]);
        /*
        $datos = $request->all();
        Categorias::create($datos);
        */
        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categorias::find($id);
        $user = Auth::user();
        return view('categorias.read')
        ->with('user', $user)
        ->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categorias::find($id);
        $user = Auth::user();
        return view('categorias.edit')
        ->with('user', $user)
        ->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $categoria = Categorias::find($id);
        $request ->validate([
            'nombre'=>['required','String','regex:/^[A-Za-z\s]+$/'],
            'descripcion'=>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        $categoria->update([
            'nombre'=> $request ->nombre,
            'descripcion'=> $request ->descripcion,
            'status'=>1,
        ]);
        /* $categoria->update($datos); */
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categorias::find($id);
        $categoria->status = 0;
        $categoria->save();

        return redirect('/categorias');
    }
}
