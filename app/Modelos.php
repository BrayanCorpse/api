<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $primaryKey = 'modelo_id';
    protected $fillable = ['modelo_id', 'año'];
}
