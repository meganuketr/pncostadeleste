@extends ('app')



@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Ordenes de Trabajo</div>
				<div class="panel-body">
				<p>
				<a class="btn btn-info" href="{{ route('ordentrabajo.create') }}" role="button">
					New OT
				</a>
				</p>
				
				<table class="table table-stripped">
					<tr>
						<td>#</td>
						<td>Cliente</td>
						<td>Status</td>
						<td>Fecha Ofre</td>
						<td>Actions</td>
						
					</tr>
					@foreach ($ots as $ot)
						<tr data-id="{{ $ot->id }}">
							<td>{{ $ot->id }}</td>
							<td>{{ $ot->nombrecliente }}</td>
							<td>{{ $ot->status }}</td>
							<td>{{ $ot->fecha_ofrecida }}</td>
							<td>
								<a href="{{ action('OrdenTrabajosController@changestatus',[$ot->id])}}">Change Status</a> | 
								<a href="{{ action('OrdenTrabajosController@historicos',[$ot->id])}}">Historico</a>
							</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $ots->render() !!}
				
				{!! Form::open(['route' => ['ordentrabajo.destroy', ':STATUS_ID'], 'method' => 'DELETE', 'id' => 'form-delete' ]) !!}
				{!! Form::close() !!}
				
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection

@section('scripts')

<script>
$(document).ready(function() {
	$('.btn-delete').click(function (e) {

		e.preventDefault();

		var row = $(this).parents('tr');
		var id = row.data('id');
		var form  = $('#form-delete');
		var url = form.attr('action').replace(':STATUS_ID',id);
		var data = form.serialize();

		row.fadeOut();

		$.post(url,data,function(result) {
			alert(result.message)
		});
	});
});
</script>
@endsection
