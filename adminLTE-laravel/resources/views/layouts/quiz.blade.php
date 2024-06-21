@extends('template.master')

@section('content')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quiz</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Different Styles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h4>Input</h4>
                <div class="form-group">
                  <label for="exampleInputBorder">Bottom Border only <code>.form-control-border</code></label>
                  <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Bottom Border only 2px Border <code>.form-control-border.border-width-2</code></label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Flat <code>.rounded-0</code></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                </div>
                <h4>Custom Select</h4>
                <div class="form-group">
                  <label for="exampleSelectBorder">Bottom Border only <code>.form-control-border</code></label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorderWidth2">Bottom Border only <code>.form-control-border.border-width-2</code></label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
@endsection
