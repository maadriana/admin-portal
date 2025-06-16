@extends('layouts.master')

@section('title', 'Edit Header Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Header & Navigation Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.header.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Top Bar Contact Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Top Bar Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header_contact_email" class="form-label">Contact Email</label>
                            <input type="email" name="header_contact_email" id="header_contact_email" class="form-control"
                                value="{{ old('header_contact_email', $header_contact_email) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header_contact_phone" class="form-label">Contact Phone</label>
                            <input type="text" name="header_contact_phone" id="header_contact_phone" class="form-control"
                                value="{{ old('header_contact_phone', $header_contact_phone) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Social Media Links</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header_social_twitter" class="form-label">Twitter URL</label>
                            <input type="url" name="header_social_twitter" id="header_social_twitter" class="form-control"
                                value="{{ old('header_social_twitter', $header_social_twitter) }}" placeholder="https://twitter.com/username">
                            <small class="form-text text-muted">Leave empty to hide social link</small>
                        </div>

                        <div class="mb-3">
                            <label for="header_social_facebook" class="form-label">Facebook URL</label>
                            <input type="url" name="header_social_facebook" id="header_social_facebook" class="form-control"
                                value="{{ old('header_social_facebook', $header_social_facebook) }}" placeholder="https://facebook.com/username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="header_social_instagram" class="form-label">Instagram URL</label>
                            <input type="url" name="header_social_instagram" id="header_social_instagram" class="form-control"
                                value="{{ old('header_social_instagram', $header_social_instagram) }}" placeholder="https://instagram.com/username">
                        </div>

                        <div class="mb-3">
                            <label for="header_social_linkedin" class="form-label">LinkedIn URL</label>
                            <input type="url" name="header_social_linkedin" id="header_social_linkedin" class="form-control"
                                value="{{ old('header_social_linkedin', $header_social_linkedin) }}" placeholder="https://linkedin.com/company/username">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Logo -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Company Logo</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="header_logo" class="form-label">Company Logo</label>

                            @php
                                $logoImage = \App\Models\Content::where('key', 'header_logo')->first();
                            @endphp

                            @if($logoImage && $logoImage->image)
                            <div class="mb-2">
                                <img src="data:image/jpeg;base64,{{ base64_encode($logoImage->image) }}" alt="Company Logo"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                            @endif

                            <input type="file" name="header_logo" id="header_logo" class="form-control">
                            <small class="form-text text-muted">Recommended: PNG format with transparent background, height: 40-60px</small>

                            @if($logoImage && $logoImage->image)
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_header_logo" id="remove_header_logo" value="1">
                                <label class="form-check-label text-danger" for="remove_header_logo">
                                    Remove current logo (will use default)
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation Menu -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Main Navigation Menu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nav_home_text" class="form-label">Home Menu Text</label>
                            <input type="text" name="nav_home_text" id="nav_home_text" class="form-control"
                                value="{{ old('nav_home_text', $nav_home_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_services_text" class="form-label">Services Menu Text</label>
                            <input type="text" name="nav_services_text" id="nav_services_text" class="form-control"
                                value="{{ old('nav_services_text', $nav_services_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_people_text" class="form-label">People Menu Text</label>
                            <input type="text" name="nav_people_text" id="nav_people_text" class="form-control"
                                value="{{ old('nav_people_text', $nav_people_text) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nav_careers_text" class="form-label">Careers Menu Text</label>
                            <input type="text" name="nav_careers_text" id="nav_careers_text" class="form-control"
                                value="{{ old('nav_careers_text', $nav_careers_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_international_text" class="form-label">International Menu Text</label>
                            <input type="text" name="nav_international_text" id="nav_international_text" class="form-control"
                                value="{{ old('nav_international_text', $nav_international_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_contact_text" class="form-label">Contact Menu Text</label>
                            <input type="text" name="nav_contact_text" id="nav_contact_text" class="form-control"
                                value="{{ old('nav_contact_text', $nav_contact_text) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nav_about_text" class="form-label">About Menu Text</label>
                            <input type="text" name="nav_about_text" id="nav_about_text" class="form-control"
                                value="{{ old('nav_about_text', $nav_about_text) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Submenu -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Services Submenu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nav_service_audit" class="form-label">Audit and Assurance</label>
                            <input type="text" name="nav_service_audit" id="nav_service_audit" class="form-control"
                                value="{{ old('nav_service_audit', $nav_service_audit) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_advisory" class="form-label">Business Advisory</label>
                            <input type="text" name="nav_service_advisory" id="nav_service_advisory" class="form-control"
                                value="{{ old('nav_service_advisory', $nav_service_advisory) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_outsourcing" class="form-label">Outsourcing</label>
                            <input type="text" name="nav_service_outsourcing" id="nav_service_outsourcing" class="form-control"
                                value="{{ old('nav_service_outsourcing', $nav_service_outsourcing) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_restructuring" class="form-label">Business Restructuring</label>
                            <input type="text" name="nav_service_restructuring" id="nav_service_restructuring" class="form-control"
                                value="{{ old('nav_service_restructuring', $nav_service_restructuring) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nav_service_finance" class="form-label">Corporate Finance</label>
                            <input type="text" name="nav_service_finance" id="nav_service_finance" class="form-control"
                                value="{{ old('nav_service_finance', $nav_service_finance) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_forensic" class="form-label">Forensic</label>
                            <input type="text" name="nav_service_forensic" id="nav_service_forensic" class="form-control"
                                value="{{ old('nav_service_forensic', $nav_service_forensic) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_governance" class="form-label">Governance</label>
                            <input type="text" name="nav_service_governance" id="nav_service_governance" class="form-control"
                                value="{{ old('nav_service_governance', $nav_service_governance) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_service_taxation" class="form-label">Taxation</label>
                            <input type="text" name="nav_service_taxation" id="nav_service_taxation" class="form-control"
                                value="{{ old('nav_service_taxation', $nav_service_taxation) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Careers Submenu -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Careers Submenu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nav_career_vacancies" class="form-label">Current Vacancies</label>
                            <input type="text" name="nav_career_vacancies" id="nav_career_vacancies" class="form-control"
                                value="{{ old('nav_career_vacancies', $nav_career_vacancies) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_career_professionals" class="form-label">Experienced Professionals</label>
                            <input type="text" name="nav_career_professionals" id="nav_career_professionals" class="form-control"
                                value="{{ old('nav_career_professionals', $nav_career_professionals) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nav_career_graduate" class="form-label">Graduate</label>
                            <input type="text" name="nav_career_graduate" id="nav_career_graduate" class="form-control"
                                value="{{ old('nav_career_graduate', $nav_career_graduate) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nav_career_internship" class="form-label">Internship Opportunities</label>
                            <input type="text" name="nav_career_internship" id="nav_career_internship" class="form-control"
                                value="{{ old('nav_career_internship', $nav_career_internship) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.header.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

@endsection
