@extends ('app')



@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Categorias</div>
				<div class="panel-body">
				<p>
				<a class="btn btn-info" href="{{ route('categorias.create') }}" role="button">
					New Category
				</a>
				</p>
				
				<table class="table table-stripped">
					<tr>
						<td>#</td>
						<td>Categoria</td>
						<td>Actions</td>
						
					</tr>
					@foreach ($categorias as $categoria)
						<tr data-id="{{ $categoria->id }}">
							<td>{{ $categoria->id }}</td>
							<td>{{ $categoria->nombre }}</td>
							<td>
								<a href="{{ action('CategoriasController@edit',[$categoria->id])}}">Edit</a>
								<a href="" class="btn-delete">Delete</a>
							</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $categorias->render() !!}
				
				{!! Form::open(['route' => ['categorias.destroy', ':CATEGORIA_ID'], 'method' => 'DELETE', 'id' => 'form-delete' ]) !!}
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
		var url = form.attr('action').replace(':CATEGORIA_ID',id);
		var data = form.serialize();

		row.fadeOut();

		$.post(url,data,function(result) {
			alert(result.message)
		});
	});
});
</script>
@endsection
