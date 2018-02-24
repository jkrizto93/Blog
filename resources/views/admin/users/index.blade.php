@extends('admin.layout')
@section('header')
	<h1>
	  Todos los usuarios
	  <small>Listado de usuarsios</small>
	</h1>
	<ol class="breadcrumb">
    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	        <li class="active">Usuarios</li>
	</ol>
@stop

@section('content')

		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de usuarios</h3>
              @can('create',$users->first())
                <a href="{{route('admin.users.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Crear usuarsios</a>
              @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users-Table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Acciones</th>


                </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                		<tr>
                			<td>{{$user->id}}</td>
                			<td>{{$user->name}}</td>
                			<td>{{$user->email}}</td>
                      <td>{{$user->getRoleNames()->implode(', ')}}</td>

                			<td>

                        @can('view',$user)
                          <a href="{{route('admin.users.show',$user)}}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                        @endcan

                        @can('update',$user)
                				  <a href="{{route('admin.users.edit',$user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        @endcan

                        @can('delete',$user)

                          <form method="POST" action="{{route('admin.users.destroy',$user)}}" style="display: inline">
                            {{csrf_field()}} {{method_field('DELETE')}}
                              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Quiere eliminar esta cuenta?')"><i class="fa fa-times"></i></button>
                          </form>
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
      $('#users-Table').DataTable();
    });
  </script>

@endpush
