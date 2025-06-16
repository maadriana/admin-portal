@extends('layouts.master')

@section('title', 'Edit Services Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Services Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.services.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="services_main_title" class="form-label">Main Title</label>
                    <input type="text" name="services_main_title" id="services_main_title" class="form-control"
                        value="{{ old('services_main_title', $services_main_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="services_subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="services_subtitle" id="services_subtitle" class="form-control"
                        value="{{ old('services_subtitle', $services_subtitle) }}" required>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>

                <div class="mb-3">
                    <label for="services_description_paragraph1" class="form-label">Description Paragraph 1</label>
                    <textarea name="services_description_paragraph1" id="services_description_paragraph1" rows="4" class="form-control"
                        required>{{ old('services_description_paragraph1', $services_description_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="services_description_paragraph2" class="form-label">Description Paragraph 2</label>
                    <textarea name="services_description_paragraph2" id="services_description_paragraph2" rows="4" class="form-control"
                        required>{{ old('services_description_paragraph2', $services_description_paragraph2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Service Cards Section -->
        @php
            $serviceNames = [
                1 => ['name' => 'Audit and Assurance', 'route' => 'services.audit'],
                2 => ['name' => 'Business Advisory', 'route' => 'services.advisory'],
                3 => ['name' => 'Outsourcing', 'route' => 'services.outsourcing'],
                4 => ['name' => 'Business Restructuring and Insolvency', 'route' => 'services.restructuring'],
                5 => ['name' => 'Corporate Finance and Advisory', 'route' => 'services.finance'],
                6 => ['name' => 'Forensic and Litigation Support', 'route' => 'services.forensic'],
                7 => ['name' => 'Governance, Risk and Internal Audit', 'route' => 'services.governance'],
                8 => ['name' => 'Taxation', 'route' => 'services.taxation']
            ];
        @endphp

        @for($i = 1; $i <= 8; $i++)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Service {{ $i }}: {{ $serviceNames[$i]['name'] }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="service{{ $i }}_title" class="form-label">Service Title</label>
                            <input type="text" name="service{{ $i }}_title" id="service{{ $i }}_title" class="form-control"
                                value="{{ old('service' . $i . '_title', ${'service' . $i . '_title'}) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="service{{ $i }}_description" class="form-label">Service Description</label>
                            <textarea name="service{{ $i }}_description" id="service{{ $i }}_description" rows="3" class="form-control"
                                required>{{ old('service' . $i . '_description', ${'service' . $i . '_description'}) }}</textarea>
                            <small class="form-text text-muted">This appears on hover overlay</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="service{{ $i }}_image" class="form-label">Service Image</label>

                            @php
                                $serviceImage = \App\Models\Content::where('key', 'service' . $i . '_image')->first();
                            @endphp

                            @if($serviceImage && $serviceImage->image)
                            <div class="mb-2">
                                <img src="data:image/jpeg;base64,{{ base64_encode($serviceImage->image) }}" alt="Service {{ $i }} Image"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                            @endif

                            <input type="file" name="service{{ $i }}_image" id="service{{ $i }}_image" class="form-control">
                            <small class="form-text text-muted">Recommended size: 350x240px</small>

                            @if($serviceImage && $serviceImage->image)
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_service{{ $i }}_image"
                                    id="remove_service{{ $i }}_image" value="1">
                                <label class="form-check-label text-danger" for="remove_service{{ $i }}_image">
                                    Remove current image
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.services.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
