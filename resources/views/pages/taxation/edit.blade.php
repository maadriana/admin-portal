@extends('layouts.master')

@section('title', 'Edit Taxation Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Taxation Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.taxation.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="taxation_page_title" class="form-label">Page Title</label>
                    <input type="text" name="taxation_page_title" id="taxation_page_title" class="form-control"
                        value="{{ old('taxation_page_title', $taxation_page_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="taxation_page_subtitle" class="form-label">Page Subtitle</label>
                    <textarea name="taxation_page_subtitle" id="taxation_page_subtitle" rows="2" class="form-control"
                        required>{{ old('taxation_page_subtitle', $taxation_page_subtitle) }}</textarea>
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
                    $taxationServiceImage = \App\Models\Content::where('key', 'taxation_service_image')->first();
                @endphp

                @if($taxationServiceImage && $taxationServiceImage->image)
                <div class="mb-2">
                    <img src="data:image/jpeg;base64,{{ base64_encode($taxationServiceImage->image) }}" alt="Service Image"
                        class="img-thumbnail" style="max-width: 300px;">
                </div>
                @endif

                <input type="file" name="taxation_service_image" id="taxation_service_image" class="form-control mt-2">
                <small class="form-text text-muted">Recommended size: 800x300px</small>

                @if($taxationServiceImage && $taxationServiceImage->image)
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remove_taxation_service_image" id="remove_taxation_service_image" value="1">
                    <label class="form-check-label text-danger" for="remove_taxation_service_image">
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
                    <label for="taxation_overview_title" class="form-label">Overview Title</label>
                    <input type="text" name="taxation_overview_title" id="taxation_overview_title" class="form-control"
                        value="{{ old('taxation_overview_title', $taxation_overview_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="taxation_overview_paragraph1" class="form-label">Overview Paragraph 1</label>
                    <textarea name="taxation_overview_paragraph1" id="taxation_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('taxation_overview_paragraph1', $taxation_overview_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="taxation_overview_paragraph2" class="form-label">Overview Paragraph 2</label>
                    <textarea name="taxation_overview_paragraph2" id="taxation_overview_paragraph2" rows="3" class="form-control"
                        required>{{ old('taxation_overview_paragraph2', $taxation_overview_paragraph2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Key Service Areas (Dynamic) -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Key Service Areas (Dynamic)</h5>
                    <button type="button" class="btn btn-sm btn-success" id="addServiceItem">
                        <i class="fas fa-plus"></i> Add Service Area
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="taxation_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="taxation_services_title" id="taxation_services_title" class="form-control"
                        value="{{ old('taxation_services_title', $taxation_services_title) }}" required>
                </div>

                <div id="serviceItemsContainer">
                    @php
                        $existingServiceItems = [];
                        $i = 1;
                        while(true) {
                            $titleKey = "taxation_service_item{$i}_title";
                            $descKey = "taxation_service_item{$i}_description";
                            $titleValue = \App\Models\Content::where('key', $titleKey)->value('value');
                            $descValue = \App\Models\Content::where('key', $descKey)->value('value');

                            if ($titleValue || $descValue) {
                                $existingServiceItems[] = [
                                    'index' => $i,
                                    'title' => $titleValue,
                                    'description' => $descValue
                                ];
                                $i++;
                            } else {
                                break;
                            }
                        }

                        // If no service items exist, create at least one
                        if (empty($existingServiceItems)) {
                            $existingServiceItems = [
                                ['index' => 1, 'title' => '', 'description' => '']
                            ];
                        }
                    @endphp

                    @foreach($existingServiceItems as $serviceItem)
                    <div class="service-item border p-3 mb-3 rounded" data-index="{{ $serviceItem['index'] }}">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-primary mb-0">Service Area {{ $serviceItem['index'] }}</h6>
                            @if(count($existingServiceItems) > 1)
                            <button type="button" class="btn btn-sm btn-danger remove-service-item">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" name="service_items[{{ $serviceItem['index'] }}][title]" class="form-control"
                                        value="{{ old('service_items.'.$serviceItem['index'].'.title', $serviceItem['title']) }}" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Service Description</label>
                                    <textarea name="service_items[{{ $serviceItem['index'] }}][description]" rows="3" class="form-control"
                                        required>{{ old('service_items.'.$serviceItem['index'].'.description', $serviceItem['description']) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Value Proposition Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Value Proposition Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="taxation_value_title" class="form-label">Value Proposition Title</label>
                    <input type="text" name="taxation_value_title" id="taxation_value_title" class="form-control"
                        value="{{ old('taxation_value_title', $taxation_value_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="taxation_value_description" class="form-label">Value Proposition Description</label>
                    <textarea name="taxation_value_description" id="taxation_value_description" rows="4" class="form-control"
                        required>{{ old('taxation_value_description', $taxation_value_description) }}</textarea>
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
                    <label for="taxation_cta_text" class="form-label">CTA Button Text</label>
                    <input type="text" name="taxation_cta_text" id="taxation_cta_text" class="form-control"
                        value="{{ old('taxation_cta_text', $taxation_cta_text) }}" required>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sidebar Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="taxation_sidebar_cta_title" class="form-label">Sidebar CTA Title</label>
                    <input type="text" name="taxation_sidebar_cta_title" id="taxation_sidebar_cta_title" class="form-control"
                        value="{{ old('taxation_sidebar_cta_title', $taxation_sidebar_cta_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="taxation_sidebar_cta_description" class="form-label">Sidebar CTA Description</label>
                    <textarea name="taxation_sidebar_cta_description" id="taxation_sidebar_cta_description" rows="3" class="form-control"
                        required>{{ old('taxation_sidebar_cta_description', $taxation_sidebar_cta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="taxation_sidebar_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                    <input type="text" name="taxation_sidebar_cta_button_text" id="taxation_sidebar_cta_button_text" class="form-control"
                        value="{{ old('taxation_sidebar_cta_button_text', $taxation_sidebar_cta_button_text) }}" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.taxation.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let serviceItemIndex = {{ count($existingServiceItems) }};

    // Add new service item
    document.getElementById('addServiceItem').addEventListener('click', function() {
        serviceItemIndex++;
        const container = document.getElementById('serviceItemsContainer');
        const newServiceItem = document.createElement('div');
        newServiceItem.className = 'service-item border p-3 mb-3 rounded';
        newServiceItem.setAttribute('data-index', serviceItemIndex);

        newServiceItem.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-primary mb-0">Service Area ${serviceItemIndex}</h6>
                <button type="button" class="btn btn-sm btn-danger remove-service-item">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Service Title</label>
                        <input type="text" name="service_items[${serviceItemIndex}][title]" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Service Description</label>
                        <textarea name="service_items[${serviceItemIndex}][description]" rows="3" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        `;

        container.appendChild(newServiceItem);
        updateRemoveButtons();
    });

    // Remove service item
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-service-item')) {
            e.target.closest('.service-item').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const serviceItems = document.querySelectorAll('.service-item');
        serviceItems.forEach(serviceItem => {
            const removeBtn = serviceItem.querySelector('.remove-service-item');
            if (removeBtn) {
                removeBtn.style.display = serviceItems.length > 1 ? 'inline-block' : 'none';
            }
        });
    }

    // Initial update
    updateRemoveButtons();
});
</script>

@endsection
