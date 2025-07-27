@extends('layouts.master')

@section('title', 'Edit MTC Care Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit MTC Care Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.mtc-care.update') }}">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="mtc_care_title" class="form-label">Main Title</label>
                    <input type="text" name="mtc_care_title" id="mtc_care_title" class="form-control"
                        value="{{ old('mtc_care_title', $mtc_care_title) }}" required>
                    <small class="form-text text-muted">The main title for the MTC Care section</small>
                </div>

                <div class="mb-3">
                    <label for="mtc_care_subtitle" class="form-label">Subtitle</label>
                    <textarea name="mtc_care_subtitle" id="mtc_care_subtitle" rows="2" class="form-control"
                        required>{{ old('mtc_care_subtitle', $mtc_care_subtitle) }}</textarea>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>
            </div>
        </div>

        <!-- CSR Card Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">CSR Card</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="mtc_care_csr_title" class="form-label">CSR Card Title</label>
                    <input type="text" name="mtc_care_csr_title" id="mtc_care_csr_title" class="form-control"
                        value="{{ old('mtc_care_csr_title', $mtc_care_csr_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="mtc_care_csr_description" class="form-label">CSR Card Description</label>
                    <textarea name="mtc_care_csr_description" id="mtc_care_csr_description" rows="4" class="form-control"
                        required>{{ old('mtc_care_csr_description', $mtc_care_csr_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Galleries Card Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Galleries Card</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="mtc_care_galleries_title" class="form-label">Galleries Card Title</label>
                    <input type="text" name="mtc_care_galleries_title" id="mtc_care_galleries_title" class="form-control"
                        value="{{ old('mtc_care_galleries_title', $mtc_care_galleries_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="mtc_care_galleries_description" class="form-label">Galleries Card Description</label>
                    <textarea name="mtc_care_galleries_description" id="mtc_care_galleries_description" rows="4" class="form-control"
                        required>{{ old('mtc_care_galleries_description', $mtc_care_galleries_description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.mtc-care.index') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>

    <!-- Quick Navigation -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Related Content Management</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ route('admin.csr.edit') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-heart me-2"></i>Edit CSR Content
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ route('admin.galleries.edit') }}" class="btn btn-outline-info">
                                    <i class="fas fa-images me-2"></i>Edit Galleries Content
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
