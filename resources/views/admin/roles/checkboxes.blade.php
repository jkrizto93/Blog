@foreach($roles as $role)
	<div class="checkbox">
		<label>
			<input name="roles[]" type="checkbox" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked':'' }}>
								{{$role->name}}
			<br>
			<small class="text-muted">
				no se porque no devuelve los permisos :'( {{ $role->permissions->pluck('name')->implode(', ') }}
			</small>
		</label>						
	</div>
						
@endforeach