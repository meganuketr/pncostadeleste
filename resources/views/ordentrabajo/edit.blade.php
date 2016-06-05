@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit: {{ $status->nombre }}</div>
				<div class="panel-body">
	
	
					
					
					{!! Form::model($status, ['method' => 'PATCH', 'action'=>['StatusController@update',$status->id], 'class' => 'form-horizontal'])	!!}	
					
						@include('status._form',['submitButtonText' => 'Edit'])
					
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</div>
</div>			
		
@stop