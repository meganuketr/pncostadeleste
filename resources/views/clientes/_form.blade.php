		<div class="form-group">		
			{!! Form::label('nombre','Nombre: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('nombre',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-group">		
			{!! Form::label('email','Email: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('email',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-group">		
			{!! Form::label('telefono','Telefono: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('telefono',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-group">		
			{!! Form::label('contacto','Contacto: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('contacto',null,['class'=>'form-control']) !!}
			</div>
		</div>
					
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				{!! Form::submit($submitButtonText, ['class' =>'btn btn-primary ' ]) !!}
			</div>
		</div>