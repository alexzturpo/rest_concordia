<?php

namespace sisInventario\Http\Controllers;

use Illuminate\Http\Request;
use sisInventario\Producto;
use sisInventario\Categoria;
use sisInventario\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class PlatoAController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    if($request)
    {

      $plato=DB::table('detalle_compra as dc')
      ->join('producto as p','p.idproducto','=','dc.idproducto')
      ->select('dc.fecha as fecha','dc.mesa as mesa','dc.estado as estado','dc.descrip as descrip','p.idproducto as idp','p.nombre as nom','p.idcategoria as catpro','p.precio as precio')
      ->count('idp')
      ->groupBy('fecha')
      ->orderBy('fecha','desc')
          ->paginate(7);

      return view('almacen.platosv.index',["plato"=>$plato]);
      }
  }

}
