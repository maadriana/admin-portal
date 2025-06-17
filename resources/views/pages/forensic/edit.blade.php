@extends('layouts.master')

@section('title', 'Edit Forensic & Litigation Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Forensic & Litigation Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.forensic.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="forensic_page_title" class="form-label">Page Title</label>
                    <input type="text" name="forensic_page_title" id="forensic_page_title" class="form-control"
                        value="{{ old('forensic_page_title', $forensic_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="forensic_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="forensic_page_subtitle" id="forensic_page_subtitle" rows="2" class="form-control"
                        required>{{ old('forensic_page_subtitle', $forensic_page_subtitle) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Service Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Service Image</h5>
            </div>
            <div class="card-body">
                @php
                    $forensicServiceImage = \App\Models\Content::where('key', 'forensic_service_image')->first();
                @endphp

                @if($forensicServiceImage && $forensicServiceImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($forensicServiceImage->image) }}" alt="Service Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="forensic_service_image" id="forensic_service_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 800x300px</small>

                @if($forensicServiceImage && $forensicServiceImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_forensic_service_image" id="remove_forensic_service_image" value="1">
                    <label class="form-check-label text-danger" for="remove_forensic_service_image">
                        Remove current image
                    </label>
                </div>
                @endif
            </div>
        </div>

        <!-- Service Overview -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Service Overview</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="forensic_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="forensic_overview_title" id="forensic_overview_title" class="form-control"
                        value="{{ old('forensic_overview_title', $forensic_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="forensic_overview_paragraph1" class="form-label">Overview Paragraph</label>
                    <textarea name="forensic_overview_paragraph1" id="forensic_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('forensic_overview_paragraph1', $forensic_overview_paragraph1) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Approach Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Our Approach Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="forensic_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="forensic_approach_title" id="forensic_approach_title" class="form-control"
                        value="{{ old('forensic_approach_title', $forensic_approach_title) }}" required>
                </div>

                <!-- Approach Item 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 1</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="forensic_approach_item1_title" class="form-label">Title</label>
                                <input type="text" name="forensic_approach_item1_title" id="forensic_approach_item1_title" class="form-control"
                                    value="{{ old('forensic_approach_item1_title', $forensic_approach_item1_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="forensic_approach_item1_description" class="form-label">Description</label>
                                <textarea name="forensic_approach_item1_description" id="forensic_approach_item1_description" rows="3" class="form-control"
                                    required>{{ old('forensic_approach_item1_description', $forensic_approach_item1_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approach Item 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 2</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="forensic_approach_item2_title" class="form-label">Title</label>
                                <input type="text" name="forensic_approach_item2_title" id="forensic_approach_item2_title" class="form-control"
                                    value="{{ old('forensic_approach_item2_title', $forensic_approach_item2_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="forensic_approach_item2_description" class="form-label">Description</label>
                                <textarea name="forensic_approach_item2_description" id="forensic_approach_item2_description" rows="3" class="form-control"
                                    required>{{ old('forensic_approach_item2_description', $forensic_approach_item2_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approach Item 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 3</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="forensic_approach_item3_title" class="form-label">Title</label>
                                <input type="text" name="forensic_approach_item3_title" id="forensic_approach_item3_title" class="form-control"
                                    value="{{ old('forensic_approach_item3_title', $forensic_approach_item3_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="forensic_approach_item3_description" class="form-label">Description</label>
                                <textarea name="forensic_approach_item3_description" id="forensic_approach_item3_description" rows="3" class="form-control"
                                    required>{{ old('forensic_approach_item3_description', $forensic_approach_item3_description) }}</textarea>
                            </div>
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
                    <label for="forensic_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="forensic_services_title" id="forensic_services_title" class="form-control"
                        value="{{ old('forensic_services_title', $forensic_services_title) }}" required>
                </div>

                <!-- Service 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Service 1</h6>
                    <div class="mb-3">
                        <label for="forensic_service1" class="form-label">Service 1 Description</label>
                        <textarea name="forensic_service1" id="forensic_service1" rows="2" class="form-control"
                            required>{{ old('forensic_service1', $forensic_service1) }}</textarea>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Service 2</h6>
                    <div class="mb-3">
                        <label for="forensic_service2" class="form-label">Service 2 Description</label>
                        <textarea name="forensic_service2" id="forensic_service2" rows="2" class="form-control"
                            required>{{ old('forensic_service2', $forensic_service2) }}</textarea>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Service 3</h6>
                    <div class="mb-3">
                        <label for="forensic_service3" class="form-label">Service 3 Description</label>
                        <textarea name="forensic_service3" id="forensic_service3" rows="2" class="form-control"
                            required>{{ old('forensic_service3', $forensic_service3) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Call to Action</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="forensic_cta_text" class="form-label">CTA Button Text</label>
                    <input type="text" name="forensic_cta_text" id="forensic_cta_text" class="form-control"
                        value="{{ old('forensic_cta_text', $forensic_cta_text) }}" required>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sidebar Content</h5>
            </div>
            <div class="card-body">
                <!-- CTA Section -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Sidebar Call to Action</h6>
                    <div class="mb-3">
                        <label for="forensic_sidebar_cta_title" class="form-label">Sidebar CTA Title</label>
                        <input type="text" name="forensic_sidebar_cta_title" id="forensic_sidebar_cta_title" class="form-control"
                            value="{{ old('forensic_sidebar_cta_title', $forensic_sidebar_cta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="forensic_sidebar_cta_description" class="form-label">Sidebar CTA Description</label>
                        <textarea name="forensic_sidebar_cta_description" id="forensic_sidebar_cta_description" rows="2" class="form-control"
                            required>{{ old('forensic_sidebar_cta_description', $forensic_sidebar_cta_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="forensic_sidebar_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                        <input type="text" name="forensic_sidebar_cta_button_text" id="forensic_sidebar_cta_button_text" class="form-control"
                            value="{{ old('forensic_sidebar_cta_button_text', $forensic_sidebar_cta_button_text) }}" required>
                    </div>
                </div>

                <!-- Quick Facts -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Quick Facts</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact1_label" class="form-label">Fact 1 Label</label>
                                <input type="text" name="forensic_fact1_label" id="forensic_fact1_label" class="form-control"
                                    value="{{ old('forensic_fact1_label', $forensic_fact1_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact1_value" class="form-label">Fact 1 Value</label>
                                <input type="text" name="forensic_fact1_value" id="forensic_fact1_value" class="form-control"
                                    value="{{ old('forensic_fact1_value', $forensic_fact1_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact2_label" class="form-label">Fact 2 Label</label>
                                <input type="text" name="forensic_fact2_label" id="forensic_fact2_label" class="form-control"
                                    value="{{ old('forensic_fact2_label', $forensic_fact2_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact2_value" class="form-label">Fact 2 Value</label>
                                <input type="text" name="forensic_fact2_value" id="forensic_fact2_value" class="form-control"
                                    value="{{ old('forensic_fact2_value', $forensic_fact2_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact3_label" class="form-label">Fact 3 Label</label>
                                <input type="text" name="forensic_fact3_label" id="forensic_fact3_label" class="form-control"
                                    value="{{ old('forensic_fact3_label', $forensic_fact3_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="forensic_fact3_value" class="form-label">Fact 3 Value</label>
                                <input type="text" name="forensic_fact3_value" id="forensic_fact3_value" class="form-control"
                                    value="{{ old('forensic_fact3_value', $forensic_fact3_value) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Related Services</h6>
                    <div class="mb-3">
                        <label for="forensic_related_title" class="form-label">Related Services Title</label>
                        <input type="text" name="forensic_related_title" id="forensic_related_title" class="form-control"
                            value="{{ old('forensic_related_title', $forensic_related_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="forensic_related_service1" class="form-label">Related Service 1</label>
                        <input type="text" name="forensic_related_service1" id="forensic_related_service1" class="form-control"
                            value="{{ old('forensic_related_service1', $forensic_related_service1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="forensic_related_service2" class="form-label">Related Service 2</label>
                        <input type="text" name="forensic_related_service2" id="forensic_related_service2" class="form-control"
                            value="{{ old('forensic_related_service2', $forensic_related_service2) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="forensic_related_service3" class="form-label">Related Service 3</label>
                        <input type="text" name="forensic_related_service3" id="forensic_related_service3" class="form-control"
                            value="{{ old('forensic_related_service3', $forensic_related_service3) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.forensic.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
