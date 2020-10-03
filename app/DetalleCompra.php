<?php

namespace sisInventario;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
  protected $table='detalle_compra';

  protected $primaryKey='iddetalle_compra';

  public $timestamps=false;


  protected $fillable =[
      'idproducto',
      'cantidad',
      'descrip',
      'mesa',
      'fecha',
      'estado'
  ];
  protected $guarded =[

  ];
}
