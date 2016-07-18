@extends ('app')

@section ('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Orden de Trabajo #: {{ $ordentrabajo->id }}</div>
				<div class="panel-body">
	
	
					
					
					{!! Form::model($ordentrabajo, ['method' => 'POST', 'action'=>['OrdenTrabajosController@storeStatusChange',$ordentrabajo->id], 'class' => 'form-horizontal'])	!!}	
						<input type="hidden" name="ot_id" value="{{ $ordentrabajo->id }}">
						<div class="form-group">
							{!! Form::label('status','Cambiar status a -> ',['class'=>'col-md-4 control-label'])	!!}
							<div class="col-md-6">
								{!! Form::select('status_id', $status ,null ,['class'=>'form-control','id'=>'status_id']) !!}
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Change Status', ['class' =>'btn btn-primary ' ]) !!}
							</div>
						</div>					
					{!! Form::close() !!}	
				</div>
			</div>
		</div>
	</div>
</div>			
		
@stop