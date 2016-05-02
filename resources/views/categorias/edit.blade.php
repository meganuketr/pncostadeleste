@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit: {{ $categoria->name }}</div>
				<div class="panel-body">
	
	
					
					
					{!! Form::model($categoria, ['method' => 'PATCH', 'action'=>['CategoriasController@update',$categoria->id], 'class' => 'form-horizontal'])	!!}	
					
						@include('categorias._form',['submitButtonText' => 'Edit'])
					
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</div>
</div>			
		
@stop