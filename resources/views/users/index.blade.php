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
                <small class="text-muted" style="font-size: 1rem;">
                    Manage system users here
                </small>
            </div>
            @if(auth()->user()->role === 'Super Admin')
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    Add User
                </button>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
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
                            <td>
                                @php
                                    $firstName = $user->given_name;
                                    $lastName = $user->surname;
                                    $initials = substr($firstName, 0, 1) . substr($lastName, 0, 1);
                                @endphp
                                <div class="avatar-initials d-flex align-items-center justify-content-center rounded-circle"
                                     style="width: 35px; height: 35px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">
                                    {{ $initials }}
                                </div>
                            </td>
                            <td>{{ $user->given_name }} {{ $user->surname }}</td>
                            <td>{{ $user->position }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'Super Admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ $user->role }}
                                </span>
                                @if($user->id === 1)
                                    <small class="text-muted d-block">Default User</small>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                @php
                                    $canManage = false;
                                    $canDelete = false;
                                    $currentUser = auth()->user();

                                    // Super Admin can manage Admin users and their own account
                                    if ($currentUser->role === 'Super Admin') {
                                        if ($user->role === 'Admin') {
                                            $canManage = true; // Can manage all Admin users
                                            $canDelete = true; // Can delete Admin users
                                        } elseif ($user->id === $currentUser->id) {
                                            $canManage = true; // Can manage own Super Admin account
                                            // Can delete own account if not default user (ID 1)
                                            $canDelete = ($user->id !== 1);
                                        }
                                        // Cannot manage other Super Admin accounts (view only)
                                    }
                                @endphp

                                @if($canManage)
                                    <!-- Edit -->
                                    <button class="btn btn-sm btn-success"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editUserModal"
                                            onclick="loadEditUser({{ $user }})">
                                        Edit
                                    </button>

                                    <!-- Delete -->
                                    @if($canDelete)
                                        @if($user->id === $currentUser->id)
                                            <!-- Self-delete with special warning -->
                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="confirmSelfDelete({{ $user->id }})">
                                                Delete
                                            </button>
                                        @else
                                            <!-- Regular delete -->
                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteUserModal"
                                                    data-bs-whatever="{{ $user->id }}"
                                                    onclick="event.preventDefault(); document.querySelector('#deleteUserModal form').action='{{ route('users.destroy', $user->id)}}';">
                                                Delete
                                            </button>
                                        @endif
                                    @elseif($user->id === 1)
                                        <small class="text-muted">Protected</small>
                                    @endif
                                @else
                                    @if($user->role === 'Super Admin' && $user->id !== $currentUser->id)
                                        <small class="text-muted">View Only</small>
                                    @else
                                        <small class="text-muted">No Access</small>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No users found.</td>
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

                                @if(auth()->user()->id === 1)
                                    {{-- Default user (ID 1) can create both Admin and Super Admin --}}
                                    <option value="Admin">Admin</option>
                                    <option value="Super Admin">Super Admin</option>
                                @else
                                    {{-- Other Super Admins can only create Admin users --}}
                                    <option value="Admin">Admin</option>
                                @endif
                            </select>

                            @if(auth()->user()->id === 1)
                                <small class="text-success">As the default Super Admin, you can create both Admin and Super Admin users.</small>
                            @else
                                <small class="text-muted">You can only create Admin users. Super Admin creation is restricted to the default user.</small>
                            @endif
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
                    <div class="modal-body">
                        {{-- Avatar Preview in Edit Modal --}}
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <div class="avatar-initials mx-auto d-flex align-items-center justify-content-center rounded-circle"
                                     id="editAvatarPreview"
                                     style="width: 60px; height: 60px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 1.25rem; font-weight: bold; text-transform: uppercase;">
                                    --
                                </div>
                                <small class="text-muted">Avatar preview</small>
                            </div>
                        </div>

                        <div class="row g-3">
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
                            <div class="col-md-6">
                                <label class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" id="editPasswordConfirmation"
                                    placeholder="Confirm new password">
                            </div>
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

    {{-- Self-Delete Warning Modal --}}
    <div class="modal fade" id="selfDeleteModal" tabindex="-1" aria-labelledby="selfDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="selfDeleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selfDeleteModalLabel">Delete Your Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            <strong>Warning:</strong> You are about to delete your own account. You will be logged out immediately and this action cannot be undone.
                        </div>
                        <p>Are you sure you want to permanently delete your account?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
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
        document.getElementById('editUserForm').action = `/admin/users/${user.id}`;
        document.getElementById('editGivenName').value = user.given_name;
        document.getElementById('editSurname').value = user.surname;
        document.getElementById('editPosition').value = user.position;
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editRole').value = user.role;
        document.getElementById('editPassword').value = '';
        document.getElementById('editPasswordConfirmation').value = '';

        // Update avatar preview
        updateEditAvatarPreview();
    }

    function updateEditAvatarPreview() {
        const firstName = document.getElementById('editGivenName').value.trim();
        const lastName = document.getElementById('editSurname').value.trim();
        const initials = (firstName.charAt(0) + lastName.charAt(0)).toUpperCase();
        document.getElementById('editAvatarPreview').textContent = initials;
    }

    function confirmSelfDelete(userId) {
        document.getElementById('selfDeleteForm').action = `/admin/users/${userId}`;
        new bootstrap.Modal(document.getElementById('selfDeleteModal')).show();
    }

    // Update avatar preview when names change in edit modal
    document.addEventListener('DOMContentLoaded', function() {
        const editGivenName = document.getElementById('editGivenName');
        const editSurname = document.getElementById('editSurname');

        if (editGivenName && editSurname) {
            editGivenName.addEventListener('input', updateEditAvatarPreview);
            editSurname.addEventListener('input', updateEditAvatarPreview);
        }
    });
</script>
@endsection
