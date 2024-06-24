<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{asset('template/index.html')}}" class="brand-link">
    <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Administrator</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Admin Farhan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{url('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item" id="courses-menu">
          <a href="#" class="nav-link collapsed" id="courses-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Courses
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="{{('lessons')}}" class="nav-link" id="lessons-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lessons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{asset('./template/index3.html')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quiz</p>
              </a>
            </li>
          </ul>
        </li>
      </ul> -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
              <p>
                Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lessons" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Lessons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="quiz" class="nav-link">
                  <i class="fas fa-question-circle nav-icon"></i>
                  <p>Quiz</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-user"></i>
                  <!-- <i class="fa-solid fa-user"></i> -->
                  <p>
                    Profile
                  </p>
                </a>
          </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div
