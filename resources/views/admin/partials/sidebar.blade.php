<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <p>Great A Creative</p>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @if (auth()->user()->role == 'superadmin')
        <a class="nav-link" href="/superadmin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        @elseif(auth()->user()->role == 'admin')
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        @endif
    </li>
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'superadmin')
    <li class="nav-item active">
        <a class="nav-link" href="/superadmin/admin-users">
            <i class="fas fa-fw fa-users"></i>
            <span>Admin Users</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/superadmin/customers/rejected">
            <i class="fas fa-fw fa-times"></i>
            <span>Customer Rejected</span></a>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="/superadmin/tickets">
            <i class="fa fa-ticket-alt"></i>
            <span>Ticket</span></a>
    </li>

    @elseif(auth()->user()->role == 'admin')
    <li class="nav-item active">
        <a class="nav-link" href="/admin/customers/validation">
            <i class="fas fa-fw fa-users"></i>
            <span>Validasi Customer</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/admin/customers/validated">
            <i class="fas fa-fw fa-check-square"></i>
            <span>Customer Validated</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/admin/customers/rejected">
            <i class="fas fa-fw fa-times"></i>
            <span>Customer Rejected</span></a>
    </li>
    <hr class="sidebar-divider">
    @endif
    

    <!-- Heading -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>