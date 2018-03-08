<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class rarController extends Controller
{
    //
    public function index(){
    	return view('administrador.dropzoneR');
    }
       public function postUpload(){
        $photo = Input::all();
        $file = Input::file('file');
        $name = $file->getClientOriginalName();
        $file_name = sha1(time().time()) . $name;
        $success = $file->move(public_path('uploads/recibidos'), $file_name);

    }
}
