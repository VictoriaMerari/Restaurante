<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos_menu extends Model
{
    protected $table = 'fotos_menu';

    protected $fillable = ['ruta','id_menu','status'];
    public function menus()
    {
        return $this->belongsTo('App\Models\Menus', 'id_menu', 'id');
    }
}
