<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

    @include('include.style')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @auth
      <!-- Profile and Logout -->
      <li class="nav-item d-flex align-items-center">
          <h5 class="card-title mb-0 mr-3">{{ Auth::user()->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;</h5>
          <a href="{{ route('logout') }}" class="btn btn-primary"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>
 
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf  
          </form>
      </li>
      @else
      <!-- Login link or other action if not logged in -->
      <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">Login</a>
      </li>
      @endauth
    </ul>
 
</nav>

  <!-- /.navbar -->

    <!-- Main Sidebar -->
    @include('include.sidebar')

    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('include.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    @include('include.script')

</body>
</html>
