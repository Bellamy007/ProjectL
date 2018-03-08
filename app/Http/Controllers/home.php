<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class home extends Controller
{
    //
    public function index(){
    	return view('home/contenido');
    }
}
