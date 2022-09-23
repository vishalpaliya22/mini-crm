        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                @if (Auth::guard('admin')->check())
                <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <!-- <i class="right fas fa-angle-left"></i> -->
                    </p>
                  </a>
                  
                </li>
                <li class="nav-item {{ (request()->is('admin/employee*')) ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ Request::is('admin/employee') || Request::is('admin/employee/create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Employee Management <i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('employee.create') }}" class="nav-link {{ Request::is('admin/employee/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>Add New</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('employee.index') }}" class="nav-link {{ Request::is('admin/employee') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>list</p>
                      </a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav-item {{ (request()->is('admin/company*')) ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ Request::is('admin/company') || Request::is('admin/company/create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Company Management <i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('company.create') }}" class="nav-link {{ Request::is('admin/company/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>Add New</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('company.index') }}" class="nav-link {{ Request::is('admin/company') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i><p>list</p>
                      </a>
                    </li>
                  </ul>
                </li>

                @endif
                
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>