@extends('layouts.master')

@section('title', 'Edit Footer Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Footer Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.footer.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Company Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Company Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Logo -->
                        <div class="mb-3">
                            <label for="footer_logo" class="form-label">Footer Logo</label>

                            @php
                                $footerLogo = \App\Models\Content::where('key', 'footer_logo')->first();
                            @endphp

                            @if($footerLogo && $footerLogo->image)
                            <div class="mb-2">
                                <img src="data:image/jpeg;base64,{{ base64_encode($footerLogo->image) }}" alt="Footer Logo"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                            @endif

                            <input type="file" name="footer_logo" id="footer_logo" class="form-control">
                            <small class="form-text text-muted">Recommended: PNG format with transparent background, height: 40-60px</small>

                            @if($footerLogo && $footerLogo->image)
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_footer_logo" id="remove_footer_logo" value="1">
                                <label class="form-check-label text-danger" for="remove_footer_logo">
                                    Remove current logo (will use default)
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Contact Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="footer_phone" class="form-label">Phone Number</label>
                                    <input type="text" name="footer_phone" id="footer_phone" class="form-control"
                                        value="{{ old('footer_phone', $footer_phone) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="footer_email" class="form-label">Email Address</label>
                                    <input type="email" name="footer_email" id="footer_email" class="form-control"
                                        value="{{ old('footer_email', $footer_email) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_address_line1" class="form-label">Address Line 1</label>
                            <input type="text" name="footer_address_line1" id="footer_address_line1" class="form-control"
                                value="{{ old('footer_address_line1', $footer_address_line1) }}">
                        </div>

                        <div class="mb-3">
                            <label for="footer_address_line2" class="form-label">Address Line 2</label>
                            <input type="text" name="footer_address_line2" id="footer_address_line2" class="form-control"
                                value="{{ old('footer_address_line2', $footer_address_line2) }}">
                        </div>

                        <div class="mb-3">
                            <label for="footer_address_line3" class="form-label">Address Line 3</label>
                            <input type="text" name="footer_address_line3" id="footer_address_line3" class="form-control"
                                value="{{ old('footer_address_line3', $footer_address_line3) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_address_line4" class="form-label">Address Line 4</label>
                            <input type="text" name="footer_address_line4" id="footer_address_line4" class="form-control"
                                value="{{ old('footer_address_line4', $footer_address_line4) }}">
                        </div>

                        <div class="mb-3">
                            <label for="footer_address_line5" class="form-label">Address Line 5</label>
                            <input type="text" name="footer_address_line5" id="footer_address_line5" class="form-control"
                                value="{{ old('footer_address_line5', $footer_address_line5) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Useful Links Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Useful Links Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="footer_useful_links_title" class="form-label">Section Title</label>
                    <input type="text" name="footer_useful_links_title" id="footer_useful_links_title" class="form-control"
                        value="{{ old('footer_useful_links_title', $footer_useful_links_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_link1_text" class="form-label">Link 1 Text</label>
                            <input type="text" name="footer_link1_text" id="footer_link1_text" class="form-control"
                                value="{{ old('footer_link1_text', $footer_link1_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_link2_text" class="form-label">Link 2 Text</label>
                            <input type="text" name="footer_link2_text" id="footer_link2_text" class="form-control"
                                value="{{ old('footer_link2_text', $footer_link2_text) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_link3_text" class="form-label">Link 3 Text</label>
                            <input type="text" name="footer_link3_text" id="footer_link3_text" class="form-control"
                                value="{{ old('footer_link3_text', $footer_link3_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_link4_text" class="form-label">Link 4 Text</label>
                            <input type="text" name="footer_link4_text" id="footer_link4_text" class="form-control"
                                value="{{ old('footer_link4_text', $footer_link4_text) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Services Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="footer_services_title" class="form-label">Section Title</label>
                    <input type="text" name="footer_services_title" id="footer_services_title" class="form-control"
                        value="{{ old('footer_services_title', $footer_services_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_service1_text" class="form-label">Service 1 Text</label>
                            <input type="text" name="footer_service1_text" id="footer_service1_text" class="form-control"
                                value="{{ old('footer_service1_text', $footer_service1_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service2_text" class="form-label">Service 2 Text</label>
                            <input type="text" name="footer_service2_text" id="footer_service2_text" class="form-control"
                                value="{{ old('footer_service2_text', $footer_service2_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service3_text" class="form-label">Service 3 Text</label>
                            <input type="text" name="footer_service3_text" id="footer_service3_text" class="form-control"
                                value="{{ old('footer_service3_text', $footer_service3_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service4_text" class="form-label">Service 4 Text</label>
                            <input type="text" name="footer_service4_text" id="footer_service4_text" class="form-control"
                                value="{{ old('footer_service4_text', $footer_service4_text) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_service5_text" class="form-label">Service 5 Text</label>
                            <input type="text" name="footer_service5_text" id="footer_service5_text" class="form-control"
                                value="{{ old('footer_service5_text', $footer_service5_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service6_text" class="form-label">Service 6 Text</label>
                            <input type="text" name="footer_service6_text" id="footer_service6_text" class="form-control"
                                value="{{ old('footer_service6_text', $footer_service6_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service7_text" class="form-label">Service 7 Text</label>
                            <input type="text" name="footer_service7_text" id="footer_service7_text" class="form-control"
                                value="{{ old('footer_service7_text', $footer_service7_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_service8_text" class="form-label">Service 8 Text</label>
                            <input type="text" name="footer_service8_text" id="footer_service8_text" class="form-control"
                                value="{{ old('footer_service8_text', $footer_service8_text) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="footer_contact_title" class="form-label">Contact Title</label>
                    <input type="text" name="footer_contact_title" id="footer_contact_title" class="form-control"
                        value="{{ old('footer_contact_title', $footer_contact_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="footer_contact_description" class="form-label">Contact Description</label>
                    <textarea name="footer_contact_description" id="footer_contact_description" rows="3" class="form-control"
                        required>{{ old('footer_contact_description', $footer_contact_description) }}</textarea>
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
                            <label for="footer_social_twitter" class="form-label">Twitter URL</label>
                            <input type="url" name="footer_social_twitter" id="footer_social_twitter" class="form-control"
                                value="{{ old('footer_social_twitter', $footer_social_twitter) }}" placeholder="https://twitter.com/username">
                            <small class="form-text text-muted">Leave empty to hide social link</small>
                        </div>

                        <div class="mb-3">
                            <label for="footer_social_facebook" class="form-label">Facebook URL</label>
                            <input type="url" name="footer_social_facebook" id="footer_social_facebook" class="form-control"
                                value="{{ old('footer_social_facebook', $footer_social_facebook) }}" placeholder="https://facebook.com/username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_social_instagram" class="form-label">Instagram URL</label>
                            <input type="url" name="footer_social_instagram" id="footer_social_instagram" class="form-control"
                                value="{{ old('footer_social_instagram', $footer_social_instagram) }}" placeholder="https://instagram.com/username">
                        </div>

                        <div class="mb-3">
                            <label for="footer_social_linkedin" class="form-label">LinkedIn URL</label>
                            <input type="url" name="footer_social_linkedin" id="footer_social_linkedin" class="form-control"
                                value="{{ old('footer_social_linkedin', $footer_social_linkedin) }}" placeholder="https://linkedin.com/company/username">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Copyright Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_copyright_text" class="form-label">Copyright Text</label>
                            <input type="text" name="footer_copyright_text" id="footer_copyright_text" class="form-control"
                                value="{{ old('footer_copyright_text', $footer_copyright_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_company_name" class="form-label">Company Name</label>
                            <input type="text" name="footer_company_name" id="footer_company_name" class="form-control"
                                value="{{ old('footer_company_name', $footer_company_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_rights_text" class="form-label">Rights Text</label>
                            <input type="text" name="footer_rights_text" id="footer_rights_text" class="form-control"
                                value="{{ old('footer_rights_text', $footer_rights_text) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="footer_credits_text" class="form-label">Credits Text</label>
                            <input type="text" name="footer_credits_text" id="footer_credits_text" class="form-control"
                                value="{{ old('footer_credits_text', $footer_credits_text) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_credits_name" class="form-label">Credits Name</label>
                            <input type="text" name="footer_credits_name" id="footer_credits_name" class="form-control"
                                value="{{ old('footer_credits_name', $footer_credits_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="footer_credits_link" class="form-label">Credits Link URL</label>
                            <input type="url" name="footer_credits_link" id="footer_credits_link" class="form-control"
                                value="{{ old('footer_credits_link', $footer_credits_link) }}" placeholder="https://github.com/username">
                            <small class="form-text text-muted">Leave empty to disable link</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.footer.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

@endsection
