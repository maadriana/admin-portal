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

        <!-- Industry Experience -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Industry Experience (12 Industries)</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @for($i = 1; $i <= 12; $i++)
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pamela_industry{{ $i }}" class="form-label">
                                Industry {{ $i }}
                                @if($i > 4) <small class="text-muted">(Optional)</small> @endif
                            </label>
                            <input type="text" name="pamela_industry{{ $i }}" id="pamela_industry{{ $i }}" class="form-control"
                                value="{{ old('pamela_industry' . $i, ${'pamela_industry' . $i}) }}"
                                {{ $i <= 4 ? 'required' : '' }}>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Career Timeline -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Career Timeline</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Timeline 1 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Timeline 1 (Current)</h6>
                            <div class="mb-3">
                                <label for="pamela_timeline1_period" class="form-label">Time Period</label>
                                <input type="text" name="pamela_timeline1_period" id="pamela_timeline1_period" class="form-control"
                                    value="{{ old('pamela_timeline1_period', $pamela_timeline1_period) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_timeline1_position" class="form-label">Position/Role</label>
                                <input type="text" name="pamela_timeline1_position" id="pamela_timeline1_position" class="form-control"
                                    value="{{ old('pamela_timeline1_position', $pamela_timeline1_position) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline 2 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Timeline 2 (Corporate)</h6>
                            <div class="mb-3">
                                <label for="pamela_timeline2_period" class="form-label">Time Period</label>
                                <input type="text" name="pamela_timeline2_period" id="pamela_timeline2_period" class="form-control"
                                    value="{{ old('pamela_timeline2_period', $pamela_timeline2_period) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_timeline2_position" class="form-label">Position/Role</label>
                                <input type="text" name="pamela_timeline2_position" id="pamela_timeline2_position" class="form-control"
                                    value="{{ old('pamela_timeline2_position', $pamela_timeline2_position) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline 3 -->
                    <div class="col-md-4">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Timeline 3 (Foundation)</h6>
                            <div class="mb-3">
                                <label for="pamela_timeline3_period" class="form-label">Time Period</label>
                                <input type="text" name="pamela_timeline3_period" id="pamela_timeline3_period" class="form-control"
                                    value="{{ old('pamela_timeline3_period', $pamela_timeline3_period) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="pamela_timeline3_position" class="form-label">Position/Role</label>
                                <input type="text" name="pamela_timeline3_position" id="pamela_timeline3_position" class="form-control"
                                    value="{{ old('pamela_timeline3_position', $pamela_timeline3_position) }}" required>
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

        <!-- Core Expertise -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Core Expertise</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_expertise1" class="form-label">Expertise 1</label>
                            <input type="text" name="pamela_expertise1" id="pamela_expertise1" class="form-control"
                                value="{{ old('pamela_expertise1', $pamela_expertise1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_expertise2" class="form-label">Expertise 2</label>
                            <input type="text" name="pamela_expertise2" id="pamela_expertise2" class="form-control"
                                value="{{ old('pamela_expertise2', $pamela_expertise2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_expertise3" class="form-label">Expertise 3</label>
                            <input type="text" name="pamela_expertise3" id="pamela_expertise3" class="form-control"
                                value="{{ old('pamela_expertise3', $pamela_expertise3) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pamela_expertise4" class="form-label">Expertise 4</label>
                            <input type="text" name="pamela_expertise4" id="pamela_expertise4" class="form-control"
                                value="{{ old('pamela_expertise4', $pamela_expertise4) }}" required>
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
