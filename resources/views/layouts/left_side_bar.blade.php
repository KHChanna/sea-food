<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link" class="text-center mx-auto">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" -->
           <!-- style="opacity: .8"> -->
           <h4 class="brand-text text-center font-weight-light">SEA FOOD</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/admin" class="nav-link {{ \Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
{{-- 
          <li class="nav-item">
            <a href="#" class="nav-link {{ \Request::is('admin/registry*') ? 'active' : '' }}">
              <i class="fas fa-cash-register pr-2"></i>
              <p>
                Registry
              </p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{route('purchase.index')}}" class="nav-link {{ \Request::is('admin/purchase*') ? 'active' : '' }}">
              <i class="fas fa-shopping-cart pr-2"></i>
              <p>
                Purchase
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('sale.index')}}" class="nav-link {{ \Request::is('admin/sale*') ? 'active' : '' }}">
              <i class="fas fa-shopping-cart pr-2"></i>
              <p>
                Sale
              </p>
            </a>
          </li>
{{-- 
          <li class="nav-item">
            <a href="{{route('sale.index')}}" class="nav-link {{ \Request::is('admin/adjustment*') ? 'active' : '' }}">
              <i class="fa fa-adjust pr-2" aria-hidden="true"></i>
              <p>
                Adjustment
              </p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{route('units.index')}}" class="nav-link {{ \Request::is('admin/unit*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Unit
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link {{ \Request::is('admin/category*') ? 'active' : '' }}">
              <i class="fas fa-sitemap pr-2"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link {{ \Request::is('admin/product*') ? 'active' : '' }}">
            <i class="fab fa-product-hunt pr-2"></i>
              <p>
                Products
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('supplier.index') }}" class="nav-link {{ \Request::is('admin/supplier*') ? 'active' : '' }}">
              <i class="fas fa-users pr-2"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ \Request::is('admin/user*') ? 'active' : '' }}">
              <i class="fas fa-user pr-2"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('currency.index') }}" class="nav-link {{ \Request::is('admin/currency*') ? 'active' : '' }}">
              <i class="fas fa-money-bill pr-2"></i>
              <p>
                Currency
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('payment-type.index')}}" class="nav-link {{ \Request::is('admin/payment-type*') ? 'active' : '' }}">
              <i class="fas fa-wallet pr-2"></i>
              <p>
                Payment Type
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ \Request::is('admin/report*') ? 'active' : '' }}">
              <i class="fas fa-chart-bar pr-2"></i>
              <p>
                Report
              </p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.sale') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sale Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.purchase') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Report</p>
                </a>
              </li>
            
            </ul>
          </li>

           {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>