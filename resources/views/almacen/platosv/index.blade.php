@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de  platos mas vendidos</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>

					<th>fecha</th>
					<th>monbre</th>
					<th>platos vendidos</th>
				</thead>
				@foreach ($plato as $pt)
        @if($pt->catpro=5)
					<tr>
						<td>{{$pt->fecha}}</td>
						<td>{{$pt->nom}}</td>
            <td>a</td>
	          <td>
							<a href=""><button class="btn btn-info">Editar</button></a>
						</td>
					</tr>
        @endif
				@endforeach
			</table>
		</div>
		{{$gas->render()}}
	</div>
</div>

@endsection
