<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\catalogo_cuentas;
use DB;

class Contabilidad extends Controller
{
    //
    public function apertura(){
    	$catalogo  = DB::table('catalogo_cuentas')->get();
    	return view('contabilidad.apertura',['catalogo' => $catalogo]);
    }
}
