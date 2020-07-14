<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('partials.head')
   
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini">
    <div class="wrapper">
			
            @include('partials.topbar')
            @include('partials.sidebar')
            
            <div class="content-wrapper">
                
                @yield('content')
            </div>
            @include('partials.footer')
	</div>

	@yield('js')
</body>
</html>
