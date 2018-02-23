@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border"
			>
			<h3 class="box-title">Datos Personales</h3>
				
			</div>
			<div class="box-body">
				@include('partials.error-messages')

				
				<form method="POST" action="{{route('admin.users.store')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input name="name" value="{{old('name')}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input name="email" value="{{old('email')}}" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Roles</label>
						@include('admin.roles.checkboxes')

					</div>

					<div class="form-group col-md-6">
						<label>Permisos</label>
					@include('admin.permissions.checkboxes',['model'=>$user])

					</div>

					<span class="help-block">La contraseña sera enviada a su correo electronico.

					<button class="btn btn-primary btn-block">Crear usuario</button>
						
					
				</form>
			</div>
		</div>	
	</div>
</div>
@endsection