@extends('layouts.panelc')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Gasto</h3>
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
  {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idproducto]])!!}
			{!!Form::open(array('url'=>'cocinero/gastos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Descripcion</label>
				<input type="text" required value="{{old('desc')}}" name="desc" class="form-control" placeholder="una brebe descripcion del gasto...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Monto</label>
				<input type="number" value="{{old('monto')}}" name="monto" class="form-control" placeholder="monto del gasto...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>
		{!!Form::close()!!}
@endsection
