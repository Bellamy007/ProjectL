<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipos_usu extends Model
{
      protected $table = 'tipos_usu';
    protected $primaryKey='id_tipo';
    protected $fillable=['id_tipo','tipo','activo'];
}
