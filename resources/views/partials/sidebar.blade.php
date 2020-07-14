@inject('request', 'Illuminate\Http\Request')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('fav.png')}}"
           alt="#"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MyERP</span>
    </a>

    <!-- Sidebar Menu -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">

          </a>
        </div>
      </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach($getMenu as $menu)
          <li class="nav-item {{ count($menu->childs) ? 'has-treeview' :'' }} ">
            <a href="{{ $menu->menu_link}}" class="nav-link">
              <i class="nav-icon {{ $menu->menu_icon }}"></i>
              <p>
              {{ $menu->menu_judul }}
              @if(count($menu->childs))
              <i class="right fas fa-angle-left"></i>
              @endif
              </p>
            </a>
              @if(count($menu->childs))
              <ul class="nav nav-treeview">
                  @include('partials.submenu',['childs'=>$menu->childs])
              </ul>
              @endif
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->






    </div>
    <!-- /. End sidebar -->
  </aside>
