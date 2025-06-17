@extends('layouts.master')

@section('title', 'Edit Corporate Finance Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Corporate Finance Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.finance.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="finance_page_title" class="form-label">Page Title</label>
                    <input type="text" name="finance_page_title" id="finance_page_title" class="form-control"
                        value="{{ old('finance_page_title', $finance_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="finance_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="finance_page_subtitle" id="finance_page_subtitle" rows="2" class="form-control"
                        required>{{ old('finance_page_subtitle', $finance_page_subtitle) }}</textarea>
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
                    $financeServiceImage = \App\Models\Content::where('key', 'finance_service_image')->first();
                @endphp

                @if($financeServiceImage && $financeServiceImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($financeServiceImage->image) }}" alt="Service Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="finance_service_image" id="finance_service_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 800x300px</small>

                @if($financeServiceImage && $financeServiceImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_finance_service_image" id="remove_finance_service_image" value="1">
                    <label class="form-check-label text-danger" for="remove_finance_service_image">
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
                    <label for="finance_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="finance_overview_title" id="finance_overview_title" class="form-control"
                        value="{{ old('finance_overview_title', $finance_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="finance_overview_paragraph1" class="form-label">Overview Paragraph</label>
                    <textarea name="finance_overview_paragraph1" id="finance_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('finance_overview_paragraph1', $finance_overview_paragraph1) }}</textarea>
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
                    <label for="finance_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="finance_approach_title" id="finance_approach_title" class="form-control"
                        value="{{ old('finance_approach_title', $finance_approach_title) }}" required>
                </div>

                <!-- Approach Item 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 1</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="finance_approach_item1_title" class="form-label">Title</label>
                                <input type="text" name="finance_approach_item1_title" id="finance_approach_item1_title" class="form-control"
                                    value="{{ old('finance_approach_item1_title', $finance_approach_item1_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="finance_approach_item1_description" class="form-label">Description</label>
                                <textarea name="finance_approach_item1_description" id="finance_approach_item1_description" rows="3" class="form-control"
                                    required>{{ old('finance_approach_item1_description', $finance_approach_item1_description) }}</textarea>
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
                                <label for="finance_approach_item2_title" class="form-label">Title</label>
                                <input type="text" name="finance_approach_item2_title" id="finance_approach_item2_title" class="form-control"
                                    value="{{ old('finance_approach_item2_title', $finance_approach_item2_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="finance_approach_item2_description" class="form-label">Description</label>
                                <textarea name="finance_approach_item2_description" id="finance_approach_item2_description" rows="3" class="form-control"
                                    required>{{ old('finance_approach_item2_description', $finance_approach_item2_description) }}</textarea>
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
                                <label for="finance_approach_item3_title" class="form-label">Title</label>
                                <input type="text" name="finance_approach_item3_title" id="finance_approach_item3_title" class="form-control"
                                    value="{{ old('finance_approach_item3_title', $finance_approach_item3_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="finance_approach_item3_description" class="form-label">Description</label>
                                <textarea name="finance_approach_item3_description" id="finance_approach_item3_description" rows="3" class="form-control"
                                    required>{{ old('finance_approach_item3_description', $finance_approach_item3_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Services List</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="finance_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="finance_services_title" id="finance_services_title" class="form-control"
                        value="{{ old('finance_services_title', $finance_services_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="finance_service1" class="form-label">Service 1</label>
                            <input type="text" name="finance_service1" id="finance_service1" class="form-control"
                                value="{{ old('finance_service1', $finance_service1) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="finance_service2" class="form-label">Service 2</label>
                            <input type="text" name="finance_service2" id="finance_service2" class="form-control"
                                value="{{ old('finance_service2', $finance_service2) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="finance_service3" class="form-label">Service 3</label>
                            <input type="text" name="finance_service3" id="finance_service3" class="form-control"
                                value="{{ old('finance_service3', $finance_service3) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="finance_service4" class="form-label">Service 4</label>
                            <input type="text" name="finance_service4" id="finance_service4" class="form-control"
                                value="{{ old('finance_service4', $finance_service4) }}" required>
                        </div>
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
                    <label for="finance_cta_text" class="form-label">CTA Button Text</label>
                    <input type="text" name="finance_cta_text" id="finance_cta_text" class="form-control"
                        value="{{ old('finance_cta_text', $finance_cta_text) }}" required>
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
                        <label for="finance_sidebar_cta_title" class="form-label">Sidebar CTA Title</label>
                        <input type="text" name="finance_sidebar_cta_title" id="finance_sidebar_cta_title" class="form-control"
                            value="{{ old('finance_sidebar_cta_title', $finance_sidebar_cta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="finance_sidebar_cta_description" class="form-label">Sidebar CTA Description</label>
                        <textarea name="finance_sidebar_cta_description" id="finance_sidebar_cta_description" rows="2" class="form-control"
                            required>{{ old('finance_sidebar_cta_description', $finance_sidebar_cta_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="finance_sidebar_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                        <input type="text" name="finance_sidebar_cta_button_text" id="finance_sidebar_cta_button_text" class="form-control"
                            value="{{ old('finance_sidebar_cta_button_text', $finance_sidebar_cta_button_text) }}" required>
                    </div>
                </div>

                <!-- Quick Facts -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Quick Facts</h6>
                    <div class="mb-3">
                        <label for="finance_related_title" class="form-label">Quick Facts Title</label>
                        <input type="text" name="finance_related_title" id="finance_related_title" class="form-control"
                            value="{{ old('finance_related_title', $finance_related_title) }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact1_label" class="form-label">Fact 1 Label</label>
                                <input type="text" name="finance_fact1_label" id="finance_fact1_label" class="form-control"
                                    value="{{ old('finance_fact1_label', $finance_fact1_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact1_value" class="form-label">Fact 1 Value</label>
                                <input type="text" name="finance_fact1_value" id="finance_fact1_value" class="form-control"
                                    value="{{ old('finance_fact1_value', $finance_fact1_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact2_label" class="form-label">Fact 2 Label</label>
                                <input type="text" name="finance_fact2_label" id="finance_fact2_label" class="form-control"
                                    value="{{ old('finance_fact2_label', $finance_fact2_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact2_value" class="form-label">Fact 2 Value</label>
                                <input type="text" name="finance_fact2_value" id="finance_fact2_value" class="form-control"
                                    value="{{ old('finance_fact2_value', $finance_fact2_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact3_label" class="form-label">Fact 3 Label</label>
                                <input type="text" name="finance_fact3_label" id="finance_fact3_label" class="form-control"
                                    value="{{ old('finance_fact3_label', $finance_fact3_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="finance_fact3_value" class="form-label">Fact 3 Value</label>
                                <input type="text" name="finance_fact3_value" id="finance_fact3_value" class="form-control"
                                    value="{{ old('finance_fact3_value', $finance_fact3_value) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Related Services</h6>
                    <div class="mb-3">
                        <label for="finance_related_service1" class="form-label">Related Service 1</label>
                        <input type="text" name="finance_related_service1" id="finance_related_service1" class="form-control"
                            value="{{ old('finance_related_service1', $finance_related_service1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="finance_related_service2" class="form-label">Related Service 2</label>
                        <input type="text" name="finance_related_service2" id="finance_related_service2" class="form-control"
                            value="{{ old('finance_related_service2', $finance_related_service2) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="finance_related_service3" class="form-label">Related Service 3</label>
                        <input type="text" name="finance_related_service3" id="finance_related_service3" class="form-control"
                            value="{{ old('finance_related_service3', $finance_related_service3) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.finance.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
