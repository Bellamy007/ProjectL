<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class razon_social extends Model
{
    //
    protected $table = 'razon_social';
    protected $primaryKey='id_razonS';
    protected $fillable=['id_razonS','razon','activo'];
}
