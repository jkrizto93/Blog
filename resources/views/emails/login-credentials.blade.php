@component('mail::message')
# Tus Credenciales para acceder a {{config('app.name')}}

Utilizaestas credeniales para acceder al sistema.
@component('mail::table')
	| UserName | Contraseña |
	|:----------|:------------|
	| {{$user->email}} | {{$password}} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
