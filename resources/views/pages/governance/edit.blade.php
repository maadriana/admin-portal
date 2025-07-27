@extends('layouts.master')

@section('title', 'Edit Governance & Risk Management Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Governance & Risk Management Content</h4>

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
                    <label for="governance_overview_paragraph1" class="form-label">Overview Paragraph</label>
                    <textarea name="governance_overview_paragraph1" id="governance_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('governance_overview_paragraph1', $governance_overview_paragraph1) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Key Approaches (Dynamic) -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Key Approaches (Dynamic)</h5>
                    <button type="button" class="btn btn-sm btn-success" id="addApproachItem">
                        <i class="fas fa-plus"></i> Add Approach
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="governance_approach_title" class="form-label">Approach Section Title</label>
                    <input type="text" name="governance_approach_title" id="governance_approach_title" class="form-control"
                        value="{{ old('governance_approach_title', $governance_approach_title) }}" required>
                </div>

                <div id="approachItemsContainer">
                    @php
                        $existingApproachItems = [];
                        $i = 1;
                        while(true) {
                            $titleKey = "governance_approach_item{$i}_title";
                            $descKey = "governance_approach_item{$i}_description";
                            $titleValue = \App\Models\Content::where('key', $titleKey)->value('value');
                            $descValue = \App\Models\Content::where('key', $descKey)->value('value');

                            if ($titleValue || $descValue) {
                                $existingApproachItems[] = [
                                    'index' => $i,
                                    'title' => $titleValue,
                                    'description' => $descValue
                                ];
                                $i++;
                            } else {
                                break;
                            }
                        }

                        // If no approach items exist, create at least one
                        if (empty($existingApproachItems)) {
                            $existingApproachItems = [
                                ['index' => 1, 'title' => '', 'description' => '']
                            ];
                        }
                    @endphp

                    @foreach($existingApproachItems as $approachItem)
                    <div class="approach-item border p-3 mb-3 rounded" data-index="{{ $approachItem['index'] }}">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-primary mb-0">Approach {{ $approachItem['index'] }}</h6>
                            @if(count($existingApproachItems) > 1)
                            <button type="button" class="btn btn-sm btn-danger remove-approach-item">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Approach Title</label>
                                    <input type="text" name="approach_items[{{ $approachItem['index'] }}][title]" class="form-control"
                                        value="{{ old('approach_items.'.$approachItem['index'].'.title', $approachItem['title']) }}" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Approach Description</label>
                                    <textarea name="approach_items[{{ $approachItem['index'] }}][description]" rows="3" class="form-control"
                                        required>{{ old('approach_items.'.$approachItem['index'].'.description', $approachItem['description']) }}</textarea>
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
                    <label for="governance_value_title" class="form-label">Value Proposition Title</label>
                    <input type="text" name="governance_value_title" id="governance_value_title" class="form-control"
                        value="{{ old('governance_value_title', $governance_value_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="governance_value_description" class="form-label">Value Proposition Description</label>
                    <textarea name="governance_value_description" id="governance_value_description" rows="4" class="form-control"
                        required>{{ old('governance_value_description', $governance_value_description) }}</textarea>
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
                    <label for="governance_cta_text" class="form-label">CTA Button Text</label>
                    <input type="text" name="governance_cta_text" id="governance_cta_text" class="form-control"
                        value="{{ old('governance_cta_text', $governance_cta_text) }}" required>
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
                    <label for="governance_sidebar_cta_title" class="form-label">Sidebar CTA Title</label>
                    <input type="text" name="governance_sidebar_cta_title" id="governance_sidebar_cta_title" class="form-control"
                        value="{{ old('governance_sidebar_cta_title', $governance_sidebar_cta_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="governance_sidebar_cta_description" class="form-label">Sidebar CTA Description</label>
                    <textarea name="governance_sidebar_cta_description" id="governance_sidebar_cta_description" rows="3" class="form-control"
                        required>{{ old('governance_sidebar_cta_description', $governance_sidebar_cta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="governance_sidebar_cta_button_text" class="form-label">Sidebar CTA Button Text</label>
                    <input type="text" name="governance_sidebar_cta_button_text" id="governance_sidebar_cta_button_text" class="form-control"
                        value="{{ old('governance_sidebar_cta_button_text', $governance_sidebar_cta_button_text) }}" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.governance.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let approachItemIndex = {{ count($existingApproachItems) }};

    // Add new approach item
    document.getElementById('addApproachItem').addEventListener('click', function() {
        approachItemIndex++;
        const container = document.getElementById('approachItemsContainer');
        const newApproachItem = document.createElement('div');
        newApproachItem.className = 'approach-item border p-3 mb-3 rounded';
        newApproachItem.setAttribute('data-index', approachItemIndex);

        newApproachItem.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-primary mb-0">Approach ${approachItemIndex}</h6>
                <button type="button" class="btn btn-sm btn-danger remove-approach-item">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Approach Title</label>
                        <input type="text" name="approach_items[${approachItemIndex}][title]" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Approach Description</label>
                        <textarea name="approach_items[${approachItemIndex}][description]" rows="3" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
        `;

        container.appendChild(newApproachItem);
        updateRemoveButtons();
    });

    // Remove approach item
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-approach-item')) {
            e.target.closest('.approach-item').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const approachItems = document.querySelectorAll('.approach-item');
        approachItems.forEach(approachItem => {
            const removeBtn = approachItem.querySelector('.remove-approach-item');
            if (removeBtn) {
                removeBtn.style.display = approachItems.length > 1 ? 'inline-block' : 'none';
            }
        });
    }

    // Initial update
    updateRemoveButtons();
});
</script>

@endsection
