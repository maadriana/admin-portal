@extends('layouts.master')

@section('title', 'Edit Contact Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Contact Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.contact.update') }}">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_main_title" class="form-label">Main Title</label>
                    <input type="text" name="contact_main_title" id="contact_main_title" class="form-control"
                        value="{{ old('contact_main_title', $contact_main_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact_subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="contact_subtitle" id="contact_subtitle" class="form-control"
                        value="{{ old('contact_subtitle', $contact_subtitle) }}" required>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Address Information</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_address_title" class="form-label">Address Section Title</label>
                    <input type="text" name="contact_address_title" id="contact_address_title" class="form-control"
                        value="{{ old('contact_address_title', $contact_address_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_address_line1" class="form-label">Address Line 1</label>
                            <input type="text" name="contact_address_line1" id="contact_address_line1" class="form-control"
                                value="{{ old('contact_address_line1', $contact_address_line1) }}">
                        </div>

                        <div class="mb-3">
                            <label for="contact_address_line2" class="form-label">Address Line 2</label>
                            <input type="text" name="contact_address_line2" id="contact_address_line2" class="form-control"
                                value="{{ old('contact_address_line2', $contact_address_line2) }}">
                        </div>

                        <div class="mb-3">
                            <label for="contact_address_line3" class="form-label">Address Line 3</label>
                            <input type="text" name="contact_address_line3" id="contact_address_line3" class="form-control"
                                value="{{ old('contact_address_line3', $contact_address_line3) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_address_line4" class="form-label">Address Line 4</label>
                            <input type="text" name="contact_address_line4" id="contact_address_line4" class="form-control"
                                value="{{ old('contact_address_line4', $contact_address_line4) }}">
                        </div>

                        <div class="mb-3">
                            <label for="contact_address_line5" class="form-label">Address Line 5</label>
                            <input type="text" name="contact_address_line5" id="contact_address_line5" class="form-control"
                                value="{{ old('contact_address_line5', $contact_address_line5) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phone Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Phone Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_phone_title" class="form-label">Phone Section Title</label>
                            <input type="text" name="contact_phone_title" id="contact_phone_title" class="form-control"
                                value="{{ old('contact_phone_title', $contact_phone_title) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="contact_phone_number" id="contact_phone_number" class="form-control"
                                value="{{ old('contact_phone_number', $contact_phone_number) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Email Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_email_title" class="form-label">Email Section Title</label>
                            <input type="text" name="contact_email_title" id="contact_email_title" class="form-control"
                                value="{{ old('contact_email_title', $contact_email_title) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_email_address" class="form-label">Email Address</label>
                            <input type="email" name="contact_email_address" id="contact_email_address" class="form-control"
                                value="{{ old('contact_email_address', $contact_email_address) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Settings -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Map Settings</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_map_embed_url" class="form-label">Google Maps Embed URL</label>
                    <textarea name="contact_map_embed_url" id="contact_map_embed_url" rows="3" class="form-control"
                        required>{{ old('contact_map_embed_url', $contact_map_embed_url) }}</textarea>
                    <small class="form-text text-muted">
                        Get the embed URL from Google Maps by clicking "Share" → "Embed a map" → Copy the src URL only
                    </small>
                </div>
            </div>
        </div>

        <!-- Contact Form Labels -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Form Labels</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_form_name_label" class="form-label">Name Field Label</label>
                            <input type="text" name="contact_form_name_label" id="contact_form_name_label" class="form-control"
                                value="{{ old('contact_form_name_label', $contact_form_name_label) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_form_email_label" class="form-label">Email Field Label</label>
                            <input type="text" name="contact_form_email_label" id="contact_form_email_label" class="form-control"
                                value="{{ old('contact_form_email_label', $contact_form_email_label) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_form_subject_label" class="form-label">Subject Field Label</label>
                            <input type="text" name="contact_form_subject_label" id="contact_form_subject_label" class="form-control"
                                value="{{ old('contact_form_subject_label', $contact_form_subject_label) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_form_message_label" class="form-label">Message Field Label</label>
                            <input type="text" name="contact_form_message_label" id="contact_form_message_label" class="form-control"
                                value="{{ old('contact_form_message_label', $contact_form_message_label) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_form_button_text" class="form-label">Submit Button Text</label>
                            <input type="text" name="contact_form_button_text" id="contact_form_button_text" class="form-control"
                                value="{{ old('contact_form_button_text', $contact_form_button_text) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Success & Error Messages</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_success_message" class="form-label">Success Message</label>
                    <textarea name="contact_success_message" id="contact_success_message" rows="3" class="form-control"
                        required>{{ old('contact_success_message', $contact_success_message) }}</textarea>
                    <small class="form-text text-muted">Message shown when contact form is submitted successfully</small>
                </div>

                <div class="mb-3">
                    <label for="contact_error_message" class="form-label">Error Message</label>
                    <textarea name="contact_error_message" id="contact_error_message" rows="3" class="form-control"
                        required>{{ old('contact_error_message', $contact_error_message) }}</textarea>
                    <small class="form-text text-muted">Message shown when there's an error sending the contact form</small>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.contact.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

@endsection
