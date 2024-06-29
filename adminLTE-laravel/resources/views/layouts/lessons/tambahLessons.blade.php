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
                        <form action="{{ URL('/lessons') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="lesson_name">Lesson Name</label>
                                <input type="text" name="lesson_name" class="form-control" id="lesson_name" placeholder="Enter lesson name" required>
                            </div>
                            {{-- <div class="form-group">
                              <label for="course_id">course_id</label>
                              <input type="text" name="course_id" class="form-control" id="course_id" placeholder="Enter course_id" required>
                            </div> --}}
                            <div class="form-group">
                                <label for="course_id">Course</label>
                                <select name="course_id" class="form-control" id="course_id" required>
                                 
                                      @foreach($courses as $course)
                                          <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                                      @endforeach
                               
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control" id="content" placeholder="Enter lesson content" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Lesson</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
