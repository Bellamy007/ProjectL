<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests;
use App\Empresas;
use App\giro_empresarial;
use App\razon_social;
use App\poliza_egresos;
use App\poliza_ingresos;
use App\catalogo_cuentas;
use App\usuarios;
use Session;    
use DB;


class Empresass extends Controller
{
//------------------Consulta tabla de empresas-----------------///
    public function index(){
        //sesiones
      $sname = Session::get('sesionname');
      $sid_usuario = Session::get('sesionid_usuario');
      $stipo = Session::get('sesiontipo');
      
      if($sname=='' or $sid_usuario=='' or $stipo == ''){
        Session::flash('error','Es nesesario loguearse antes de continuar');
        return redirect()->route('login');
      }
      else{
      	$consulta = Empresas::join('giro_empresarial','empresas.id_giroE','=','giro_empresarial.id_giroE')
                      ->join('razon_social','empresas.id_razonS','=','razon_social.id_razonS')
                      ->join('usuarios','empresas.id_usuario','=','usuarios.id_usuario')
                      ->select('empresas.id_empresa','empresas.nombre AS empresa','empresas.rfc','empresas.domicilio','giro_empresarial.giro','razon_social.razon','usuarios.nombre AS usuario','usuarios.ap_paterno','usuarios.ap_materno','empresas.Deleted_at','empresas.activo')
                      ->where('empresas.id_usuario','=',$sid_usuario)
                      ->orderBy('id_empresa')
                      ->get();

      	return view('empresas.empresa',compact('consulta'));//manda a vista con datos obtenidos
      }
    }
//------------------Alta de empresas--------------------//
    public function crear(){
        //sesiones
      $sname = Session::get('sesionname');
      $sid_usuario = Session::get('sesionid_usuario');
      $stipo = Session::get('sesiontipo');
      
      if($sname=='' or $sid_usuario=='' or $stipo == ''){
        Session::flash('error','Es nesesario loguearse antes de continuar');
        return redirect()->route('login');
      }
      else{
      	$giro  = DB::table('giro_empresarial')->get();//datos para el select del giro
      	$razon = DB::table('razon_social')->get();//datos para el select de razon
      	$usuario = DB::table('usuarios')->where('activo','=','Si')->get();//datos de clientes(usuarios)
      	return view('empresas.formulario_alta',['razon' => $razon,'giro' => $giro,'user' => $usuario]);//manda a la vista con datos obtenidos 
      }
    }
//------------Recibe toda a informacion para dar de alta las empresas------//
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
        		$create = Empresas::create($request->all());
        		return view('empresas.altaexitosa');
    	}
    }
//--------------- Edita la empresa seleccionada---------------------//
	public function edita(Empresas $id_empresa){
      //sesiones
      $sname = Session::get('sesionname');
      $sid_usuario = Session::get('sesionid_usuario');
      $stipo = Session::get('sesiontipo');
      
      if($sname=='' or $sid_usuario=='' or $stipo == ''){
        Session::flash('error','Es nesesario loguearse antes de continuar');
        return redirect()->route('login');
      }
      else{
    		 //consulta consulta la empresa seleccionada y manda los datos
            $consulta = \DB::table('Empresas')
                          ->join('giro_empresarial','empresas.id_giroE','=','giro_empresarial.id_giroE')
                          ->join('razon_social','empresas.id_razonS','=','razon_social.id_razonS')
                          ->select('empresas.id_empresa','empresas.nombre AS empresa','empresas.rfc','empresas.domicilio','giro_empresarial.giro','razon_social.razon')
                          ->where('empresas.id_empresa',$id_empresa)
                          ->get();
            $giro  = DB::table('giro_empresarial')->get();
            $razon = DB::table('razon_social')->get();
            $usuario = DB::table('usuarios')->where('activo','=','Si')->get();

          return view('empresas.empresaedit')->with(['consulta'=>$id_empresa])->with(['razon' => $razon,'giro' => $giro,'user' => $usuario]);//manda  la vista con los datos obtenidos
  	}
  }
