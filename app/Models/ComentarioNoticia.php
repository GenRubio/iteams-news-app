<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioNoticia extends Model
{
    use HasFactory;

    const COLOR_ADMIN = 2;
    const COLOR_USER = 1;
    const COLOR_GUEST = 0;

    protected $fillable = [
        'id_noticia	',
        'id_usuario',
        'nombre',
        'img_avatar',
        'color_id',
        'comentario',
        'fecha'
    ];
}
