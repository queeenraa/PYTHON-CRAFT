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
                        <h3>Edit Lesson</h3>
                    </div>
                    <div class="card-body">
                        <form id="editLessonForm" action="{{ route('lessons.update', ['id' => $lesson->lesson_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <input type="hidden" id="edit_lesson_id" name="id" value="{{ $lesson->id }}">
                            <div class="form-group">
                                <label for="edit_lesson_name">Lesson Name</label>
                                <input type="text" class="form-control" id="edit_lesson_name" name="lesson_name" value="{{ $lesson->lesson_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_course_id">Course ID</label>
                                <select class="form-control" id="edit_course_id" name="course_id" required>
                                    <option value="">Select a Course</option>
                                    <option value="1" @if($lesson->course_id == 1) selected @endif>Course 1</option>
                                    <option value="2" @if($lesson->course_id == 2) selected @endif>Course 2</option>
                                    <option value="3" @if($lesson->course_id == 3) selected @endif>Course 3</option>
                                    <!-- Add more course options here -->
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="image">Image</label>  
                              <br>                           
                              @if($lesson->image_path)
                                <h7>Gambar sebelumnya </h7>
                                <a href="{{ asset('storage/' . $lesson->image_path) }}" class="btn btn-sm btn-success" target="_blank">
                                  Lihat
                                </a>
                              @endif
                              <br>
                              <br>
                              <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                            <div class="form-group">
                                <label for="edit_content">Content</label>
                                <textarea class="form-control" id="edit_content" name="content" rows="10" required>{{ $lesson->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal for success message (optional) -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="successModalLabel">Update Successful</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Lesson has been updated successfully.
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
      </div>
  </div>
</div>

<!-- JavaScript for handling success modal -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var form = document.querySelector('#editLessonForm');

      form.addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent default form submission

          var formData = new FormData(form);
          var url = form.action;

          fetch(url, {
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

                  // Redirect to lessons page after modal is closed
                  $('#successModal').on('hidden.bs.modal', function () {
                      window.location.href = '{{ url("/lessons") }}'; // Redirect to lessons page
                  });
              } else {
                  console.error('Error:', data.message); // Log error message
              }
          })
          .catch(error => {
              console.error('Error:', error); // Log any fetch errors
          });
      });
  });
</script>


@endsection
