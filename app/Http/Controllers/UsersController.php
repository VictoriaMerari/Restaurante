<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Paises;
use App\Models\Entidades;
use App\Models\Municipios;
use App\Models\Tipos_usuario;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 1)
        ->orderBy('id')->get();
        $user = Auth::user();
    return view('users.index')->with('user', $user)
    ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Paises::select('id','nombre')
                  ->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')
                  ->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre')
                  ->orderBy('nombre')->get();
        $tipos_usuario = Tipos_usuario::select('id','nombre')
                  ->orderBy('nombre')->get();

                  $user = Auth::user();

        return view('Users.create')
                ->with('user', $user)
                ->with('paises',$paises)
                ->with('entidades',$entidades)
                ->with('municipios',$municipios)
                ->with('tipos_usuario',$tipos_usuario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();
        if ($usuario == null) {
            $request -> validate([
                'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
                'ap_paterno' =>['required','String','regex:/^[A-Za-z\s]+$/'],
                'ap_materno' =>['regex:/^[A-Za-z\s]+$/'],
                'correo' => ['required','String','email','unique:users,correo,' . $request->id_user],
                'telefono' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/','unique:users,telefono,' . $request->id_user],
                'password' => ['required'],
                'id_pais' => ['required'],
                'id_entidad' => ['required'],
                'id_municipio' => ['required']
            ]);

            User::create([
                'nombre' => $request ->nombre,
                'ap_paterno' =>$request -> ap_paterno,
                'ap_materno' =>$request -> ap_materno,
                'correo' => $request -> correo,
                'telefono' => $request -> telefono,
                'password' =>bcrypt($request ->password),
                'id_pais' => $request -> id_pais,
                'id_entidad' => $request -> id_entidad,
                'id_municipio' => $request -> id_municipio,
                'id_tipo_usuario' => 4,
                'status' =>1,
            ]);
        }elseif ($usuario->id_tipo_usuario ==1) {
            $request -> validate([
                'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
                'ap_paterno' =>['required','String','regex:/^[A-Za-z\s]+$/'],
                'ap_materno' =>['regex:/^[A-Za-z\s]+$/'],
                'correo' => ['required','String','email','unique:users,correo,' . $request->id_user],
                'telefono' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/','unique:users,telefono,' . $request->id_user],
                'password' => ['required'],
                'id_pais' => ['required'],
                'id_entidad' => ['required'],
                'id_municipio' => ['required'],
                'id_tipo_usuario' =>['required'],
            ]);

            User::create([
                'nombre' => $request ->nombre,
                'ap_paterno' =>$request -> ap_paterno,
                'ap_materno' =>$request -> ap_materno,
                'correo' => $request -> correo,
                'telefono' => $request -> telefono,
                'password' =>bcrypt($request ->password),
                'id_pais' => $request -> id_pais,
                'id_entidad' => $request -> id_entidad,
                'id_municipio' => $request -> id_municipio,
                'id_tipo_usuario' => $request ->id_tipo_usuario,
                'status' =>1,
            ]);
        }

        return back()->with('success', 'El registro se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('Users.read')
        ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $usuario = Auth::user();
        $paises = Paises::select('id','nombre')
        ->orderBy('nombre')->get();
        $entidades = Entidades::select('id','nombre')
        ->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre')
                  ->orderBy('nombre')->get();
        $tipos_usuario = Tipos_usuario::select('id','nombre')
                  ->orderBy('nombre')->get();

                  return view('users.edit')
                  ->with('usuario', $usuario)
               ->with('user', $user)
               ->with('paises',$paises)
               ->with('entidades',$entidades)
               ->with('municipios',$municipios)
               ->with('tipos_usuario',$tipos_usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);

    $usuario = Auth::user();
    if ($usuario->id_tipo_usuario !=1) {

        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'ap_paterno' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'ap_materno' =>['regex:/^[A-Za-z\s]+$/'],
            'correo' => ['required','String','email'],
            'telefono' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/'],
            'password' => ['required'],
            'id_pais' => ['required'],
            'id_entidad' => ['required'],
            'id_municipio' => ['required']
        ]);

        $user->update([
            'nombre' => $request ->nombre,
            'ap_paterno' =>$request -> ap_paterno,
            'ap_materno' =>$request -> ap_materno,
            'correo' => $request -> correo,
            'telefono' => $request -> telefono,
            'password' =>bcrypt($request ->password),
            'id_pais' => $request -> id_pais,
            'id_entidad' => $request -> id_entidad,
            'id_municipio' => $request -> id_municipio,
            'id_tipo_usuario' => 4,
            'status' =>1,
        ]);
    }elseif ($usuario->id_tipo_usuario ==1) {
        $request -> validate([
            'nombre' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'ap_paterno' =>['required','String','regex:/^[A-Za-z\s]+$/'],
            'ap_materno' =>['regex:/^[A-Za-z\s]+$/'],
            'correo' => ['required','String','email','unique:users,correo,' . $request->id_user],
            'telefono' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]+$/','unique:users,telefono,' . $request->id_user],
            'password' => ['required'],
            'id_pais' => ['required'],
            'id_entidad' => ['required'],
            'id_municipio' => ['required'],
            'id_tipo_usuario' =>['required'],
        ]);

        $user->update([
            'nombre' => $request ->nombre,
            'ap_paterno' =>$request -> ap_paterno,
            'ap_materno' =>$request -> ap_materno,
            'correo' => $request -> correo,
            'telefono' => $request -> telefono,
            'password' =>bcrypt($request ->password),
            'id_pais' => $request -> id_pais,
            'id_entidad' => $request -> id_entidad,
            'id_municipio' => $request -> id_municipio,
            'id_tipo_usuario' => $request ->id_tipo_usuario,
            'status' =>1,
        ]);
    }

    return back()->with('success', 'El registro se ha registrado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect('/users');
    }
}
