		<div class="form-group">		
			{!! Form::label('cliente_id','Cliente: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('cliente_id',null,['class'=>'form-control', 'id' =>  'cliente_id', 'placeholder' =>  'Enter id']) !!}
			</div>
		</div>
		
		<div class="form-group">		
			{!! Form::label('nombre_cliente','Cliente: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('nombre_cliente',null,['class'=>'form-control', 'id' =>  'cliente', 'placeholder' =>  'Enter name']) !!}
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
				{!! Form::text('fecha_ofrecida', null, ['id'=>'datepicker']) !!}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				{!! Form::submit($submitButtonText, ['class' =>'btn btn-primary ' ]) !!}
			</div>
		</div>