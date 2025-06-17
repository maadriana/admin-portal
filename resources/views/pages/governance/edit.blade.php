@extends('layouts.master')

@section('title', 'Edit Governance Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Governance Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.governance.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="governance_page_title" class="form-label">Page Title</label>
                    <input type="text" name="governance_page_title" id="governance_page_title" class="form-control"
                        value="{{ old('governance_page_title', $governance_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="governance_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="governance_page_subtitle" id="governance_page_subtitle" rows="2" class="form-control"
                        required>{{ old('governance_page_subtitle', $governance_page_subtitle) }}</textarea>
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
                    $governanceServiceImage = \App\Models\Content::where('key', 'governance_service_image')->first();
                @endphp

                @if($governanceServiceImage && $governanceServiceImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($governanceServiceImage->image) }}" alt="Service Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="governance_service_image" id="governance_service_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 800x300px</small>

                @if($governanceServiceImage && $governanceServiceImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_governance_service_image" id="remove_governance_service_image" value="1">
                    <label class="form-check-label text-danger" for="remove_governance_service_image">
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
                    <label for="governance_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="governance_overview_title" id="governance_overview_title" class="form-control"
                        value="{{ old('governance_overview_title', $governance_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="governance_overview_paragraph1" class="form-label">Overview Paragraph 1</label>
                    <textarea name="governance_overview_paragraph1" id="governance_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('governance_overview_paragraph1', $governance_overview_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="governance_overview_paragraph2" class="form-label">Overview Paragraph 2</label>
                    <textarea name="governance_overview_paragraph2" id="governance_overview_paragraph2" rows="3" class="form-control"
                        required>{{ old('governance_overview_paragraph2', $governance_overview_paragraph2) }}</textarea>
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
                    <label for="governance_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="governance_approach_title" id="governance_approach_title" class="form-control"
                        value="{{ old('governance_approach_title', $governance_approach_title) }}" required>
                </div>

                <!-- Approach Item 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 1</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="governance_approach_item1_title" class="form-label">Title</label>
                                <input type="text" name="governance_approach_item1_title" id="governance_approach_item1_title" class="form-control"
                                    value="{{ old('governance_approach_item1_title', $governance_approach_item1_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="governance_approach_item1_description" class="form-label">Description</label>
                                <textarea name="governance_approach_item1_description" id="governance_approach_item1_description" rows="3" class="form-control"
                                    required>{{ old('governance_approach_item1_description', $governance_approach_item1_description) }}</textarea>
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
                                <label for="governance_approach_item2_title" class="form-label">Title</label>
                                <input type="text" name="governance_approach_item2_title" id="governance_approach_item2_title" class="form-control"
                                    value="{{ old('governance_approach_item2_title', $governance_approach_item2_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="governance_approach_item2_description" class="form-label">Description</label>
                                <textarea name="governance_approach_item2_description" id="governance_approach_item2_description" rows="3" class="form-control"
                                    required>{{ old('governance_approach_item2_description', $governance_approach_item2_description) }}</textarea>
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
                                <label for="governance_approach_item3_title" class="form-label">Title</label>
                                <input type="text" name="governance_approach_item3_title" id="governance_approach_item3_title" class="form-control"
                                    value="{{ old('governance_approach_item3_title', $governance_approach_item3_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="governance_approach_item3_description" class="form-label">Description</label>
                                <textarea name="governance_approach_item3_description" id="governance_approach_item3_description" rows="3" class="form-control"
                                    required>{{ old('governance_approach_item3_description', $governance_approach_item3_description) }}</textarea>
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
                    <label for="governance_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="governance_services_title" id="governance_services_title" class="form-control"
                        value="{{ old('governance_services_title', $governance_services_title) }}" required>
                </div>

                <!-- Service 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Service 1</h6>
                    <div class="mb-3">
                        <label for="governance_service1_title" class="form-label">Service 1 Title</label>
                        <input type="text" name="governance_service1_title" id="governance_service1_title" class="form-control"
                            value="{{ old('governance_service1_title', $governance_service1_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="governance_service1_description" class="form-label">Service 1 Description</label>
                        <textarea name="governance_service1_description" id="governance_service1_description" rows="3" class="form-control"
                            required>{{ old('governance_service1_description', $governance_service1_description) }}</textarea>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Service 2</h6>
                    <div class="mb-3">
                        <label for="governance_service2_title" class="form-label">Service 2 Title</label>
                        <input type="text" name="governance_service2_title" id="governance_service2_title" class="form-control"
                            value="{{ old('governance_service2_title', $governance_service2_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="governance_service2_description" class="form-label">Service 2 Description</label>
                        <textarea name="governance_service2_description" id="governance_service2_description" rows="3" class="form-control"
                            required>{{ old('governance_service2_description', $governance_service2_description) }}</textarea>
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
                    <label for="governance_benefits_title" class="form-label">Benefits Section Title</label>
                    <input type="text" name="governance_benefits_title" id="governance_benefits_title" class="form-control"
                        value="{{ old('governance_benefits_title', $governance_benefits_title) }}" required>
                </div>

                <div class="row">
                    <!-- Benefit 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 1</h6>
                            <div class="mb-3">
                                <label for="governance_benefit1_title" class="form-label">Title</label>
                                <input type="text" name="governance_benefit1_title" id="governance_benefit1_title" class="form-control"
                                    value="{{ old('governance_benefit1_title', $governance_benefit1_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="governance_benefit1_description" class="form-label">Description</label>
                                <textarea name="governance_benefit1_description" id="governance_benefit1_description" rows="2" class="form-control"
                                    required>{{ old('governance_benefit1_description', $governance_benefit1_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 2</h6>
                            <div class="mb-3">
                                <label for="governance_benefit2_title" class="form-label">Title</label>
                                <input type="text" name="governance_benefit2_title" id="governance_benefit2_title" class="form-control"
                                    value="{{ old('governance_benefit2_title', $governance_benefit2_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="governance_benefit2_description" class="form-label">Description</label>
                                <textarea name="governance_benefit2_description" id="governance_benefit2_description" rows="2" class="form-control"
                                    required>{{ old('governance_benefit2_description', $governance_benefit2_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 3 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 3</h6>
                            <div class="mb-3">
                                <label for="governance_benefit3_title" class="form-label">Title</label>
                                <input type="text" name="governance_benefit3_title" id="governance_benefit3_title" class="form-control"
                                    value="{{ old('governance_benefit3_title', $governance_benefit3_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="governance_benefit3_description" class="form-label">Description</label>
                                <textarea name="governance_benefit3_description" id="governance_benefit3_description" rows="2" class="form-control"
                                    required>{{ old('governance_benefit3_description', $governance_benefit3_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 4 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 4</h6>
                            <div class="mb-3">
                                <label for="governance_benefit4_title" class="form-label">Title</label>
                                <input type="text" name="governance_benefit4_title" id="governance_benefit4_title" class="form-control"
                                    value="{{ old('governance_benefit4_title', $governance_benefit4_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="governance_benefit4_description" class="form-label">Description</label>
                                <textarea name="governance_benefit4_description" id="governance_benefit4_description" rows="2" class="form-control"
                                    required>{{ old('governance_benefit4_description', $governance_benefit4_description) }}</textarea>
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
                    <h6 class="text-primary mb-3">Sidebar Call to Action</h6>
                    <div class="mb-3">
                        <label for="governance_cta_title" class="form-label">Sidebar CTA Title</label>
                        <input type="text" name="governance_cta_title" id="governance_cta_title" class="form-control"
                            value="{{ old('governance_cta_title', $governance_cta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="governance_cta_description" class="form-label">Sidebar CTA Description</label>
                        <textarea name="governance_cta_description" id="governance_cta_description" rows="2" class="form-control"
                            required>{{ old('governance_cta_description', $governance_cta_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="governance_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                        <input type="text" name="governance_cta_button_text" id="governance_cta_button_text" class="form-control"
                            value="{{ old('governance_cta_button_text', $governance_cta_button_text) }}" required>
                    </div>
                </div>

                <!-- Quick Facts -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Quick Facts</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact1_label" class="form-label">Fact 1 Label</label>
                                <input type="text" name="governance_fact1_label" id="governance_fact1_label" class="form-control"
                                    value="{{ old('governance_fact1_label', $governance_fact1_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact1_value" class="form-label">Fact 1 Value</label>
                                <input type="text" name="governance_fact1_value" id="governance_fact1_value" class="form-control"
                                    value="{{ old('governance_fact1_value', $governance_fact1_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact2_label" class="form-label">Fact 2 Label</label>
                                <input type="text" name="governance_fact2_label" id="governance_fact2_label" class="form-control"
                                    value="{{ old('governance_fact2_label', $governance_fact2_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact2_value" class="form-label">Fact 2 Value</label>
                                <input type="text" name="governance_fact2_value" id="governance_fact2_value" class="form-control"
                                    value="{{ old('governance_fact2_value', $governance_fact2_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact3_label" class="form-label">Fact 3 Label</label>
                                <input type="text" name="governance_fact3_label" id="governance_fact3_label" class="form-control"
                                    value="{{ old('governance_fact3_label', $governance_fact3_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="governance_fact3_value" class="form-label">Fact 3 Value</label>
                                <input type="text" name="governance_fact3_value" id="governance_fact3_value" class="form-control"
                                    value="{{ old('governance_fact3_value', $governance_fact3_value) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Related Services</h6>
                    <div class="mb-3">
                        <label for="governance_related_service1" class="form-label">Related Service 1</label>
                        <input type="text" name="governance_related_service1" id="governance_related_service1" class="form-control"
                            value="{{ old('governance_related_service1', $governance_related_service1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="governance_related_service2" class="form-label">Related Service 2</label>
                        <input type="text" name="governance_related_service2" id="governance_related_service2" class="form-control"
                            value="{{ old('governance_related_service2', $governance_related_service2) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="governance_related_service3" class="form-label">Related Service 3</label>
                        <input type="text" name="governance_related_service3" id="governance_related_service3" class="form-control"
                            value="{{ old('governance_related_service3', $governance_related_service3) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.governance.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
