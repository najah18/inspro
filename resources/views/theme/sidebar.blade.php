    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar" >


      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route ('admin.index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>control panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route ('categories.index')}}">
        <i class="fas fa-share-alt"></i>
          <span>Services</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/subcategories*') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route ('subcategories.index')}}">
        <i class="fas fa-layer-group"></i>
          <span>Packages</span>
        </a>
      </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ request()->is('admin/employees*') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route ('employees.index')}}">
        <i class="fas fa-layer-group"></i>
          <span>employees</span>
        </a>
      </li>

                  <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/informations*') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route ('admin.informations.index')}}">
        <i class="fas fa-layer-group"></i>
          <span>informations</span>
        </a>
      </li>

      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link text-left" href="{{route('users.index')}}">
        <i class="fas fa-pen-fancy"></i>
          <span>users</span>
        </a>
      </li>
 


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->