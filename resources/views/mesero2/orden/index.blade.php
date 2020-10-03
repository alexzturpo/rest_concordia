@extends('layouts.panelm')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Ordenes  <a href="orden/create"><button class="btn btn-success">Nueva Orden</button></a></h3>
		@include('mesero2.orden.modalplato')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>fecha</th>
					<th>Plato</th>
					<th>Descripcion</th>
					<th>Mesa</th>
					<th>Estado</th>
          <th>Opciones</th>
				</thead>
				@foreach ($dtcompra as $dat)
					<tr>
						<td>{{$dat->fecha}}</td>
						<td>{{$dat->nom}}</td>
						<td>{{$dat->descrip}}</td>
						<td>{{$dat->mesa}}</td>
						<td>
							@switch($dat->estado)
							    @case(1)
							        servido
							        @break
							    @case(2)
							        pendiente
							        @break
							@endswitch</td>
	          <td>
							<a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Cancelado</button></a>
						</td>
					</tr>

				@endforeach
			</table>
		</div>
		{{$dtcompra->render()}}
	</div>
</div>

@endsection