//-----------------Elimina empresa----------------------------------//
	public function delit($id){
      //sesiones
      $sname = Session::get('sesionname');
      $sid_usuario = Session::get('sesionid_usuario');
      $stipo = Session::get('sesiontipo');
      
      if($sname=='' or $sid_usuario=='' or $stipo == ''){
        Session::flash('error','Es nesesario loguearse antes de continuar');
        return redirect()->route('login');
      }
      else{
    	 $empresa = DB::delete('UPDATE empresas SET activo = "No" where id_empresa = ?',[$id]);
    	 echo "La empresa ".$empresa['nombre']." fue eliminado exsitosamente !";
  	}
  }
//////////////////////////////////////////////////////////////////////
//-----------------------Sistema Administrador----------------------//
//////////////////////////////////////////////////////////////////////

//---------------- busqueda de empresas----------------------///
      public function busempresa(){
        //sesiones
        $sname = Session::get('sesionname');
        $sid_usuario = Session::get('sesionid_usuario');
        $stipo = Session::get('sesiontipo');
        
        if($sname=='' or $sid_usuario=='' or $stipo == ''){
          Session::flash('error','Es nesesario loguearse antes de continuar');
          return redirect()->route('login');
        }
                else{
                  //consulta a la tabla empresas
                    $consulta = Empresas::join('giro_empresarial','empresas.id_giroE','=','giro_empresarial.id_giroE')
                      ->join('razon_social','empresas.id_razonS','=','razon_social.id_razonS')
                      ->join('usuarios','empresas.id_usuario','=','usuarios.id_usuario')
                      ->select('empresas.id_empresa','empresas.nombre AS empresa','empresas.rfc','empresas.domicilio','giro_empresarial.giro','razon_social.razon','usuarios.nombre AS usuario','usuarios.ap_paterno','usuarios.ap_materno','empresas.Deleted_at','empresas.activo')
                      ->orderBy('id_empresa')
                        ->get();
                return view('administrador.empresaAdmin.busempresa',compact('consulta'));//manda avista con datos obtenidos 
              }
      }
//---------------Busca las empresas insertadas en el ultimo mes----------//
        public function busempre(){
          //sesiones
        $sname = Session::get('sesionname');
        $sid_usuario = Session::get('sesionid_usuario');
        $stipo = Session::get('sesiontipo');
        
        if($sname=='' or $sid_usuario=='' or $stipo == ''){
          Session::flash('error','Es nesesario loguearse antes de continuar');
          return redirect()->route('login');
        }
                else{
                  //consulta la vista recientesemp
                 $consulta = DB::select("SELECT * FROM recientesemp");
                return view('administrador.empresaAdmin.busempre',compact('consulta'));//manda a la vita con datos obtenidos
              }
      }

//---------------- Alta empresas--------------------------------------//
    public function altaempresa(){
          //sesiones
      $sname = Session::get('sesionname');
      $sid_usuario = Session::get('sesionid_usuario');
      $stipo = Session::get('sesiontipo');
      
      if($sname=='' or $sid_usuario=='' or $stipo == ''){
        Session::flash('error','Es nesesario loguearse antes de continuar');
        return redirect()->route('login');
      }
      else{
          $giro  = DB::table('giro_empresarial')->get();//datos del giro
          $razon = DB::table('razon_social')->get();//datos de la razon
          $usuario = DB::table('usuarios')->where('activo','=','Si')->where('usuarios.id_tipo','=',2)->get();//datos de los usuarios(clientes)
          return view('administrador.empresaAdmin.altaempresa',['razon' => $razon,'giro' => $giro,'user' => $usuario]);//manda  lla vista con los datos obtenidos 
      }
    }
//----------------------Guarda la empresa---------------------------//
    public function guardaem(Request $request){
      //sesiones
    $sname = Session::get('sesionname');
    $sid_usuario = Session::get('sesionid_usuario');
    $stipo = Session::get('sesiontipo');
    
    if($sname=='' or $sid_usuario=='' or $stipo == ''){
      Session::flash('error','Es nesesario loguearse antes de continuar');
      return redirect()->route('login');
    }
    else{

          $rfc = $request->input('rfc');
          $yi = $request->input('yearstart');
          $yf = $request->input('yearfinish');
          $t = $yf - $yi;
          $aux = '0';
          
          $carpeta = 'uploads/Emitido/'.$rfc;           
          
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

      //recibe los datos del formulario y los guarda 
      $empresa = new Empresas;
      $empresa->nombre = $request->nombre;
      $empresa->rfc = $request->rfc;
      $empresa->domicilio = $request->domicilio;
      $empresa->id_giroE = $request->id_giroE;
      $empresa->id_razonS = $request->id_razonS;
      $empresa->id_usuario = $request->id_usuario;
      $empresa->activo = "Si";
      $empresa->Created_at = new \DateTime;
      $empresa->save();
    
      return redirect()->route('busempresa');//returna a la busqueda de empresas 
      }     
   }
