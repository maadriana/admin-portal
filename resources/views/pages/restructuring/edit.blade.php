@extends('layouts.master')

@section('title', 'Edit Business Restructuring Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Business Restructuring Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.restructuring.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="restructuring_page_title" class="form-label">Page Title</label>
                    <input type="text" name="restructuring_page_title" id="restructuring_page_title" class="form-control"
                        value="{{ old('restructuring_page_title', $restructuring_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="restructuring_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="restructuring_page_subtitle" id="restructuring_page_subtitle" rows="2" class="form-control"
                        required>{{ old('restructuring_page_subtitle', $restructuring_page_subtitle) }}</textarea>
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
                    $restructuringServiceImage = \App\Models\Content::where('key', 'restructuring_service_image')->first();
                @endphp

                @if($restructuringServiceImage && $restructuringServiceImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($restructuringServiceImage->image) }}" alt="Service Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="restructuring_service_image" id="restructuring_service_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 800x300px</small>

                @if($restructuringServiceImage && $restructuringServiceImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_restructuring_service_image" id="remove_restructuring_service_image" value="1">
                    <label class="form-check-label text-danger" for="remove_restructuring_service_image">
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
                    <label for="restructuring_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="restructuring_overview_title" id="restructuring_overview_title" class="form-control"
                        value="{{ old('restructuring_overview_title', $restructuring_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="restructuring_overview_paragraph" class="form-label">Overview Paragraph</label>
                    <textarea name="restructuring_overview_paragraph" id="restructuring_overview_paragraph" rows="3" class="form-control"
                        required>{{ old('restructuring_overview_paragraph', $restructuring_overview_paragraph) }}</textarea>
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
                    <label for="restructuring_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="restructuring_approach_title" id="restructuring_approach_title" class="form-control"
                        value="{{ old('restructuring_approach_title', $restructuring_approach_title) }}" required>
                </div>

                <!-- Approach Item 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 1</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="restructuring_approach_item1_title" class="form-label">Title</label>
                                <input type="text" name="restructuring_approach_item1_title" id="restructuring_approach_item1_title" class="form-control"
                                    value="{{ old('restructuring_approach_item1_title', $restructuring_approach_item1_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="restructuring_approach_item1_description" class="form-label">Description</label>
                                <textarea name="restructuring_approach_item1_description" id="restructuring_approach_item1_description" rows="3" class="form-control"
                                    required>{{ old('restructuring_approach_item1_description', $restructuring_approach_item1_description) }}</textarea>
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
                                <label for="restructuring_approach_item2_title" class="form-label">Title</label>
                                <input type="text" name="restructuring_approach_item2_title" id="restructuring_approach_item2_title" class="form-control"
                                    value="{{ old('restructuring_approach_item2_title', $restructuring_approach_item2_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="restructuring_approach_item2_description" class="form-label">Description</label>
                                <textarea name="restructuring_approach_item2_description" id="restructuring_approach_item2_description" rows="3" class="form-control"
                                    required>{{ old('restructuring_approach_item2_description', $restructuring_approach_item2_description) }}</textarea>
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
                                <label for="restructuring_approach_item3_title" class="form-label">Title</label>
                                <input type="text" name="restructuring_approach_item3_title" id="restructuring_approach_item3_title" class="form-control"
                                    value="{{ old('restructuring_approach_item3_title', $restructuring_approach_item3_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="restructuring_approach_item3_description" class="form-label">Description</label>
                                <textarea name="restructuring_approach_item3_description" id="restructuring_approach_item3_description" rows="3" class="form-control"
                                    required>{{ old('restructuring_approach_item3_description', $restructuring_approach_item3_description) }}</textarea>
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
                    <label for="restructuring_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="restructuring_services_title" id="restructuring_services_title" class="form-control"
                        value="{{ old('restructuring_services_title', $restructuring_services_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="restructuring_service1" class="form-label">Service 1</label>
                            <input type="text" name="restructuring_service1" id="restructuring_service1" class="form-control"
                                value="{{ old('restructuring_service1', $restructuring_service1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="restructuring_service2" class="form-label">Service 2</label>
                            <input type="text" name="restructuring_service2" id="restructuring_service2" class="form-control"
                                value="{{ old('restructuring_service2', $restructuring_service2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="restructuring_service3" class="form-label">Service 3</label>
                            <input type="text" name="restructuring_service3" id="restructuring_service3" class="form-control"
                                value="{{ old('restructuring_service3', $restructuring_service3) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="restructuring_service4" class="form-label">Service 4</label>
                            <input type="text" name="restructuring_service4" id="restructuring_service4" class="form-control"
                                value="{{ old('restructuring_service4', $restructuring_service4) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Benefits Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="restructuring_benefits_title" class="form-label">Benefits Section Title</label>
                    <input type="text" name="restructuring_benefits_title" id="restructuring_benefits_title" class="form-control"
                        value="{{ old('restructuring_benefits_title', $restructuring_benefits_title) }}" required>
                </div>

                <div class="row">
                    <!-- Benefit 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 1</h6>
                            <div class="mb-3">
                                <label for="restructuring_benefit1_title" class="form-label">Title</label>
                                <input type="text" name="restructuring_benefit1_title" id="restructuring_benefit1_title" class="form-control"
                                    value="{{ old('restructuring_benefit1_title', $restructuring_benefit1_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="restructuring_benefit1_description" class="form-label">Description</label>
                                <textarea name="restructuring_benefit1_description" id="restructuring_benefit1_description" rows="3" class="form-control"
                                    required>{{ old('restructuring_benefit1_description', $restructuring_benefit1_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 2</h6>
                            <div class="mb-3">
                                <label for="restructuring_benefit2_title" class="form-label">Title</label>
                                <input type="text" name="restructuring_benefit2_title" id="restructuring_benefit2_title" class="form-control"
                                    value="{{ old('restructuring_benefit2_title', $restructuring_benefit2_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="restructuring_benefit2_description" class="form-label">Description</label>
                                <textarea name="restructuring_benefit2_description" id="restructuring_benefit2_description" rows="3" class="form-control"
                                    required>{{ old('restructuring_benefit2_description', $restructuring_benefit2_description) }}</textarea>
                            </div>
                        </div>
                    </div>
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
                    <h6 class="text-primary mb-3">Call to Action</h6>
                    <div class="mb-3">
                        <label for="restructuring_cta_title" class="form-label">CTA Title</label>
                        <input type="text" name="restructuring_cta_title" id="restructuring_cta_title" class="form-control"
                            value="{{ old('restructuring_cta_title', $restructuring_cta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restructuring_cta_description" class="form-label">CTA Description</label>
                        <textarea name="restructuring_cta_description" id="restructuring_cta_description" rows="2" class="form-control"
                            required>{{ old('restructuring_cta_description', $restructuring_cta_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="restructuring_cta_button_text" class="form-label">CTA Button Text</label>
                        <input type="text" name="restructuring_cta_button_text" id="restructuring_cta_button_text" class="form-control"
                            value="{{ old('restructuring_cta_button_text', $restructuring_cta_button_text) }}" required>
                    </div>
                </div>

                <!-- Quick Facts -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Quick Facts</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact1_label" class="form-label">Fact 1 Label</label>
                                <input type="text" name="restructuring_fact1_label" id="restructuring_fact1_label" class="form-control"
                                    value="{{ old('restructuring_fact1_label', $restructuring_fact1_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact1_value" class="form-label">Fact 1 Value</label>
                                <input type="text" name="restructuring_fact1_value" id="restructuring_fact1_value" class="form-control"
                                    value="{{ old('restructuring_fact1_value', $restructuring_fact1_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact2_label" class="form-label">Fact 2 Label</label>
                                <input type="text" name="restructuring_fact2_label" id="restructuring_fact2_label" class="form-control"
                                    value="{{ old('restructuring_fact2_label', $restructuring_fact2_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact2_value" class="form-label">Fact 2 Value</label>
                                <input type="text" name="restructuring_fact2_value" id="restructuring_fact2_value" class="form-control"
                                    value="{{ old('restructuring_fact2_value', $restructuring_fact2_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact3_label" class="form-label">Fact 3 Label</label>
                                <input type="text" name="restructuring_fact3_label" id="restructuring_fact3_label" class="form-control"
                                    value="{{ old('restructuring_fact3_label', $restructuring_fact3_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restructuring_fact3_value" class="form-label">Fact 3 Value</label>
                                <input type="text" name="restructuring_fact3_value" id="restructuring_fact3_value" class="form-control"
                                    value="{{ old('restructuring_fact3_value', $restructuring_fact3_value) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Related Services</h6>
                    <div class="mb-3">
                        <label for="restructuring_related_service1" class="form-label">Related Service 1</label>
                        <input type="text" name="restructuring_related_service1" id="restructuring_related_service1" class="form-control"
                            value="{{ old('restructuring_related_service1', $restructuring_related_service1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restructuring_related_service2" class="form-label">Related Service 2</label>
                        <input type="text" name="restructuring_related_service2" id="restructuring_related_service2" class="form-control"
                            value="{{ old('restructuring_related_service2', $restructuring_related_service2) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restructuring_related_service3" class="form-label">Related Service 3</label>
                        <input type="text" name="restructuring_related_service3" id="restructuring_related_service3" class="form-control"
                            value="{{ old('restructuring_related_service3', $restructuring_related_service3) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.restructuring.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
