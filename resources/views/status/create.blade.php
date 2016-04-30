@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>Create a Status</h1></div>
				<div class="panel-body">

					@include('errors.list')
	
					{!! Form::open(['url'=>'status', 'class' => 'form-horizontal']) !!}
					
						@include('status._form',['submitButtonText' => 'Create'])
											
					{!! Form::close() !!}	
					
				</div>
			</div>
		</div>
	</div>
</div>		
@stop