@extends('template.master')

@section('content')
@php
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\CoursesController;
@endphp

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
                <h3 class="card-title">List Bab</h3>
                <div class="card-tools">
                  <a href="{{ url('/tambahCourses') }}" class="btn btn-primary custom-button">
                    Tambah Bab
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="col-tagar">#</th>
                      <th class="col-nama-bab">Nama Bab</th>
                      <th class="col-materi">Materi</th>
                      <th class="col-action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Example rows, you should replace with dynamic content -->
                    @foreach ($courses as $course)
                    <tr>
                        <td class="col-tagar">{{ $course->course_id }}</td>
                        <td class="col-nama-bab">{{ $course->course_name }}</td>
                        <td class="col-materi">{{ $course->description }}</td>
                        <td>
                            <a href="{{ route('courses.edit', ['id' => $course->course_id]) }}" class="btn btn-info btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $course->course_id }}')">Delete</button>
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

    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this course?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Success Message -->
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
            <p id="successMessageText">Course deleted successfully.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
  // Global variable to store the course ID for deletion
  let courseIdToDelete = null;

  // Function to confirm delete and show modal
  function confirmDelete(id) {
    courseIdToDelete = id; // Set the global variable
    $('#confirmDeleteModal').modal('show'); // Show the modal
  }

  // Function to perform delete operation
  $('#confirmDeleteBtn').click(function() {
    if (courseIdToDelete) {
        fetch('{{ url("/delete-courses") }}/' + courseIdToDelete, {
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
                // Optionally, you can update the message in the success modal
                // $('#successMessageText').text('Quiz deleted successfully.');
                //location.reload(); // Refresh halaman setelah penghapusan berhasil
            } else {
                alert('Error: ' + data.message);
            }
            $('#confirmDeleteModal').modal('hide'); // Hide the modal after deletion
        })
        .catch(error => console.error('Error:', error));
    }
    // Refresh the page after closing the success modal
    $('#successMessageModal').on('hidden.bs.modal', function () {
        location.reload(); // Refresh halaman setelah modal sukses ditutup
    });
  });
</script>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
@endsection
