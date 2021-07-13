<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user ml-4">
{{--        <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">--}}
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{implode(', ',   auth()->user()->roles->pluck('name')->toArray())}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item " href="{{route('admin.welcome.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="{{route('admin.categories.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Category</span></a></li>
        <li><a class="app-menu__item " href="{{route('admin.roles.index')}}"><i class="app-menu__icon fa fa-anchor"></i><span class="app-menu__label">Roles</span></a></li>


{{--        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label"></span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i> create </a></li>--}}
{{--                <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i> index</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</aside>
