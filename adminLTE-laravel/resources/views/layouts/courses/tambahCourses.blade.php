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
            <h1>Tambah Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Course</li>
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
                          <h3>Tambah Course</h3>
                      </div>
                      <div class="card-body">
                        <form id="addCourseForm" action="{{ url('/courses') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                  <label for="course_name">Course Name</label>
                                  <input type="text" class="form-control" id="course_name" name="course_name" required>
                              </div>
                              <div class="form-group">
                                  <label for="description">Description</label>
                                  <textarea class="form-control" id="description" name="description"></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="created_by">Created By (User ID)</label>
                                  <input type="text" class="form-control" id="created_by" name="created_by" required>
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
</body>
<!-- Bootstrap modal for success message -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Tambah Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Course baru telah berhasil ditambahkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('addCourseForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
    
        const formData = new FormData(this);
    
        fetch('{{ url("/courses") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#successModal').modal('show'); // Show Bootstrap modal on success
                // Alternatively, you can use vanilla JS to show the modal:
                // document.getElementById('successModal').classList.add('show');
                // document.getElementById('successModal').style.display = 'block';
    
                // Redirect to courses page after modal is closed (optional)
                $('#successModal').on('hidden.bs.modal', function () {
                    window.location.href = '{{ url("/courses") }}'; // Redirect to courses page
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