//--------------------Edita empresa---------------//
     public function editaem(Empresas $id_empresa){
      //sesiones
        $sname = Session::get('sesionname');
        $sid_usuario = Session::get('sesionid_usuario');
        $stipo = Session::get('sesiontipo');
        
        if($sname=='' or $sid_usuario=='' or $stipo == ''){
          Session::flash('error','Es nesesario loguearse antes de continuar');
          return redirect()->route('login');
        }
        else{
            //consulta consulta la empresa seleccionada y manda los datos
            $consulta = \DB::table('Empresas')
                          ->join('giro_empresarial','empresas.id_giroE','=','giro_empresarial.id_giroE')
                          ->join('razon_social','empresas.id_razonS','=','razon_social.id_razonS')
                          ->join('usuarios','empresas.id_usuario','=','usuarios.id_usuario')
                          ->select('empresas.id_empresa','empresas.nombre AS empresa','empresas.rfc','empresas.domicilio','giro_empresarial.giro','razon_social.razon','usuarios.nombre AS usuario','usuarios.ap_paterno','usuarios.ap_materno')
                          ->where('empresas.id_empresa',$id_empresa)
                          ->get();
            $giro  = DB::table('giro_empresarial')->get();
            $razon = DB::table('razon_social')->get();
            $usuario = DB::table('usuarios')->where('activo','=','Si')->get();

          return view('administrador.empresaAdmin.modidicaempresa')->with(['consulta'=>$id_empresa])->with(['razon' => $razon,'giro' => $giro,'user' => $usuario]);//manda  la vista con los datos obtenidos
        }
      }
//----------------Guarda los datos de la empresa que se desea editar------------------//
   public function guardaempresa(Empresas $id_empresa,Request $request){
        //sesiones
        $sname = Session::get('sesionname');
        $sid_usuario = Session::get('sesionid_usuario');
        $stipo = Session::get('sesiontipo');
    
        if($sname=='' or $sid_usuario=='' or $stipo == ''){
          Session::flash('error','Es nesesario loguearse antes de continuar');
          return redirect()->route('login');
        }
        else{
                //recibe los nuevos datos y los guarda 
                  $empresa = Empresas::find($id_empresa->id_empresa);
                  $empresa->nombre = $request->nombre;
                  $empresa->rfc = $request->rfc;
                  $empresa->domicilio = $request->domicilio;
                  $empresa->id_giroE = $request->id_giroE;
                  $empresa->id_razonS = $request->id_razonS;
                  $empresa->id_usuario = $request->id_usuario;
                  $empresa->save();
                }
                  return redirect()->route('busempresa');//regresa a la consulta de las empresas
     }
//---------------------Desactiva la empresa seleccionada-------------------------//
        public function borraempresa($id_empresa){
          //sesiones
          $sname = Session::get('sesionname');
          $sid_usuario = Session::get('sesionid_usuario');
          $stipo = Session::get('sesiontipo');
          
          if($sname=='' or $sid_usuario=='' or $stipo == ''){
            Session::flash('error','Es nesesario loguearse antes de continuar');
            return redirect()->route('login');
          }
          else{
            //Modifica el activo de la empresa
              $empresa = Empresas::find($id_empresa);
              $empresa->activo ='No';
              $empresa->save();
              //regres a la conculta de las empresas
          return redirect()->route('busempresa');
           }
        }
//--------------------Elimina la empresa seleccionada------------------------//
    public function forzareliminacion(Empresas $id_empresa){
      //sesiones
          $sname = Session::get('sesionname');
          $sid_usuario = Session::get('sesionid_usuario');
          $stipo = Session::get('sesiontipo');
          
          if($sname=='' or $sid_usuario=='' or $stipo == ''){
            Session::flash('error','Es nesesario loguearse antes de continuar');
            return redirect()->route('login');
          }
          else{
            //elimina empresas
             $id_empresa->delete();
             //regres a la conculta de las empresas
          return redirect()->route('busempresa');
           }
        }
