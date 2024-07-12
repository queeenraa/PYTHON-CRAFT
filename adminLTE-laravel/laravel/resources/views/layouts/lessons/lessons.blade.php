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
                      <th class="col-materi-image">Image</th>
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
                      <td class="col-materi-image">
                        @if ($lesson->image_path)
                          <a href="{{ asset('storage/' . $lesson->image_path) }}" class="btn btn-sm btn-success" target="_blank">
                            Lihat
                          </a>
                        @else
                          No Image
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('lessons.edit', ['id' => $lesson->lesson_id]) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $lesson->lesson_id }}')">  
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap modal for delete confirmation -->
<div class="modal fade" id="deleteLessonModal" tabindex="-1" role="dialog" aria-labelledby="deleteLessonModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteLessonModalLabel">Delete Lesson</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Are you sure you want to delete this lesson?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
          </div>
      </div>
  </div>
</div>

<!-- Bootstrap modal for success message -->
<div class="modal fade" id="successMessageModal" tabindex="-1" role="dialog" aria-labelledby="successMessageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="successMessageModalLabel">Success</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p id="successMessageText">Lesson deleted successfully.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript for delete confirmation and redirection -->
<script>
// Global variable to store the lesson ID for deletion
let lessonIdToDelete = null;

// Function to confirm delete and show modal
function confirmDelete(id) {
  lessonIdToDelete = id; // Set the global variable
  $('#deleteLessonModal').modal('show'); // Show the modal
}

// Function to perform delete operation
$('#confirmDeleteBtn').click(function() {
  if (lessonIdToDelete) {
      fetch('{{ url("/delete-lessons") }}/' + lessonIdToDelete, {
          method: 'DELETE',
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json'
          }
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          if (data.success) {
              $('#successMessageModal').modal('show'); // Show success modal
          } else {
              alert('Error: ' + data.message);
          }
          $('#deleteLessonModal').modal('hide'); // Hide the modal after deletion
      })
      .catch(error => console.error('Error:', error));
  }
      // Refresh the page after closing the success modal
    $('#successMessageModal').on('hidden.bs.modal', function () {
        location.reload(); // Refresh the page after success modal is closed
    });
});


</script>
</body>
@endsection
