<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\usuarios;
use App\Users;
use App\Empresas;
use App\Pagos;
use Redirect;
use Session;
use Mail; 
use DB;
use App\tipos_usu;
use Crypt;
 

class usuarioss extends Controller
{
    //
    public function login()
    {
    	return view('usuarios.login');
    }
    public function valida(Request $request)
   {
   	//se reciben variables del formulario LOGIN
      $usuario=  $request->input('usu');
	  $contrasena=  $request->input('contrasena');
	  $usuario2=  sha1($usuario);
	  $contrasena2=  sha1($contrasena);
	  //se realiza una consulta para identificar al usuario en la BD
	  $consulta = \DB::table('usuarios')
          ->join('tipos_usu','usuarios.id_tipo','=','tipos_usu.id_tipo')
          ->select('usuarios.id_usuario','usuarios.usuario','usuarios.ap_paterno','usuarios.ap_materno','usuarios.contrasena','usuarios.activo','usuarios.nombre','tipos_usu.tipo')
        ->where('usuario','=',$usuario2)
	                        ->where('contrasena','=',$contrasena2)
							->where('usuarios.activo','=','SI')
							->get();

		//Se realiza una condicion para validar la sesion
	  if (count($consulta)==0)
	  {
	  	//si la consulta es igual a 0 busca en la tabla de users
	  	$consulta2 = \DB::table('Users')
	  	->join('usuarios','usuarios.id_usuario','=','users.id_usuario')
        ->select('users.id','usuarios.id_usuario','usuarios.nombre','users.name','users.email','users.password')
        ->where('name','=',$usuario)
	                        ->where('password','=',$contrasena2)
							->get();

			if (count($consulta2)==0){
				//mensaje de error no encontro nada o hubo un error
				$mensaje = Session::flash('error','El usuario no existe o la contraseña no es correcta');
				return redirect()->route('login',compact('mensaje'));	
			}
				else{
					//si hubo resultados manda a la vista para los sub usuarios
				  Session::put('sesionname',$consulta2[0]->name);
				  Session::put('sesionid_usuario',$consulta2[0]->id);
				  Session::put('sesionid_users',$consulta2[0]->id_usuario);
				  Session::put('sesiontipo','Sub Usuario');	

				  return redirect()->route('bienvenido');
				}
	  }
	  else
	  {
	  	if ($consulta[0]->tipo=="Usuario") {
	  		//si es un usuario manda a la vista para los usuarios
	  		 Session::put('sesionname',$consulta[0]->nombre);
		  Session::put('sesionid_usuario',$consulta[0]->id_usuario);
		  Session::put('sesionap_pat',$consulta[0]->ap_paterno);
	      Session::put('sesionap_mat',$consulta[0]->ap_materno);
	      Session::put('sesiontipo',$consulta[0]->tipo);
	      
		  return redirect()->route('bienvenidousu');	 
		 }
		 if ($consulta[0]->tipo=="Administrador") {
		 	//si es administrador manda a la vista de administradores
		 	 Session::put('sesionname',$consulta[0]->nombre);
		  Session::put('sesionid_usuario',$consulta[0]->id_usuario);
		  Session::put('sesionap_pat',$consulta[0]->ap_paterno);
	      Session::put('sesionap_mat',$consulta[0]->ap_materno);
	      Session::put('sesiontipo',$consulta[0]->tipo);
	      
		  return redirect()->route('bienvenidoAdmin');
		 }
	  	else{
	  		//si es super usuario manda al login de SU
		  return redirect()->route('loginSU');
		}
	  }
   }
//---------------------Incio supusuario--------------------------//
 public function inicio(){
 	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');
    
    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{
    	//consulta la base de datos para encontrar los sub usuarios del cliente(usuario)
    	$usuario = \DB::table('Users')
    	->select('users.id_usuario')
    	->where('users.id','=',$sid_usuario)
    	->get();
    	foreach ($usuario as $usu) {
    		//Consulta las empresas que estan relacionadas con el sub usuario
    	$empresas=  \DB::table('Empresas')
				  ->join('usuarios','usuarios.id_usuario','=','empresas.id_usuario')  
				  ->select('empresas.nombre','empresas.id_empresa','empresas.rfc') 
				  ->where('empresas.id_usuario','=',$usu->id_usuario)
				  ->get();
				}
		/*$periodo = DB::select("select * from periodo");//consulta periodo para el select
		$mes = DB::select("select * from mes");//consulta mes para el select

      return view('sistema.bienvenido',compact('empresas','periodo','mes'));*/
      return view('sistemausu.selectempresa',compact('empresas'));
    }
   } 


       public function iniciou(Request $request){
 	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');

    $rfc = Session::put('rfcs',$request->rfc);
    $rfc2 = Session::get('rfcs');

    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{     
      return view('sistemausu.inicio');
    }
   } 
   //---------------------Incio usuario --------------------------//
 public function iniciousu(){
 	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');
    
    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{
    	//bsuca todas las empresas del cliente(usuario)
    	$empresas=  \DB::table('Empresas')
				  ->join('usuarios','usuarios.id_usuario','=','empresas.id_usuario')  
				  ->select('empresas.nombre','empresas.id_empresa','empresas.rfc') 
				  ->where('empresas.id_usuario','=',$sid_usuario)
				  ->get();
		
		/*$periodo = DB::select("select * from periodo");//consulta periodo para el select
		$mes = DB::select("select * from mes");//consulta mes para el select

      return view('sistema.bienvenido',compact('empresas','periodo','mes')); */
      //return view('sistemausu.inicio',compact('empresas'));
      return view('sistemausu.selectempre',compact('empresas'));
    }
   } 

