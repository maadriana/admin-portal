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

                    {{-- Admin Approval Notice --}}
                    @if(auth()->user()->role === 'Admin')
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <h6 class="alert-heading mb-1">
                                <i class="bx bx-info-circle me-1"></i>
                                Profile Update Notice
                            </h6>
                            <p class="mb-0">As an Admin user, any changes to your email, password, position, or name will require approval from a Super Admin before taking effect.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Pending Requests Display --}}
                    @if(auth()->user()->role === 'Admin')
                        @php
                            $pendingRequests = \App\Models\ApprovalRequest::where('user_id', auth()->id())
                                                                          ->where('status', 'pending')
                                                                          ->get();
                        @endphp

                        @if($pendingRequests->count() > 0)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="pendingRequestsAlert">
                                <h6 class="alert-heading mb-2">
                                    <i class="bx bx-time-five me-1"></i>
                                    Pending Approval Requests
                                </h6>
                                @foreach($pendingRequests as $request)
                                    <div class="mb-1">
                                        <strong>{{ ucfirst(str_replace('_', ' ', $request->request_type)) }}</strong>
                                        <small class="text-muted">- Submitted {{ $request->created_at->diffForHumans() }}</small>
                                        @if($request->request_type === 'profile_update' && $request->requested_changes)
                                            <div class="small mt-1">
                                                Changes:
                                                @foreach($request->requested_changes as $field => $value)
                                                    <span class="badge bg-secondary me-1">{{ ucfirst($field) }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    @endif

                    <div class="row">
                        <div class="col-lg-12 col-md-10 mx-auto">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Profile Information</h5>

                                    {{-- Account Deletion Request for Admins --}}
                                    @if(auth()->user()->role === 'Admin')
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                            Request Account Deletion
                                        </button>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- Avatar Section with Initials -->
                                            <div class="col-md-4 col-12 text-center mb-3">
                                                <label class="form-label d-block mb-2">Avatar</label>
                                                <div class="avatar-initials mx-auto d-flex align-items-center justify-content-center rounded-circle"
                                                     style="width: 120px; height: 120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">
                                                    @php
                                                        $firstName = auth()->user()->given_name;
                                                        $lastName = auth()->user()->surname;
                                                        $initials = substr($firstName, 0, 1) . substr($lastName, 0, 1);
                                                    @endphp
                                                    {{ $initials }}
                                                </div>
                                                <small class="text-muted d-block mt-2">Initials are automatically generated from your name</small>
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

                                                <!-- Email -->
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            value="{{ old('email', auth()->user()->email) }}" required>
                                                    </div>
                                                </div>

                                                <!-- Position and Role -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                                        <label for="position" class="form-label">Position</label>
                                                        <input type="text" id="position" name="position" class="form-control"
                                                            value="{{ old('position', auth()->user()->position) }}" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="role" class="form-label">Role</label>
                                                        <select class="form-select" id="role" name="role"
                                                            @if(auth()->user()->role === 'Admin' || auth()->user()->id === 1) disabled @endif>

                                                            @if(auth()->user()->role === 'Super Admin')
                                                                <option value="Super Admin"
                                                                    @if(auth()->user()->role === 'Super Admin') selected @endif
                                                                    @if(auth()->user()->id === 1) disabled @endif>
                                                                    Super Admin @if(auth()->user()->id === 1) (Default - Locked) @endif
                                                                </option>
                                                                <option value="Admin"
                                                                    @if(auth()->user()->role === 'Admin') selected @endif>
                                                                    Admin
                                                                </option>
                                                            @else
                                                                <option value="Admin" selected>Admin (Fixed)</option>
                                                            @endif
                                                        </select>

                                                        {{-- Hidden input for disabled fields --}}
                                                        @if(auth()->user()->role === 'Admin')
                                                            <input type="hidden" name="role" value="Admin">
                                                        @endif
                                                        @if(auth()->user()->id === 1)
                                                            <input type="hidden" name="role" value="Super Admin">
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Password Fields -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                                        <label for="password" class="form-label">New Password</label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control"
                                                            placeholder="Leave blank to keep current password">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control"
                                                            placeholder="Confirm new password">
                                                    </div>
                                                </div>

                                                {{-- Reason field for Admin users --}}
                                                @if(auth()->user()->role === 'Admin')
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <label for="reason" class="form-label">Reason for Changes</label>
                                                            <textarea class="form-control" id="reason" name="reason" rows="3"
                                                                placeholder="Please provide a reason for the profile changes (required for approval)"></textarea>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="text-end mt-3">
                                                <button type="submit" class="btn btn-primary">
                                                    @if(auth()->user()->role === 'Admin')
                                                        Submit for Approval
                                                    @else
                                                        Update Profile
                                                    @endif
                                                </button>
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

{{-- Account Deletion Request Modal --}}
@if(auth()->user()->role === 'Admin')
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('request.account.deletion') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Request Account Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning:</strong> This will request permanent deletion of your account. This action cannot be undone once approved.
                    </div>
                    <div class="mb-3">
                        <label for="deletion_reason" class="form-label">Reason for Account Deletion</label>
                        <textarea class="form-control" id="deletion_reason" name="reason" rows="4"
                            placeholder="Please provide a detailed reason for requesting account deletion..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit Deletion Request</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif

<div class="layout-overlay layout-menu-toggle"></div>
</div>

{{-- Auto-dismiss pending requests alert after form submission --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss the pending requests alert after 5 seconds
    const pendingAlert = document.getElementById('pendingRequestsAlert');
    if (pendingAlert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(pendingAlert);
            bsAlert.close();
        }, 5000);
    }

    // Update avatar initials when name changes
    const givenNameInput = document.getElementById('given_name');
    const surnameInput = document.getElementById('surname');
    const avatarElement = document.querySelector('.avatar-initials');

    function updateAvatar() {
        const firstName = givenNameInput.value.trim();
        const lastName = surnameInput.value.trim();
        const initials = (firstName.charAt(0) + lastName.charAt(0)).toUpperCase();
        avatarElement.textContent = initials;
    }

    givenNameInput.addEventListener('input', updateAvatar);
    surnameInput.addEventListener('input', updateAvatar);

    // If there's a success message from form submission, auto-refresh after 3 seconds to update pending requests
    @if(session('info') && str_contains(session('info'), 'submitted for approval'))
        setTimeout(function() {
            window.location.reload();
        }, 3000);
    @endif
});
</script>

@include('layouts.scripts')
