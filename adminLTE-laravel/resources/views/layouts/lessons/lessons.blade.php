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
              <li class="breadcrumb-item active">Lessons</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Manage Lessons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lessons</li>
            </ol>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Materi</h3>
                <div class="card-tools">
                  <a href="{{ url('/tambahLessons') }}" class="btn btn-primary custom-button">
                    Tambah Materi
                  </a>
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
                    @foreach ($lessons as $lesson)
                    <tr>
                      <td class="col-tagar">{{ $lesson->lesson_id }}</td>
                      <td class="col-materi-nomor-bab">{{ $lesson->course->course_name }}</td>
                      <td class="col-materi-nama-bab">{{ $lesson->lesson_name }}</td>
                      <td class="col-materi-materi">{{ $lesson->content }}</td>
                      <td>
                        <a href="{{ route('lessons.edit', ['id' => $lesson->lesson_id]) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
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

  </div>

  <!-- Add Lesson Modal -->
  <div class="modal fade" id="addLessonModal" tabindex="-1" aria-labelledby="addLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLessonModalLabel">Add New Lesson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Lesson Modal -->
  <div class="modal fade" id="editLessonModal" tabindex="-1" aria-labelledby="editLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLessonModalLabel">Edit Lesson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="edit_lesson_name">Lesson Name</label>
              <input type="text" name="edit_lesson_name" class="form-control" id="edit_lesson_name" placeholder="Enter lesson name">
            </div>
            <div class="form-group">
              <label for="edit_course_id">Course</label>
              <select name="edit_course_id" class="form-control" id="edit_course_id">
                <option value="1">Course 1</option>
                <option value="2">Course 2</option>
                <option value="3">Course 3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="edit_content">Content</label>
              <textarea name="edit_content" class="form-control" id="edit_content" placeholder="Enter lesson content"></textarea>
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
  function confirmDelete() {
    if (confirm("Are you sure you want to delete this lesson?")) {
      // Implement the delete functionality here
    }
  }
</script>
</body>
@endsection
