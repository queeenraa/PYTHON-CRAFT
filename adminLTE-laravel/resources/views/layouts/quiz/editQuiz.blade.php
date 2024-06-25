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
                        <h3>Edit Quiz</h3>
                    </div>
                    <div class="card-body">
                        <form id="editQuizForm" action="" method="POST">
                            <input type="hidden" id="edit_quiz_id" name="id">
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
    </div>
</div>
</body>
@endsection
