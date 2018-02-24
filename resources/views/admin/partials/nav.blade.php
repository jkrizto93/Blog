      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navegacion</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{setActiveRoute('admin')}}">
          <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
        </li>
        <!--Publicaciones -->
        <li class="treeview {{setActiveRoute('admin.posts.index')}}">
          <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
                <li class="{{setActiveRoute('admin.posts.index')}}"><a href="{{route('admin.posts.index')}}"><i class="fa fa-eye"></i>Ver todos los Post</a></li>
            @can('create',new App\Post)
            <li>
              @if(request()->is('admin/posts/*'))
                <a href="{{route('admin.posts.index','#create')}}"><i class="fa fa-pencil"></i>Crear Post</a>
              @else
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Crear Post</a>
              @endif
            </li>
            @endcan
          </ul>
        </li>

        <!--Usuarios -->
        @can('view',new app\User)
          <li class="treeview {{setActiveRoute(['admin.users.index','admin.users.create'])}}">
          <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{setActiveRoute('admin.users.index')}}"><a href="{{route('admin.users.index')}}"><i class="fa fa-eye"></i>Ver todos los Usuarios</a></li>
            <li class="{{setActiveRoute('admin.users.create')}}">
                <a href="{{route('admin.users.create')}}"><i class="fa fa-pencil"></i>Crear usuario</a>
             
            </li>
          </ul>
          </li>
        @else
              <li class="{{setActiveRoute(['admin.users.edit'])}}">
                 <a href="{{route('admin.users.edit',auth()->user())}}"><i class="fa fa-user"></i> <span>perfil</span></a>
              </li>
        @endcan

        <!--Roles-->
        @can('view', new \Spatie\Permission\Models\Role)
           <li class="{{setActiveRoute(['admin.roles.index','admin.roles.edit'])}}">
             <a href="{{route('admin.roles.index')}}"><i class="fa fa-pencil"></i> <span>Roles</span></a>
           </li>
        @endcan
        <!--permisos-->
        @can('view', new \Spatie\Permission\Models\Permission)
           <li class="{{setActiveRoute(['admin.permissions.index','admin.permissions.edit'])}}">
             <a href="{{route('admin.permissions.index')}}"><i class="fa fa-pencil"></i> <span>Permisos</span></a>
           </li>
        @endcan

      </ul>