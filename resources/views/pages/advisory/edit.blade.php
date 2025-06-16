@extends('layouts.master')

@section('title', 'Edit Business Advisory Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Business Advisory Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.advisory.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="advisory_page_title" class="form-label">Page Title</label>
                    <input type="text" name="advisory_page_title" id="advisory_page_title" class="form-control"
                        value="{{ old('advisory_page_title', $advisory_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="advisory_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="advisory_page_subtitle" id="advisory_page_subtitle" rows="2" class="form-control"
                        required>{{ old('advisory_page_subtitle', $advisory_page_subtitle) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Service Overview -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Service Overview</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="advisory_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="advisory_overview_title" id="advisory_overview_title" class="form-control"
                        value="{{ old('advisory_overview_title', $advisory_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="advisory_overview_paragraph" class="form-label">Overview Paragraph</label>
                    <textarea name="advisory_overview_paragraph" id="advisory_overview_paragraph" rows="3" class="form-control"
                        required>{{ old('advisory_overview_paragraph', $advisory_overview_paragraph) }}</textarea>
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
                    <label for="advisory_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="advisory_approach_title" id="advisory_approach_title" class="form-control"
                        value="{{ old('advisory_approach_title', $advisory_approach_title) }}" required>
                </div>

                <!-- Approach Item 1 -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Approach Item 1</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="advisory_approach_item1_title" class="form-label">Title</label>
                                <input type="text" name="advisory_approach_item1_title" id="advisory_approach_item1_title" class="form-control"
                                    value="{{ old('advisory_approach_item1_title', $advisory_approach_item1_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="advisory_approach_item1_description" class="form-label">Description</label>
                                <textarea name="advisory_approach_item1_description" id="advisory_approach_item1_description" rows="3" class="form-control"
                                    required>{{ old('advisory_approach_item1_description', $advisory_approach_item1_description) }}</textarea>
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
                                <label for="advisory_approach_item2_title" class="form-label">Title</label>
                                <input type="text" name="advisory_approach_item2_title" id="advisory_approach_item2_title" class="form-control"
                                    value="{{ old('advisory_approach_item2_title', $advisory_approach_item2_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="advisory_approach_item2_description" class="form-label">Description</label>
                                <textarea name="advisory_approach_item2_description" id="advisory_approach_item2_description" rows="3" class="form-control"
                                    required>{{ old('advisory_approach_item2_description', $advisory_approach_item2_description) }}</textarea>
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
                                <label for="advisory_approach_item3_title" class="form-label">Title</label>
                                <input type="text" name="advisory_approach_item3_title" id="advisory_approach_item3_title" class="form-control"
                                    value="{{ old('advisory_approach_item3_title', $advisory_approach_item3_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="advisory_approach_item3_description" class="form-label">Description</label>
                                <textarea name="advisory_approach_item3_description" id="advisory_approach_item3_description" rows="3" class="form-control"
                                    required>{{ old('advisory_approach_item3_description', $advisory_approach_item3_description) }}</textarea>
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
                    <label for="advisory_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="advisory_services_title" id="advisory_services_title" class="form-control"
                        value="{{ old('advisory_services_title', $advisory_services_title) }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="advisory_service1" class="form-label">Service 1</label>
                            <input type="text" name="advisory_service1" id="advisory_service1" class="form-control"
                                value="{{ old('advisory_service1', $advisory_service1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="advisory_service2" class="form-label">Service 2</label>
                            <input type="text" name="advisory_service2" id="advisory_service2" class="form-control"
                                value="{{ old('advisory_service2', $advisory_service2) }}" required>
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
                    <label for="advisory_benefits_title" class="form-label">Benefits Section Title</label>
                    <input type="text" name="advisory_benefits_title" id="advisory_benefits_title" class="form-control"
                        value="{{ old('advisory_benefits_title', $advisory_benefits_title) }}" required>
                </div>

                <div class="row">
                    <!-- Benefit 1 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 1</h6>
                            <div class="mb-3">
                                <label for="advisory_benefit1_title" class="form-label">Title</label>
                                <input type="text" name="advisory_benefit1_title" id="advisory_benefit1_title" class="form-control"
                                    value="{{ old('advisory_benefit1_title', $advisory_benefit1_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="advisory_benefit1_description" class="form-label">Description</label>
                                <textarea name="advisory_benefit1_description" id="advisory_benefit1_description" rows="3" class="form-control"
                                    required>{{ old('advisory_benefit1_description', $advisory_benefit1_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Benefit 2 -->
                    <div class="col-md-6">
                        <div class="border p-3 mb-3 rounded">
                            <h6 class="text-primary mb-3">Benefit 2</h6>
                            <div class="mb-3">
                                <label for="advisory_benefit2_title" class="form-label">Title</label>
                                <input type="text" name="advisory_benefit2_title" id="advisory_benefit2_title" class="form-control"
                                    value="{{ old('advisory_benefit2_title', $advisory_benefit2_title) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="advisory_benefit2_description" class="form-label">Description</label>
                                <textarea name="advisory_benefit2_description" id="advisory_benefit2_description" rows="3" class="form-control"
                                    required>{{ old('advisory_benefit2_description', $advisory_benefit2_description) }}</textarea>
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
                        <label for="advisory_cta_title" class="form-label">CTA Title</label>
                        <input type="text" name="advisory_cta_title" id="advisory_cta_title" class="form-control"
                            value="{{ old('advisory_cta_title', $advisory_cta_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="advisory_cta_description" class="form-label">CTA Description</label>
                        <textarea name="advisory_cta_description" id="advisory_cta_description" rows="2" class="form-control"
                            required>{{ old('advisory_cta_description', $advisory_cta_description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="advisory_cta_button_text" class="form-label">CTA Button Text</label>
                        <input type="text" name="advisory_cta_button_text" id="advisory_cta_button_text" class="form-control"
                            value="{{ old('advisory_cta_button_text', $advisory_cta_button_text) }}" required>
                    </div>
                </div>

                <!-- Quick Facts -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Quick Facts</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact1_label" class="form-label">Fact 1 Label</label>
                                <input type="text" name="advisory_fact1_label" id="advisory_fact1_label" class="form-control"
                                    value="{{ old('advisory_fact1_label', $advisory_fact1_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact1_value" class="form-label">Fact 1 Value</label>
                                <input type="text" name="advisory_fact1_value" id="advisory_fact1_value" class="form-control"
                                    value="{{ old('advisory_fact1_value', $advisory_fact1_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact2_label" class="form-label">Fact 2 Label</label>
                                <input type="text" name="advisory_fact2_label" id="advisory_fact2_label" class="form-control"
                                    value="{{ old('advisory_fact2_label', $advisory_fact2_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact2_value" class="form-label">Fact 2 Value</label>
                                <input type="text" name="advisory_fact2_value" id="advisory_fact2_value" class="form-control"
                                    value="{{ old('advisory_fact2_value', $advisory_fact2_value) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact3_label" class="form-label">Fact 3 Label</label>
                                <input type="text" name="advisory_fact3_label" id="advisory_fact3_label" class="form-control"
                                    value="{{ old('advisory_fact3_label', $advisory_fact3_label) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="advisory_fact3_value" class="form-label">Fact 3 Value</label>
                                <input type="text" name="advisory_fact3_value" id="advisory_fact3_value" class="form-control"
                                    value="{{ old('advisory_fact3_value', $advisory_fact3_value) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Related Services</h6>
                    <div class="mb-3">
                        <label for="advisory_related_service1" class="form-label">Related Service 1</label>
                        <input type="text" name="advisory_related_service1" id="advisory_related_service1" class="form-control"
                            value="{{ old('advisory_related_service1', $advisory_related_service1) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="advisory_related_service2" class="form-label">Related Service 2</label>
                        <input type="text" name="advisory_related_service2" id="advisory_related_service2" class="form-control"
                            value="{{ old('advisory_related_service2', $advisory_related_service2) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="advisory_related_service3" class="form-label">Related Service 3</label>
                        <input type="text" name="advisory_related_service3" id="advisory_related_service3" class="form-control"
                            value="{{ old('advisory_related_service3', $advisory_related_service3) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.advisory.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
