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
                              <button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#addQuizModal">
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
                                  @foreach ($quizzes as $quiz)
                                  <tr>
                                    <td>{{ $quiz->id }}</td>
                                    <td>{{ $quiz->course_id }}</td>
                                    <td>{{ $quiz->question }}</td>
                                    <td>{{ $quiz->option_a }}</td>
                                    <td>{{ $quiz->option_b }}</td>
                                    <td>{{ $quiz->option_c }}</td>
                                    <td>{{ $quiz->option_d }}</td>
                                    <td>{{ $quiz->correct_answer }}</td>
                                    <td>
                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editLessonModal{{ $quiz->id }}">
                                        Edit
                                      </button>
                                      <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">
                                        Delete
                                      </button>
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
            <div class="modal-header">
                <h5 class="modal-title" id="addQuizModalLabel">Add New Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addQuizForm">
                    <div class="form-group">
                        <label for="course_id">Course ID</label>
                        <input type="text" class="form-control" id="course_id" name="course_id" required>
                    </div>
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="option_a">Option A</label>
                        <input type="text" class="form-control" id="option_a" name="option_a" required>
                    </div>
                    <div class="form-group">
                        <label for="option_b">Option B</label>
                        <input type="text" class="form-control" id="option_b" name="option_b" required>
                    </div>
                    <div class="form-group">
                        <label for="option_c">Option C</label>
                        <input type="text" class="form-control" id="option_c" name="option_c" required>
                    </div>
                    <div class="form-group">
                        <label for="option_d">Option D</label>
                        <input type="text" class="form-control" id="option_d" name="option_d" required>
                    </div>
                    <div class="form-group">
                      <label for="correct_answer">Correct Answer</label>
                      <select class="form-control" id="correct_answer" name="correct_answer" required>
                          <option value="a">A</option>
                          <option value="b">B</option>
                          <option value="c">C</option>
                          <option value="d">D</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>

  <script>
  document.getElementById('addQuizForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('/quizzes', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Quiz created successfully!');
            location.reload(); // Reload the page to see the new quiz
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while creating the quiz.');
    });
  });
  </script>


  
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
