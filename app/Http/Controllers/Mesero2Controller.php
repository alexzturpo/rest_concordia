<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Producto;
use sisInventario\Categoria;
use sisInventario\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;
class Mesero2Controller extends Controller
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
      ->join('producto as p','p.idproducto','=','dc.idproducto')
      ->select('dc.fecha as fecha','dc.mesa as mesa','dc.estado as estado','dc.descrip as descrip','p.nombre as nom')
      ->orderBy('estado','desc')
          ->paginate(7);

      return view('mesero2.orden.index',["dtcompra"=>$dtcompra]);
      }
  }

  public function create()
  {
    $date = Carbon::now();

    $productos=DB::table('producto')
    ->select('idproducto','idcategoria as idcat','nombre','descripcion as desc','precio','estado')
    ->where('estado','=',1)
    ->get();
    return view('mesero2.orden.create',["productos"=>$productos,"date"=>$date]);

  }
  public function store(Request $request)
  {
    $detallec=new DetalleCompra;
    $detallec->idproducto=$request->get('idpro');
    $detallec->cantidad=$request->get('nplatos');
    $detallec->descrip=$request->get('dcpo');
    $detallec->mesa=$request->get('mesa');
    $detallec->estado=2;
    $detallec->save();
    return Redirect::to('mesero2/orden');
  }

  public function destroy($id)
  {
    $producto=Producto::findOrFail($id);
    $producto->estado=0;
    $producto->update();
    return Redirect::to('cocinero/producto');
  }
}
