<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalles_venta;
use App\Models\Ventas;
use App\Models\Menus;
use App\Models\Categorias;
use App\Models\User;


class PdfController extends Controller
{
    public function genera_pdf(){
        return view("Pdf.listado_reportes");
    }

    public function crearPDF($datos,$vistaurl,$tipo){
        $data=$datos;
        $date=date('Y-m-d');
        $view= \View::make($vistaurl,compact('data','date'))->render();
        $pdf= \App::make('dompdf.wrapper');
        $pdf-> loadHTML($view);
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }

    public function crearPDFVenta($venta,$detalle_venta,$vistaurl,$tipo){
        $data_venta=$venta;
        $data_detalle_venta=$detalle_venta;
        $date=date('Y-m-d');
        $view= \View::make($vistaurl,compact('data_venta','data_detalle_venta','date'))->render();
        $pdf= \App::make('dompdf.wrapper');
        $pdf-> loadHTML($view);
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }

    public function menus_nombre($tipo){
        $vistaurl = "Pdf.reporte_de_menus";
        $menus = Menus::where('status',1)
            ->orderBy('nombre')->get();
        return $this->crearPDF($menus,$vistaurl,$tipo);
    }

    public function ticket($tipo){
        $vistaurl = "Pdf.reporte_ticket";
        $venta = Ventas::where('status',1)
        ->first();
        $detalle_venta= Detalles_venta::where('status',1)
        ->orderBy('id_venta', 'asc')
        ->get();
        return $this->crearPDFVenta($venta,$detalle_venta,$vistaurl,$tipo);
    }


}

