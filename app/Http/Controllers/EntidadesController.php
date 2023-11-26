<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entidades;
use App\Models\Paises;

class EntidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $entidades = Entidades::where('status', 1)
                  ->orderBy('id_pais')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();

                  return view('entidades.index')
                  ->with('user', $user)
                  ->with('entidades', $entidades);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Paises::select('id','nombre')
                  ->orderBy('nombre')->get();
                  /*
        return view('Entidades.create')
                ->with('paises',$paises);
                */
                $user = Auth::user();
                return view('entidades.create')
                ->with('user', $user)
                ->with('paises', $paises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'id_pais' => ['required'],
            'nombre' => ['required','string','regex:/^[A-Za-z\s]+$/']
        ]);

        Entidades::create([
            'id_pais' => $request ->id_pais,
            'nombre' => $request ->nombre,
            'status' =>1,
        ]);
        /*
        $datos = $request->all();
        Entidades::create($datos);
        */
        return redirect('/entidades');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entidad = Entidades::find($id);
        /*return view('Entidades.read')
                ->with('entidad', $entidad); */
                $user = Auth::user();
                return view('entidades.read')
                ->with('user', $user)
                ->with('entidad', $entidad);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $entidad = Entidades::find($id);
        $paises = Paises::select('id','nombre')
                  ->orderBy('nombre')->get();
        /* return view('Entidades.edit')
               ->with('entidad', $entidad)
               ->with('paises',$paises);*/
               $user = Auth::user();
        return view('entidades.edit')
        ->with('user', $user)
        ->with('entidad', $entidad)
        ->with('paises',$paises);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $entidad = Entidades::find($id);

        $request -> validate([
            'id_pais' => ['required'],
            'nombre' => ['required','string','regex:/^[A-Za-z\s]+$/']
        ]);

        $entidad->update([
            'id_pais' => $request ->id_pais,
            'nombre' => $request ->nombre,
            'status' =>1,
        ]);
        /* $entidad->update($datos); */
        return redirect('/entidades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entidad = Entidades::find($id);
        $entidad->status = 0;
        $entidad->save();
        return redirect('/entidades');
    }
}