    public function iniciousuario(Request $request){
 	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');

    $rfc = Session::put('rfcs',$request->rfc);
    $rfc2 = Session::get('rfcs');

    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{     
      return view('sistemausu.inicio');
    }
   } 
        //---------------Inicio Administrador -----------//
    public function inicioAdmin(){
    	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');
    
    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{
    	//manda a la vista para el administrador
      return view('administrador.principal');
    }
   }

 //------------------Cerrar Sesión ---------------------------------//
    public function cerrarsesion(){
    //forget limpia la session y flush la elimina
    Session::forget('sesionname');
    Session::forget('sesionid_usuario');
    Session::forget('sesiontipo');
    Session::flush();
    Session::flash('error','Sesión cerrada correctamente');
    return redirect()->route('login');
   }
//----------------Alta de usuario---------------------------//
    public function muestraformulario()
    {
		 $sname = Session::get('sesionname');
		 $sidu = Session::get('sesionid_usuario');
	     $stipo = Session::get('sesiontipo');
		 if ($sname =='' or $sidu=="" or $stipo=="")
		 {
			Session::flash('ulogin', 'Es necesario loguearse antes de continuar');
			return redirect()->route('login');
		 }
	     else
		 {
	        $clavequesigue = usuarios::orderBy('id_usuario','desc')->take(1)->get();
	        $idus = $clavequesigue[0]->id_usuario+1;
	    	return view('usuarios.altausuario')->with(['idus'=>$idus]);
		}
	}
/////// Alta Usuarios \\\\\\\\\\\\
	public function Usuario(){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$users = DB::table('usuarios')
			->where('activo','=','si')
			->get();
			return view('usuarios.usuario',['usuarion'=> $users ]);
		}
	}
	public function newUser(){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$tipo = DB::table('tipos_usu')->get();
			return view('usuarios.formulario_alta',['tipo'=> $tipo]);
		}
	}
	public function recibeinformacion(Request $request){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$create = usuarios::create($request->all());
			return view('usuarios.altaexitosa');

		}
	}
//--------------------EDITAR USUARIO -------------------------------//
	public function index($id){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$usuario = DB::table('usuarios')
			->join('tipos_usu','tipos_usu.id_tipo','=','usuarios.id_tipo')
			->select('usuarios.id_usuario','usuarios.nombre','usuarios.ap_paterno','usuarios.ap_materno','usuarios.usuario','usuarios.contrasena','usuarios.crear','usuarios.modificar','usuarios.eliminar','usuarios.ver','usuarios.id_tipo','usuarios.activo','tipos_usu.tipo')
			->where('usuarios.id_usuario',$id)
			->get();

			$tipo_usu= tipos_usu:: where('id_tipo','!=',$usuario[0]->id_tipo)
			->orderBy('tipo','asc')
			->get();
			return view('administrador.usuarioAdmin.edituser')-> with(['usuario'=>$usuario[0]])
											   -> with(['tipo_usu'=>$tipo_usu]);	
		}
	}
//---------------------Modifica------------------------//
	public function update(Request $request, $id){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$usuario = usuarios::find($id);
			$usuario->nombre = $request->nombre;
			$usuario->ap_paterno = $request->apellidop;
			$usuario->ap_materno = $request->apellidom;
			$usuario->usuario = $request->usuario;
			$usuario->contrasena = $request->password;
			$usuario->crear = $request->crear;
			$usuario->modificar= $request->modificar;
			$usuario->eliminar= $request->eliminar;
			$usuario->ver= $request->ver;
			$usuario->id_tipo= $request->id_tipo;
			$usuario->save();
			return view('usuarios.modexitosa');
		}
	}
	//------------------------ELIMINAR USUARIO -------------------------//	
	public function delite($id){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$user = DB::delete('UPDATE usuarios SET activo = "NO" where id_usuario = ?',[$id]) ;
			echo "El usuario ".$user['nombre']." fue eliminado exsitosamente !";
			return redirect('usuario')->with('warning', 'Usuario Eliminado Exitosamente !!');
		}
	}
 //--------------- Administrador -----------//

   public function adduser(){
   		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
	      $tipo = DB::table('tipos_usu')->get();
	        return view('administrador.usuarioAdmin.usersadmin',['tipo' => $tipo]);
	    }
	}
//-----------------------------------------------------------//
     public function reciveinfo(Request $request){
     		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$create = Usuarios::create($request->all());
				return redirect('/show');
	    }
	}
//-----------------------------------------------------------//
	public function showuser(){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$users = DB::table('usuarios')
			->where('activo','=','si')
			->get();
			return view('administrador.usuarioadmin.usershow',['usuarion'=> $users ]);
		}
	}
//--------------------------------------------------------//
	public function showsub(){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
			$users = DB::select('select * from viewsubsuarios');
			return view('administrador.usuarioadmin.subusers',['usuarion'=> $users ]);
		}
	}
//---------------------------------------------------------//
	public function prueba2(){
		$user = DB::table('usuarios')->where('name', 'John')->first();
	}
//-------------------------PAGOS ----------------------//
	 public function altapago(){
	 	//sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');
    
    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{
    	//consulta todos los usuarios(clientes)
    	$usuario = DB::table('usuarios')
		->select('nombre','ap_paterno','ap_materno','id_usuario')
		->where('id_tipo','=', 2)
		->where('activo','=','Si')
		->get();
		$contrato =\DB::select("SELECT id_contrato, tipo, costo, limite_users FROM contratos ORDER BY tipo ASC");//consulta los tiposde contratos que existen

      return view('administrador.pagos',compact('usuario','contrato'));//manda vista pagos
    }
   } 
