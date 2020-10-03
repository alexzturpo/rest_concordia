<?php

namespace sisInventario;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='idproducto';

    public $timestamps=false;


    protected $fillable =[
        'idcategoria',
        'nombre',
        'stock',
        'descripcion',
        'precio',
        'estado'
    ];

    protected $guarded =[

    ];

    public function producto(){
      return $this->hasMany('App\DetalleCompra');
    }

}
