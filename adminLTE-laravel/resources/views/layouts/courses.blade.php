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
            <h1>Manage Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
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
                <h3 class="card-title">Courses List</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
                    Add Course
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Course Name</th>
                      <th>Lessons</th>
                      <th>Quiz</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Example rows, you should replace with dynamic content -->
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td>
                        <ul>
                          <li>Lesson 1</li>
                          <li>Lesson 2</li>
                        </ul>
                      </td>
                      <td>Quiz 1</td>
                      <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCourseModal">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(1)">
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

  <!-- Add Course Modal -->
  <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addCourseForm">
            <div class="form-group">
              <label for="course_name">Course Name</label>
              <input type="text" name="course_name" class="form-control" id="course_name" placeholder="Enter course name">
            </div>
            <div class="form-group">
              <label for="course_lessons">Lessons</label>
              <select multiple name="course_lessons[]" class="form-control" id="course_lessons">
                <!-- Example lessons, you should replace with dynamic content -->
                <option value="1">Lesson 1</option>
                <option value="2">Lesson 2</option>
                <option value="3">Lesson 3</option>
                <!-- End example lessons -->
              </select>
            </div>
            <div class="form-group">
              <label for="course_quiz">Quiz</label>
              <select name="course_quiz" class="form-control" id="course_quiz">
                <!-- Example quizzes, you should replace with dynamic content -->
                <option value="1">Quiz 1</option>
                <option value="2">Quiz 2</option>
                <option value="3">Quiz 3</option>
                <!-- End example quizzes -->
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Course Modal -->
  <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editCourseForm">
            <div class="form-group">
              <label for="edit_course_name">Course Name</label>
              <input type="text" name="edit_course_name" class="form-control" id="edit_course_name" placeholder="Enter course name">
            </div>
            <div class="form-group">
              <label for="edit_course_lessons">Lessons</label>
              <select multiple name="edit_course_lessons[]" class="form-control" id="edit_course_lessons">
                <!-- Example lessons, you should replace with dynamic content -->
                <option value="1">Lesson 1</option>
                <option value="2">Lesson 2</option>
                <option value="3">Lesson 3</option>
                <!-- End example lessons -->
              </select>
            </div>
            <div class="form-group">
              <label for="edit_course_quiz">Quiz</label>
              <select name="edit_course_quiz" class="form-control" id="edit_course_quiz">
                <!-- Example quizzes, you should replace with dynamic content -->
                <option value="1">Quiz 1</option>
                <option value="2">Quiz 2</option>
                <option value="3">Quiz 3</option>
                <!-- End example quizzes -->
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  function confirmDelete(courseId) {
    if (confirm("Are you sure you want to delete this course?")) {
      // Implement the delete functionality here
    }
  }

  function saveCourse() {
    // Implement the save functionality here
  }

  function updateCourse() {
    // Implement the update functionality here
  }
</script>
</body>
@endsection
