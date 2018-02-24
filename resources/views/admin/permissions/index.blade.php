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
                          
                        @can('update',$permission)
                				  <a href="{{route('admin.permissions.edit',$permission)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        @endcan



                			

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
