<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Gastos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisInventario\Http\Requests\ProductoFormRequest;
use DB;



class GastosCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if($request)
    	{
    		$gas=DB::table('gastos as g')
        ->select('idgasto','fecha','descrip','tipo','monto')
    		->where('tipo','=',1)
        ->orderBy('fecha','desc')
        ->paginate(7);
    		return view('cocinero.gastos.index',["gas"=>$gas]);
        }
    }
    public function create()
    {
    	return view('cocinero.gastos.create');
    }
    public function store(Request $request)
    {
      $gast=new Gastos;
      $gast->descrip=$request->get('desc');
      $gast->monto=$request->get('monto');
      $gast->tipo=1;
      $gast->save();
      return Redirect::to('cocinero/gastos');
    }
    public function show($id)
    {
    	return view('cocinero.gastos.show',['gastos'=>Gastos::findOrFail($id)]);
    }

    public function edit($id)
    {
    	$gastos=Gastos::findOrFail($id);
    	return view('cocinero.gastos.edit',["gastos"=>$gastos]);
    }
    public function update($id)
    {
    	$producto=Producto::findOrFail($id);
    	$producto->idcategoria=$request->get('idcategoria');
    	$producto->nombre=$request->get('nombre');
    	$producto->stock=$request->get('stock');
    	$producto->descripcion=$request->get('descripcion');
    	$producto->estado='Activo';
      	$producto->update();
   		return Redirect::to('almacen/producto');

    }

    public function destroy($id)
    {
    	$producto=Producto::findOrFail($id);
    	$producto->estado=0;
    	$producto->update();
    	return Redirect::to('cocinero/menu');
    }

}
