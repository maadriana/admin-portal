@include('layouts.head')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.sidebar')
        <div class="layout-page">
            @include('layouts.navbar')
            <div class="content-wrapper">
                @include('layouts.popups')
                <!-- Main Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 col-md-10 mx-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Profile Information</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- Avatar Section -->
                                            <div class="col-md-4 col-12 text-center mb-3">
                                                <label for="avatar" class="form-label d-block">Avatar</label>
                                                <img src="https://avatar.iran.liara.run/username?username={{ auth()->user()->given_name }}+{{ auth()->user()->surname }}"
                                                    alt="Avatar" class="img-fluid rounded-circle mx-auto d-block"
                                                    style="max-width: 50%; height: auto;">

                                            </div>

                                            <!-- Info Section -->
                                            <div class="col-md-8 col-12">
                                                <!-- Name Fields -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                                        <label for="given_name" class="form-label">Given Name</label>
                                                        <input type="text" id="given_name" name="given_name"
                                                            class="form-control"
                                                            value="{{ old('given_name', auth()->user()->given_name) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label for="surname" class="form-label">Surname</label>
                                                        <input type="text" id="surname" name="surname"
                                                            class="form-control"
                                                            value="{{ old('surname', auth()->user()->surname) }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- Email and Role -->
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            value="{{ old('email', auth()->user()->email) }}" required>
                                                    </div>
                                                </div>

                                                <!-- Password Info -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                                        <label for="position" class="form-label">Position</label>
                                                        <input class="form-control"
                                                            value="{{ auth()->user()->position }}" required>
                                                    </div>

                                                    <!-- Super Admin cannot demote to Admin except for first user
                                                    to avoid locked out
                                                    Admin cannot promote to Super Admin -->
                                                    <div class="col-md-6">
                                                        <label for="editRole" class="form-label">Role</label>
                                                        <select class="form-select" id="editRole" name="role"
                                                            @if(auth()->user()->role === 'Admin') disabled @endif>
                                                            @if(auth()->user()->role === 'Super Admin')
                                                            <option value="Super Admin" @if(auth()->user()->role ===
                                                                'Super Admin') selected @endif
                                                                @if(auth()->user()->id === 1) disabled @endif>
                                                                Super Admin
                                                                @if(auth()->user()->id === 1) (locked) @endif
                                                            </option>
                                                            <option value="Admin" @if(auth()->user()->role === 'Admin')
                                                                selected @endif>
                                                                Admin
                                                            </option>
                                                            @elseif(auth()->user()->role === 'Admin')
                                                            <option value="Admin" selected>Admin</option>
                                                            @endif
                                                        </select>

                                                        {{-- If the field is disabled, include a hidden input so the role is still submitted --}}
                                                        @if(auth()->user()->role === 'Admin')
                                                        <input type="hidden" name="role" value="Admin">
                                                        @endif
                                                    </div>




                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control"
                                                            placeholder="Leave blank to keep current password">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label for="password_confirmation" class="form-label">Confirm
                                                            Password</label>
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control"
                                                            placeholder="Leave blank to keep current password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end mt-3">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Main Content -->
            </div>

            @include('layouts.footer')

            <div class="content-backdrop fade"></div>
        </div>
    </div>
</div>

<div class="layout-overlay layout-menu-toggle"></div>
</div>

@include('layouts.scripts')