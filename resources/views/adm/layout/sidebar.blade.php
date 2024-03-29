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
        Guest Activities
    </div>

    <!-- Nav Item - Role -->
    <li class="nav-item {{ request()->routeIs('adm.visitor.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.visitor.index') }}">
            <i class="fas fa-question"></i>
            <span>Visitor Log</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users Group
    </div>

    <!-- Nav Item - Role -->
    <li class="nav-item {{ request()->routeIs('adm.role.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.role.index') }}">
            <i class="fas fa-user"></i>
            <span>Roles</span></a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ request()->routeIs('adm.user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.user.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Portal Data
    </div>

    <!-- Nav Item - Role -->
    <li class="nav-item {{ request()->routeIs('adm.article.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.article.index') }}">
            <i class="fas fa-newspaper"></i>
            <span>Article</span></a>
    </li>

    <!-- Nav Item - Permission -->
    <li class="nav-item {{ request()->routeIs('adm.subs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adm.subs.index') }}">
            <i class="fas fa-user-plus"></i>
            <span>Subscribers</span></a>
    </li>

</ul>
