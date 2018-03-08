<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalogo_cuentas extends Model
{
    //
    protected $primaryKey='codigo_agrupador';
    protected $fillable=['codigo_agrupador','cuenta','activo'];
}
