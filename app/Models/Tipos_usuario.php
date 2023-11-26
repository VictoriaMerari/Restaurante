<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_usuario extends Model
{
    protected $table = 'tipos_usuario';
    
    protected $fillable = ['nombre','nivel','descripcion','status'];
}
