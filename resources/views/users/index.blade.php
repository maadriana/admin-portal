@extends('layouts.master')

@section('title', 'Users List')

@section('content')
<div>
    {{-- Auto-fading popup alert --}}
    @include('layouts.popups')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Users</h5>
                <small class="text-muted" style="font-size: 1rem;">Manage system users here</small>
            </div>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                Add User
            </button>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->given_name }} {{ $user->surname }}</td>
                            <td>{{ $user->position }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <!-- Edit -->
                                <button class="btn btn-sm btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editUserModal"
                                        onclick="loadEditUser({{ $user }})">
                                    Edit
                                </button>

                                <!-- Delete -->
                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteUserModal"
                                        data-bs-whatever="{{ $user->id }}"
                                        onclick="event.preventDefault(); document.querySelector('#deleteUserModal form').action='{{ route('users.destroy', $user->id)}}';">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add User Modal --}}
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Given Name</label>
                                <input type="text" class="form-control" name="given_name" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="" disabled selected>Select role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Create User</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit User Modal --}}
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" id="editUserForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Given Name</label>
                            <input type="text" class="form-control" name="given_name" id="editGivenName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" name="surname" id="editSurname" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" id="editPosition">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="editPassword"
                                placeholder="Leave blank to keep current password">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" id="editRole" required>
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Update User</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function loadEditUser(user) {
        document.getElementById('editUserForm').action = `/users/${user.id}`;
        document.getElementById('editGivenName').value = user.given_name;
        document.getElementById('editSurname').value = user.surname;
        document.getElementById('editPosition').value = user.position;
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editRole').value = user.role;
        document.getElementById('editPassword').value = '';
    }
</script>
@endsection
