<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    protected $table = 'correos';

    protected $fillable = ['destinatario','asunto','contenido','fecha','status'];
}
