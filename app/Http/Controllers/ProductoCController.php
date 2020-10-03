<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisInventario\Http\Requests\ProductoFormRequest;
use DB;



class ProductoCController extends Controller
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
    		$productos=DB::table('producto as p')
            ->join('categoria as c','p.idcategoria','=','c.idcategoria')
    		->select('p.idproducto','p.nombre','p.stock','c.nombre as categoria','p.descripcion','precio','p.estado')
    		->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('idproducto','desc')
            ->paginate(7);
    		return view('cocinero.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
  
    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view('cocinero.producto.create',["categorias"=>$categorias]);
    }
    public function store(ProductoFormRequest $request)
    {
    	$producto=new Producto;
    	$producto->idcategoria=$request->get('idcategoria');
    	$producto->nombre=$request->get('nombre');
    	$producto->stock=$request->get('stock');
    	$producto->descripcion=$request->get('descripcion');
      $producto->precio=$request->get('precio');
    	$producto->estado=$request->get('estado');
    	$producto->save();
    	return Redirect::to('cocinero/producto');
    }

    public function show($id)
    {
    	return view('cocinero.producto.show',['producto'=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$producto=Producto::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view('cocinero.producto.edit',["producto"=>$producto,"categorias"=>$categorias]);
    }
    public function update($id)
    {
      $producto=Producto::findOrFail($id);
    	$producto->estado=1;
    	$producto->update();
    	return Redirect::to('cocinero/producto');

    }
    public function destroy($id)
    {
    	$producto=Producto::findOrFail($id);
    	$producto->estado=0;
    	$producto->update();
    	return Redirect::to('cocinero/producto');
    }
}
