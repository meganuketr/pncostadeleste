@extends ('app')



@section ('content')
<div class="container">
	@include('partials._flash')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Status</div>
				<div class="panel-body">
				<p>
				<a class="btn btn-info" href="{{ route('status.create') }}" role="button">
					New Status
				</a>
				</p>
				
				<table class="table table-stripped">
					<tr>
						<td>#</td>
						<td>Status</td>
						<td>Actions</td>
						
					</tr>
					@foreach ($status as $stat)
						<tr data-id="{{ $stat->id }}">
							<td>{{ $stat->id }}</td>
							<td>{{ $stat->nombre }}</td>
							<td>
								<a href="{{ action('StatusController@edit',[$stat->id])}}">Edit</a>
								<a href="" class="btn-delete">Delete</a>
							</td>
							
						</tr>
						
				
					@endforeach
				</table>
				{!! $status->render() !!}
				
				{!! Form::open(['route' => ['status.destroy', ':STATUS_ID'], 'method' => 'DELETE', 'id' => 'form-delete' ]) !!}
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
