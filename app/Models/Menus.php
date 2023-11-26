<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menus';
    
    protected $fillable = ['nombre','descripcion','precio','id_categoria','status'];
    public function categorias()
    {
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id');
    }
}
