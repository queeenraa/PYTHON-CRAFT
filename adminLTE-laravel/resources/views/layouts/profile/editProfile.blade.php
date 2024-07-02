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
                        <h3>Edit User</h3>
                    </div>
                    <!-- <div class="card-body">
                        <form id="editProfileForm" action="" method="POST">
                            <input type="hidden" id="edit_quiz_id" name="id">
                            <div class="form-group">
                                <label for="edit_question">Nama</label>
                                <input type="text" class="form-control" id="edit_question" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_question">Email</label>
                                <input type="email" class="form-control" id="edit_question" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_course_id">Role</label>
                                <select class="form-control" id="edit_course_id" name="course_id" required>
                                    <option value="">Select a Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <!-- Tambahkan opsi kursus lainnya di sini -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div> -->
                    <div class="card-body">
                    <form id="editProfileForm" action="{{ route('update.profile', ['id' => $user->user_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_user_id" name="id" value="{{ $user->user_id }}">
                        <div class="form-group">
                            <label for="edit_name">Nama</label>
                            <input type="text" class="form-control" id="edit_name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">  
                            <label for="edit_role">Role</label>
                            <select class="form-control" id="edit_role" name="role" required>
                                <option value="">Select a Role</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <!-- Tambahkan opsi role lainnya di sini -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
