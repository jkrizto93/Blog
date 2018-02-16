@extends('admin.layout')
@section('header')
	<h1>
	  Posts
	  <small>Crear publicaciones</small>
	</h1>
	<ol class="breadcrumb">
	  <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>

	  <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i> Posts</a></li>

	        <li class="active">Crear</li>
	</ol>
@stop
@section('content')
<div class="row">
	@if($post->photos->count())
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
							<div class="row">
								@foreach($post->photos as $photo)
									<form method="POST" action="{{route('admin.photos.destroy',$photo)}}">
										{{method_field('DELETE')}}
										{{csrf_field()}}
										<div class="col-md-2">
											<button class="btn btn-danger btn-xs" style="position:absolute"><i class="fa fa-remove"></i></button>
											<img class="img-responsive" src="/storage/{{$photo->url}}">
										</div>
									</form>
								@endforeach
							</div>
				</div>
			</div>
		
		</div>
	@endif

	<form method="POST" action="{{route('admin.posts.update',$post)}}">
		{{csrf_field()}} {{method_field('PUT')}}
		<div class="col-md-8">
			


			<div class="box box-primary">
				
				
					<div class="box-body">

						<div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
							<label>Titulo de la publicacion</label>
							<input class="form-control" name="title" placeholder="Ingresa el titulo de la publicacion" value="{{old('title',$post->title)}}">
							{!!$errors->first('title','<span class="help-block">:message</span>')!!}
						</div>

						

						<div class="form-group {{ $errors->has('body') ? 'has-error':''}}">
							<label>Contenido de la publicacion</label>
							<textarea rows="10" id="editor" name="body" class="form-control">{{old('body',$post->body)}}</textarea>
							{!!$errors->first('body','<span class="help-block">:message</span>')!!}
						</div>

						<div class="form-group {{ $errors->has('iframe') ? 'has-error':''}}">
							<label>Contenido iframe (embebido??)</label>
							<textarea rows="2" id="editor" name="iframe" class="form-control" placeholder="Ingresa contenido de audio y video">{{old('iframe',$post->iframe)}}</textarea>
							{!!$errors->first('iframe','<span class="help-block">:message</span>')!!}
						</div>



					</div>
						
			</div>

		</div>

		<div class="col-md-4">

			<div class="box box-primary">
				<div class="box-body">

					<div class="form-group">
		                <label>Fecha:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{old('published_at',$post->published_at ? $post->published_at ->format('m/d/Y') : null)}}">
		                </div>
		                <!-- /.input group -->
		            </div>
		            <div class="form-group {{ $errors->has('category_id') ? 'has-error':''}}">
		            	<label>Categorias</label>

		            	<select name="category_id" class="form-control select2">
		            		<option value="">Selecciona una categoria</option>
		            		@foreach($categories as $category)
		            		<option value="{{$category->id}}" 
		            			{{old('category_id',$post->category_id) == $category->id ? 'selected' :'' }} 
		            			>{{$category->name}}</option>
		            		@endforeach
		            	</select>
		            	{!!$errors->first('category_id','<span class="help-block">:message</span>')!!}
		            </div>	

		            <div class="form-group {{ $errors->has('tags') ? 'has-error':''}}">
		            	<label>Etiquetas</label>
		            	<select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una etiqueta"
                        style="width: 100%;">
		                  @foreach($tags as $tag)
		            		<option {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
		            		@endforeach
		                </select>
		                {!!$errors->first('tags','<span class="help-block">:message</span>')!!}	
		            </div>

					<div class="form-group {{ $errors->has('excerpt') ? 'has-error':''}}">
						<label>Extracto de la publicacion</label>
						<textarea name="excerpt" class="form-control">{{old('excerpt',$post->excerpt)}}</textarea>
						{!!$errors->first('excerpt','<span class="help-block">:message</span>')!!}			
					</div>
					<div class="form-group">
						<div class="dropzone"></div>
					</div>

					<div class="form-group">
						
						<button class="btn btn-primary btn-block" type="submit">Guardar</button>
									
					</div>

				</div>
			</div>
		</div>

	</form>

</div>
@stop

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="../../adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Select2 -->
  <link rel="stylesheet" href="../../adminlte/bower_components/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>

<script src="../../adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- CK Editor -->
<script src="../../adminlte/bower_components/ckeditor/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="../../adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });	
    $('.select2').select2({tags:true});
    CKEDITOR.replace('editor');
    CKEDITOR.config.height=315;

    var myDropzone= new Dropzone('.dropzone',{
    	url:'/admin/posts/{{$post->url}}/photos',
    	//acceptedFiles: 'image/*',
    	//maxFilesize: 2,
    	paramName: 'photo',
    	headers: {
    		'X-CSRF-TOKEN':'{{csrf_token()}}'
    	} ,
    	dictDefaultMessage:'Arrasta Las imagenes aqui para subirlas'
    });

    myDropzone.on('error', function(file,res){
    	
    	console.log(res);
    	//$('.dz-error-message > span').text(msg);
    });

    Dropzone.autoDiscover=false;
</script>


@endpush
