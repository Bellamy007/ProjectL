<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresas extends Model
{
    //
    use SoftDeletes;
    protected $table = 'users';
    protected $fillable = ['id','id_usuario','name','email','password','remember_token','created_at','updtated_at'];
    public $timestamps = false;

}
