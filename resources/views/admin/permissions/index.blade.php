@extends('admin.layout')
@section('header')
	<h1>
	  Todos los permisos
	  <small>Listado de permisos</small>
	</h1>
	<ol class="breadcrumb">
    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	        <li class="active">permisos</li>
	</ol>
@stop

@section('content')

		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de permisos</h3>
              <a href="{{route('admin.permissions.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Crear permisos</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="roles-Table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Identificador</th>
                  <th>Nombre</th>
                  <th>Acciones</th>


                </tr>
                </thead>
                <tbody>
                	@foreach($permissions as $permission)
                		<tr>
                			<td>{{$permission->id}}</td>
                			<td>{{$permission->name}}</td>
                			<td>{{$permission->display_name}}</td>

                			<td>
                  
                				<a href="{{route('admin.roles.edit',$permission)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

                        @if($permission->id !== 1)
                          <form method="POST" action="{{route('admin.roles.destroy',$permission)}}" style="display: inline">
                              {{csrf_field()}} {{method_field('DELETE')}}
                               <button class="btn btn-xs btn-danger" onclick="return confirm('¿Quiere eliminar este role?')"><i class="fa fa-times"></i>
                               </button>
                          </form>
                        @endif


                			

                			</td>
                		</tr>
                	@endforeach
                </tbody>
             
              </table>
            </div>
            <!-- /.box-body -->
    </div>		

@stop

@push('styles')
 <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
  <!-- bootstrap datepicker -->
  <!-- DataTables -->
  <script src="../adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#roles-Table').DataTable();
    });
  </script>

@endpush
