		<div class="form-group">		
			{!! Form::label('id_cliente','Cliente: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('id_cliente',null,['class'=>'form-control']) !!}
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::label('descripcion','Descripcion: ',['class'=>'col-md-4 control-label'])	!!}
			<div class="col-md-6">
				{!! Form::text('descripcion',null,['class'=>'form-control']) !!}
			</div>
		</div>
			
		<div class="form-group">
			{!! Form::label('fecha_ofrecida','Fecha Ofrecida: ',['class'=>'col-md-4 control-label'])	!!}
			<div class="col-md-6">
				{{ Form::text('date', '', array('id' => 'datepicker') }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				{!! Form::submit($submitButtonText, ['class' =>'btn btn-primary ' ]) !!}
			</div>
		</div>