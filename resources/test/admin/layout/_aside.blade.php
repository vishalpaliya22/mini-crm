        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{ asset('vendor/dist/img/user2-160x160') }}.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <!-- <i class="right fas fa-angle-left"></i> -->
                    </p>
                  </a>
                </li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link {{ Request::is('admin/user') || Request::is('admin/user/create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Admin Users <i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('user.create') }}" class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>Add New</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>list</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link {{ Request::is('admin/event') || Request::is('admin/event/create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Events management <i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('event.create') }}" class="nav-link {{ Request::is('admin/event/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>Add New</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('event.index') }}" class="nav-link {{ Request::is('admin/event') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>list</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>