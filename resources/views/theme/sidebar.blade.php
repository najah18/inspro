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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
        <a class="nav-link text-left" href="{{url ('/')}}">
          <i class="fas fa-home"></i>
          <span>my website</span></a>
      </li>

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

                <!-- Nav Item - Featured Services -->
                <li class="nav-item {{ request()->is('admin/featured*') ? 'active' : '' }}">
                <a class="nav-link text-left" href="{{ route('admin.featured.index') }}">
                    <i class="fas fa-star"></i> <!-- تم تغيير الأيقونة هنا -->
                    <span>speacial </span>
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


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->is('admin/transactions*') ? 'active' : '' }}">
              <a class="nav-link text-left" href="{{route('admin.transactions.index')}}">
              <i class="fas fa-dollar-sign"></i>
                <span>transactions</span>
              </a>
            </li>
      
          <!-- Nav Item - Workers -->
          <li class="nav-item {{ request()->is('admin/workers*') ? 'active' : '' }}">
              <a class="nav-link text-left" href="{{ route('admin.workers.index') }}">
                  <i class="fas fa-users"></i>
                  <span>Workers</span>
              </a>
          </li>

          <!-- Nav Item - Invoice Categories -->
          <li class="nav-item {{ request()->is('admin/invoicecategories*') ? 'active' : '' }}">
              <a class="nav-link text-left" href="{{ route('admin.invoicecategories.index') }}">
                  <i class="fas fa-file-invoice"></i>
                  <span>Invoice Categories</span>
              </a>
          </li>

          <!-- Nav Item - Invoices -->
          <li class="nav-item {{ request()->is('admin/invoices*') ? 'active' : '' }}">
              <a class="nav-link text-left" href="{{ route('admin.invoices.index') }}">
                  <i class="fas fa-file-invoice-dollar"></i>
                  <span>Invoices</span>
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