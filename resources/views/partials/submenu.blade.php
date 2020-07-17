@foreach($childs as $child)
<li class="nav-item {{ count($child->childs) ? 'has-treeview' :'' }} ">
          <a href="{{ $child->menu_link}}" 
     class="nav-link">
     <i class="nav-icon {{ $child->menu_icon }}"></i><p>    {{$child->menu_judul}}</p> 
     
     </a>
     
          @if(count($child->childs)) 
          <ul class="nav nav-treeview">
                    @include('partials.submenu',['childs' => $child->childs])
          </ul>
               
          @endif
</li>
@endforeach