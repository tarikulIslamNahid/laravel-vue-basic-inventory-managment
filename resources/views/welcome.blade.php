<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('backend')}}/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('backend')}}/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="app">
  <div id="wrapper">
    <!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" v-if="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true " id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('backend')}}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Inventory</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <router-link class="nav-link" to="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></router-link>
      </li>


      <li class="nav-item active">
        <router-link class="nav-link" to="/pos">
          <i class="fas fa-shopping-cart"></i>
          <span>POS</span></router-link>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Employee"
          aria-expanded="true" aria-controls="Employee">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Employee</span>
        </a>
        <div id="Employee" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/employee/create">Add Employee</router-link>
            <router-link class="collapse-item" to="/employees">All Employees</router-link>
          </div>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Suppliers"
          aria-expanded="true" aria-controls="Suppliers">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Suppliers</span>
        </a>
        <div id="Suppliers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/supplier/create">Add Suppliers</router-link>
            <router-link class="collapse-item" to="/suppliers">All Suppliers</router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
          aria-expanded="true" aria-controls="category">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/category/create">Add Category</router-link>
            <router-link class="collapse-item" to="/category">All Category</router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Product"
          aria-expanded="true" aria-controls="Product">
          <i class="fas fa-fw fa-truck"></i>
          <span>Product</span>
        </a>
        <div id="Product" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/product/create">Add Product</router-link>
            <router-link class="collapse-item" to="/product">All Product</router-link>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Expense"
          aria-expanded="true" aria-controls="Expense">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Expense</span>
        </a>
        <div id="Expense" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/expens/create">Add Expense</router-link>
            <router-link class="collapse-item" to="/expens">All Expense</router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Salary"
          aria-expanded="true" aria-controls="Salary">
          <i class="fa fa-check-circle"></i>
          <span>Salary</span>
        </a>
        <div id="Salary" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/salary">Salary</router-link>
            <router-link class="collapse-item" to="/salary/pay">Pay Salary</router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" to="/product/stock">
          <i class="fa fa-database"></i>
          <span>Stock</span>
      </router-link>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Customer"
          aria-expanded="true" aria-controls="Customer">
          <i class="fas fa-users"></i>
          <span>Customer</span>
        </a>
        <div id="Customer" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/customer">Customer List</router-link>
            <router-link class="collapse-item" to="/customer/create">Add Customer</router-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Orders"
          aria-expanded="true" aria-controls="Orders">
          <i class="fa fa-check-circle"></i>
          <span>Orders</span>
        </a>
        <div id="Orders" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/orders">Today Order</router-link>
            <router-link class="collapse-item" to="/orders/all">Orlder List</router-link>
          </div>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Report"
          aria-expanded="true" aria-controls="Report">
          <i class="fa fa-check-circle"></i>
          <span>Report</span>
        </a>
        <div id="Report" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="/salary">Customer List</router-link>
            <router-link class="collapse-item" to="/salary/pay">Add Customer</router-link>
          </div>
        </div>
      </li> --}}


      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav  v-if="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true " class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{asset('backend')}}/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <router-link class="dropdown-item" to="/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
            </router-link>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

            <router-view></router-view>
            {{-- <example-component></example-component> --}}
        </div>
        <!---Container Fluid-->
      </div>

    </div>
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
  {{-- <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
  <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{asset('backend')}}/js/ruang-admin.min.js"></script>
  {{-- <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script> --}}
  {{-- <script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script> --}}
</body>

</html>