//--------------------Consulta el costo y limite de usuarios de cada contrato-----------------//
  public function contrato($id_contrato)
	{
		$contrato = DB::table('contratos')
			->where('id_contrato',$id_contrato)
			->get();
			foreach($contrato as $fila)
			{
			?>
				$<?=$fila -> costo ?>,   Limite de usuarios   <?=$fila -> limite_users ?>
			<?php
			}
	}

  //------------lOGIN SUPER USUARIO --------------------------//
    public function loginSU()
    {
    	return view('administrador.login');
    }
 //-------------------Valida login del SU -------------------//
    public function validaSU(Request $request)
   {
   	//se reciben variables del formulario LOGIN
      $usuario=  $request->input('usuario');
	  $contrasena=  $request->input('contrasena');
	  //se realiza una consulta para identificar al usuario en la BD
	  $consultasu = \DB::table('usuarios')
          ->join('tipos_usu','usuarios.id_tipo','=','tipos_usu.id_tipo')
          ->select('usuarios.id_usuario','usuarios.usuario','usuarios.ap_paterno','usuarios.ap_materno','usuarios.contrasena','usuarios.activo','usuarios.nombre','tipos_usu.tipo')
          ->where('usuario','=',$usuario)
	      ->where('contrasena','=',$contrasena)
		  ->where('usuarios.activo','=','SI')
		  ->where('usuarios.id_tipo','=',3)
		  ->get();

		//Se realiza una condicion para validar la sesion
	  if (count($consultasu)==0)
	  {
	  		//manda mensaje de error 
	  		$mensaje = Session::flash('error','El usuario no existe o la contraseña no es correcta');
			return redirect()->route('loginSU',compact($mensaje));		
		}
		else{
			//manda datos de sesión 
			Session::put('sesionname',$consultasu[0]->nombre);
			Session::put('sesionid_usuario',$consultasu[0]->id_usuario);
			Session::put('sesionap_pat',$consultasu[0]->ap_paterno);
			Session::put('sesionap_mat',$consultasu[0]->ap_materno);
			Session::put('sesiontipo',$consultasu[0]->tipo);
	      
			return redirect()->route('bienvenidoSU');
		}
	}
//--------------- Manda a la vista de inicio del SU -------------------//
	    public function inicioSU(){
		    $sname = Session::get('sesionname');
		    $sid_usuario = Session::get('sesionid_usuario');
		    $stipo = Session::get('sesiontipo');
		    
		    if($sname=='' or $sid_usuario=='' or $stipo == ''){
		      Session::flash('error','Es nesesario loguearse antes de continuar');
		      return redirect()->route('login');
		    }
		    else{
		      return view('superusuario.bienvenido');
		    }
	   }
//------------------Alta Pago ---------------------------------//
	   public function guardapago(Request $request){
	   	//sesiones
          $sname = Session::get('sesionname');
          $sid_usuario = Session::get('sesionid_usuario');
          $stipo = Session::get('sesiontipo');
          
          if($sname=='' or $sid_usuario=='' or $stipo == ''){
            Session::flash('error','Es nesesario loguearse antes de continuar');
            return redirect()->route('login');
          }
          else{
          	//valida los datos del formulario  
               $rules = ['id_usuario' => 'required|integer|not_in:0',
            'estatus' => 'required|alpha|not_in:0',
            'id_contrato' => 'required|integer|not_in:0'];
 			//mensajes de eror 
            $messages = ['id_usuario.required' => 'Seleccione un cliente.',
            'id_usuario.integer' => 'Seleccione un cliente.',
            'id_usuario.not_in' => 'Seleccione un cliente.',
            'estatus.required' => 'Seleccione el estatus del pago.',
            'estatus.integer' => 'Seleccione el estatus del pago.',
            'estatus.not_in' => 'Seleccione el estatus del pago.',
            'id_contrato.required' => 'Seleccione un tipo de contrato.',
            'id_contrato.integer' => 'Seleccione un tipo de contrato.',
            'id_contrato.not_in' => 'Seleccione un tipo de contrato.'];

            $this->validate($request, $rules, $messages);//regresa los datos si esta mal

             $fecha = date('Y-m-j');  // esta variable guarda la fecha actual 
			        if($request->id_contrato == 1)
			        {
			           $fecha_final = strtotime ( '+1 month' , strtotime ( $fecha ) ) ; // esta variable se encarga de sumarle 1 mese a la fecha inicial  
			        }
			        elseif ($request->id_contrato == 2) {
			            $fecha_final = strtotime ( '+2 month' , strtotime ( $fecha ) ) ; 
			        }
			        elseif ($request->id_contrato == 3) {
			            $fecha_final = strtotime ( '+6 month' , strtotime ( $fecha ) ) ;
			        }
			        else 
			        {
			           $fecha_final = strtotime ( '+12 month' , strtotime ( $fecha ) ) ; 
			        }
			      $fecha_final = date ( 'Y-m-j' , $fecha_final ); //esta variable configura la fecha final
			      $fecha_limite = date('Y-m-j', strtotime ( '+7 day' , strtotime ( $fecha_final ) ) );//agrega 7 dias a la fecha final y la configura

            	$consulta = DB::table('pagos')->where('id_usuario','=',$request->id_usuario)->get();//consulta tablas pagos 

              if (count($consulta)==0) {
                	//si no se encuentran resultados en la tabla pagos inserta el nuevo pago
	              $pago = new Pagos;
			      $pago->id_usuario = $request->id_usuario;
			      $pago->fecha_inicio = $request->fecha_inicio;
			      $pago->estatus = $request->estatus;
			      $pago->id_contrato = $request->id_contrato;
			      $pago->cantidad = 1;
			      $pago->fecha_final = $fecha_final;
			      $pago->fecha_limite = $fecha_limite;
			      $pago->save();

			      	$call_procedure = DB::select("CALL inserta_bitacora($request->id_usuario,'$request->estatus',$request->id_contrato,'$request->fecha_inicio',$sid_usuario)");//manda llamar al procedimiento almaceenado para insrtar en la bitacora

			      	if($pago){
				          $mensaje="<p class='alert alert-success alert-dismissable'>Su pago se realizó con éxito, gracias!</p>";
				        }
				        else{
				           $mensaje="<p class='alert alert-danger alert-dismissable'>¡Lo sentimos!, No se registro el pago </p>";
				        }
				    return view('administrador.success',compact('mensaje'));//manda mensaje  
			    }
              else{
					//si encontro resultados solo modifica el que ya esta 
					foreach ($consulta as $cn) { $cantidad = $cn->cantidad +1;} //aumenta 1 a la cantidad

			       $update = \DB::update("update pagos set fecha_limite=?, fecha_inicio=?,cantidad=?, id_contrato =?,estatus =?, fecha_final=?  where id_usuario=?",[$fecha_limite,$request->fecha_inicio,$cantidad,$request->id_contrato,$request->estatus,$fecha_final,$request->id_usuario]);

			      $call_procedure = DB::select("CALL inserta_bitacora($request->id_usuario,'$request->estatus',$request->id_contrato,'$request->fecha_inicio',$sid_usuario)");//manda llamar al procedimiento almaceenado para insrtar en la bitacora

			      	if($update){
				          $mensaje="<p class='alert alert-success alert-dismissable'>Su pago se realizó con éxito, gracias!</p>";
				        }
				        else{
				           $mensaje="<p class='alert alert-danger alert-dismissable'>¡Lo sentimos!, No se registro el pago </p>";
				        }

				    return view('administrador.success',compact('mensaje')); //manda mensaje 
              }
           }
        }


