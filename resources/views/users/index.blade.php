@include('layouts.head')

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">

    @include('layouts.sidebar')

    <div class="layout-page">

      @include('layouts.navbar')

      <div class="content-wrapper pt-3"> {{-- pt-3 gives consistent top spacing --}}

        {{-- Consistent spacing wrapper for popups --}}
        <div class="px-4" style="min-height: 1.5rem;">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if (session('error') || $errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
              @if ($errors->any())
                <ul class="mb-2">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>

        <!-- Main Content -->
        <div class="container-xxl flex-grow-1">
          <div class="card">

            <!-- Header inside card -->
            <div class="card-header d-flex flex-wrap justify-content-between align-items-end">
              <div>
                <h3 class="mb-1 text-break">Users</h3>
                <p class="mb-0 text-muted">Manage your users here</p>
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bx bx-plus me-1"></i> Add User
              </button>
            </div>

            @include('users.modals')

            <!-- Table -->
            <div class="table-responsive text-nowrap">
              <table id="myTable" class="table table-sm align-middle mb-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->given_name }} {{ $user->surname }}</td>
                    <td>{{ $user->position }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="d-flex gap-1 py-1">
                      <!-- Edit -->
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editUserModal"
                        data-id="{{ $user->id }}"
                        data-given_name="{{ $user->given_name }}"
                        data-surname="{{ $user->surname }}"
                        data-position="{{ $user->position }}"
                        data-email="{{ $user->email }}"
                        data-role="{{ $user->role }}"
                        onclick="openEditModal(this)">
                        Edit
                      </button>

                      <!-- Delete -->
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#deleteUserModal"
                        data-bs-whatever="{{ $user->id }}"
                        onclick="event.preventDefault(); document.querySelector('#deleteUserModal form').action='{{ route('users.destroy', $user->id)}}';">
                        Delete
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <!-- /Main Content -->

      </div>
    </div>
  </div>

  <div class="layout-overlay layout-menu-toggle"></div>

  <script>
    function openEditModal(button) {
      const userId = button.getAttribute('data-id');
      const form = document.getElementById('editUserForm');

      form.action = `{{ url('/users') }}/${userId}`;

      document.getElementById('editGivenName').value = button.getAttribute('data-given_name');
      document.getElementById('editSurname').value = button.getAttribute('data-surname');
      document.getElementById('editPosition').value = button.getAttribute('data-position');
      document.getElementById('editEmail').value = button.getAttribute('data-email');
      document.getElementById('editRole').value = button.getAttribute('data-role');
    }
  </script>
</div>

@include('layouts.scripts')
