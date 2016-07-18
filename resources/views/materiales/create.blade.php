@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>Create a Material</h1></div>
				<div class="panel-body">

	
					{!! Form::open(['url'=>'materiales', 'class' => 'form-horizontal']) !!}
					
						@include('materiales._form',['submitButtonText' => 'Create'])
											
					{!! Form::close() !!}
											
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>		
@stop