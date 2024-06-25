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
            <h1>Tambah Lessons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lessons</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Lessons</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                            <label for="lesson_name">Lesson Name</label>
                            <input type="text" name="lesson_name" class="form-control" id="lesson_name" placeholder="Enter lesson name">
                            </div>
                            <div class="form-group">
                            <label for="course_id">Course</label>
                            <select name="course_id" class="form-control" id="course_id">
                                <option value="1">Course 1</option>
                                <option value="2">Course 2</option>
                                <option value="3">Course 3</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" placeholder="Enter lesson content"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
