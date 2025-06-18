@extends('layouts.master')

@section('title', 'Edit Jekell G. Salosagcol Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Jekell G. Salosagcol Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.people.jekell.update') }}" enctype="multipart/form-data">
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
                            <label for="jekell_full_name" class="form-label">Full Name</label>
                            <input type="text" name="jekell_full_name" id="jekell_full_name" class="form-control"
                                value="{{ old('jekell_full_name', $jekell_full_name) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_position" class="form-label">Position</label>
                            <input type="text" name="jekell_position" id="jekell_position" class="form-control"
                                value="{{ old('jekell_position', $jekell_position) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_email" class="form-label">Email Address</label>
                            <input type="email" name="jekell_email" id="jekell_email" class="form-control"
                                value="{{ old('jekell_email', $jekell_email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_company" class="form-label">Company</label>
                            <input type="text" name="jekell_company" id="jekell_company" class="form-control"
                                value="{{ old('jekell_company', $jekell_company) }}" required>
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
                    $jekellProfileImage = \App\Models\Content::where('key', 'jekell_profile_image')->first();
                @endphp

                @if($jekellProfileImage && $jekellProfileImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($jekellProfileImage->image) }}" alt="Profile Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="jekell_profile_image" id="jekell_profile_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 400x500px</small>

                @if($jekellProfileImage && $jekellProfileImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_jekell_profile_image" id="remove_jekell_profile_image" value="1">
                    <label class="form-check-label text-danger" for="remove_jekell_profile_image">
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
                                <label for="jekell_stat1_value" class="form-label">Value</label>
                                <input type="text" name="jekell_stat1_value" id="jekell_stat1_value" class="form-control"
                                    value="{{ old('jekell_stat1_value', $jekell_stat1_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_stat1_label" class="form-label">Label</label>
                                <input type="text" name="jekell_stat1_label" id="jekell_stat1_label" class="form-control"
                                    value="{{ old('jekell_stat1_label', $jekell_stat1_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 2</h6>
                            <div class="mb-3">
                                <label for="jekell_stat2_value" class="form-label">Value</label>
                                <input type="text" name="jekell_stat2_value" id="jekell_stat2_value" class="form-control"
                                    value="{{ old('jekell_stat2_value', $jekell_stat2_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_stat2_label" class="form-label">Label</label>
                                <input type="text" name="jekell_stat2_label" id="jekell_stat2_label" class="form-control"
                                    value="{{ old('jekell_stat2_label', $jekell_stat2_label) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Statistic 3</h6>
                            <div class="mb-3">
                                <label for="jekell_stat3_value" class="form-label">Value</label>
                                <input type="text" name="jekell_stat3_value" id="jekell_stat3_value" class="form-control"
                                    value="{{ old('jekell_stat3_value', $jekell_stat3_value) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_stat3_label" class="form-label">Label</label>
                                <input type="text" name="jekell_stat3_label" id="jekell_stat3_label" class="form-control"
                                    value="{{ old('jekell_stat3_label', $jekell_stat3_label) }}" required>
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
                            <label for="jekell_badge_title" class="form-label">Badge Title</label>
                            <input type="text" name="jekell_badge_title" id="jekell_badge_title" class="form-control"
                                value="{{ old('jekell_badge_title', $jekell_badge_title) }}" required>
                            <small class="form-text text-muted">e.g., "Prof."</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_badge_subtitle" class="form-label">Badge Subtitle</label>
                            <input type="text" name="jekell_badge_subtitle" id="jekell_badge_subtitle" class="form-control"
                                value="{{ old('jekell_badge_subtitle', $jekell_badge_subtitle) }}" required>
                            <small class="form-text text-muted">e.g., "CPA, Academic"</small>
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
                        <label for="jekell_bio_section1_title" class="form-label">Section Title</label>
                        <input type="text" name="jekell_bio_section1_title" id="jekell_bio_section1_title" class="form-control"
                            value="{{ old('jekell_bio_section1_title', $jekell_bio_section1_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jekell_bio_section1_content" class="form-label">Section Content</label>
                        <textarea name="jekell_bio_section1_content" id="jekell_bio_section1_content" rows="4" class="form-control"
                            required>{{ old('jekell_bio_section1_content', $jekell_bio_section1_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 2</h6>
                    <div class="mb-3">
                        <label for="jekell_bio_section2_title" class="form-label">Section Title</label>
                        <input type="text" name="jekell_bio_section2_title" id="jekell_bio_section2_title" class="form-control"
                            value="{{ old('jekell_bio_section2_title', $jekell_bio_section2_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jekell_bio_section2_content" class="form-label">Section Content</label>
                        <textarea name="jekell_bio_section2_content" id="jekell_bio_section2_content" rows="4" class="form-control"
                            required>{{ old('jekell_bio_section2_content', $jekell_bio_section2_content) }}</textarea>
                    </div>
                </div>

                <!-- Biography Section 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Biography Section 3</h6>
                    <div class="mb-3">
                        <label for="jekell_bio_section3_title" class="form-label">Section Title</label>
                        <input type="text" name="jekell_bio_section3_title" id="jekell_bio_section3_title" class="form-control"
                            value="{{ old('jekell_bio_section3_title', $jekell_bio_section3_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jekell_bio_section3_content" class="form-label">Section Content</label>
                        <textarea name="jekell_bio_section3_content" id="jekell_bio_section3_content" rows="4" class="form-control"
                            required>{{ old('jekell_bio_section3_content', $jekell_bio_section3_content) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education & Achievement -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Education & Achievement</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Education -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Academic Background</h6>
                            <div class="mb-3">
                                <label for="jekell_education1_degree" class="form-label">Degree</label>
                                <input type="text" name="jekell_education1_degree" id="jekell_education1_degree" class="form-control"
                                    value="{{ old('jekell_education1_degree', $jekell_education1_degree) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_education1_institution" class="form-label">Institution</label>
                                <input type="text" name="jekell_education1_institution" id="jekell_education1_institution" class="form-control"
                                    value="{{ old('jekell_education1_institution', $jekell_education1_institution) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_education1_year" class="form-label">Graduation Year</label>
                                <input type="text" name="jekell_education1_year" id="jekell_education1_year" class="form-control"
                                    value="{{ old('jekell_education1_year', $jekell_education1_year) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_education1_achievement" class="form-label">Achievement</label>
                                <input type="text" name="jekell_education1_achievement" id="jekell_education1_achievement" class="form-control"
                                    value="{{ old('jekell_education1_achievement', $jekell_education1_achievement) }}" required>
                                <small class="form-text text-muted">e.g., "2nd Place - CPA Licensure Exam"</small>
                            </div>
                        </div>
                    </div>

                    <!-- Current Role -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Current Role</h6>
                            <div class="mb-3">
                                <label for="jekell_current_role_title" class="form-label">Role Title</label>
                                <input type="text" name="jekell_current_role_title" id="jekell_current_role_title" class="form-control"
                                    value="{{ old('jekell_current_role_title', $jekell_current_role_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_current_role_institution" class="form-label">Institution</label>
                                <input type="text" name="jekell_current_role_institution" id="jekell_current_role_institution" class="form-control"
                                    value="{{ old('jekell_current_role_institution', $jekell_current_role_institution) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Published Works -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Published Works</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Publication 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Publication 1</h6>
                            <div class="mb-3">
                                <label for="jekell_publication1_title" class="form-label">Book Title</label>
                                <input type="text" name="jekell_publication1_title" id="jekell_publication1_title" class="form-control"
                                    value="{{ old('jekell_publication1_title', $jekell_publication1_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_publication1_description" class="form-label">Description</label>
                                <input type="text" name="jekell_publication1_description" id="jekell_publication1_description" class="form-control"
                                    value="{{ old('jekell_publication1_description', $jekell_publication1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Publication 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Publication 2</h6>
                            <div class="mb-3">
                                <label for="jekell_publication2_title" class="form-label">Book Title</label>
                                <input type="text" name="jekell_publication2_title" id="jekell_publication2_title" class="form-control"
                                    value="{{ old('jekell_publication2_title', $jekell_publication2_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_publication2_description" class="form-label">Description</label>
                                <input type="text" name="jekell_publication2_description" id="jekell_publication2_description" class="form-control"
                                    value="{{ old('jekell_publication2_description', $jekell_publication2_description) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Committee Memberships -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Committee Memberships</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_committee1" class="form-label">Committee 1</label>
                            <input type="text" name="jekell_committee1" id="jekell_committee1" class="form-control"
                                value="{{ old('jekell_committee1', $jekell_committee1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_committee2" class="form-label">Committee 2</label>
                            <input type="text" name="jekell_committee2" id="jekell_committee2" class="form-control"
                                value="{{ old('jekell_committee2', $jekell_committee2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_committee3" class="form-label">Committee 3 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="jekell_committee3" id="jekell_committee3" class="form-control"
                                value="{{ old('jekell_committee3', $jekell_committee3) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_committee4" class="form-label">Committee 4 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="jekell_committee4" id="jekell_committee4" class="form-control"
                                value="{{ old('jekell_committee4', $jekell_committee4) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jekell_committee5" class="form-label">Committee 5 <small class="text-muted">(Optional)</small></label>
                            <input type="text" name="jekell_committee5" id="jekell_committee5" class="form-control"
                                value="{{ old('jekell_committee5', $jekell_committee5) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notable Clients -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Notable Clients</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @for($i = 1; $i <= 8; $i++)
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jekell_client{{ $i }}" class="form-label">
                                Client {{ $i }}
                                @if($i > 4) <small class="text-muted">(Optional)</small> @endif
                            </label>
                            <input type="text" name="jekell_client{{ $i }}" id="jekell_client{{ $i }}" class="form-control"
                                value="{{ old('jekell_client' . $i, ${'jekell_client' . $i}) }}"
                                {{ $i <= 4 ? 'required' : '' }}>
                        </div>
                    </div>
                    @endfor
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
                                <label for="jekell_affiliation1_name" class="form-label">Organization Name</label>
                                <input type="text" name="jekell_affiliation1_name" id="jekell_affiliation1_name" class="form-control"
                                    value="{{ old('jekell_affiliation1_name', $jekell_affiliation1_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jekell_affiliation1_description" class="form-label">Description</label>
                                <input type="text" name="jekell_affiliation1_description" id="jekell_affiliation1_description" class="form-control"
                                    value="{{ old('jekell_affiliation1_description', $jekell_affiliation1_description) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Affiliation 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Affiliation 2 <small class="text-muted">(Optional)</small></h6>
                            <div class="mb-3">
                                <label for="jekell_affiliation2_name" class="form-label">Organization Name</label>
                                <input type="text" name="jekell_affiliation2_name" id="jekell_affiliation2_name" class="form-control"
                                    value="{{ old('jekell_affiliation2_name', $jekell_affiliation2_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="jekell_affiliation2_description" class="form-label">Description</label>
                                <input type="text" name="jekell_affiliation2_description" id="jekell_affiliation2_description" class="form-control"
                                    value="{{ old('jekell_affiliation2_description', $jekell_affiliation2_description) }}">
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
                    <label for="jekell_quote" class="form-label">Professional Philosophy/Quote</label>
                    <textarea name="jekell_quote" id="jekell_quote" rows="3" class="form-control"
                        required>{{ old('jekell_quote', $jekell_quote) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.people.jekell.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
