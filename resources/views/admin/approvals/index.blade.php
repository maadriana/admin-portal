@extends('layouts.master')

@section('title', 'Approval Requests')

@section('content')
<div>
    {{-- Auto-fading popup alert --}}
    @include('layouts.popups')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Approval Requests</h5>
                <small class="text-muted" style="font-size: 1rem;">Review and manage user requests</small>
            </div>
            <div>
                <span class="badge bg-warning">{{ $requests->where('status', 'pending')->count() }} Pending</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>Request Type</th>
                        <th>Requested Changes</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://avatar.iran.liara.run/username?username={{ $request->user->given_name }}+{{ $request->user->surname }}"
                                        alt="Avatar" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                                    <div>
                                        <div class="fw-bold">{{ $request->user->given_name }} {{ $request->user->surname }}</div>
                                        <small class="text-muted">{{ $request->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $request->request_type === 'profile_update' ? 'bg-info' : 'bg-danger' }}">
                                    {{ ucfirst(str_replace('_', ' ', $request->request_type)) }}
                                </span>
                            </td>
                            <td>
                                @if($request->request_type === 'profile_update' && $request->requested_changes)
                                    <div class="small">
                                        @foreach($request->requested_changes as $field => $value)
                                            <div><strong>{{ ucfirst($field) }}:</strong>
                                                @if($field === 'password')
                                                    Password change requested
                                                @else
                                                    {{ $value }}
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif($request->request_type === 'account_deletion')
                                    <span class="text-danger">Account Deletion</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px;" title="{{ $request->reason }}">
                                    {{ $request->reason ?? '-' }}
                                </div>
                            </td>
                            <td>
                                @if($request->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($request->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                <div>{{ $request->created_at->format('M d, Y') }}</div>
                                <small class="text-muted">{{ $request->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                @if($request->status === 'pending')
                                    <button class="btn btn-success btn-sm me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#approveModal"
                                            onclick="setApprovalData({{ $request->id }}, 'approve')">
                                        Approve
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#rejectModal"
                                            onclick="setApprovalData({{ $request->id }}, 'reject')">
                                        Reject
                                    </button>
                                @else
                                    <div class="small text-muted">
                                        @if($request->reviewedBy)
                                            Reviewed by {{ $request->reviewedBy->given_name }}
                                        @endif
                                        @if($request->reviewed_at)
                                            <br>{{ $request->reviewed_at->diffForHumans() }}
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="bx bx-inbox bx-lg text-muted mb-2"></i>
                                <div>No approval requests found.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Approve Modal --}}
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="approveForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert">
                        <i class="bx bx-check-circle me-2"></i>
                        You are about to approve this request. The changes will be applied immediately.
                    </div>
                    <div class="mb-3">
                        <label for="approve_notes" class="form-label">Review Notes (Optional)</label>
                        <textarea class="form-control" id="approve_notes" name="review_notes" rows="3"
                            placeholder="Add any notes about this approval..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Approve Request</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="rejectForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <i class="bx bx-x-circle me-2"></i>
                        You are about to reject this request. Please provide a reason.
                    </div>
                    <div class="mb-3">
                        <label for="reject_notes" class="form-label">Rejection Reason <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="reject_notes" name="review_notes" rows="3"
                            placeholder="Please provide a reason for rejecting this request..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject Request</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function setApprovalData(requestId, action) {
    if (action === 'approve') {
        document.getElementById('approveForm').action = `/admin/approvals/${requestId}/approve`;
    } else if (action === 'reject') {
        document.getElementById('rejectForm').action = `/admin/approvals/${requestId}/reject`;
    }
}
</script>
@endsection
