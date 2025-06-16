@extends('layouts.master')

@section('title', 'Edit Careers Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Careers Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.careers.update') }}">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="careers_main_title" class="form-label">Main Title</label>
                    <input type="text" name="careers_main_title" id="careers_main_title" class="form-control"
                        value="{{ old('careers_main_title', $careers_main_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="careers_subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="careers_subtitle" id="careers_subtitle" class="form-control"
                        value="{{ old('careers_subtitle', $careers_subtitle) }}" required>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Description Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="careers_description_paragraph1" class="form-label">Description Paragraph 1</label>
                    <textarea name="careers_description_paragraph1" id="careers_description_paragraph1" rows="3" class="form-control"
                        required>{{ old('careers_description_paragraph1', $careers_description_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="careers_description_paragraph2" class="form-label">Description Paragraph 2</label>
                    <textarea name="careers_description_paragraph2" id="careers_description_paragraph2" rows="3" class="form-control"
                        required>{{ old('careers_description_paragraph2', $careers_description_paragraph2) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="careers_description_paragraph3" class="form-label">Description Paragraph 3</label>
                    <textarea name="careers_description_paragraph3" id="careers_description_paragraph3" rows="3" class="form-control"
                        required>{{ old('careers_description_paragraph3', $careers_description_paragraph3) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="careers_description_paragraph4" class="form-label">Description Paragraph 4</label>
                    <textarea name="careers_description_paragraph4" id="careers_description_paragraph4" rows="3" class="form-control"
                        required>{{ old('careers_description_paragraph4', $careers_description_paragraph4) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Career Opportunity Cards -->
        @php
            $careerCards = [
                1 => ['name' => 'Current Vacancies', 'route' => 'careers.vacancies'],
                2 => ['name' => 'Experienced Professionals', 'route' => 'careers.professionals'],
                3 => ['name' => 'Graduate', 'route' => 'careers.graduate'],
                4 => ['name' => 'Internship Opportunities', 'route' => 'careers.internship']
            ];
        @endphp

        @for($i = 1; $i <= 4; $i++)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ $careerCards[$i]['name'] }} Card</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="career_card{{ $i }}_title" class="form-label">Card Title</label>
                            <input type="text" name="career_card{{ $i }}_title" id="career_card{{ $i }}_title" class="form-control"
                                value="{{ old('career_card' . $i . '_title', ${'career_card' . $i . '_title'}) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="career_card{{ $i }}_description" class="form-label">Card Description</label>
                            <textarea name="career_card{{ $i }}_description" id="career_card{{ $i }}_description" rows="3" class="form-control"
                                required>{{ old('career_card' . $i . '_description', ${'career_card' . $i . '_description'}) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="career_card{{ $i }}_icon" class="form-label">Bootstrap Icon Class</label>
                            <input type="text" name="career_card{{ $i }}_icon" id="career_card{{ $i }}_icon" class="form-control"
                                value="{{ old('career_card' . $i . '_icon', ${'career_card' . $i . '_icon'}) }}" required>
                            <small class="form-text text-muted">
                                Enter Bootstrap icon class (e.g., "bi bi-megaphone").
                                <a href="https://icons.getbootstrap.com/" target="_blank">Browse Bootstrap Icons</a>
                            </small>
                        </div>

                        <!-- Icon Preview -->
                        <div class="mb-3">
                            <label class="form-label">Icon Preview</label>
                            <div class="border rounded p-3 text-center" style="height: 80px; display: flex; align-items: center; justify-content: center;">
                                <i id="icon_preview_{{ $i }}" class="{{ ${'career_card' . $i . '_icon'} ?: 'bi bi-question-circle' }}" style="font-size: 2rem; color: #326D78;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.careers.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

<script>
// Live icon preview
document.addEventListener('DOMContentLoaded', function() {
    for (let i = 1; i <= 4; i++) {
        const iconInput = document.getElementById(`career_card${i}_icon`);
        const iconPreview = document.getElementById(`icon_preview_${i}`);

        iconInput.addEventListener('input', function() {
            const iconClass = this.value.trim() || 'bi bi-question-circle';
            iconPreview.className = iconClass;
            iconPreview.style.fontSize = '2rem';
            iconPreview.style.color = '#326D78';
        });
    }
});
</script>

@endsection
