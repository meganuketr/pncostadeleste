		<div class="form-group">		
			{!! Form::label('nombre','Nombre: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('nombre',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('categoria','Categoria: ',['class'=>'col-md-4 control-label'])	!!}
			<div class="col-md-6">
				{!! Form::select('categoria_id', $categorias ,null ,['class'=>'form-control','id'=>'categoria_id']) !!}
			</div>
		</div>
		<div class="form-group">		
			{!! Form::label('minimo','Minimo: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('minimo',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="form-group">		
			{!! Form::label('precio','Precio: ',['class'=>'col-md-4 control-label']) !!}
			<div class="col-md-6">
				{!!	Form::text('precio',null,['class'=>'form-control']) !!}
			</div>
		</div>
					
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				{!! Form::submit($submitButtonText, ['class' =>'btn btn-primary ' ]) !!}
			</div>
		</div>