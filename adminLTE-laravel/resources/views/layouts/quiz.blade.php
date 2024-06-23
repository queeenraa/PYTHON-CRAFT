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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Materi</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#addLessonModal">
                    Tambah Quiz
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="col-tagar">#</th>
                      <th class="col-materi-nomor-bab">Bab</th>
                      <th class="col-materi-nama-bab">Nama Materi</th>
                      <th class="col-materi-materi">Content</th>
                      <th class="col-materi-action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Example rows, you should replace with dynamic content -->
                    <tr>
                      <td>1</td>
                      <td class="col-materi-nomor-bab">Course 1</td>
                      <td class="col-materi-nama-bab">Lesson 1 - Apa itu Python?</td>
                      <td class="col-materi-materi">Pengantar tentang bahasa pemrograman Python...</td>
                      <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editLessonModal">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">
                          Delete
                        </button>
                      </td>
                    </tr>
                    <!-- End example rows -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
