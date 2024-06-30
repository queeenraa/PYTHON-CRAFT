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
            <h1>Edit Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/courses') }}">Course</a></li>
              <li class="breadcrumb-item active">Edit Course</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/courses') }}">Course</a></li>
                <li class="breadcrumb-item active">Edit Course</li>
              </ol>
            </div>
        </div>
          <div class="row justify-content-center mt-5">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">
                          <h3>Edit Course</h3>
                      </div>
                      <div class="card-body">
                        <form id="editCourseForm" action="{{ route('courses.update', ['id' => $course->course_id]) }}" method="POST">
                              @csrf
                              {{-- @method('PUT') <!-- Menggunakan method PUT untuk update --> --}}
                              <div class="form-group">
                                  <label for="course_name">Course Name</label>
                                  <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
                              </div>
                              <div class="form-group">
                                  <label for="description">Description</label>
                                  <textarea class="form-control" id="description" name="description">{{ $course->description }}</textarea>
                              </div>
                              <div class="form-group">
                                  <label for="created_by">Created By (User ID)</label>
                                  <input type="text" class="form-control" id="created_by" name="created_by" value="{{ $course->created_by }}" readonly>
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
                <h5 class="modal-title" id="successModalLabel">Course Updated Successfully</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Course has been updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('editCourseForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
                    $('#successModal').modal('show'); // Show Bootstrap modal on success

                    // Redirect to courses page after modal is closed (optional)
                    $('#successModal').on('hidden.bs.modal', function () {
                        window.location.href = '{{ url("/courses") }}'; // Redirect to courses page
                    });
                } else {
                    alert('Error: ' + JSON.stringify(data.errors));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the form.');
            });
        });
    });
</script>
</body>
@endsection
