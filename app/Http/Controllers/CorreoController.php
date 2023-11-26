<?php

namespace App\Http\Controllers;

use App\Models\Correos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function index()
    {
        $correos = Correos::where('status', 1)
                  ->orderBy('id')->get();
        return view('Correo.index')
                  ->with('correos', $correos);
    }

    public function create()
    {
        return view('Correo.form_mail');
    }

    public function formulario_correo()
    {
        return view("Correo.form_mail");
    }

    public function enviar(Request $request)
    {


        $destinatario=$request->input("destinatario");
        $asunto=$request->input("asunto");
        $contenido=$request->input("contenido");

        $data = array('contenido' => $contenido);
        $r = Mail::send('Correo.plantilla_correo', $data, function ($message) use ($asunto,$destinatario)
        {
            $message->from('vcastillov@toluca.tecnm.mx', 'ALU Victoria Castillo');
            $message->to($destinatario)->subject($asunto);
        });

        $datos = $request->all();
        Correos::create($datos);


        if(!$r){
            return view("Mensajes.plantillamensaje")
            ->with('var','2')
            ->with('msj','Error al enviar el correo')
            ->with('ruta_boton','bienvenida')
            ->with('mensaje_boton','HOME');
        }else{
            return view("Mensajes.plantillamensaje")
            ->with('var','1')
            ->with('msj','Correo enviado exitosamente')
            ->with('ruta_boton','bienvenida')
            ->with('mensaje_boton','HOME');
        }
    }

    public function destroy(string $id)
    {
        $correo = Correos::find($id);
        $correo->status = 0;
        $correo->save();
        return redirect('/correos');
    }
}
