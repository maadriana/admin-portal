@extends('layouts.master')

@section('title', 'Edit Homepage Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Homepage Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.home.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Hero Title -->
        <div class="mb-3">
            <label for="hero_title" class="form-label">Hero Title</label>
            <textarea name="hero_title" id="hero_title" rows="2" class="form-control"
                required>{!! old('hero_title', $hero_title) !!}</textarea>
        </div>

        <!-- Hero Subtitle -->
        <div class="mb-3">
            <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
            <input type="text" name="hero_subtitle" id="hero_subtitle" class="form-control"
                value="{{ old('hero_subtitle', $hero_subtitle) }}" required>
        </div>

        <!-- Hero Button -->
        <div class="mb-3">
            <label for="hero_button" class="form-label">Hero Button Text</label>
            <input type="text" name="hero_button" id="hero_button" class="form-control"
                value="{{ old('hero_button', $hero_button) }}" required>
        </div>

        <hr>

        <!-- About Text -->
        <div class="mb-3">
            <label for="about_text" class="form-label">About Section Paragraph</label>
            <textarea name="about_text" id="about_text" rows="6" class="form-control"
                required>{!! old('about_text', $about_text) !!}</textarea>
        </div>

        <!-- About Image -->
        <div class="mb-3">
            <label for="about_image" class="form-label">About Section Image</label>

            @php
            $aboutImage = \App\Models\Content::where('key', 'about_image')->first();
            @endphp

            @if($aboutImage && $aboutImage->image)
            <div class="mb-2">
                <img src="data:image/jpeg;base64,{{ base64_encode($aboutImage->image) }}" alt="About Image"
                    class="img-thumbnail" style="max-width: 300px;">
            </div>
            @endif

            <input type="file" name="about_image" id="about_image" class="form-control mt-2">

            @if($aboutImage && $aboutImage->image)
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1">
                <label class="form-check-label text-danger" for="remove_image">
                    Remove current image
                </label>
            </div>
            @endif
        </div>



        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.home.preview') }}" class="btn btn-secondary">Preview Changes</a>
    </form>
</div>
@endsection