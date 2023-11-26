<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodos_pago extends Model
{
    protected $table = 'metodos_pago';
    
    protected $fillable = ['forma_pago','status'];
}
