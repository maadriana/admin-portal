@extends('layouts.master')

@section('title', 'Edit Pamela Grace S. Tangso Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Pamela Grace S. Tangso Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.people.pamela.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Basic Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Basic Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_full_name" class="form-label">Full Name</label>
                            <input type="text" name="pamela_full_name" id="pamela_full_name" class="form-control"
                                value="{{ old('pamela_full_name', $pamela_full_name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_position" class="form-label">Position</label>
                            <input type="text" name="pamela_position" id="pamela_position" class="form-control"
                                value="{{ old('pamela_position', $pamela_position) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_email" class="form-label">Email Address</label>
                            <input type="email" name="pamela_email" id="pamela_email" class="form-control"
                                value="{{ old('pamela_email', $pamela_email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_company" class="form-label">Company</label>
                            <input type="text" name="pamela_company" id="pamela_company" class="form-control"
                                value="{{ old('pamela_company', $pamela_company) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Profile Image</h5>
            </div>
            <div class="card-body">
                @php
                    $pamelaProfileImage = \App\Models\Content::where('key', 'pamela_profile_image')->first();
                @endphp

                @if($pamelaProfileImage && $pamelaProfileImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($pamelaProfileImage->image) }}" alt="Profile Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="pamela_profile_image" id="pamela_profile_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 400x500px</small>

                @if($pamelaProfileImage && $pamelaProfileImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_pamela_profile_image" id="remove_pamela_profile_image" value="1">
                    <label class="form-check-label text-danger" for="remove_pamela_profile_image">
                        Remove current image
                    </label>
                </div>
                @endif
            </div>
        </div>

        <!-- Hero Statistics -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Stat 1 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 1</h6>
                            <div class="mb-3">
                                <label for="pamela_stat1_value" class="form-label">Value</label>
                                <input type="text" name="pamela_stat1_value" id="pamela_stat1_value" class="form-control"
                                    value="{{ old('pamela_stat1_value', $pamela_stat1_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_stat1_label" class="form-label">Label</label>
                                <input type="text" name="pamela_stat1_label" id="pamela_stat1_label" class="form-control"
                                    value="{{ old('pamela_stat1_label', $pamela_stat1_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 2</h6>
                            <div class="mb-3">
                                <label for="pamela_stat2_value" class="form-label">Value</label>
                                <input type="text" name="pamela_stat2_value" id="pamela_stat2_value" class="form-control"
                                    value="{{ old('pamela_stat2_value', $pamela_stat2_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_stat2_label" class="form-label">Label</label>
                                <input type="text" name="pamela_stat2_label" id="pamela_stat2_label" class="form-control"
                                    value="{{ old('pamela_stat2_label', $pamela_stat2_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 3</h6>
                            <div class="mb-3">
                                <label for="pamela_stat3_value" class="form-label">Value</label>
                                <input type="text" name="pamela_stat3_value" id="pamela_stat3_value" class="form-control"
                                    value="{{ old('pamela_stat3_value', $pamela_stat3_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_stat3_label" class="form-label">Label</label>
                                <input type="text" name="pamela_stat3_label" id="pamela_stat3_label" class="form-control"
                                    value="{{ old('pamela_stat3_label', $pamela_stat3_label) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Badge -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Professional Badge</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_badge_title" class="form-label">Badge Title</label>
                            <input type="text" name="pamela_badge_title" id="pamela_badge_title" class="form-control"
                                value="{{ old('pamela_badge_title', $pamela_badge_title) }}" required>
                            <small class="form-text text-muted">e.g., "CPA"</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_badge_subtitle" class="form-label">Badge Subtitle</label>
                            <input type="text" name="pamela_badge_subtitle" id="pamela_badge_subtitle" class="form-control"
                                value="{{ old('pamela_badge_subtitle', $pamela_badge_subtitle) }}" required>
                            <small class="form-text text-muted">e.g., "Tax Specialist"</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biography Sections -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Biography Sections</h5>
            </div>
            <div class="card-body">
                <!-- Biography Section 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 1</h6>
                    <div class="mb-3">
                        <label for="pamela_bio_section1_title" class="form-label">Section Title</label>
                        <input type="text" name="pamela_bio_section1_title" id="pamela_bio_section1_title" class="form-control"
                            value="{{ old('pamela_bio_section1_title', $pamela_bio_section1_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pamela_bio_section1_content" class="form-label">Section Content</label>
                        <textarea name="pamela_bio_section1_content" id="pamela_bio_section1_content" rows="4" class="form-control"
                            required>{{ old('pamela_bio_section1_content', $pamela_bio_section1_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 2</h6>
                    <div class="mb-3">
                        <label for="pamela_bio_section2_title" class="form-label">Section Title</label>
                        <input type="text" name="pamela_bio_section2_title" id="pamela_bio_section2_title" class="form-control"
                            value="{{ old('pamela_bio_section2_title', $pamela_bio_section2_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pamela_bio_section2_content" class="form-label">Section Content</label>
                        <textarea name="pamela_bio_section2_content" id="pamela_bio_section2_content" rows="4" class="form-control"
                            required>{{ old('pamela_bio_section2_content', $pamela_bio_section2_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 3</h6>
                    <div class="mb-3">
                        <label for="pamela_bio_section3_title" class="form-label">Section Title</label>
                        <input type="text" name="pamela_bio_section3_title" id="pamela_bio_section3_title" class="form-control"
                            value="{{ old('pamela_bio_section3_title', $pamela_bio_section3_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pamela_bio_section3_content" class="form-label">Section Content</label>
                        <textarea name="pamela_bio_section3_content" id="pamela_bio_section3_content" rows="4" class="form-control"
                            required>{{ old('pamela_bio_section3_content', $pamela_bio_section3_content) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Education</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Education 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Education 1</h6>
                            <div class="mb-3">
                                <label for="pamela_education1_degree" class="form-label">Degree</label>
                                <input type="text" name="pamela_education1_degree" id="pamela_education1_degree" class="form-control"
                                    value="{{ old('pamela_education1_degree', $pamela_education1_degree) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_education1_institution" class="form-label">Institution</label>
                                <input type="text" name="pamela_education1_institution" id="pamela_education1_institution" class="form-control"
                                    value="{{ old('pamela_education1_institution', $pamela_education1_institution) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Education 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Education 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="pamela_education2_degree" class="form-label">Degree</label>
                                <input type="text" name="pamela_education2_degree" id="pamela_education2_degree" class="form-control"
                                    value="{{ old('pamela_education2_degree', $pamela_education2_degree) }}">
                            </div>
                            <div class="mb-3">
                                <label for="pamela_education2_institution" class="form-label">Institution</label>
                                <input type="text" name="pamela_education2_institution" id="pamela_education2_institution" class="form-control"
                                    value="{{ old('pamela_education2_institution', $pamela_education2_institution) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Affiliations -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Professional Affiliations</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Affiliation 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 1</h6>
                            <div class="mb-3">
                                <label for="pamela_affiliation1_name" class="form-label">Organization Name</label>
                                <input type="text" name="pamela_affiliation1_name" id="pamela_affiliation1_name" class="form-control"
                                    value="{{ old('pamela_affiliation1_name', $pamela_affiliation1_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_affiliation1_description" class="form-label">Description</label>
                                <input type="text" name="pamela_affiliation1_description" id="pamela_affiliation1_description" class="form-control"
                                    value="{{ old('pamela_affiliation1_description', $pamela_affiliation1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="pamela_affiliation2_name" class="form-label">Organization Name</label>
                                <input type="text" name="pamela_affiliation2_name" id="pamela_affiliation2_name" class="form-control"
                                    value="{{ old('pamela_affiliation2_name', $pamela_affiliation2_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="pamela_affiliation2_description" class="form-label">Description</label>
                                <input type="text" name="pamela_affiliation2_description" id="pamela_affiliation2_description" class="form-control"
                                    value="{{ old('pamela_affiliation2_description', $pamela_affiliation2_description) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accreditation -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Accreditation</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Accreditation 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Accreditation 1</h6>
                            <div class="mb-3">
                                <label for="pamela_accreditation1_name" class="form-label">Organization Name</label>
                                <input type="text" name="pamela_accreditation1_name" id="pamela_accreditation1_name" class="form-control"
                                    value="{{ old('pamela_accreditation1_name', $pamela_accreditation1_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_accreditation1_description" class="form-label">Description</label>
                                <input type="text" name="pamela_accreditation1_description" id="pamela_accreditation1_description" class="form-control"
                                    value="{{ old('pamela_accreditation1_description', $pamela_accreditation1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Accreditation 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Accreditation 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="pamela_accreditation2_name" class="form-label">Organization Name</label>
                                <input type="text" name="pamela_accreditation2_name" id="pamela_accreditation2_name" class="form-control"
                                    value="{{ old('pamela_accreditation2_name', $pamela_accreditation2_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="pamela_accreditation2_description" class="form-label">Description</label>
                                <input type="text" name="pamela_accreditation2_description" id="pamela_accreditation2_description" class="form-control"
                                    value="{{ old('pamela_accreditation2_description', $pamela_accreditation2_description) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Quote -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Professional Quote</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="pamela_quote" class="form-label">Professional Philosophy/Quote</label>
                    <textarea name="pamela_quote" id="pamela_quote" rows="3" class="form-control"
                        required>{{ old('pamela_quote', $pamela_quote) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.people.pamela.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
