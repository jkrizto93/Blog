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
				@if($errors->any())
					<ul class="list-group">
						@foreach($errors->all() as $error)
							<li class="list-group-item list-group-item-danger">
								{{$error}}
							</li>
						@endforeach
					</ul>
				@endif
				
				<form method="POST" action="{{route('admin.users.create')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label for="name">Nombre:</label>
						<input name="name" value="{{old('name')}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input name="email" value="{{old('email')}}" class="form-control">
					</div>

					<button class="btn btn-primary btn-block">Actualizar usuario</button>
						
					
				</form>
			</div>
		</div>	
	</div>
</div>
@endsection