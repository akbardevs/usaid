<aside class="main-sidebar sidebar-light-red elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link navbar-danger">
    <img src="{{asset('/adminlte/dist/img/logo_darah.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{url('/')}}" class="nav-link {{Request::is('/') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/pendonor')}}" class="nav-link {{Request::is('pendonor') ? 'active' : ''}}">
            <i class="nav-icon fas fa-hand-holding-water"></i>
            <p>
              Data Pendonor
            </p>
          </a>
        </li>
        <li
          class="nav-item has-treeview {{Request::is('donor') ? 'menu-open' : ''}}{{Request::is('penggunaan') ? 'menu-open' : ''}}">
          <a href="#"
            class="nav-link {{Request::is('donor') ? 'active' : ''}}{{Request::is('penggunaan') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tint"></i>
            <p>
              Data Darah
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/donor')}}" class="nav-link {{Request::is('donor') ? 'active' : ''}}">
                <i class="far fas fa-plus nav-icon"></i>
                <p>Donor Darah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/penggunaan')}}" class="nav-link {{Request::is('penggunaan') ? 'active' : ''}}">
                <i class="far fas fa-minus nav-icon"></i>
                <p>Penggunaan Darah</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a href="{{url('/berita')}}" class="nav-link {{Request::is('berita') ? 'active' : ''}}">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              Informasi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('/notif')}}" class="nav-link {{Request::is('notif') ? 'active' : ''}}">
            <i class="nav-icon fas fa-headset"></i>
            <p>
              Pemberitahuan
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{url('/user')}}" class="nav-link {{Request::is('user') ? 'active' : ''}}">
            <i class="nav-icon fas fa-people-carry"></i>
            <p>
              Management User
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>