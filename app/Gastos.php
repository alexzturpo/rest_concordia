<?php

namespace sisInventario;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
  protected $table='gastos';

  protected $primaryKey='idgastos';

  public $timestamps=false;


  protected $fillable =[
      'fecha',
      'descrip',
      'tipo',
      'monto'
  ];

  protected $guarded =[

  ];
}
