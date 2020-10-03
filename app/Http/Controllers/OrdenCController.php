<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Producto;
use sisInventario\Categoria;
use sisInventario\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class OrdenCController extends Controller
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
      ->select('fecha','mesa','estado','iddetalle_compra')
      ->where('estado','=',2)
          ->paginate(7);

      return view('cocinero/odenes/index',["dtcompra"=>$dtcompra]);
      }
  }


  

  public function destroy($id)
  {
    $dtcompra=DetalleCompra::findOrFail($id);
    $dtcompra->estado=1;
    $dtcompra->update();
    return Redirect::to('cocinero/odenes');
  }
}
