<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['fecha','subtotal','iva','total','id_user','id_metodo_pago','descuento','status'];
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function metodos_pago()
    {
        return $this->belongsTo('App\Models\Metodos_pago', 'id_metodo_pago', 'id');
    }
}
