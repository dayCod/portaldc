<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-users"></i>
        </div>
        <div class="sidebar-brand-text mx-3">dcpanel.</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('adm.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users Group
    </div>

    <!-- Nav Item - Role -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('adm.role.index') }}">
            <i class="fas fa-user"></i>
            <span>Roles</span></a>
    </li>

    <!-- Nav Item - Permission -->
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-lock"></i>
            <span>Permissions</span></a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

</ul>
