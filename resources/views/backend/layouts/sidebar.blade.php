    <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (\Gate::allows('posts.create', Auth::user()) )

    @endif
      @can('posts.user',Auth::user())
        <li class="active treeview">
          <a href="#">
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/user/create')}}"><i class="fa fa-plus"></i> Add User</a></li>
            <li><a href="{{ url('admin/user')}}"><i class="fa fa-list-ul"></i> List Users</a></li>
            
          </ul>
        </li>
       

      
        <li class="active treeview">
            <a href="#">
              <span>Role Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/role/create')}}"><i class="fa fa-plus"></i> Add role</a></li>
              <li><a href="{{ url('admin/role')}}"><i class="fa fa-list-ul"></i> List roles</a></li>
              
            </ul>
        </li>
        
        <li class="active treeview">
          <a href="#">
            <span>Permission Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/permission/create')}}"><i class="fa fa-plus"></i> Add permission</a></li>
            <li><a href="{{ url('admin/permission')}}"><i class="fa fa-list-ul"></i> List permissions</a></li>
            
          </ul>
        </li>
        @endcan

        <li class="active treeview">
          <a href="#">
            <span>Post Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @can('posts.create',Auth::user())
            <li><a href="{{ url('/admin/post/create')}}"><i class="fa fa-plus"></i> Add Post</a></li>
            @endcan

          
            <li><a href="{{ url('/admin/post')}}"><i class="fa fa-list-ul"></i>List Posts</a></li>

          </ul>
        </li>
          
        @can('posts.category',Auth::user())
        <li class="active treeview">
          <a href="#">
            <span>Category Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/category/create')}}"><i class="fa fa-plus"></i> Add Category</a></li>
            <li><a href="{{ url('/admin/category')}}"><i class="fa fa-list-ul"></i> List Categories</a></li>
            
          </ul>
        </li>
          @endcan

        @can('posts.tag',Auth::user())
        <li class="active treeview">
          <a href="#">
             <span>Tag Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/tag/create')}}"><i class="fa fa-plus"></i> Add Tag</a></li>
            <li><a href="{{ url('/admin/tag')}}"><i class="fa fa-list-ul"></i> List Tags</a></li>

          </ul>
        </li>
          @endcan
      </ul>
    </section>
    <!-- /.sidebar -->