//--------------Busca las polizas de ingresos y egresos de cada empresa-------//
         public function buscapoliza(Request $request){
          $sname = Session::get('sesionname');
          $sid_usuario = Session::get('sesionid_usuario');
          $stipo = Session::get('sesiontipo');
          
          if($sname=='' or $sid_usuario=='' or $stipo == ''){
            Session::flash('error','Es nesesario loguearse antes de continuar');
            return redirect()->route('login');
          }
          else{
            //valida los datos del formulario
               $rules = ['id_empresa' => 'required|integer|not_in:0',
            'poliza' => 'required|integer|not_in:0',
            'id_periodo' => 'required|integer|not_in:0',
            'id_mes' => 'required|integer|not_in:0'];
            //mesnajes de eror 
            $messages = ['id_empresa.required' => 'Seleccione una empresa.',
            'id_empresa.integer' => 'Seleccione una empresa.',
            'id_empresa.not_in' => 'Seleccione una empresa.',
            'poliza.required' => 'Seleccione algun tipo de poliza.',
            'poliza.integer' => 'Seleccione algun tipo de poliza.',
            'poliza.not_in' => 'Seleccione algun tipo de poliza.',
            'id_periodo.required' => 'Seleccione un año.',
            'id_periodo.integer' => 'Seleccione un año.',
            'id_periodo.not_in' => 'Seleccione un año.',
            'id_mes.required' => 'Seleccione un mes.',
            'id_mes.integer' => 'Seleccione un mes.',
            'id_mes.not_in' => 'Seleccione un mes.'];
             
            $this->validate($request, $rules, $messages);//manda los errores encontrados

              if ($request->poliza == 1) {
                //si la poliza seleccionada fue 1 busca en la tabla de polizas de egresos
                $consulta = \DB::table('poliza_egresos')
                      ->join('empresas','poliza_egresos.id_empresa','=','empresas.id_empresa')
                      ->join('catalogo_cuentas','catalogo_cuentas.codigo_agrupador','=','poliza_egresos.codigo_agrupador')
                      ->join('periodo','periodo.id_periodo','=','poliza_egresos.id_periodo')
                      ->join('mes','mes.id_mes','=','poliza_egresos.id_mes')
                      ->select('poliza_egresos.id_polizaE','empresas.rfc','catalogo_cuentas.cuenta as cuenta','poliza_egresos.concepto','poliza_egresos.debe','poliza_egresos.haber','poliza_egresos.uuid','empresas.nombre','poliza_egresos.activo','periodo.periodo','mes.mes')
                      ->where('poliza_egresos.id_empresa',$request->id_empresa)
                      ->where('poliza_egresos.activo','=','SI')
                      ->where('periodo.id_periodo','=',$request->id_periodo)
                      ->where('mes.id_mes','=',$request->id_mes)
                      ->paginate(10);
              return view('sistema.polizas')->with('consulta',$consulta);//manda la vista de polizas
              }
              else{
                //si la poliza seleccionada fue 1 busca en la tabla de polizas de egresos
                $consulta = \DB::table('poliza_ingresos')
                      ->join('empresas','poliza_ingresos.id_empresa','=','empresas.id_empresa')
                      ->join('catalogo_cuentas','catalogo_cuentas.codigo_agrupador','=','poliza_ingresos.codigo_agrupador')
                      ->join('periodo','periodo.id_periodo','=','poliza_ingresos.id_periodo')
                      ->join('mes','mes.id_mes','=','poliza_ingresos.id_mes')
                      ->select('poliza_ingresos.id_polizaI','empresas.rfc','catalogo_cuentas.cuenta as cuenta','poliza_ingresos.concepto','poliza_ingresos.debe','poliza_ingresos.haber','poliza_ingresos.uuid','empresas.nombre','poliza_ingresos.activo','periodo.periodo','mes.mes')
                      ->where('poliza_ingresos.id_empresa',$request->id_empresa)
                      ->where('poliza_ingresos.activo','=','SI')
                      ->where('periodo.id_periodo','=',$request->id_periodo)
                      ->where('mes.id_mes','=',$request->id_mes)
                      ->paginate(10);
              return view('sistema.polizas')->with('consulta',$consulta);//manda la vista de polizas
              }
           }
        }

}
