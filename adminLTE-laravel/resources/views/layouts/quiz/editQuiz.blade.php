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
            <h1>Edit Quiz</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Quiz</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
          <div class="row justify-content-center mt-5">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">
                          <h3>Edit Quiz</h3>
                      </div>
                      <div class="card-body">
                        <form id="editQuizForm" action="{{ route('quizzes.update', ['id' => $quiz->id]) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                  <label for="course_id">Course ID</label>
                                  <input type="text" class="form-control" id="course_id" name="course_id" value="{{ $quiz->course_id }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="question">Question</label>
                                  <input type="text" class="form-control" id="question" name="question" value="{{ $quiz->question }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="option_a">Option A</label>
                                  <input type="text" class="form-control" id="option_a" name="option_a" value="{{ $quiz->option_a }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="option_b">Option B</label>
                                  <input type="text" class="form-control" id="option_b" name="option_b" value="{{ $quiz->option_b }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="option_c">Option C</label>
                                  <input type="text" class="form-control" id="option_c" name="option_c" value="{{ $quiz->option_c }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="option_d">Option D</label>
                                  <input type="text" class="form-control" id="option_d" name="option_d" value="{{ $quiz->option_d }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="correct_answer">Correct Answer</label>
                                  <select class="form-control" id="correct_answer" name="correct_answer" required>
                                      <option value="a" {{ $quiz->correct_answer === 'a' ? 'selected' : '' }}>A</option>
                                      <option value="b" {{ $quiz->correct_answer === 'b' ? 'selected' : '' }}>B</option>
                                      <option value="c" {{ $quiz->correct_answer === 'c' ? 'selected' : '' }}>C</option>
                                      <option value="d" {{ $quiz->correct_answer === 'd' ? 'selected' : '' }}>D</option>
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </div>
</div>

<!-- Bootstrap modal for success message (optional) -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Quiz Berhasil Diupdate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Quiz telah berhasil diupdate.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('editQuizForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#successModal').modal('show'); // Show Bootstrap modal on success

                // Redirect to quiz page after modal is closed (optional)
                $('#successModal').on('hidden.bs.modal', function () {
                    window.location.href = '{{ url("/quiz") }}'; // Redirect to quiz page
                });
            } else {
                alert('Error: ' + JSON.stringify(data.errors));
            }
        })
        .catch(error => console.error('Error:', error));
    });

</script>
</body>
@endsection
