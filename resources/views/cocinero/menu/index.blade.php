@extends('layouts.panelc')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Platos </h3>
		@include('cocinero.menu.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>Id</th>
					<th>Nombre</th>
          <th>Categoria</th>
					<th>Precio</th>
          <th>Estado</th>
          <th>Opciones</th>
				</thead>
				@foreach ($productos as $pro)
				@if($pro->idcat==5)
					<tr>
						<td>{{$pro->idproducto}}</td>
						<td>{{$pro->nombre}}</td>
	          <td>{{$pro->categoria}}</td>
						<td>{{$pro->precio}}</td>
	          <td>
							@if($pro->estado==1)
							EN MENÚ
							@else
							ninguno
							@endif

						</td>
	          <td>
							<a href="" data-target="#modal-menu-{{$pro->idproducto}}" data-toggle="modal"><button class="btn btn-info">Agregar al Menu</button></a>
							<a href="" data-target="#modal-menuf-{{$pro->idproducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar del Menu</button></a>
						</td>
					</tr>
					@include('cocinero.menu.modal')
					@include('cocinero.menu.modal2')
					@endif

				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>
<a href="menu/edit"><button class="btn btn-success">Vista Previa Menú</button></a>
@endsection
