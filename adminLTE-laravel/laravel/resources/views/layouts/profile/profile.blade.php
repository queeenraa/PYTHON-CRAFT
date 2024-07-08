@extends('template.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1>Manage Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Manage Users</h3>
                          <div class="card-tools">
                              <!-- <button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#addUserModal">
                                  Add User
                              </button> -->
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- Example rows, you should replace with dynamic content -->
                                  <!-- <tr>
                                      <td>1</td>
                                      <td>John Doe</td>
                                      <td>john.doe@example.com</td>
                                      <td>Admin</td>
                                      <td>
                                        <a href="{{ url('/edit-profile') }}" class="btn btn-info btn-sm">
                                            Edit
                                        </a>
                                          <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">
                                              Delete
                                          </button>
                                      </td>
                                  </tr> -->
                                  @foreach ($profiles as $profile)
                                  <tr>
                                    <td>{{ $profile->user_id }}</td>
                                    <td>{{ $profile->name }}</td>
                                    <td>{{ $profile->email }}</td>
                                    <td>{{ $profile->role }}</td>
                                    <td>
                                    <!-- <a href="{{ url('update-profile', ['id' => $profile->user_id]) }}" class="btn btn-info btn-sm">
                                        Edit
                                    </a> -->
                                    <a href="{{ route('edit-profile', ['id' => $profile->user_id]) }}" class="btn btn-info btn-sm">
                                        Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $profile->user_id }})">
                                      Delete
                                    </button>
                                    <!-- <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $profile->id }})">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $profile->id }}" action="{{ url('/profile/' . $profile->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form> -->
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
        Are you sure you want to delete this profile?
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
        <p id="successMessageText">Profile deleted successfully.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
  // Global variable to store the profile ID for deletion
  let profileIdToDelete = null;

  // Function to confirm delete and show modal
  function confirmDelete(id) {
    profileIdToDelete = id; // Set the global variable
    $('#confirmDeleteModal').modal('show'); // Show the modal
  }

  // Function to perform delete operation
  $('#confirmDeleteBtn').click(function() {
    if (profileIdToDelete) {
        axios.delete(`/delete-user/${profileIdToDelete}`, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.data.success) {
                $('#successMessageModal').modal('show'); // Show success modal
                // Optionally, you can update the message in the success modal
                // $('#successMessageText').text('User deleted successfully.');
            } else {
                alert('Error: ' + response.data.error);
            }
            $('#confirmDeleteModal').modal('hide'); // Hide the modal after deletion
        })
        .catch(error => console.error('Error:', error));
    }
  });

    // Refresh the page after closing the success modal
    $('#successMessageModal').on('hidden.bs.modal', function () {
        location.reload(); // Refresh the page after success modal is closed
    });
  </script>


    
  
    <!-- /.content -->
  </div>

  @endsection