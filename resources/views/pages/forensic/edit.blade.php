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
                    <label for="forensic_overview_paragraph1" class="form-label">Overview Paragraph 1</label>
                    <textarea name="forensic_overview_paragraph1" id="forensic_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('forensic_overview_paragraph1', $forensic_overview_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="forensic_overview_paragraph2" class="form-label">Overview Paragraph 2</label>
                    <textarea name="forensic_overview_paragraph2" id="forensic_overview_paragraph2" rows="3" class="form-control"
                        required>{{ old('forensic_overview_paragraph2', $forensic_overview_paragraph2) }}</textarea>
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
                    <label for="forensic_services_title" class="form-label">Services Section Title</label>
                    <input type="text" name="forensic_services_title" id="forensic_services_title" class="form-control"
                        value="{{ old('forensic_services_title', $forensic_services_title) }}" required>
                </div>

                <div id="serviceItemsContainer">
                    @php
                        $existingServiceItems = [];
                        $i = 1;
                        while(true) {
                            $titleKey = "forensic_service_item{$i}_title";
                            $descKey = "forensic_service_item{$i}_description";
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
                    <label for="forensic_value_title" class="form-label">Value Proposition Title</label>
                    <input type="text" name="forensic_value_title" id="forensic_value_title" class="form-control"
                        value="{{ old('forensic_value_title', $forensic_value_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="forensic_value_description" class="form-label">Value Proposition Description</label>
                    <textarea name="forensic_value_description" id="forensic_value_description" rows="4" class="form-control"
                        required>{{ old('forensic_value_description', $forensic_value_description) }}</textarea>
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
                <div class="mb-3">
                    <label for="forensic_sidebar_cta_title" class="form-label">Sidebar CTA Title</label>
                    <input type="text" name="forensic_sidebar_cta_title" id="forensic_sidebar_cta_title" class="form-control"
                        value="{{ old('forensic_sidebar_cta_title', $forensic_sidebar_cta_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="forensic_sidebar_cta_description" class="form-label">Sidebar CTA Description</label>
                    <textarea name="forensic_sidebar_cta_description" id="forensic_sidebar_cta_description" rows="3" class="form-control"
                        required>{{ old('forensic_sidebar_cta_description', $forensic_sidebar_cta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="forensic_sidebar_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                    <input type="text" name="forensic_sidebar_cta_button_text" id="forensic_sidebar_cta_button_text" class="form-control"
                        value="{{ old('forensic_sidebar_cta_button_text', $forensic_sidebar_cta_button_text) }}" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.forensic.preview') }}" class="btn btn-secondary">Preview Changes</a>
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
