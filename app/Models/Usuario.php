<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticable
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'password',
        'admin',
        'email',
        'token',
        'active_token',
        'data_registro',
        'img_perfil',
        'descripcion',
        'emial_verified_at'
    ];
    protected $hidden = ['password', 'remember_token'];
    public function isAdmin(){
        return (bool)$this->admin;
    }

    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }
}
