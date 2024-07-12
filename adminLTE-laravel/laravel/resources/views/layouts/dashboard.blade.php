
@extends('template.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalCourses }}</h3>

                <p>Total Course</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalLessons }}</h3>
        
                <p>Total Lessons</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalQuizzes }}</h3>
        
                <p>Total Quiz</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalUsers }}</h3>
        
                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        

    <section class="content">
      <div class="container-fluid">
        <!-- Courses Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Courses</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($courses as $course)
                    <tr>
                      <td>{{ $course->course_id }}</td>
                      <td>{{ $course->course_name }}</td>
                      <td>{{ $course->description }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Lessons Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lessons</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Course</th>
                      <th>Name</th>
                      <th>Content</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lessons as $lesson)
                    <tr>
                      <td>{{ $lesson->lesson_id }}</td>
                      <td>{{ $lesson->course->course_name }}</td>
                      <td>{{ $lesson->lesson_name }}</td>
                      <td>{{ $lesson->content }}</td>
                      <td>
                        @if ($lesson->image_path)
                          <a href="{{ asset('storage/' . $lesson->image_path) }}" target="_blank">View</a>
                        @else
                          No Image
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Quizzes Table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Quizzes</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Course</th>
                      <th>Question</th>
                      <th>Option A</th>
                      <th>Option B</th>
                      <th>Option C</th>
                      <th>Option D</th>
                      <th>Correct Answer</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($quizzes as $quiz)
                    <tr>
                      <td>{{ $quiz->course_id }}</td>
                      <td>{{ $quiz->question }}</td>
                      <td>{{ $quiz->option_a }}</td>
                      <td>{{ $quiz->option_b }}</td>
                      <td>{{ $quiz->option_c }}</td>
                      <td>{{ $quiz->option_d }}</td>
                      <td>{{ $quiz->correct_answer }}</td>
                      <td>
                        @if ($quiz->image)
                          <a href="{{ asset('storage/' . $quiz->image) }}" target="_blank">View</a>
                        @else
                          No Image
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection