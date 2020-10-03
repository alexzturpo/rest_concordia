@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de gastos <a href="gastosa/create"><button class="btn btn-success"> Nuevo Gasto</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>fecha</th>
					<th>descripcion</th>
					<th>Monto</th>
          <th>Opciones</th>
				</thead>
				@foreach ($gas as $gt)
					<tr>
						<td>{{$gt->fecha}}</td>
						<td>{{$gt->descrip}}</td>
            <td>{{$gt->monto}}</td>
	          <td>
							<a href=""><button class="btn btn-info">Editar</button></a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		{{$gas->render()}}
	</div>
</div>

@endsection