//////////////Funcion forced//////////////////
// Esta funcion se encargar de eliminar     //
// definitivamente un registro              //       
//////////////////////////////////////////////
	 public function forced($id){
	 		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
	    	usuarios::withTrashed()->where('id_usuario',$id)->forceDelete();
	       	return redirect('/show');
	    }
	 }
/////////////FIN forced///////////////////////
//-------------------------------------------------------------------//
      public function control(){
      		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
		 $anuales = DB::select("SELECT * from anuales");
		 $semestrales = DB::select("SELECT * from semestrales");
		 $bimestrales = DB::select("SELECT * from bimestrales");
		 $pruebas = DB::select("SELECT * from pruebas");
		 $todas = DB::select("SELECT * from todas");
		 $totalt = DB::select("SELECT SUM(costo) as total FROM todas");
		 $totala = DB::select("SELECT SUM(costo) as total FROM anuales");
		 $totals = DB::select("SELECT SUM(precio) as total FROM semestrales");
		 $totalb = DB::select("SELECT SUM(costo) as total FROM bimestrales");

			return view('contabilidad.controlpagos', array('anuales' => $anuales,'semestrales' => $semestrales,'bimestrales' => $bimestrales,'pruebas' => $pruebas, 'todas' => $todas, 'totalt'=>$totalt,'totala'=>$totala,'totals'=>$totals,'totalb'=>$totalb));
		}
	}
//------------- Muestra bitacora--------------------------------//
    public function bita(){
    		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
	    	$users = DB::select("SELECT us.nombre AS nombre, b.estatus AS estatus, c.tipo AS contrato, b.fecha_alta AS fecha, b.`id_usuario` as idd FROM bitacora_pagos b INNER JOIN usuarios us ON b.`cliente` = us.`id_usuario` INNER JOIN contratos c ON c.id_contrato = b.id_contrato");
	  		return view('administrador.openbita',['usuarion'=> $users ]);
	  	}
	}
//----------------------DROPZONE---------------------------------//
	 public function drop() {
    		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
    		return view('administrador.drop');
    	}
    }


	public function uploads( ){
			//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{

         if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
			{
				if(isset($_GET["delete"]) && $_GET["delete"] == true)
				{
					$name = $_POST["filename"];
					if(file_exists('./uploads/'.$name))
					{
						unlink('./uploads/'.$name);
						//$deleted = DB::delete("delete from uploads where nombre=?",['name']);
						echo json_encode(array("res" => true));
					}
					else
					{
						echo json_encode(array("res" => false));
					}
				}
				else
				{
					$file = $_FILES["file"]["name"];
					$filetype = $_FILES["file"]["type"];
					$filesize = $_FILES["file"]["size"];

					if(!is_dir("uploads/"))
						mkdir("uploads/", 0777);

					if($file && move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$file))
					{

						echo "Se subieron corectamente los archivos";
					}

				}
			}
		}
	}

