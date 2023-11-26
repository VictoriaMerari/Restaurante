<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuarios;
use App\Models\Municipios;
use App\Models\Tipos_usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::where('status', 1)
                  ->orderBy('id')->get();          
        return view('Usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = Municipios::select('id','nombre')
                  ->orderBy('nombre')->get();
        $tipos_usuario = Tipos_usuario::select('id','nombre')
                  ->orderBy('nombre')->get();          
        return view('Usuarios.create')
                ->with('municipios',$municipios)
                ->with('tipos_usuario',$tipos_usuario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        Usuarios::create($datos);
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::find($id);
        return view('Usuarios.read')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuarios::find($id);
        $municipios = Municipios::select('id','nombre')
                  ->orderBy('nombre')->get();
        $tipos_usuario = Tipos_usuario::select('id','nombre')
                  ->orderBy('nombre')->get();           
        return view('Usuarios.edit')
               ->with('usuario', $usuario)
               ->with('municipios',$municipios)
               ->with('tipos_usuario',$tipos_usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();
        $usuario = Usuarios::find($id);
        $usuario->update($datos);
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuarios::find($id);
        $usuario->status = 0;
        $usuario->save();
        return redirect('/usuarios');
    }
}
