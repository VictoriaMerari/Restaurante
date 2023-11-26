<?php
/**NameSpace */
namespace App\Http\Controllers;

/**Illuminate */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use App\Models\Ventas;
use App\Models\Detalles_venta;
use App\Models\Menus;

/**Models */
use App\Models\User;

class AuthController extends Controller
{
    public function loginindex(){
        $user = Auth::user();
            return view('auth.login')
            ->with('user', $user);

    }

    public function getUser(){
        $user = Auth::user();
        $m= Menus::orderBy('id') ->get();
        $v = Ventas::where('subtotal','>',0)->orderBy('id') ->get();
        $dv = Detalles_venta::orderBy('id') ->get();
        if ($user ==null) {
            return view('bienvenida', [
                'user'=> $user
            ]);
        }else {
            if ($user->tipos_usuario->nivel ==1) {
                return view('bienvenidaAdmin', [
                    'user'=> $user
                ]);
            }else if ($user->tipos_usuario->nivel ==3) {
                return view('bienvenidaMesero')->with('user', $user)
                ->with('v', $v)
                ->with('dv', $dv);
            }else if ($user->tipos_usuario->nivel ==2) {
                return view('bienvenidaChef')->with('user', $user)
                ->with('dv', $dv);
            }else if ($user->tipos_usuario->nivel ==4) {
                return view('Ajax.productos_en_venta')->with('user', $user);
            }
        }


    }

    public function obtenerUser(){
        $user = Auth::user();
        if ($user ==null) {
            return view('bienvenida', [
                'user'=> $user
            ]);
        }else {
            if ($user->tipos_usuario->nivel == 4 || $user->tipos_usuario->nivel == 3 || $user->tipos_usuario->nivel == 2 || $user->tipos_usuario->nivel == 1 )
             { return view('infPersonal', [ 'user' => $user ]); }
        }
    }


    public function loginstore(Request $request){
        $credentials = $request->validate([
            'correo' => ['required', 'string', 'email', 'max:80'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($credentials, false)) {
            throw ValidationException::withMessages([
                'correo' => 'No se encontrarón credenciales que coincidan con la información proporcionada'
            ]);
        }
        $request->session()->regenerate();
        // return redirect()->intended()->with('status', 'Ya iniciaste sesión');
        $user = Auth::user();
        if ($user->tipos_usuario->nivel ==1) {
            // return view('bienvenidaAdmin');
            return to_route('adminWelcome');
        }else if ($user->tipos_usuario->nivel ==3) {
            return to_route('waiterWelcome');
        }else if ($user->tipos_usuario->nivel ==2) {
            return to_route('chefWelcome');
        }
        else if ($user->tipos_usuario->nivel ==4) {
            return to_route('ajax');
        }


    }
         /**Log Out */
         public function logOutDestroy(Request $request)
         {
            Ventas::where('status',1)
            ->where('id_user', Auth::user()->id)
            ->update(['status'=>0]);

             Auth::logout();
             $request->session()->invalidate();
             $request->session()->regenerateToken();
             return to_route('auth.login')->with('status', 'Sesión Finalizada');
         }
}