//------------- Lectura XML--------------------------------//
    public function lecturaxml(){
    		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{

    	$RE_receptor='<.*?Receptor.*?"(.*?)"';

		$RE_emisor='<.*?Emisor.*?"(.*?)"';

		$RE_fecha='.*?((?:2|1)\d{3}(?:-|\/)(?:(?:0[1-9])|(?:1[0-2]))(?:-|\/)(?:(?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))(?:T|\s)(?:(?:[0-1][0-9])|(?:2[0-3])):(?:[0-5][0-9]):(?:[0-5][0-9]))'; 


		$ruta = public_path('uploads/');
		$directorio = opendir( $ruta); //ruta actual
		while (false !== ($archivo = readdir($directorio))) //obtenemos un archivo y luego otro sucesivamente
		{
			if($archivo == "." || $archivo == ".." || (substr($archivo,-3) != "xml"))
				continue;
				$xmlCont=file_get_contents($ruta.$archivo);//verificamos si es o no un directorio
		    
					preg_match_all("/".$RE_fecha."/is",$xmlCont, $matches);
					$fechaxmlorig=$matches[1][0]; 
					unset($matches);

					//Extraer rfc del receptor
					preg_match_all('/'.$RE_receptor.'/is',$xmlCont, $matches); 
					$rfcxmlre=$matches[1][0]; // RFC del receptor
					unset($matches);

					//Extraer rfc del emisor
					preg_match_all('/'.$RE_emisor.'/is',$xmlCont, $matches); 
					$rfcxmlem=$matches[1][0]; // RFC del receptor
					unset($matches);

					$separa = explode('-',$fechaxmlorig);
                    $datos[]=['fechaxmlorig'=>$fechaxmlorig,'rfcxmlre'=>$rfcxmlre,'rfcxmlem'=>$rfcxmlem,'ano'=>$separa[0],'mes'=>$separa[1],'filename'=>$archivo];    
		}
		closedir($directorio);
                 //return view('sistema.leerxml',compact('datos'));

			foreach ($datos as $row){
                    $fichero=$ruta.$row['filename'];
                    $carpetaRfc = $ruta.$row['rfcxmlem'];
                    $carpetaAno = $carpetaRfc.'/'.$row['ano'];
                    $carpetaMes = $carpetaAno.'/'.$row['mes'];
                    $nuevoFichero=$carpetaMes."/".$row['filename'];
			
				if (!file_exists($carpetaRfc)) 
				{
				    mkdir($carpetaRfc, 0777, true);
					if (!file_exists($carpetaAno))
					{
					    mkdir($carpetaAno, 0777, true);
					}
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
                }
                else{
                	if (!file_exists($carpetaAno))
					{
					    mkdir($carpetaAno, 0777, true);
					}
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
	                else{
	                	rename($fichero, $nuevoFichero);
	                }
                }
			}
		}
	}

//----------------------Nuevo Miembro-------------------------------------//
   public function registro() {
    	$giro  = DB::table('giro_empresarial')->get();
        $razon = DB::table('razon_social')->get();
    	return view('usuarios.resgistro',compact('giro','razon'));
    }


    public function altaregistro(Request $request){
    		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{

    	 //recibe los datos del formulario y los guarda 

    	 $this->validate($request,['usuario' => ['regex:/^[A-Z]{1}[A-Z,a-z]+$/'],
            'contrasena' => ['regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/'],
            'radio' => 'required',
            'codigo' => ['regex:/^[A-Z]{3}[0-9]{3}$/']]);
            //mesnajes de eror 
            
    	if($request->codigo == 'PTS142')
			        {
			           $contrato = 1; 
			        }
			        elseif ($request->codigo == 'SWV375') {
			            $contrato = 3; 
			        }
			        elseif ($request->codigo == 'AED486') {
			        	$contrato = 4;
			        }
			        else 
			        {
			           $contrato = 1;
			        }
      $usuarios = new usuarios;
      $usuarios->nombre = $request->nombre;
      $usuarios->ap_paterno = $request->ap_paterno;
      $usuarios->ap_materno = $request->ap_materno;
      $usuarios->correo = $request->correo;
      $usuarios->usuario = sha1($request->usuario);
      $usuarios->contrasena = sha1($request->contrasena);
      $usuarios->id_contrato = $contrato;
      $usuarios->id_tipo = 2 ;
      $usuarios->activo = "Si";
      $usuarios->crear = "Si";
      $usuarios->modificar = "Si";
      $usuarios->eliminar = "Si";
      $usuarios->ver = "Si";
      $usuarios->save();
      if($usuarios){

      	  $rfc = $request->input('rfc');
          $yi = $request->input('yearstart');
          $yf = date("Y");
          $t = $yf - $yi;
          $aux = '0';
          
          $carpeta = 'uploads/Emitidos/'.$rfc;           
          
        if (!file_exists($carpeta)) 
        {
            mkdir($carpeta, 0777, true);  
            do
            {
            $m='1';
            $years = $carpeta.'/'.$yi;
            mkdir($years,0777, true);           
            $aux++;
            $yi++;


            do{ 
              if (strlen($m) === 1){
              $meses = $years.'/0'.$m;        
              mkdir($meses,0777, true);
              $m++;
              }
              else{
              $meses = $years.'/'.$m;         
              mkdir($meses,0777, true);
              $m++;
              }       
              
            }while($m<=12);
            
            }while($aux<=$t);
          

        } 


        $carpeta2 = 'uploads/Recibidos/'.$rfc;            
          
        if (!file_exists($carpeta2)) 
        { 
          $aux='0';
          $yi = $request->input('yearstart');
            mkdir($carpeta2, 0777, true); 
            do
            {

            $m='1';
            $years = $carpeta2.'/'.$yi;
            mkdir($years,0777, true);           
            
            $aux++;
            $yi++;


            do{ 
              if (strlen($m) === 1){
              $meses = $years.'/0'.$m;        
              mkdir($meses,0777, true);
              $m++;
              }
              else{
              $meses = $years.'/'.$m;         
              mkdir($meses,0777, true);
              $m++;
              }       
              
            }while($m<=12);
            
            }while($aux<=$t);

        } 

      	  $resultado = DB::select("SELECT MAX(id_usuario) AS id_usuario FROM usuarios");
          $x = $resultado[0]->id_usuario;

	      $empresa = new Empresas;
	      $empresa->nombre = $request->empresa;
	      $empresa->rfc = $request->rfc;
	      $empresa->id_giroE = $request->id_giroE;
	      $empresa->id_razonS = $request->id_razonS;
	      $empresa->id_usuario = $x;
	      $empresa->activo = "Si";
	      $empresa->ano_inicial = $request->yearstart;
	      $empresa->Created_at = new \DateTime;
	      $empresa->save();
	      
	      if ($empresa) {

	      	return redirect()->route('login');//returna a la busqueda de empresas */
	      }
  	  }
     }
    }

