<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_venta extends Model
{
    protected $table = 'detalles_venta';

    protected $fillable = ['id_venta','id_menu','cantidad','precio_venta','status'];
    public function ventas()
    {
        return $this->belongsTo('App\Models\Ventas', 'id_venta', 'id');
    }
    public function menus()
    {
        return $this->belongsTo('App\Models\Menus', 'id_menu', 'id');
    }
}
