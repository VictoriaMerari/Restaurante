<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Models\Fotos_menu;
use App\Models\Menus;


class Fotos_menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos_menu = Fotos_menu::where('status', 1)
                  ->orderBy('id')->get();
                  $user = Auth::user();
        return view('fotos_menu.index')
        ->with('user', $user)
        ->with('fotos_menu', $fotos_menu);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menus::select('id','nombre')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
        return view('fotos_menu.create')
                ->with('user', $user)
                ->with('menus',$menus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $hora = date('H.i.s');
        $fecha = date('d-m-Y');
        $prefijo = $fecha."_".$hora;

        $archivo = $request->file('foto');

        $nombre_foto = $prefijo."_".$archivo->getClientOriginalName();

        $rl = Storage::disk('fotografias')->put($nombre_foto, \File::get($archivo) );

        if ($rl) {
            $datos['status'] = 1;
            $datos['ruta'] = $nombre_foto;
            Fotos_menu::create($datos);
            return redirect('/fotos_menu');
        } else {
            return 'Error al intentar guardar la foto.<br/><br/><a href="../fotos_menu">REGRESAR A LAS FOTOS</a>';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foto_menu = Fotos_menu::find($id);
        $user = Auth::user();
        return view('fotos_menu.read')
        ->with('user', $user)
        ->with('foto_menu', $foto_menu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $foto_menu = Fotos_menu::find($id);
        $menus = Menus::select('id','nombre')
                  ->orderBy('nombre')->get();
                  $user = Auth::user();
        return view('fotos_menu.edit')
                ->with('user', $user)
               ->with('foto_menu', $foto_menu)
               ->with('menus',$menus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $datos = $request->all();
        $foto_menu= Fotos_menu::find($id);
        $hora = date('H.i.s');
        $fecha = date('d-m-Y');
        $prefijo = $fecha."_".$hora;

        $archivo = $request->file('foto');

        $nombre_foto = $prefijo."_".$archivo->getClientOriginalName();

        $rl = Storage::disk('fotografias')->put($nombre_foto, \File::get($archivo) );

        if ($rl) {
            $datos['status'] = 1;
            $datos['ruta'] = $nombre_foto;
            $foto_menu->update($datos);

            return redirect('/fotos_menu');
        } else {
            return 'Error al intentar guardar la foto.<br/><br/><a href="../fotos_menu">REGRESAR A LAS FOTOS</a>';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto_menu = Fotos_menu::find($id);
        $foto_menu->status = 0;
        $foto_menu->save();
        return redirect('/fotos_menu');
    }
}
