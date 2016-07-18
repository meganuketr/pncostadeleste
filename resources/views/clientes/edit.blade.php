@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit: {{ $cliente->nombre }}</div>
				<div class="panel-body">
	
	
					
					
					{!! Form::model($cliente, ['method' => 'PATCH', 'action'=>['ClientesController@update',$cliente->id], 'class' => 'form-horizontal'])	!!}	
					
						@include('clientes._form',['submitButtonText' => 'Edit'])
					
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</div>
</div>			
		
@stop