@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>Create an OT</h1></div>
				<div class="panel-body">

	
					{!! Form::open(['url'=>'ordentrabajo', 'class' => 'form-horizontal']) !!}
					
						@include('ordentrabajo._form',['submitButtonText' => 'Create'])
											
					{!! Form::close() !!}
											
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>		

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
@stop