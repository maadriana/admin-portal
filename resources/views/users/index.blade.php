@include('layouts.head')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('layouts.sidebar')

        <div class="layout-page">

            @include('layouts.navbar')

            <div class="content-wrapper">
                @include('layouts.popups')

                <!-- Header para sa user table -->
                <div class="row px-4 py-2">
                    <div class="col-12">
                        <div class="page-header d-print-none">
                            <div class="row align-items-end">
                                <div class="col-6">
                                    <h3 class="page-title text-break">Users</h3>
                                    <p class="text-subtitle text-muted">Manage your users here</p>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end">
                                        <!-- Modal Trigger -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addUserModal">
                                            <i class="bx bx-plus me-1"></i> Add User
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('users.modals')
                <!-- Main Content -->
                <div class="container-xxl flex-grow-1">
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table id="myTable" class="table">
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
                                        <td>

                                            <!-- Wag na mag edit, gawa nalang bagong acct, char -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal" data-id="{{ $user->id }}"
                                                data-given_name="{{ $user->given_name }}"
                                                data-surname="{{ $user->surname }}"
                                                data-position="{{ $user->position }}" data-email="{{ $user->email }}"
                                                data-role="{{ $user->role }}" onclick="openEditModal(this)">
                                                Edit
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteUserModal" data-bs-whatever="{{ $user->id }}"
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

        // Asayn balyus
        document.getElementById('editGivenName').value = button.getAttribute('data-given_name');
        document.getElementById('editSurname').value = button.getAttribute('data-surname');
        document.getElementById('editPosition').value = button.getAttribute('data-position');
        document.getElementById('editEmail').value = button.getAttribute('data-email');
        document.getElementById('editRole').value = button.getAttribute('data-role');
    }
    </script>
</div>

@include('layouts.scripts')