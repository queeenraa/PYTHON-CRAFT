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
              <li class="breadcrumb-item active">Manage Quiz</li>
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
                          <h3 class="card-title">List Quiz</h3>
                          <div class="card-tools">
                            <a href="{{ url('/tambahQuiz') }}" class="btn btn-primary custom-button">
                                Tambah Quiz
                            </a>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th class="col-tagar">#</th>
                                      <th>Course ID</th>                                    
                                      <th>Question</th>
                                      <th>Option A</th>
                                      <th>Option B</th>
                                      <th>Option C</th>
                                      <th>Option D</th>
                                      <th>Correct Answer</th>
                                      <th class="col-materi-action">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- Example rows, you should replace with dynamic content -->
                                @foreach($quizzes as $quiz)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $quiz->course_id }}</td>                                   
                                      <td>{{ $quiz->question }}</td>
                                      <td>{{ $quiz->option_a }}</td>
                                      <td>{{ $quiz->option_b }}</td>
                                      <td>{{ $quiz->option_c }}</td>
                                      <td>{{ $quiz->option_d }}</td>
                                      <td>{{ $quiz->correct_answer }}</td>
                                      <td>
                                          <!-- Actions buttons here (edit, delete, etc.) -->
                                          <button class="btn btn-sm btn-primary">Edit</button>
                                          <a href="{{ url('/editQuiz/'.$quiz->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                          </a>
                                          <button class="btn btn-sm btn-danger">Delete</button>
                                      </td>
                                  </tr>
                                @endforeach
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
  
  <!-- Modal for Adding Quiz -->
  <div class="modal fade" id="addQuizModal" tabindex="-1" role="dialog" aria-labelledby="addQuizModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <!-- Modal content for adding quiz -->
          </div>
      </div>
  </div>
  
  <!-- Modal for Editing Quiz -->
  <div class="modal fade" id="editQuizModal" tabindex="-1" role="dialog" aria-labelledby="editQuizModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <!-- Modal content for editing quiz -->
          </div>
      </div>
  </div>
  
  <script>
  function confirmDelete() {
      if(confirm("Are you sure you want to delete this quiz?")) {
          // Add delete functionality here
      }
  }
  </script>
  
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
