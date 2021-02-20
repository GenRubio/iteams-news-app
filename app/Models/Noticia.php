<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo	',
        'sub_titulo',
        'noticia',
        'data',
        'imagen	',
        'visitas',
        'categoria',
        'video'
    ];

    public function scopeFindByTitle($query, $title)
    {
        return $query->where('titulo', 'like',  '%' . $title . '%');
    }
}
