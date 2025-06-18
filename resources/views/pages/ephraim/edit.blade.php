@extends('layouts.master')

@section('title', 'Edit Ephraim T. Tugano Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Ephraim T. Tugano Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.people.ephraim.update') }}" enctype="multipart/form-data">
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
                            <label for="ephraim_full_name" class="form-label">Full Name</label>
                            <input type="text" name="ephraim_full_name" id="ephraim_full_name" class="form-control"
                                value="{{ old('ephraim_full_name', $ephraim_full_name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_position" class="form-label">Position</label>
                            <input type="text" name="ephraim_position" id="ephraim_position" class="form-control"
                                value="{{ old('ephraim_position', $ephraim_position) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_email" class="form-label">Email Address</label>
                            <input type="email" name="ephraim_email" id="ephraim_email" class="form-control"
                                value="{{ old('ephraim_email', $ephraim_email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_company" class="form-label">Company</label>
                            <input type="text" name="ephraim_company" id="ephraim_company" class="form-control"
                                value="{{ old('ephraim_company', $ephraim_company) }}" required>
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
                    $ephraimProfileImage = \App\Models\Content::where('key', 'ephraim_profile_image')->first();
                @endphp

                @if($ephraimProfileImage && $ephraimProfileImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($ephraimProfileImage->image) }}" alt="Profile Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="ephraim_profile_image" id="ephraim_profile_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 400x500px</small>

                @if($ephraimProfileImage && $ephraimProfileImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_ephraim_profile_image" id="remove_ephraim_profile_image" value="1">
                    <label class="form-check-label text-danger" for="remove_ephraim_profile_image">
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
                                <label for="ephraim_stat1_value" class="form-label">Value</label>
                                <input type="text" name="ephraim_stat1_value" id="ephraim_stat1_value" class="form-control"
                                    value="{{ old('ephraim_stat1_value', $ephraim_stat1_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_stat1_label" class="form-label">Label</label>
                                <input type="text" name="ephraim_stat1_label" id="ephraim_stat1_label" class="form-control"
                                    value="{{ old('ephraim_stat1_label', $ephraim_stat1_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 2</h6>
                            <div class="mb-3">
                                <label for="ephraim_stat2_value" class="form-label">Value</label>
                                <input type="text" name="ephraim_stat2_value" id="ephraim_stat2_value" class="form-control"
                                    value="{{ old('ephraim_stat2_value', $ephraim_stat2_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_stat2_label" class="form-label">Label</label>
                                <input type="text" name="ephraim_stat2_label" id="ephraim_stat2_label" class="form-control"
                                    value="{{ old('ephraim_stat2_label', $ephraim_stat2_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 3</h6>
                            <div class="mb-3">
                                <label for="ephraim_stat3_value" class="form-label">Value</label>
                                <input type="text" name="ephraim_stat3_value" id="ephraim_stat3_value" class="form-control"
                                    value="{{ old('ephraim_stat3_value', $ephraim_stat3_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_stat3_label" class="form-label">Label</label>
                                <input type="text" name="ephraim_stat3_label" id="ephraim_stat3_label" class="form-control"
                                    value="{{ old('ephraim_stat3_label', $ephraim_stat3_label) }}" required>
                            </div>
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
                        <label for="ephraim_bio_section1_title" class="form-label">Section Title</label>
                        <input type="text" name="ephraim_bio_section1_title" id="ephraim_bio_section1_title" class="form-control"
                            value="{{ old('ephraim_bio_section1_title', $ephraim_bio_section1_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ephraim_bio_section1_content" class="form-label">Section Content</label>
                        <textarea name="ephraim_bio_section1_content" id="ephraim_bio_section1_content" rows="4" class="form-control"
                            required>{{ old('ephraim_bio_section1_content', $ephraim_bio_section1_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 2</h6>
                    <div class="mb-3">
                        <label for="ephraim_bio_section2_title" class="form-label">Section Title</label>
                        <input type="text" name="ephraim_bio_section2_title" id="ephraim_bio_section2_title" class="form-control"
                            value="{{ old('ephraim_bio_section2_title', $ephraim_bio_section2_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ephraim_bio_section2_content" class="form-label">Section Content</label>
                        <textarea name="ephraim_bio_section2_content" id="ephraim_bio_section2_content" rows="4" class="form-control"
                            required>{{ old('ephraim_bio_section2_content', $ephraim_bio_section2_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 3</h6>
                    <div class="mb-3">
                        <label for="ephraim_bio_section3_title" class="form-label">Section Title</label>
                        <input type="text" name="ephraim_bio_section3_title" id="ephraim_bio_section3_title" class="form-control"
                            value="{{ old('ephraim_bio_section3_title', $ephraim_bio_section3_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ephraim_bio_section3_content" class="form-label">Section Content</label>
                        <textarea name="ephraim_bio_section3_content" id="ephraim_bio_section3_content" rows="4" class="form-control"
                            required>{{ old('ephraim_bio_section3_content', $ephraim_bio_section3_content) }}</textarea>
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
                                <label for="ephraim_education1_degree" class="form-label">Degree</label>
                                <input type="text" name="ephraim_education1_degree" id="ephraim_education1_degree" class="form-control"
                                    value="{{ old('ephraim_education1_degree', $ephraim_education1_degree) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_education1_institution" class="form-label">Institution</label>
                                <input type="text" name="ephraim_education1_institution" id="ephraim_education1_institution" class="form-control"
                                    value="{{ old('ephraim_education1_institution', $ephraim_education1_institution) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Education 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Education 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="ephraim_education2_degree" class="form-label">Degree</label>
                                <input type="text" name="ephraim_education2_degree" id="ephraim_education2_degree" class="form-control"
                                    value="{{ old('ephraim_education2_degree', $ephraim_education2_degree) }}">
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_education2_institution" class="form-label">Institution</label>
                                <input type="text" name="ephraim_education2_institution" id="ephraim_education2_institution" class="form-control"
                                    value="{{ old('ephraim_education2_institution', $ephraim_education2_institution) }}">
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
                                <label for="ephraim_affiliation1_name" class="form-label">Organization Name</label>
                                <input type="text" name="ephraim_affiliation1_name" id="ephraim_affiliation1_name" class="form-control"
                                    value="{{ old('ephraim_affiliation1_name', $ephraim_affiliation1_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_affiliation1_description" class="form-label">Description</label>
                                <input type="text" name="ephraim_affiliation1_description" id="ephraim_affiliation1_description" class="form-control"
                                    value="{{ old('ephraim_affiliation1_description', $ephraim_affiliation1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="ephraim_affiliation2_name" class="form-label">Organization Name</label>
                                <input type="text" name="ephraim_affiliation2_name" id="ephraim_affiliation2_name" class="form-control"
                                    value="{{ old('ephraim_affiliation2_name', $ephraim_affiliation2_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_affiliation2_description" class="form-label">Description</label>
                                <input type="text" name="ephraim_affiliation2_description" id="ephraim_affiliation2_description" class="form-control"
                                    value="{{ old('ephraim_affiliation2_description', $ephraim_affiliation2_description) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 3 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 3 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="ephraim_affiliation3_name" class="form-label">Organization Name</label>
                                <input type="text" name="ephraim_affiliation3_name" id="ephraim_affiliation3_name" class="form-control"
                                    value="{{ old('ephraim_affiliation3_name', $ephraim_affiliation3_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_affiliation3_description" class="form-label">Description</label>
                                <input type="text" name="ephraim_affiliation3_description" id="ephraim_affiliation3_description" class="form-control"
                                    value="{{ old('ephraim_affiliation3_description', $ephraim_affiliation3_description) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 4 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 4 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="ephraim_affiliation4_name" class="form-label">Organization Name</label>
                                <input type="text" name="ephraim_affiliation4_name" id="ephraim_affiliation4_name" class="form-control"
                                    value="{{ old('ephraim_affiliation4_name', $ephraim_affiliation4_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="ephraim_affiliation4_description" class="form-label">Description</label>
                                <input type="text" name="ephraim_affiliation4_description" id="ephraim_affiliation4_description" class="form-control"
                                    value="{{ old('ephraim_affiliation4_description', $ephraim_affiliation4_description) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Industry Expertise -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Industry Expertise</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry1" class="form-label">Industry 1</label>
                            <input type="text" name="ephraim_industry1" id="ephraim_industry1" class="form-control"
                                value="{{ old('ephraim_industry1', $ephraim_industry1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry2" class="form-label">Industry 2</label>
                            <input type="text" name="ephraim_industry2" id="ephraim_industry2" class="form-control"
                                value="{{ old('ephraim_industry2', $ephraim_industry2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry3" class="form-label">Industry 3</label>
                            <input type="text" name="ephraim_industry3" id="ephraim_industry3" class="form-control"
                                value="{{ old('ephraim_industry3', $ephraim_industry3) }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry4" class="form-label">Industry 4</label>
                            <input type="text" name="ephraim_industry4" id="ephraim_industry4" class="form-control"
                                value="{{ old('ephraim_industry4', $ephraim_industry4) }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry5" class="form-label">Industry 5 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_industry5" id="ephraim_industry5" class="form-control"
                                value="{{ old('ephraim_industry5', $ephraim_industry5) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry6" class="form-label">Industry 6 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_industry6" id="ephraim_industry6" class="form-control"
                                value="{{ old('ephraim_industry6', $ephraim_industry6) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry7" class="form-label">Industry 7 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_industry7" id="ephraim_industry7" class="form-control"
                                value="{{ old('ephraim_industry7', $ephraim_industry7) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="ephraim_industry8" class="form-label">Industry 8 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_industry8" id="ephraim_industry8" class="form-control"
                                value="{{ old('ephraim_industry8', $ephraim_industry8) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Competencies -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Core Competencies</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_competency1" class="form-label">Competency 1</label>
                            <input type="text" name="ephraim_competency1" id="ephraim_competency1" class="form-control"
                                value="{{ old('ephraim_competency1', $ephraim_competency1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_competency2" class="form-label">Competency 2</label>
                            <input type="text" name="ephraim_competency2" id="ephraim_competency2" class="form-control"
                                value="{{ old('ephraim_competency2', $ephraim_competency2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_competency3" class="form-label">Competency 3</label>
                            <input type="text" name="ephraim_competency3" id="ephraim_competency3" class="form-control"
                                value="{{ old('ephraim_competency3', $ephraim_competency3) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_competency4" class="form-label">Competency 4 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_competency4" id="ephraim_competency4" class="form-control"
                                value="{{ old('ephraim_competency4', $ephraim_competency4) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ephraim_competency5" class="form-label">Competency 5 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="ephraim_competency5" id="ephraim_competency5" class="form-control"
                                value="{{ old('ephraim_competency5', $ephraim_competency5) }}">
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
                    <label for="ephraim_quote" class="form-label">Professional Philosophy/Quote</label>
                    <textarea name="ephraim_quote" id="ephraim_quote" rows="3" class="form-control"
                        required>{{ old('ephraim_quote', $ephraim_quote) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.people.ephraim.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
