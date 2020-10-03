<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use sisInventario\Http\Requests\SalidaFormRequest;
use sisInventario\Salida;
use sisInventario\DetalleSalida;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class SalidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$salidas=DB::table('salida as s')
    		->join('persona as p','s.idpersonal','=','p.idpersona')
    		->join('detalle_salida as ds','s.idsalida','=','ds.idsalida')
    		->select('s.idsalida','s.fecha_hora','p.nombre','s.estado')
    		->where('s.idpersonal','LIKE','%'.$query.'%')
    		->orderBy('s.idsalida','desc')    		
    		->paginate(7);
    		return view('salidas.salida.index',["salidas"=>$salidas,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$personas=DB::table('persona')
        ->where('tipo_persona','=','Personal')->get();
        $productos=DB::table('producto as pro')
        ->select(DB::raw('CONCAT(pro.idproducto," ",pro.nombre) AS producto'),'pro.idproducto','pro.stock as stock')
        ->where('pro.estado','=','Activo')
        ->where('pro.stock','>','0')
        ->groupBy('producto','pro.idproducto','pro.stock')
        ->get();
        return view('salidas.salida.create',["personas"=>$personas,"productos"=>$productos]);
    }
    public function store(SalidaFormRequest $request)
    {
        $salida=new Salida;
        $salida->idpersonal=$request->get('idpersonal');
        $mytime=Carbon::now('America/Lima');
        $salida->fecha_hora=$mytime->toDateTimeString();
        $salida->estado='A';
        $salida->save();

        $idproducto=$request->get('idproducto');
        $cantidad=$request->get('cantidad');       

        $cont=0;
        while ($cont<count($idproducto)) {
            $detalle=new DetalleSalida();
            $detalle->idsalida=$salida->idsalida;
            $detalle->idproducto=$idproducto[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->save();
            $cont=$cont+1;
        }           
        return Redirect::to('salidas/salida');
    }
    public function show($id)
    {
    	$salida=DB::table('salida as s')
        ->join('persona as p','s.idpersonal','=','p.idpersona')
        ->select('s.idsalida','s.fecha_hora','p.nombre','s.estado')
        ->where('s.idsalida','=', $id)
        ->first();

        $detalles=DB::table('detalle_salida as ds')
        ->join('producto as pro','ds.idproducto','=','pro.idproducto')
        ->select('pro.nombre as producto','ds.cantidad')
        ->where('ds.idsalida','=',$id)
        ->get();
        return view('salidas.salida.show',["salida"=>$salida,"detalles"=>$detalles]);
    }
    public function edit($id)
    {
    	
    }
    public function update(PersonaFormRequest $request,$id)
    {
    
    }
    public function destroy($id)
    {
    	$salida=Salida::findOrFail($id);
        $salida->estado='C';
        $salida->update();
        return Redirect::to('salidas/salida');
    }
}
