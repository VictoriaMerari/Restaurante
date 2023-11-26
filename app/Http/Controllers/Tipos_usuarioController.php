<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Tipos_usuario;

class Tipos_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_usuario = Tipos_usuario::where('status', 1)
                  ->orderBy('nivel')->get();
                  $user = Auth::user();
        return view('tipos_usuario.index')
            ->with('user', $user)
			->with('tipos_usuario', $tipos_usuario);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('tipos_usuario.create')
        ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'nivel' =>['required', 'numeric', 'min:0','unique:tipos_usuario,nivel,' . $request->id_tipo_usuario],
            'descripcion' =>['regex:/^[A-Za-z\s]+$/']
        ]);
        Tipos_usuario::create([
            'nombre' => $request ->nombre,
            'nivel' =>$request -> nivel,
            'descripcion' =>$request -> descripcion,
            'status' => 1,
        ]);
     /*   Tipos_usuario::create($datos); */
        return redirect('/tipos_usuario');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipo_usuario = Tipos_usuario::find($id);
        $user = Auth::user();
        return view('tipos_usuario.read')
        ->with('user', $user)
        ->with('tipo_usuario', $tipo_usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_usuario = Tipos_usuario::find($id);
        $user = Auth::user();
        return view('tipos_usuario.edit')
        ->with('user', $user)
        ->with('tipo_usuario', $tipo_usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo_usuario = Tipos_usuario::find($id);
        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'nivel' =>['required', 'numeric', 'min:0','unique:tipos_usuario,nivel,' . $request->id_tipo_usuario],
            'descripcion' =>['regex:/^[A-Za-z\s]+$/']
        ]);
        $tipo_usuario->update([
            'nombre' => $request ->nombre,
            'nivel' =>$request -> nivel,
            'descripcion' =>$request -> descripcion,
            'status' => 1,
        ]);
        /* $tipo_usuario->update($datos); */
        return redirect('/tipos_usuario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Borrado lógico
        $tipo_usuario = Tipos_usuario::find($id);
        $tipo_usuario->status = 0;
        $tipo_usuario->save();

        return redirect('/tipos_usuario');
    }
}
