@extends('layouts.panelc')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Ordenes</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>fecha</th>
					<th>Mesa</th>
					<th>Estado</th>
          <th>Opciones</th>
				</thead>
				@foreach ($dtcompra as $dat)
					<tr>
						<td>{{$dat->fecha}}</td>
						<td>{{$dat->mesa}}</td>
            @if($dat->estado=2)
						<td>pendiente</td>
            @endif
	          <td>
							<a href="" data-target="#modal-delete" data-toggle="modal"><button class="btn btn-info">servido</button></a>
						</td>
					</tr>
          @include('cocinero.odenes.modal')
				@endforeach
			</table>
		</div>
		{{$dtcompra->render()}}
	</div>
</div>

@endsection
