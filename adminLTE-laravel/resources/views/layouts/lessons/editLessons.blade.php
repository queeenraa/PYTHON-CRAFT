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
                        <form id="editLessonForm" action="{{ route('update-lesson', ['lesson_id' => $lesson->id]) }}" method="POST">
                            @csrf
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
@endsection