////////////////////////////////////////////////////////////////////////////////

   public function dropzone(){
   		//sesiones
	    $sname = Session::get('sesionname');
	    $sid_usuario = Session::get('sesionid_usuario');
	    $stipo = Session::get('sesiontipo');
	    
	    if($sname=='' or $sid_usuario=='' or $stipo == ''){
	      Session::flash('error','Es nesesario loguearse antes de continuar');
	      return redirect()->route('login');
	    }
	    else{
        return view('administrador.dropzone');
    	}
    }
 
    public function dropzoneStore(Request $request)
    {
    	$rfc = $request->rfc;
    	$ruta1 = public_path('uploads/Emitidos/'.$rfc);
    	
    	$photo = Input::all();
    	$file = Input::file('file');
  	    // $extension = File::extension($file);
  	    $name = $file->getClientOriginalName();
  	    //$file_name = sha1(time().time()) . $name;
  	    $success = $file->move($ruta1, $name);
  	    if ($success) {
    	$RE_receptor='<.*?Receptor.*?"(.*?)"';

		$RE_emisor='<.*?Emisor.*?"(.*?)"';

		$RE_fecha='.*?((?:2|1)\d{3}(?:-|\/)(?:(?:0[1-9])|(?:1[0-2]))(?:-|\/)(?:(?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))(?:T|\s)(?:(?:[0-1][0-9])|(?:2[0-3])):(?:[0-5][0-9]):(?:[0-5][0-9]))'; 

		$ruta = public_path("uploads/Emitidos/".$rfc."/");
		$directorio = opendir( $ruta); //ruta actual

		while (false !== ($archivo = readdir($directorio))) //obtenemos un archivo y luego otro sucesivamente
		{
			if($archivo == "." || $archivo == ".." || (substr($archivo,-3) != "xml"))
				continue;
				$xmlCont=file_get_contents($ruta.$archivo);//verificamos si es o no un directorio
		    
					preg_match_all("/".$RE_fecha."/is",$xmlCont, $matches);
					$fechaxmlorig=$matches[1][0]; 
					unset($matches);

					//Extraer rfc del receptor
					preg_match_all('/'.$RE_receptor.'/is',$xmlCont, $matches); 
					$rfcxmlre=$matches[1][0]; // RFC del receptor
					unset($matches);

					//Extraer rfc del emisor
					preg_match_all('/'.$RE_emisor.'/is',$xmlCont, $matches); 
					$rfcxmlem=$matches[1][0]; // RFC del receptor
					unset($matches);

					$separa = explode('-',$fechaxmlorig);
                    $datos[]=['fechaxmlorig'=>$fechaxmlorig,'rfcxmlre'=>$rfcxmlre,'rfcxmlem'=>$rfcxmlem,'ano'=>$separa[0],'mes'=>$separa[1],'filename'=>$archivo];    
			}
			closedir($directorio);
                 //return view('sistema.leerxml',compact('datos'));

			foreach ($datos as $row){
                    $fichero=$ruta.$row['filename'];
                    //$carpetaRfc = $ruta.$row['rfcxmlem'];
                    $carpetaAno = $ruta.$row['ano'];
                    $carpetaMes = $carpetaAno.'/'.$row['mes'];
                    $nuevoFichero=$carpetaMes."/".$row['filename'];
			
				
					if (!file_exists($carpetaAno))
					{
					    mkdir($carpetaAno, 0777, true);
					
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
                }
                else{
                	
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
	                else{
	                	rename($fichero, $nuevoFichero);
	                }
                }
			}

  	    }
	}
    public function Recividos(Request $request)
    {
    	$rfc = $request->rfc;
    	$ruta1 = public_path("uploads/Recibidos/".$rfc);
    	$photo = Input::all();
    	$file = Input::file('file');
  	    // $extension = File::extension($file);
  	    $name = $file->getClientOriginalName();
  	    $file_name = sha1(time().time()) . $name;
  	    $success = $file->move($ruta1, $file_name);  
  	    if ($success) {
    	$RE_receptor='<.*?Receptor.*?"(.*?)"';

		$RE_emisor='<.*?Emisor.*?"(.*?)"';

		$RE_fecha='.*?((?:2|1)\d{3}(?:-|\/)(?:(?:0[1-9])|(?:1[0-2]))(?:-|\/)(?:(?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))(?:T|\s)(?:(?:[0-1][0-9])|(?:2[0-3])):(?:[0-5][0-9]):(?:[0-5][0-9]))'; 

		$ruta = public_path("uploads/Recibidos/".$rfc."/");
		$directorio = opendir( $ruta); //ruta actual

		while (false !== ($archivo = readdir($directorio))) //obtenemos un archivo y luego otro sucesivamente
		{
			if($archivo == "." || $archivo == ".." || (substr($archivo,-3) != "xml") || )
				continue;
				$xmlCont=file_get_contents($ruta.$archivo);//verificamos si es o no un directorio
					preg_match_all("/".$RE_fecha."/is",$xmlCont, $matches);
					$fechaxmlorig=$matches[1][0]; 
					unset($matches);

					//Extraer rfc del receptor
					preg_match_all('/'.$RE_receptor.'/is',$xmlCont, $matches); 
					$rfcxmlre=$matches[1][0]; // RFC del receptor
					unset($matches);

					//Extraer rfc del emisor
					preg_match_all('/'.$RE_emisor.'/is',$xmlCont, $matches); 
					$rfcxmlem=$matches[1][0]; // RFC del receptor
					unset($matches);

					$separa = explode('-',$fechaxmlorig);
                    $datos[]=['fechaxmlorig'=>$fechaxmlorig,'rfcxmlre'=>$rfcxmlre,'rfcxmlem'=>$rfcxmlem,'ano'=>$separa[0],'mes'=>$separa[1],'filename'=>$archivo];    
			}
			closedir($directorio);
                 //return view('sistema.leerxml',compact('datos'));

			foreach ($datos as $row){
                    $fichero=$ruta.$row['filename'];
                    //$carpetaRfc = $ruta.$row['rfcxmlem'];
                    $carpetaAno = $ruta.$row['ano'];
                    $carpetaMes = $carpetaAno.'/'.$row['mes'];
                    $nuevoFichero=$carpetaMes."/".$row['filename'];
			
				
					if (!file_exists($carpetaAno))
					{
					    mkdir($carpetaAno, 0777, true);
					
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
                }
                else{
                	
					if (!file_exists($carpetaMes)) 
					{
					    mkdir($carpetaMes, 0777, true);
	                    rename($fichero, $nuevoFichero);
	                }
	                else{
	                	rename($fichero, $nuevoFichero);
	                }
                }
			}

  	    }        
    }
  //////////Comprueba si el usuario existe o no ///////////////////
    public function comprueba($username)
	{
		$existe = sha1($username);
		$usuarios = DB::table('usuarios')
			->select('usuario')
			->where('usuario',$existe)
			->get();
			 if (count($usuarios)==0){
			 	echo 1;
			 }else{
			 	echo 0;
			 }
	}

