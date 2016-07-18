@extends ('app')

@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Historico Orden de Trabajo #: </div>
				<div class="panel-body">
				
				<table class="table table-stripped">
					<tr>
						<td>Fecha / Hora</td>
						<td>Operacion</td>
						<td>Status</td>
						<td>Usuario</td>
						
					</tr>
					@foreach ($historicos as $historico)
						<tr">
							<td>{{ $historico->created_at }}</td>
							<td>{{ $historico->operacion }}</td>
							<td>{{ $historico->status }}</td>
							<td>{{ $historico->user }}</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $historicos->render() !!}
				
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection