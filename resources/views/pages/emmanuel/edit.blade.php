@extends('layouts.master')

@section('title', 'Edit Emmanuel Y. Mendoza Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Emmanuel Y. Mendoza Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.people.emmanuel.update') }}" enctype="multipart/form-data">
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
                            <label for="emmanuel_full_name" class="form-label">Full Name</label>
                            <input type="text" name="emmanuel_full_name" id="emmanuel_full_name" class="form-control"
                                value="{{ old('emmanuel_full_name', $emmanuel_full_name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="emmanuel_position" class="form-label">Position</label>
                            <input type="text" name="emmanuel_position" id="emmanuel_position" class="form-control"
                                value="{{ old('emmanuel_position', $emmanuel_position) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="emmanuel_email" class="form-label">Email Address</label>
                            <input type="email" name="emmanuel_email" id="emmanuel_email" class="form-control"
                                value="{{ old('emmanuel_email', $emmanuel_email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="emmanuel_company" class="form-label">Company</label>
                            <input type="text" name="emmanuel_company" id="emmanuel_company" class="form-control"
                                value="{{ old('emmanuel_company', $emmanuel_company) }}" required>
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
                    $emmanuelProfileImage = \App\Models\Content::where('key', 'emmanuel_profile_image')->first();
                @endphp

                @if($emmanuelProfileImage && $emmanuelProfileImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($emmanuelProfileImage->image) }}" alt="Profile Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="emmanuel_profile_image" id="emmanuel_profile_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 400x500px</small>

                @if($emmanuelProfileImage && $emmanuelProfileImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_emmanuel_profile_image" id="remove_emmanuel_profile_image" value="1">
                    <label class="form-check-label text-danger" for="remove_emmanuel_profile_image">
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
                                <label for="emmanuel_stat1_value" class="form-label">Value</label>
                                <input type="text" name="emmanuel_stat1_value" id="emmanuel_stat1_value" class="form-control"
                                    value="{{ old('emmanuel_stat1_value', $emmanuel_stat1_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_stat1_label" class="form-label">Label</label>
                                <input type="text" name="emmanuel_stat1_label" id="emmanuel_stat1_label" class="form-control"
                                    value="{{ old('emmanuel_stat1_label', $emmanuel_stat1_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 2</h6>
                            <div class="mb-3">
                                <label for="emmanuel_stat2_value" class="form-label">Value</label>
                                <input type="text" name="emmanuel_stat2_value" id="emmanuel_stat2_value" class="form-control"
                                    value="{{ old('emmanuel_stat2_value', $emmanuel_stat2_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_stat2_label" class="form-label">Label</label>
                                <input type="text" name="emmanuel_stat2_label" id="emmanuel_stat2_label" class="form-control"
                                    value="{{ old('emmanuel_stat2_label', $emmanuel_stat2_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 3</h6>
                            <div class="mb-3">
                                <label for="emmanuel_stat3_value" class="form-label">Value</label>
                                <input type="text" name="emmanuel_stat3_value" id="emmanuel_stat3_value" class="form-control"
                                    value="{{ old('emmanuel_stat3_value', $emmanuel_stat3_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_stat3_label" class="form-label">Label</label>
                                <input type="text" name="emmanuel_stat3_label" id="emmanuel_stat3_label" class="form-control"
                                    value="{{ old('emmanuel_stat3_label', $emmanuel_stat3_label) }}" required>
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
                        <label for="emmanuel_bio_section1_title" class="form-label">Section Title</label>
                        <input type="text" name="emmanuel_bio_section1_title" id="emmanuel_bio_section1_title" class="form-control"
                            value="{{ old('emmanuel_bio_section1_title', $emmanuel_bio_section1_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="emmanuel_bio_section1_content" class="form-label">Section Content</label>
                        <textarea name="emmanuel_bio_section1_content" id="emmanuel_bio_section1_content" rows="4" class="form-control"
                            required>{{ old('emmanuel_bio_section1_content', $emmanuel_bio_section1_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 2</h6>
                    <div class="mb-3">
                        <label for="emmanuel_bio_section2_title" class="form-label">Section Title</label>
                        <input type="text" name="emmanuel_bio_section2_title" id="emmanuel_bio_section2_title" class="form-control"
                            value="{{ old('emmanuel_bio_section2_title', $emmanuel_bio_section2_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="emmanuel_bio_section2_content" class="form-label">Section Content</label>
                        <textarea name="emmanuel_bio_section2_content" id="emmanuel_bio_section2_content" rows="4" class="form-control"
                            required>{{ old('emmanuel_bio_section2_content', $emmanuel_bio_section2_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 3</h6>
                    <div class="mb-3">
                        <label for="emmanuel_bio_section3_title" class="form-label">Section Title</label>
                        <input type="text" name="emmanuel_bio_section3_title" id="emmanuel_bio_section3_title" class="form-control"
                            value="{{ old('emmanuel_bio_section3_title', $emmanuel_bio_section3_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="emmanuel_bio_section3_content" class="form-label">Section Content</label>
                        <textarea name="emmanuel_bio_section3_content" id="emmanuel_bio_section3_content" rows="4" class="form-control"
                            required>{{ old('emmanuel_bio_section3_content', $emmanuel_bio_section3_content) }}</textarea>
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
                                <label for="emmanuel_education1_degree" class="form-label">Degree</label>
                                <input type="text" name="emmanuel_education1_degree" id="emmanuel_education1_degree" class="form-control"
                                    value="{{ old('emmanuel_education1_degree', $emmanuel_education1_degree) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_education1_institution" class="form-label">Institution</label>
                                <input type="text" name="emmanuel_education1_institution" id="emmanuel_education1_institution" class="form-control"
                                    value="{{ old('emmanuel_education1_institution', $emmanuel_education1_institution) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Education 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Education 2</h6>
                            <div class="mb-3">
                                <label for="emmanuel_education2_degree" class="form-label">Degree</label>
                                <input type="text" name="emmanuel_education2_degree" id="emmanuel_education2_degree" class="form-control"
                                    value="{{ old('emmanuel_education2_degree', $emmanuel_education2_degree) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_education2_institution" class="form-label">Institution</label>
                                <input type="text" name="emmanuel_education2_institution" id="emmanuel_education2_institution" class="form-control"
                                    value="{{ old('emmanuel_education2_institution', $emmanuel_education2_institution) }}" required>
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
                                <label for="emmanuel_affiliation1_name" class="form-label">Organization Name</label>
                                <input type="text" name="emmanuel_affiliation1_name" id="emmanuel_affiliation1_name" class="form-control"
                                    value="{{ old('emmanuel_affiliation1_name', $emmanuel_affiliation1_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation1_description" class="form-label">Description</label>
                                <input type="text" name="emmanuel_affiliation1_description" id="emmanuel_affiliation1_description" class="form-control"
                                    value="{{ old('emmanuel_affiliation1_description', $emmanuel_affiliation1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 2</h6>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation2_name" class="form-label">Organization Name</label>
                                <input type="text" name="emmanuel_affiliation2_name" id="emmanuel_affiliation2_name" class="form-control"
                                    value="{{ old('emmanuel_affiliation2_name', $emmanuel_affiliation2_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation2_description" class="form-label">Description</label>
                                <input type="text" name="emmanuel_affiliation2_description" id="emmanuel_affiliation2_description" class="form-control"
                                    value="{{ old('emmanuel_affiliation2_description', $emmanuel_affiliation2_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 3 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 3</h6>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation3_name" class="form-label">Organization Name</label>
                                <input type="text" name="emmanuel_affiliation3_name" id="emmanuel_affiliation3_name" class="form-control"
                                    value="{{ old('emmanuel_affiliation3_name', $emmanuel_affiliation3_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation3_description" class="form-label">Description</label>
                                <input type="text" name="emmanuel_affiliation3_description" id="emmanuel_affiliation3_description" class="form-control"
                                    value="{{ old('emmanuel_affiliation3_description', $emmanuel_affiliation3_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 4 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 4</h6>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation4_name" class="form-label">Organization Name</label>
                                <input type="text" name="emmanuel_affiliation4_name" id="emmanuel_affiliation4_name" class="form-control"
                                    value="{{ old('emmanuel_affiliation4_name', $emmanuel_affiliation4_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="emmanuel_affiliation4_description" class="form-label">Description</label>
                                <input type="text" name="emmanuel_affiliation4_description" id="emmanuel_affiliation4_description" class="form-control"
                                    value="{{ old('emmanuel_affiliation4_description', $emmanuel_affiliation4_description) }}" required>
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
                    <label for="emmanuel_quote" class="form-label">Professional Philosophy/Quote</label>
                    <textarea name="emmanuel_quote" id="emmanuel_quote" rows="3" class="form-control"
                        required>{{ old('emmanuel_quote', $emmanuel_quote) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.people.emmanuel.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
