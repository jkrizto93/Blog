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

				
				<form method="POST" action="{{route('admin.users.update',$user)}}">
					{{csrf_field()}} {{method_field('PUT')}}
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input name="name" value="{{old('name', $user->name)}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input name="email" value="{{old('email', $user->email)}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input placeholder="Contraseña"  type="password" name="password" class="form-control">
						<span class="help-block">Dejar en blanco para no cambiar contraseña</span>
					</div>
					<div class="form-group">
						<label for="password_confirmation">Confirmar contraseña:</label>
						<input placeholder="Confirma contraseña"  type="password" name="password_confirmation" class="form-control">

					</div>
					<button class="btn btn-primary btn-block">Actualizar usuario</button>
						
					
				</form>
			</div>
		</div>	
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>				
			</div>
			<div class="box-body">
				@role('Admin')
				<form method="POST" action ="{{route('admin.users.roles.update',$user)}}">
					{{csrf_field()}} {{method_field('PUT')}}

					@include('admin.roles.checkboxes')

					<button class="btn btn-primary btn-block">Actualizar Roles</button>
				</form>
				@else
					<ul class="list-group">
						@forelse($user->roles as $role)
							<li class="list-group-item">{{$role->name}}</li>
						@empty
							<li class="list-group-item">Usuario sin roles :(</li>
						@endforelse
						
					</ul>
				@endrole
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permisos</h3>				
			</div>
			<div class="box-body">
				@role('Admin')
				<form method="POST" action ="{{route('admin.users.permissions.update',$user)}}">
					{{csrf_field()}} {{method_field('PUT')}}
					

					@include('admin.permissions.checkboxes',['model'=>$user])

					<button class="btn btn-primary btn-block">Actualizar Permisos</button>
				</form>
				@else
					<ul class="list-group">
						@forelse($user->permissions as $permission)
							<li class="list-group-item">{{$permission->name}}</li>
						@empty
							<li class="list-group-item">Usuario sin permisos :(</li>
						@endforelse
						
					</ul>
				@endrole
			</div>
		</div>

	</div>
</div>
	
@endsection