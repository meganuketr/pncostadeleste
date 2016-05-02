@extends ('app')



@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Clientes</div>
				<div class="panel-body">
				<p>
				<a class="btn btn-info" href="{{ route('clientes.create') }}" role="button">
					New Client
				</a>
				</p>
				
				<table class="table table-stripped">
					<tr>
						<td>#</td>
						<td>Client</td>
						<td>Actions</td>
						
					</tr>
					@foreach ($clientes as $cliente)
						<tr data-id="{{ $cliente->id }}">
							<td>{{ $cliente->id }}</td>
							<td>{{ $cliente->nombre }}</td>
							<td>
								<a href="{{ action('ClientesController@edit',[$cliente->id])}}">Edit</a>
								<a href="" class="btn-delete">Delete</a>
							</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $cliente->render() !!}
				
				{!! Form::open(['route' => ['clientes.destroy', ':CLIENTE_ID'], 'method' => 'DELETE', 'id' => 'form-delete' ]) !!}
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
		var url = form.attr('action').replace(':CLIENTE_ID',id);
		var data = form.serialize();

		row.fadeOut();

		$.post(url,data,function(result) {
			alert(result.message)
		});
	});
});
</script>
@endsection
