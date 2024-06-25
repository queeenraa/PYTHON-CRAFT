@extends('template.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Lessons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Lessons</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Lessons</h3>
                    </div>
                    <div class="card-body">
                        <form id="editQuizForm" action="" method="POST">
                            <input type="hidden" id="edit_quiz_id" name="id">
                            <div class="form-group">
                                <label for="edit_question">Lessons Name</label>
                                <input type="text" class="form-control" id="edit_question" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_course_id">Course ID</label>
                                <select class="form-control" id="edit_course_id" name="course_id" required>
                                    <option value="">Select a Course</option>
                                    <option value="course1">Course 1</option>
                                    <option value="course2">Course 2</option>
                                    <option value="course3">Course 3</option>
                                    <!-- Tambahkan opsi kursus lainnya di sini -->
                                </select>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <label for="edit_option_a">Content</label>
                                <textarea class="form-control" id="edit_option_a" name="option_a" rows="10" cols="50" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
  </div>
                
@endsection