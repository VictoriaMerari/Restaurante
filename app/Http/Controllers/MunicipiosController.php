<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Municipios;
use App\Models\Entidades;
use App\Models\Paises;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipios::where('status', 1)
                  ->orderBy('id_entidad')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
        return view('municipios.index')
        ->with('user', $user)
        ->with('municipios', $municipios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidades = Entidades::select('id','nombre')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
       $paises = Paises::select('id','nombre')
             ->orderBy('nombre')->get();
        $user = Auth::user();
        return view('municipios.create')
                ->with('user', $user)
                ->with('entidades',$entidades)
                ->with('paises',$paises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id_entidad' =>['required'],
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        Municipios::create([
            'id_entidad' => $request ->id_entidad,
            'nombre' =>$request -> nombre,
            'status' =>1,
        ]);
        /* Municipios::create($datos);*/
        return redirect('/municipios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $municipio = Municipios::find($id);
        $user = Auth::user();
        return view('municipios.read')
        ->with('user', $user)
        ->with('municipio', $municipio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipio = Municipios::find($id);
        $paises = Paises::select('id','nombre')
        ->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')
                ->where('id_pais',$municipio->entidades->id_pais)
                ->orderBy('nombre')->get();

                  $user = Auth::user();
        return view('municipios.edit')
                ->with('user', $user)
               ->with('municipio', $municipio)
               ->with('entidades',$entidades)
               ->with('paises',$paises);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $municipio = Municipios::find($id);
        $request -> validate([
            'id_entidad' =>['required'],
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/']
        ]);
        $municipio->update([
            'id_entidad' => $request ->id_entidad,
            'nombre' =>$request -> nombre,
            'status' =>1,
        ]);
       /* $municipio->update($datos); */
        return redirect('/municipios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio = Municipios::find($id);
        $municipio->status = 0;
        $municipio->save();
        return redirect('/municipios');
    }

    /* AJAX PARA CAMBIAR COMBO */
    public function cambia_combo($id_pais){
        $entidades = Entidades::
                    select('id','nombre')
                    ->where('id_pais',$id_pais)
                    ->orderBy('nombre')
                    ->get();
        return $entidades;
    }

    public function cambia_combo_2($id_entidad){
        $municipios = Municipios::
                    select('id','nombre')
                    ->where('id_entidad',$id_entidad)
                    ->orderBy('nombre')
                    ->get();
        return $municipios;
    }

}