////////////////////////////////////////////////////////////////////////////////////////
	public function mmm(){
    	/*
    	$url = public_path('ajax.xml');
    	$xml = simplexml_load_file($url);
    	*/
    	//$url = public_path('ajax.xml');
    	$url = public_path("uploads/XML-cfdi/ADMINISTRACION PLAZA TOLUCA A.C.ADMINISTRACION PLAZA TOLUCA A.C.3A729B80-6A3A-4AAB-82E4-E731AAF4DEF3.xml");
    	$xml = simplexml_load_file($url); 
		$ns = $xml->getNamespaces(true);
		$xml->registerXPathNamespace('c', $ns['cfdi']);
		$xml->registerXPathNamespace('t', $ns['tfd']);
		foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
		      echo $cfdiComprobante['version']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['fecha']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['sello']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['total']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['subTotal']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['certificado']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['formaDePago']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['noCertificado']; 
		      echo "<br />"; 
		      echo $cfdiComprobante['tipoDeComprobante']; 
		      echo "<br />"; 
		}
		echo "<hr>";
		foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
		   echo $Emisor['rfc']; 
		   echo "<br />"; 
		   echo $Emisor['nombre']; 
		   echo "<br />";
		}
		echo "<hr>";
		foreach ($xml->xpath('//cfdi:Comprobante//cfdi:DomicilioFiscal') as $Dom){ 
		   echo $Dom['pais']; 
		   echo "<br />"; 
		   echo $Dom['estado']; 
		   echo "<br />";
		}
		echo "<hr>";
		foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
		   echo $Receptor['rfc']; 
		   echo "<br />"; 
		   echo $Receptor['nombre']; 
		   echo "<br />"; 
		}
		echo "<hr>";
		foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto')as $Concepto) {
		  	echo $Concepto['cantidad'];
		}
		echo "<hr>"; 
		foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
		   echo $tfd['selloCFD']; 
		   echo "<br />"; 
		   echo $tfd['FechaTimbrado']; 
		   echo "<br />"; 
		   echo $tfd['UUID']; 
		   echo "<br />"; 
		   echo $tfd['noCertificadoSAT']; 
		   echo "<br />"; 
		   echo $tfd['version']; 
		   echo "<br />"; 
		   echo $tfd['selloSAT']; 
		}  
		echo "<hr>";
	}	

	
	public function lista()
	{
		
		$total_emitidos  = count( glob("uploads/Emitido/*", GLOB_ONLYDIR) );
		$total_recibidos  = count( glob("uploads/Recibidos/*", GLOB_ONLYDIR) );
		$directorio = opendir("./uploads/Emitido"); //ruta actual
		$cont=0;
		$cont2=0;
		
	
		while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente RFC
		{
	    	if (is_dir($archivo))//verificamos si es o no un directorio
	    	{
	        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
	    	}
	    	else
			{
	    		for($i=1; $i<$total_emitidos; $i++)
		    		{
	        		
	        			$directorio2 = opendir("./uploads/Emitido/".$archivo);
						while ($archivo2 = readdir($directorio2)) //obtenemos un archivo y luego otro sucesivamente AÑOS
							{
								
							        		
	    						if (is_dir($archivo2))//verificamos si es o no un directorio
	    								{
							        		//echo "[".$archivo2 . "]<br />"; //de ser un directorio lo envolvemos entre corchetes

	    								}
	    						else
	    								{
	        								for($i=1; $i<$total_emitidos; $i++)
	        								{		

	        									$directorio3 = opendir("./uploads/Emitido/".$archivo."/".$archivo2);
	        									while ($archivo3 = readdir($directorio3)) //obtenemos un archivo y luego otro sucesivamente MESES
														{
														    if (is_dir($archivo3))//verificamos si es o no un directorio
														    {
														        //echo "[".$archivo3. "]<br />"; //de ser un directorio lo envolvemos entre corchetes
														    }
														    else
														    {
														        $directorio4 = opendir("./uploads/Emitido/".$archivo."/".$archivo2."/".$archivo3); //ruta actual
																	while ($archivo4 = readdir($directorio4)) //obtenemos un archivo y luego otro sucesivamente CHIDOS
																	
																	{
																	    if (is_dir($archivo4))//verificamos si es o no un directorio
																	    {
																	        //echo "[".$archivo4 . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
																	    }
																	    else
																	    {

																		$url = public_path('/uploads/Emitido/'.$archivo.'/'.$archivo2.'/'.$archivo3.'/'.$archivo4);
																		$xml = simplexml_load_file($url); 
																		$ns = $xml->getNamespaces(true);
																		$xml->registerXPathNamespace('c', $ns['cfdi']);
																		$xml->registerXPathNamespace('t', $ns['tfd']);
																			
																			foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante)
																				{
		       																	//echo $archivo4;
		       																	$egreso[]=$cfdiComprobante['total']; 
		       																	$fechae[]= $cfdiComprobante['fecha'];
		      																		   
																				}
																			foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {																			  
																				$uuide[]= $tfd['UUID']; 
																						}																		
																					$cont++;
																	        		$archivos_em[] =$archivo4;

																	        		
																	        																  

																	    }
																	}
														        
														    }
														}

	        									
	        									
	        									
	        								}	
								    	}
							}
							       			
	    			}
	    	}
		}	

		
		$auxe  = $cont;
		$totaliepsr_r = 0;
		$conte='0';
		$aux='a';


		$directorio5 = opendir("./uploads/Recibidos"); //ruta actual

		while ($archivo6 = readdir($directorio5)) //obtenemos un archivo y luego otro sucesivamente RFC
		{
	    	if (is_dir($archivo6))//verificamos si es o no un directorio
	    	{
	        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
	    	}
	    	else
			{
	    		for($i=1; $i<$total_emitidos; $i++)
		    		{
	        		
	        			$directorio6 = opendir("./uploads/Recibidos/".$archivo6);
						while ($archivo7 = readdir($directorio6)) //obtenemos un archivo y luego otro sucesivamente AÑOS
							{
								
							        		
	    						if (is_dir($archivo7))//verificamos si es o no un directorio
	    								{
							        		//echo "[".$archivo2 . "]<br />"; //de ser un directorio lo envolvemos entre corchetes

	    								}
	    						else
	    								{
	        								for($i=1; $i<$total_emitidos; $i++)
	        								{		

	        									$directorio7 = opendir("./uploads/Recibidos/".$archivo6."/".$archivo7);
	        									while ($archivo8 = readdir($directorio7)) //obtenemos un archivo y luego otro sucesivamente
														{
														    if (is_dir($archivo8))//verificamos si es o no un directorio
														    {
														        //echo "[".$archivo3. "]<br />"; //de ser un directorio lo envolvemos entre corchetes
														    }
														    else
														    {
														        $directorio8 = opendir("./uploads/Recibidos/".$archivo6."/".$archivo7."/".$archivo8); //ruta actual
																	
																	while ($archivo9 = readdir($directorio8)) //obtenemos un archivo y luego otro sucesivamente
																	{
																	    if (is_dir($archivo9))//verificamos si es o no un directorio
																	    {
																	        //echo "[".$archivo4 . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
																	    }
																	    else
																	    {	

																	    $url = public_path('/uploads/Recibidos/'.$archivo6.'/'.$archivo7.'/'.$archivo8.'/'.$archivo9);
																		$xml = simplexml_load_file($url); 
																		$ns = $xml->getNamespaces(true);
																		$xml->registerXPathNamespace('c', $ns['cfdi']);
																		$xml->registerXPathNamespace('t', $ns['tfd']);
																			
																			foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante)
																				{
		       																	//echo $archivo9;
		       																	
		       																	$ingreso[]=$cfdiComprobante['total']; 
		       																	$fechar[] = $cfdiComprobante['fecha'];
		       																	$subtotalr[]=$cfdiComprobante['subTotal']; 
		      
		      																	
																				}
																			foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {																	  
																				$uuidr[]= $tfd['UUID']; 

																				
																				}
																			foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
																			  $rfcr[]=$Receptor['rfc'];															
																			  $nombrer[]=$Receptor['nombre'];																		   
																				}
																			foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Traslado){ 
																			    $importer[] = $Traslado['totalImpuestosTrasladados'];
																			    $ivar[] = $Traslado['totalImpuestosRetenidos'];


																			}
																			

																				
																				

																	 		$archivos_re[] =$archivo9;
																	 		$cont2++;
																	      }
																	}
														        
														    }
														}

	        									
	        									
	        									
	        								}	
								    	}
							}
							       			
	    			}
	    	}
		}
		
  		

  		

  			
  	
	$auxr  = $cont2;
	$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Septiembre','Octubre','Noviembre','Diciembre');

	return view('/administrador/showfiles')->with('archivos',$archivos_em)->with('meses',$meses) -> with('archivor',$archivos_re)-> with(['fechae'=>$fechae])-> with(['fechar'=>$fechar])-> with(['uuide'=>$uuide])-> with(['uuidr'=>$uuidr]) ->with(['ingreso'=>$ingreso])->with(['egreso'=>$egreso])->with(['rfcr'=>$rfcr])->with(['nombrer'=>$nombrer])->with(['subtotalr'=>$subtotalr])->with(['cont2'=>$auxr])-> with(['conta'=>$conte])->with(compact('cont', $auxe));	
	}

	public function descargama()
    {
    	return view('sistemausu.descarga');
    }

}
