@inject('request', 'Illuminate\Http\Request')

{{--<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
<a href="{{ url('/') }}">
  <i class="fas fa-tachometer-alt"></i>
  <span class="title">@lang('backend.dashboard')</span>
</a>
</li>

@can('user_management_access')
<li>
  <a href="#">
    <i class="fa fa-users"></i>
    <span class="title">@lang('quickadmin.user-management.title')</span>
    <span class="fa fa-chevron-down"> </span>
  </a>
  <ul class="nav child_menu">

    @can('role_access')
    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
      <a href="{{ route('admin.roles.index') }}">
        <i class="fa fa-briefcase"></i>
        <span class="title">
          @lang('quickadmin.roles.title')
        </span>
      </a>
    </li>
    @endcan

    @can('user_access')
    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
      <a href="{{ route('admin.users.index') }}">
        <i class="fa fa-user"></i>
        <span class="title">
          @lang('quickadmin.users.title')
        </span>
      </a>
    </li>
    @endcan

    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
      <a href="{{ route('auth.change_password') }}">
        <i class="fa fa-key"></i>
        <span class="title">Change password</span>
      </a>
    </li>
    <li>
      <a href="#logout" onclick="$('#logout').submit();">
        <i class="fa fa-arrow-left"></i>
        <span class="title">@lang('quickadmin.qa_logout')</span>
      </a>
    </li>
  </ul>
</li>
@endcan
</ul>
</div>
</div>--}}
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('fav.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          {{ Auth::user()->name }}
        </a>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        @foreach(App\Menu::where('menu_parent_id', 0)->get() as $menu)

        <li class="nav-item {{ count($menu->childs) ? 'has-treeview' :'' }} ">
          <a href="{{ $menu->menu_link }}" class="nav-link">
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