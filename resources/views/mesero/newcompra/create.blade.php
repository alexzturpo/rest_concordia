@extends('layouts.panelm')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Orden</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>
						{{$error}}
					</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'mesero/newcompra','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Fecha: </label>
        <input type="text" required value="{{$date}}" name="fecha" >

			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Mesa: </label>
        <select name="mesa" id="mesa">
          <option value="1">Mesa 1</option>
          <option value="2">Mesa 2</option>
          <option value="3">Mesa 3</option>
          <option value="4">Mesa 4</option>
          <option value="5">Mesa 5</option>
        </select>
			</div>
		</div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Platos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Nº Boleta</th>
                      <th>id producto</th>
                      <th>Nombre</th>
                      <th>descripcion</th>
                      <th>Cantidad</th>
                    </thead>
                    @foreach ($productos as $pro)
                    @if($pro->idcategoria==5)
                      <tr>
                        <td>d</td>
                        <td>{{$pro->idproducto}}</td>
                        <td>{{$pro->nombre}}</td>
                        <td>{{$pro->descripcion}}</td>
                        <td><input type="number" required value="{{old('nplatos')}}" name="nplatos" placeholder="Num platos..."></td>
                      </tr>
                    @endif
                    @endforeach
                  </table>

                 </div>
              </div>

            </div>
          </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>


			{!!Form::close()!!}
@endsection
