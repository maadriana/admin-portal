@extends('layouts.master')

@section('title', 'Edit Galleries Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Galleries Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.galleries.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="galleries_hero_title" class="form-label">Hero Title</label>
                    <input type="text" name="galleries_hero_title" id="galleries_hero_title" class="form-control"
                        value="{{ old('galleries_hero_title', $galleries_hero_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="galleries_hero_subtitle" class="form-label">Hero Subtitle</label>
                    <textarea name="galleries_hero_subtitle" id="galleries_hero_subtitle" rows="3" class="form-control"
                        required>{{ old('galleries_hero_subtitle', $galleries_hero_subtitle) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="galleries_cta_csr" class="form-label">CSR Button Text</label>
                            <input type="text" name="galleries_cta_csr" id="galleries_cta_csr" class="form-control"
                                value="{{ old('galleries_cta_csr', $galleries_cta_csr) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="galleries_cta_team" class="form-label">Team Button Text</label>
                            <input type="text" name="galleries_cta_team" id="galleries_cta_team" class="form-control"
                                value="{{ old('galleries_cta_team', $galleries_cta_team) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Overview Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="galleries_overview_badge" class="form-label">Overview Badge</label>
                            <input type="text" name="galleries_overview_badge" id="galleries_overview_badge" class="form-control"
                                value="{{ old('galleries_overview_badge', $galleries_overview_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="galleries_overview_title" class="form-label">Overview Title</label>
                            <input type="text" name="galleries_overview_title" id="galleries_overview_title" class="form-control"
                                value="{{ old('galleries_overview_title', $galleries_overview_title) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="galleries_overview_paragraph1" class="form-label">Overview Paragraph 1</label>
                    <textarea name="galleries_overview_paragraph1" id="galleries_overview_paragraph1" rows="3" class="form-control"
                        required>{{ old('galleries_overview_paragraph1', $galleries_overview_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="galleries_overview_paragraph2" class="form-label">Overview Paragraph 2</label>
                    <textarea name="galleries_overview_paragraph2" id="galleries_overview_paragraph2" rows="3" class="form-control"
                        required>{{ old('galleries_overview_paragraph2', $galleries_overview_paragraph2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- CSR Gallery Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">CSR Gallery Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_badge" class="form-label">CSR Badge</label>
                            <input type="text" name="csr_gallery_badge" id="csr_gallery_badge" class="form-control"
                                value="{{ old('csr_gallery_badge', $csr_gallery_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_title" class="form-label">CSR Title</label>
                            <input type="text" name="csr_gallery_title" id="csr_gallery_title" class="form-control"
                                value="{{ old('csr_gallery_title', $csr_gallery_title) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="csr_gallery_description" class="form-label">CSR Description</label>
                    <textarea name="csr_gallery_description" id="csr_gallery_description" rows="3" class="form-control"
                        required>{{ old('csr_gallery_description', $csr_gallery_description) }}</textarea>
                </div>

                <!-- CSR Gallery Images -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_item1_title" class="form-label">CSR Item 1 Title</label>
                            <input type="text" name="csr_gallery_item1_title" id="csr_gallery_item1_title" class="form-control"
                                value="{{ old('csr_gallery_item1_title', $csr_gallery_item1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_gallery_image1" class="form-label">CSR Image 1</label>
                            <input type="file" name="csr_gallery_image1" id="csr_gallery_image1" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('csr_gallery_image1'))
                                <div class="mt-2">
                                    <img src="{{ getContent('csr_gallery_image1') }}" alt="CSR Image 1" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('csr_gallery_image1')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_item2_title" class="form-label">CSR Item 2 Title</label>
                            <input type="text" name="csr_gallery_item2_title" id="csr_gallery_item2_title" class="form-control"
                                value="{{ old('csr_gallery_item2_title', $csr_gallery_item2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_gallery_image2" class="form-label">CSR Image 2</label>
                            <input type="file" name="csr_gallery_image2" id="csr_gallery_image2" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('csr_gallery_image2'))
                                <div class="mt-2">
                                    <img src="{{ getContent('csr_gallery_image2') }}" alt="CSR Image 2" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('csr_gallery_image2')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_item3_title" class="form-label">CSR Item 3 Title</label>
                            <input type="text" name="csr_gallery_item3_title" id="csr_gallery_item3_title" class="form-control"
                                value="{{ old('csr_gallery_item3_title', $csr_gallery_item3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="csr_gallery_image3" class="form-label">CSR Image 3</label>
                            <input type="file" name="csr_gallery_image3" id="csr_gallery_image3" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('csr_gallery_image3'))
                                <div class="mt-2">
                                    <img src="{{ getContent('csr_gallery_image3') }}" alt="CSR Image 3" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('csr_gallery_image3')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="csr_gallery_image4" class="form-label">CSR Image 4 (More Photos)</label>
                            <input type="file" name="csr_gallery_image4" id="csr_gallery_image4" class="form-control"
                                accept="image/*">
                            <small class="form-text text-muted">This image represents additional photos in the gallery</small>
                            @if(hasImageContent('csr_gallery_image4'))
                                <div class="mt-2">
                                    <img src="{{ getContent('csr_gallery_image4') }}" alt="CSR Image 4" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('csr_gallery_image4')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Gallery Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Team Gallery Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_gallery_badge" class="form-label">Team Badge</label>
                            <input type="text" name="team_gallery_badge" id="team_gallery_badge" class="form-control"
                                value="{{ old('team_gallery_badge', $team_gallery_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_gallery_title" class="form-label">Team Title</label>
                            <input type="text" name="team_gallery_title" id="team_gallery_title" class="form-control"
                                value="{{ old('team_gallery_title', $team_gallery_title) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="team_gallery_description" class="form-label">Team Description</label>
                    <textarea name="team_gallery_description" id="team_gallery_description" rows="3" class="form-control"
                        required>{{ old('team_gallery_description', $team_gallery_description) }}</textarea>
                </div>

                <!-- Team Gallery Images -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="team_gallery_item1_title" class="form-label">Team Item 1 Title</label>
                            <input type="text" name="team_gallery_item1_title" id="team_gallery_item1_title" class="form-control"
                                value="{{ old('team_gallery_item1_title', $team_gallery_item1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_gallery_image1" class="form-label">Team Image 1</label>
                            <input type="file" name="team_gallery_image1" id="team_gallery_image1" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('team_gallery_image1'))
                                <div class="mt-2">
                                    <img src="{{ getContent('team_gallery_image1') }}" alt="Team Image 1" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('team_gallery_image1')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="team_gallery_item2_title" class="form-label">Team Item 2 Title</label>
                            <input type="text" name="team_gallery_item2_title" id="team_gallery_item2_title" class="form-control"
                                value="{{ old('team_gallery_item2_title', $team_gallery_item2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_gallery_image2" class="form-label">Team Image 2</label>
                            <input type="file" name="team_gallery_image2" id="team_gallery_image2" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('team_gallery_image2'))
                                <div class="mt-2">
                                    <img src="{{ getContent('team_gallery_image2') }}" alt="Team Image 2" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('team_gallery_image2')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="team_gallery_image3" class="form-label">Team Image 3 (More Photos)</label>
                            <input type="file" name="team_gallery_image3" id="team_gallery_image3" class="form-control"
                                accept="image/*">
                            <small class="form-text text-muted">This image represents additional photos in the gallery</small>
                            @if(hasImageContent('team_gallery_image3'))
                                <div class="mt-2">
                                    <img src="{{ getContent('team_gallery_image3') }}" alt="Team Image 3" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('team_gallery_image3')">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

<script>
function removeImage(imageKey) {
    if (confirm('Are you sure you want to remove this image?')) {
        fetch('{{ route("admin.galleries.remove-image") }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                image_key: imageKey
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error removing image. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error removing image. Please try again.');
        });
    }
}
</script>

@endsection
