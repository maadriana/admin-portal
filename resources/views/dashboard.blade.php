@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div>
    @include('layouts.popups')

    <!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1">Welcome back {{ Auth::user()->given_name }} {{ Auth::user()->surname }}!</h4>
                        <p class="mb-0 text-muted">Here's what's happening with your website content today.</p>
                    </div>
                    <div class="text-end">
                        <small class="text-muted">Last login: {{ now()->format('M d, Y g:i A') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <div class="avatar-initial bg-primary rounded">
                                <i class="bx bx-book-content text-white"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Content Items</span>
                    <h3 class="card-title mb-2">{{ $totalContent }}</h3>
                    <small class="text-success fw-semibold">
                        <i class="bx bx-up-arrow-alt"></i>
                        Active content pieces
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <div class="avatar-initial bg-success rounded">
                                <i class="bx bx-image text-white"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Images Uploaded</span>
                    <h3 class="card-title mb-2">{{ $totalImages }}</h3>
                    <small class="text-info fw-semibold">
                        <i class="bx bx-image"></i>
                        Media files
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <div class="avatar-initial bg-warning rounded">
                                <i class="bx bx-edit text-white"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Recent Updates</span>
                    <h3 class="card-title mb-2">{{ $recentUpdatesCount }}</h3>
                    <small class="text-warning fw-semibold">
                        <i class="bx bx-time"></i>
                        Last 7 days
                    </small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <div class="avatar-initial bg-info rounded">
                                <i class="bx bx-user text-white"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Users</span>
                    <h3 class="card-title mb-2">{{ $totalUsers }}</h3>
                    <small class="text-muted fw-semibold">
                        <i class="bx bx-group"></i>
                        Admin users
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="row">
        <!-- Recent Activity -->
        <div class="col-md-6 col-lg-8 order-1 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Recent Content Updates</h5>
                        <small class="text-muted">Latest changes to your website content</small>
                    </div>
                </div>
                <div class="card-body">
                    @if($recentUpdates->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach($recentUpdates as $update)
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        <div class="avatar-initial bg-label-{{ $loop->index % 4 == 0 ? 'primary' : ($loop->index % 4 == 1 ? 'success' : ($loop->index % 4 == 2 ? 'warning' : 'info')) }} rounded">
                                                            <i class="bx bx-{{ $update->key == 'about_image' || strpos($update->key, 'image') !== false ? 'image' : 'edit-alt' }}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1">{{ ucwords(str_replace('_', ' ', $update->key)) }}</h6>
                                                    <small class="text-muted">
                                                        @if($update->key == 'about_image' || strpos($update->key, 'image') !== false)
                                                            Image updated
                                                        @else
                                                            {{ \Illuminate\Support\Str::limit(strip_tags($update->value), 50) }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex flex-column">
                                                <small class="mb-1">{{ $update->editor ? $update->editor->name : 'System' }}</small>
                                                <small class="text-muted">{{ $update->updated_at->diffForHumans() }}</small>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bx bx-info-circle bx-lg text-muted mb-3"></i>
                            <p class="text-muted">No recent updates found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-6 col-lg-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title m-0 me-2">Quick Actions</h5>
                    <small class="text-muted">Frequently used features</small>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.home.edit') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="bx bx-home me-2"></i>
                            Edit Homepage
                        </a>

                        <a href="{{ route('admin.about.edit') }}" class="btn btn-outline-primary d-flex align-items-center">
                            <i class="bx bx-info-circle me-2"></i>
                            Edit About Page
                        </a>

                        <a href="{{ route('admin.audit.edit') }}" class="btn btn-outline-primary d-flex align-items-center">
                            <i class="bx bx-briefcase-alt me-2"></i>
                            Edit Audit Services
                        </a>

                        <a href="{{ route('admin.advisory.edit') }}" class="btn btn-outline-primary d-flex align-items-center">
                            <i class="bx bx-bulb me-2"></i>
                            Edit Advisory Services
                        </a>

                        @if(session('user_role') === 'Super Admin')
                        <a href="{{ route('users.index') }}" class="btn btn-outline-warning d-flex align-items-center">
                            <i class="bx bx-user me-2"></i>
                            Manage Users
                        </a>
                        @endif

                        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-success d-flex align-items-center">
                            <i class="bx bx-globe me-2"></i>
                            Preview Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Status Overview -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Content Sections Status</h5>
                    <small class="text-muted">Overview of all website sections</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Homepage -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="bx bx-home bx-sm"></i>
                                        </span>
                                    </div>
                                    <h6 class="mb-1">Homepage</h6>
                                    <small class="text-muted">{{ $homeContentCount }} content items</small>
                                    <div class="mt-2">
                                        <a href="{{ route('admin.home.preview') }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.home.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2">
                                        <span class="avatar-initial rounded bg-label-info">
                                            <i class="bx bx-info-circle bx-sm"></i>
                                        </span>
                                    </div>
                                    <h6 class="mb-1">About</h6>
                                    <small class="text-muted">{{ $aboutContentCount }} content items</small>
                                    <div class="mt-2">
                                        <a href="{{ route('admin.about.preview') }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.about.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Audit Services -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2">
                                        <span class="avatar-initial rounded bg-label-success">
                                            <i class="bx bx-briefcase-alt bx-sm"></i>
                                        </span>
                                    </div>
                                    <h6 class="mb-1">Audit Services</h6>
                                    <small class="text-muted">{{ $auditContentCount }} content items</small>
                                    <div class="mt-2">
                                        <a href="{{ route('admin.audit.preview') }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.audit.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advisory Services -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card border">
                                <div class="card-body text-center">
                                    <div class="avatar mx-auto mb-2">
                                        <span class="avatar-initial rounded bg-label-warning">
                                            <i class="bx bx-bulb bx-sm"></i>
                                        </span>
                                    </div>
                                    <h6 class="mb-1">Advisory Services</h6>
                                    <small class="text-muted">{{ $advisoryContentCount }} content items</small>
                                    <div class="mt-2">
                                        <a href="{{ route('admin.advisory.preview') }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.advisory.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
    border: 1px solid #e7eaf3;
}

.avatar-initial {
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-label-primary {
    background-color: rgba(105, 108, 255, 0.16) !important;
    color: #696cff !important;
}

.bg-label-success {
    background-color: rgba(113, 221, 55, 0.16) !important;
    color: #71dd37 !important;
}

.bg-label-info {
    background-color: rgba(3, 195, 236, 0.16) !important;
    color: #03c3ec !important;
}

.bg-label-warning {
    background-color: rgba(255, 171, 0, 0.16) !important;
    color: #ffab00 !important;
}

.table-borderless > :not(caption) > * > * {
    border-bottom-width: 0;
}

.btn:hover {
    transform: translateY(-1px);
    transition: all 0.2s ease;
}
</style>
@endsection
