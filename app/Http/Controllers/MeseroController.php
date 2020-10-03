<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Producto;
use sisInventario\Compra;
use sisInventario\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;
class MeseroController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    if($request)
    {

      $dtcompra=DB::table('detalle_compra as dc')
          ->join('compra as c','c.idcompra','=','dc.idcompra')
          ->join('producto as p','p.idproducto','=','dc.idproducto')
          ->join('categoria as ct','ct.idcategoria','=','p.idcategoria')
      ->select('c.idcompra as nboleta','p.idproducto as idpro','c.fecha_hora as fecha','c.total','c.mesa','dc.iddetalle_compra','p.nombre','dc.cantidad as nplato','ct.idcategoria','p.estado')
          ->orderBy('fecha_hora')
          ->paginate(7);

      return view('mesero.newcompra.index',["dtcompra"=>$dtcompra]);
      }
  }

  public function create()
  {
    $date = Carbon::now();
    $productos=DB::table('producto')
    ->select('idproducto','idcategoria','nombre','descripcion','precio','estado')->get();

    return view('mesero.newcompra.create',["productos"=>$productos,"date"=>$date]);

  }
  public function store(Request $request)
  {
    $compra=new Compra;
    $compra->fecha_hora=$request->get('fecha');
    $compra->total=0;
    $compra->mesa=$request->get('mesa');
    $compra->estado=0;

    $detallec=new DetalleCompra;
    $detallec->idcompra=$request=$compra->idcompra;
    $detallec->idproducto=$request->get('$productos->idproduto');
    $detallec->cantidad=$request->get('nplatos');

    $compra->save();
    $detallec->save();
    return Redirect::to('mesero/newcompra');
  }

  public function show($id)
  {
    return view('mesero.newcompra.show',['producto'=>Producto::findOrFail($id)]);
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
