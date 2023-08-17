<nav id="sidebar">
    <!-- Sidebar Header-->
    {{-- <div class="sidebar-header d-flex align-items-center">
        <!-- You can add a logo or any other content here -->
        <h2>Admin Dashboard</h2>
    </div> --}}
    <!-- Sidebar Navigation Menus-->
    <span class="heading">Main</span>
    <br><br>
    <ul class="list-unstyled">
        @if (auth()->user()->hasRole('master'))
            <li class="@if(Request::is('admin')) active @endif"><a href="{{ url('admin') }}"> <i class="icon-home"></i>Admin </a></li>
        @endif
        
        <li class="@if(Request::is('produk')) active @endif"><a href="{{ url('produk') }}"> <i class="icon-grid"></i>Produk </a></li>
        
        @if (auth()->user()->can('role-create') || auth()->user()->can('role-edit') || auth()->user()->can('role-delete'))
            <li class="@if(Request::is('roles')) active @endif"><a href="{{ url('roles') }}"> <i class="fa fa-bar-chart"></i>Role </a></li>
        @endif

        <li><a href="#"> <i class="icon-padnote"></i> -- </a></li>
        <li>
            <a href="#examp" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>--
                
            </a>
            <ul id="example" class="collapse list-unstyled">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        {{-- <li class="@if(Request::is('admin')) active @endif"><a href="admin">Dashboard</a></li>
        <li class="@if(Request::is('produk')) active @endif"><a href="users">Users</a></li> --}}
        <li><a href="#"> <i class="icon-logout"></i>--</a></li>
    </ul>
</nav>