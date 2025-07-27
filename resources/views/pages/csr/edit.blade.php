@extends('layouts.master')

@section('title', 'Edit CSR Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit CSR Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.csr.update') }}">
        @csrf

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="csr_hero_title" class="form-label">Hero Title</label>
                    <textarea name="csr_hero_title" id="csr_hero_title" rows="3" class="form-control"
                        required>{{ old('csr_hero_title', $csr_hero_title) }}</textarea>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text and &lt;br&gt; for line breaks</small>
                </div>

                <div class="mb-3">
                    <label for="csr_hero_subtitle" class="form-label">Hero Subtitle</label>
                    <textarea name="csr_hero_subtitle" id="csr_hero_subtitle" rows="3" class="form-control"
                        required>{{ old('csr_hero_subtitle', $csr_hero_subtitle) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_cta_overview" class="form-label">Overview Button Text</label>
                            <input type="text" name="csr_cta_overview" id="csr_cta_overview" class="form-control"
                                value="{{ old('csr_cta_overview', $csr_cta_overview) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_cta_programs" class="form-label">Programs Button Text</label>
                            <input type="text" name="csr_cta_programs" id="csr_cta_programs" class="form-control"
                                value="{{ old('csr_cta_programs', $csr_cta_programs) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Overview Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_overview_badge" class="form-label">Overview Badge</label>
                            <input type="text" name="csr_overview_badge" id="csr_overview_badge" class="form-control"
                                value="{{ old('csr_overview_badge', $csr_overview_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_overview_title" class="form-label">Overview Title</label>
                            <input type="text" name="csr_overview_title" id="csr_overview_title" class="form-control"
                                value="{{ old('csr_overview_title', $csr_overview_title) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="csr_overview_paragraph1" class="form-label">Overview Paragraph 1</label>
                    <textarea name="csr_overview_paragraph1" id="csr_overview_paragraph1" rows="4" class="form-control"
                        required>{{ old('csr_overview_paragraph1', $csr_overview_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="csr_overview_paragraph2" class="form-label">Overview Quote</label>
                    <textarea name="csr_overview_paragraph2" id="csr_overview_paragraph2" rows="2" class="form-control"
                        required>{{ old('csr_overview_paragraph2', $csr_overview_paragraph2) }}</textarea>
                    <small class="form-text text-muted">This appears as a highlighted quote</small>
                </div>
            </div>
        </div>

        <!-- Programs Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Programs Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_programs_badge" class="form-label">Programs Badge</label>
                            <input type="text" name="csr_programs_badge" id="csr_programs_badge" class="form-control"
                                value="{{ old('csr_programs_badge', $csr_programs_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_programs_title" class="form-label">Programs Title</label>
                            <input type="text" name="csr_programs_title" id="csr_programs_title" class="form-control"
                                value="{{ old('csr_programs_title', $csr_programs_title) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="csr_programs_description" class="form-label">Programs Description</label>
                    <textarea name="csr_programs_description" id="csr_programs_description" rows="3" class="form-control"
                        required>{{ old('csr_programs_description', $csr_programs_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Program Cards -->
        <div class="row">
            <!-- Education Program -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Education Program</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="csr_education_title" class="form-label">Title</label>
                            <input type="text" name="csr_education_title" id="csr_education_title" class="form-control"
                                value="{{ old('csr_education_title', $csr_education_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_education_description" class="form-label">Description</label>
                            <textarea name="csr_education_description" id="csr_education_description" rows="3" class="form-control"
                                required>{{ old('csr_education_description', $csr_education_description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="csr_education_focus" class="form-label">Focus Area</label>
                            <input type="text" name="csr_education_focus" id="csr_education_focus" class="form-control"
                                value="{{ old('csr_education_focus', $csr_education_focus) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Environmental Program -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Environmental Program</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="csr_environment_title" class="form-label">Title</label>
                            <input type="text" name="csr_environment_title" id="csr_environment_title" class="form-control"
                                value="{{ old('csr_environment_title', $csr_environment_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_environment_description" class="form-label">Description</label>
                            <textarea name="csr_environment_description" id="csr_environment_description" rows="3" class="form-control"
                                required>{{ old('csr_environment_description', $csr_environment_description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="csr_environment_focus" class="form-label">Focus Area</label>
                            <input type="text" name="csr_environment_focus" id="csr_environment_focus" class="form-control"
                                value="{{ old('csr_environment_focus', $csr_environment_focus) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Community Program -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Community Program</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="csr_community_title" class="form-label">Title</label>
                            <input type="text" name="csr_community_title" id="csr_community_title" class="form-control"
                                value="{{ old('csr_community_title', $csr_community_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_community_description" class="form-label">Description</label>
                            <textarea name="csr_community_description" id="csr_community_description" rows="3" class="form-control"
                                required>{{ old('csr_community_description', $csr_community_description) }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="csr_community_donation" class="form-label">Donation Text</label>
                                    <input type="text" name="csr_community_donation" id="csr_community_donation" class="form-control"
                                        value="{{ old('csr_community_donation', $csr_community_donation) }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="csr_community_support" class="form-label">Support Text</label>
                                    <input type="text" name="csr_community_support" id="csr_community_support" class="form-control"
                                        value="{{ old('csr_community_support', $csr_community_support) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.csr.index') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
