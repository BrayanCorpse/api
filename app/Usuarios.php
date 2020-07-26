<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuarios extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['usuario_id', 'foto', 'name', 'apellidop', 'apellidom','genero', 'telefono','email', 'password', 'placa', 'comentario', 'marca_id','modelo_id'];
    protected $date=['deleted_at'];
}
