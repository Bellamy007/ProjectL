<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresas extends Model
{
    //
    use SoftDeletes;
    protected $table = 'empresas';
    protected $primaryKey='id_empresa';
    protected $fillable = ['id_empresa','nombre','rfc','domicilio','id_giroE','id_razonS','id_usuario','activo','Created_at','Updtated_at','ano_inicial'];
    protected $date=['deleted_at'];
    public $timestamps = false;

}
