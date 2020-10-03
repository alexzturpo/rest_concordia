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

	<div class="row">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Platos</h3>
          </div>
          <!-- /.box-header -->
					{!!Form::open(array('url'=>'mesero2/orden','method'=>'POST','autocomplete'=>'off'))!!}
					{{Form::token()}}
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Nombre</th>
                      <th>Descrip plato</th>
											<th>Mesa</th>
											<th>Descrip pedido</th>
                      <th>Cantidad</th>
											<th>Odenar</th>
                    </thead>
                    	<tr>
												<td>
													<select name="idpro" id="idpro">
														@foreach($productos as $pro)
														@if($pro->idcat==5)
														<option value="{{$pro->idproducto}}">{{$pro->nombre}}</option>
														@endif
														@endforeach
													</select>
												</td>
                        <td>{{$pro->desc}}</td>
												<td>
													<select name="mesa" id="mesa">
														<option value="1">Mesa 1</option>
														<option value="2">Mesa 2</option>
														<option value="3">Mesa 3</option>
														<option value="4">Mesa 4</option>
														<option value="5">Mesa 5</option>
													</select>
												</td>
												<td><input type="text"  value="{{old('dcpo')}}" name="dcpo"></td>
                        <td><input type="number" required value="{{old('nplatos')}}" name="nplatos" placeholder="Num platos..."></td>
												<td><button class="btn btn-primary" type="submit">Guardar</button></td>
                      </tr>
                  </table>
                 </div>
              </div>
            </div>
						{!!Form::close()!!}
          </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
	</div>
<!-- AGREGAR LAS BEBIDAS -->
	<div class="row">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Bebidas</h3>
          </div>
          <!-- /.box-header -->
					{!!Form::open(array('url'=>'mesero2/orden','method'=>'POST','autocomplete'=>'off'))!!}
					{{Form::token()}}
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Nombre</th>
                      <th>Descrip plato</th>
											<th>Mesa</th>
											<th>Descrip pedido</th>
                      <th>Cantidad</th>
											<th>Odenar</th>
                    </thead>
                    	<tr>
												<td>
													<select name="idpro" id="idpro">
														@foreach($productos as $pro)
														@if($pro->idcat==6)
														<option value="{{$pro->idproducto}}">{{$pro->nombre}}</option>
														@endif
														@endforeach
													</select>
												</td>
                        <td>{{$pro->desc}}</td>
												<td>
													<select name="mesa" id="mesa">
														<option value="1">Mesa 1</option>
														<option value="2">Mesa 2</option>
														<option value="3">Mesa 3</option>
														<option value="4">Mesa 4</option>
														<option value="5">Mesa 5</option>
													</select>
												</td>
												<td><input type="text"  value="{{old('dcpo')}}" name="dcpo"></td>
                        <td><input type="number" required value="{{old('nplatos')}}" name="nplatos" placeholder="Num platos..."></td>
												<td><button class="btn btn-primary" type="submit">Guardar</button></td>
                      </tr>
                  </table>
                 </div>
              </div>
            </div>
						{!!Form::close()!!}
          </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
	</div>
	<a  href="./"><button class="btn btn-success">Volver</button></a>

@endsection
