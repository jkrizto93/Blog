@extends('layout')
@section('content')
<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Pagina no autorizada ... >:( </h1>
			<h2 class="text-capitalize" style="color:red">{{$exception->getMessage()}}</h2>

			<p>Volver a la pagina <a href="{{url()->previous()}}">Anterior</a></p>
		</div>
	</section>
@endsection