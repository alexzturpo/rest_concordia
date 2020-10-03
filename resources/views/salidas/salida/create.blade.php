@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Salida</h3>
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
			{!!Form::open(array('url'=>'salidas/salida','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<label for="proveedor">personal</label>
				<select  class="form-control selectpicker" name="idpersonal" data-live-search="true" id="idpersonal" >
					@foreach($personas as $persona)
						<option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row">	
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Producto</label>
						<select name="pidproducto" class="form-control selectpicker"  id="pidproducto" data-live-search="true">
							@foreach($productos as $producto)
							<option value="{{$producto->idproducto}}_{{$producto->stock}}">{{$producto->producto}}</option>
							@endforeach
						</select>
					</div>					
				</div>				

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<lavel for="cantidad">Cantidad</lavel>
						<input type="number" name="pcantidad"  id="pcantidad" class="form-control" placeholder="cantidad">
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<lavel for="stock">Stock</lavel>
						<input type="number" disabled name="pstock"  id="pstock" class="form-control" placeholder="Stock">
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: #A9D0F5">
							<th>Opciones</th>
							<th>Producto</th>
							<th>Cantidad</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>

			</div>			
		</div>		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>


			{!!Form::close()!!}		


@push('scripts')
<script>
	$(document).ready(function(){
        $('#bt_add').click(function(){
        agregar();
     	});
     });
	var cont=0;
	total=0;
	$("#guardar").hide();
	$("#pidproducto").change(mostrarValores);

	function mostrarValores(){
		datosPoductos=document.getElementById('pidproducto').value.split('_');
		$("#pstock").val(datosPoductos[1]);
	}

	function agregar(){
		datosPoductos=document.getElementById('pidproducto').value.split('_');
		idproducto=datosPoductos[0];
   		producto=$("#pidproducto option:selected").text();
   		cantidad=$("#pcantidad").val();
		if(idproducto!="" && cantidad!="" && cantidad>0 )
		{
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>';
			cont=cont+1;
			limpiar();
			
			evaluar();
			$('#detalles').append(fila);
		}
		else
		{
			alert("Error al Ingresar");
		}
	}

	function limpiar(){
		$("#pcantidad").val("");
	}
	function evaluar()
	{
		if (cont>0) {
			$("#guardar").show();
		}
		else
		{
			$("#guardar").hide();
		}
	}

	function eliminar(index){
		$("#fila"+index).remove();
	}
</script>
@endpush	
@endsection


