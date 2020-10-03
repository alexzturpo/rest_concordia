@extends('layouts.panelm')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Compras <a href="" data-target="#modal-newcompra" data-toggle="modal"><button class="btn btn-info">Nueva orden</button></a></h3>
		@include('mesero.newcompra.modal')


	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>fecha_hora</th>
					<th>Mesa</th>
          <th>Total</th>
          <th>Opciones</th>
				</thead>
				@foreach ($dtcompra as $dat)
					<tr>
						<td>{{$dat->fecha}}</td>
						<td>{{$dat->mesa}}</td>
	          <td>{{$dat->total}}</td>
	          <td>

							<a href="" data-target="" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Imprimir</button></a>
						</td>
					</tr>


				@endforeach
			</table>
		</div>
		{{$dtcompra->render()}}
	</div>
</div>
<a href="menu/edit"><button class="btn btn-success">Vista Previa Menú</button></a>
@endsection
