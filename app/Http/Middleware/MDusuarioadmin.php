<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Session;
use Illuminate\Support\Facades\Auth;

class MDusuarioadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usuario_actual = session('usuarioactual');
        if(isset($usuario_actual)){
            if($usuario_actual->id_tipo_usuario!=1){
                return redirect('sin_acceso');
            }
        }else
            return redirect('login');

        return $next($request);

    }
}
