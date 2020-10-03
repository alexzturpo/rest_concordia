<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Gastos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisInventario\Http\Requests\ProductoFormRequest;
use DB;



class GastosAController extends Controller
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
    		->where('tipo','=',2)
        ->orderBy('fecha','desc')
        ->paginate(7);
    		return view('almacen.gastosa.index',["gas"=>$gas]);
        }
    }
    public function create()
    {
    	return view('almacen.gastosa.create');
    }
    public function store(Request $request)
    {
      $gas=new Gastos;
      $gas->descrip=$request->get('descp');
      $gas->monto=$request->get('montos');
      $gas->tipo=2;
      $gas->save();
      return Redirect::to('almacen/gastosa');
    }
    public function show($id)
    {

    }

    public function edit($id)
    {

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
