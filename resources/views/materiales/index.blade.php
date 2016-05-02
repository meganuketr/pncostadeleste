@extends ('app')



@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Materiales</div>
				<div class="panel-body">
				<p>
				<a class="btn btn-info" href="{{ route('materiales.create') }}" role="button">
					New Material
				</a>
				</p>
				
				<table class="table table-stripped">
					<tr>
						<td>#</td>
						<td>Material</td>
						<td>Actions</td>
						
					</tr>
					@foreach ($materiales as $material)
						<tr data-id="{{ $material->id }}">
							<td>{{ $material->id }}</td>
							<td>{{ $material->nombre }}</td>
							<td>
								<a href="{{ action('MaterialesController@edit',[$material->id])}}">Edit</a>
								<a href="" class="btn-delete">Delete</a>
							</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $materiales->render() !!}
				
				{!! Form::open(['route' => ['materiales.destroy', ':MATERIAL_ID'], 'method' => 'DELETE', 'id' => 'form-delete' ]) !!}
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
		var url = form.attr('action').replace(':MATERIAL_ID',id);
		var data = form.serialize();

		row.fadeOut();

		$.post(url,data,function(result) {
			alert(result.message)
		});
	});
});
</script>
@endsection
