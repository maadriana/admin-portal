@extends('layouts.master')

@section('title', 'Edit Team Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Team Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.team.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Header Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Header Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="team_main_title" class="form-label">Main Title</label>
                    <input type="text" name="team_main_title" id="team_main_title" class="form-control"
                        value="{{ old('team_main_title', $team_main_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="team_subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="team_subtitle" id="team_subtitle" class="form-control"
                        value="{{ old('team_subtitle', $team_subtitle) }}" required>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>
            </div>
        </div>

        <!-- Team Members Section -->
        @php
            $teamMembers = [
                1 => 'Emmanuel Y. Mendoza - Managing Partner',
                2 => 'Ephraim T. Tugano - Partner',
                3 => 'Pamela Grace S. Tangso - Partner',
                4 => 'Jekell G. Salosagcol - External Quality Assurance Consultant'
            ];
        @endphp

        @for($i = 1; $i <= 4; $i++)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Team Member {{ $i }}: {{ $teamMembers[$i] ?? "Member $i" }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_member{{ $i }}_name" class="form-label">Full Name</label>
                            <input type="text" name="team_member{{ $i }}_name" id="team_member{{ $i }}_name" class="form-control"
                                value="{{ old('team_member' . $i . '_name', ${'team_member' . $i . '_name'}) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="team_member{{ $i }}_role" class="form-label">Role/Position</label>
                            <input type="text" name="team_member{{ $i }}_role" id="team_member{{ $i }}_role" class="form-control"
                                value="{{ old('team_member' . $i . '_role', ${'team_member' . $i . '_role'}) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="team_member{{ $i }}_slug" class="form-label">URL Slug</label>
                            <input type="text" name="team_member{{ $i }}_slug" id="team_member{{ $i }}_slug" class="form-control"
                                value="{{ old('team_member' . $i . '_slug', ${'team_member' . $i . '_slug'}) }}" required>
                            <small class="form-text text-muted">Used for profile page URL (e.g., "emmanuel-y-mendoza"). Only lowercase letters, numbers, and hyphens.</small>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_member{{ $i }}_image" class="form-label">Profile Image</label>

                            @php
                                $memberImage = \App\Models\Content::where('key', 'team_member' . $i . '_image')->first();
                            @endphp

                            @if($memberImage && $memberImage->image)
                            <div class="mb-2">
                                <img src="data:image/jpeg;base64,{{ base64_encode($memberImage->image) }}" alt="Team Member {{ $i }}"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                            @endif

                            <input type="file" name="team_member{{ $i }}_image" id="team_member{{ $i }}_image" class="form-control">
                            <small class="form-text text-muted">Recommended size: 400x400px (square)</small>

                            @if($memberImage && $memberImage->image)
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_team_member{{ $i }}_image"
                                    id="remove_team_member{{ $i }}_image" value="1">
                                <label class="form-check-label text-danger" for="remove_team_member{{ $i }}_image">
                                    Remove current image
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_member{{ $i }}_twitter" class="form-label">Twitter URL</label>
                            <input type="url" name="team_member{{ $i }}_twitter" id="team_member{{ $i }}_twitter" class="form-control"
                                value="{{ old('team_member' . $i . '_twitter', ${'team_member' . $i . '_twitter'}) }}" placeholder="https://twitter.com/username">
                        </div>

                        <div class="mb-3">
                            <label for="team_member{{ $i }}_facebook" class="form-label">Facebook URL</label>
                            <input type="url" name="team_member{{ $i }}_facebook" id="team_member{{ $i }}_facebook" class="form-control"
                                value="{{ old('team_member' . $i . '_facebook', ${'team_member' . $i . '_facebook'}) }}" placeholder="https://facebook.com/username">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="team_member{{ $i }}_instagram" class="form-label">Instagram URL</label>
                            <input type="url" name="team_member{{ $i }}_instagram" id="team_member{{ $i }}_instagram" class="form-control"
                                value="{{ old('team_member' . $i . '_instagram', ${'team_member' . $i . '_instagram'}) }}" placeholder="https://instagram.com/username">
                        </div>

                        <div class="mb-3">
                            <label for="team_member{{ $i }}_linkedin" class="form-label">LinkedIn URL</label>
                            <input type="url" name="team_member{{ $i }}_linkedin" id="team_member{{ $i }}_linkedin" class="form-control"
                                value="{{ old('team_member' . $i . '_linkedin', ${'team_member' . $i . '_linkedin'}) }}" placeholder="https://linkedin.com/in/username">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.team.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>

<script>
// Auto-generate slug from name
document.addEventListener('DOMContentLoaded', function() {
    for (let i = 1; i <= 4; i++) {
        const nameInput = document.getElementById(`team_member${i}_name`);
        const slugInput = document.getElementById(`team_member${i}_slug`);

        nameInput.addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                .trim()
                .replace(/\s+/g, '-'); // Replace spaces with hyphens

            if (slugInput.value === '' || slugInput.dataset.autoGenerated) {
                slugInput.value = slug;
                slugInput.dataset.autoGenerated = 'true';
            }
        });

        slugInput.addEventListener('input', function() {
            delete this.dataset.autoGenerated;
        });
    }
});
</script>
@endsection
