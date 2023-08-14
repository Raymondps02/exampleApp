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
        <li class="@if(Request::is('admin')) active @endif"><a href="{{ url('admin') }}"> <i class="icon-home"></i>Admin </a></li>
        <li class="@if(Request::is('produk')) active @endif"><a href="{{ url('produk') }}"> <i class="icon-grid"></i>Produk </a></li>
        <li class="@if(Request::is('roles')) active @endif"><a href="{{ url('roles') }}"> <i class="fa fa-bar-chart"></i>Role </a></li>
        <li><a href="admin"> <i class="icon-padnote"></i>Home3 </a></li>
        <li>
            <a href="#examp" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Home4
                
            </a>
            <ul id="example" class="collapse list-unstyled">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        {{-- <li class="@if(Request::is('admin')) active @endif"><a href="admin">Dashboard</a></li>
        <li class="@if(Request::is('produk')) active @endif"><a href="users">Users</a></li> --}}
        <li><a href="login.html"> <i class="icon-logout"></i>Home5</a></li>
    </ul>
</nav>