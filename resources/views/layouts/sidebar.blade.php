<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        
        <li>
          <a href="{{ url('/home') }}">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/item') }}">
            <i class="fa fa-th"></i> <span>Items</span>
          </a>
        </li>
        @if(Auth::user()->type == 'admin')
        <li>
          <a href="{{ url('/location') }}">
            <i class="fa fa-th"></i> <span>Locations</span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{ url('/category') }}">
            <i class="fa fa-th"></i> <span>Categories</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/user') }}">
            <i class="fa fa-th"></i> <span>Users</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>