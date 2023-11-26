<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Menus;
use App\Models\Categorias;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menus::where('status', 1)
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
                  return view('menus.index')
                  ->with('user', $user)
                  ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::select('id','nombre')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
                  return view('menus.create')
                  ->with('user', $user)
                ->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'descripcion' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'precio' =>['required', 'numeric', 'min:0'],
            'id_categoria' => ['required']
        ]);

        Menus::create([
            'nombre' => $request ->nombre,
            'descripcion' =>$request -> descripcion,
            'precio' =>$request -> precio,
            'id_categoria' => $request -> id_categoria,
            'status' =>1,
        ]);


        /* Menus::create($datos); */
        return redirect('/menus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menus::find($id);
        $user = Auth::user();
        return view('menus.read')
        ->with('user', $user)
        ->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menus::find($id);
        $categorias = Categorias::select('id','nombre')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
                  return view('menus.edit')
                  ->with('user', $user)
               ->with('menu', $menu)
               ->with('categorias',$categorias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menus::find($id);
        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'descripcion' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'precio' =>['required', 'numeric', 'min:0'],
            'id_categoria' => ['required']
        ]);

        $menu->update([
            'nombre' => $request ->nombre,
            'descripcion' =>$request -> descripcion,
            'precio' =>$request -> precio,
            'id_categoria' => $request -> id_categoria,
            'status' =>1,
        ]);

        /* $menu->update($datos); */
        return redirect('/menus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menus::find($id);
        $menu->status = 0;
        $menu->save();
        return redirect('/menus');
    }
}
