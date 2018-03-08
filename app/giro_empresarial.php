<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giro_empresarial extends Model
{
    //
    protected $table = 'giro_empresarial';
    protected $primaryKey='id_giroE';
    protected $fillable=['id_giroE','giro','activo'];
}
