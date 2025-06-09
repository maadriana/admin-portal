@extends('layouts.master')

@section('title', 'Edit About Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit About Page Content</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.about.update') }}">
        @csrf

        <!-- Intro Paragraphs -->
        <div class="mb-3">
            <label for="about_intro_1" class="form-label">Introduction Paragraph 1</label>
            <textarea name="about_intro_1" id="about_intro_1" rows="4" class="form-control" required>{{ old('about_intro_1', $about_intro_1) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="about_intro_2" class="form-label">Introduction Paragraph 2</label>
            <textarea name="about_intro_2" id="about_intro_2" rows="4" class="form-control" required>{{ old('about_intro_2', $about_intro_2) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="about_intro_3" class="form-label">Introduction Paragraph 3</label>
            <textarea name="about_intro_3" id="about_intro_3" rows="4" class="form-control" required>{{ old('about_intro_3', $about_intro_3) }}</textarea>
        </div>

        <hr>

        <!-- Vision -->
        <div class="mb-3">
            <label for="about_vision" class="form-label">Vision Statement</label>
            <textarea name="about_vision" id="about_vision" rows="4" class="form-control" required>{{ old('about_vision', $about_vision) }}</textarea>
        </div>

        <!-- Mission -->
        <div class="mb-3">
            <label for="about_mission" class="form-label">Mission Statement</label>
            <textarea name="about_mission" id="about_mission" rows="5" class="form-control" required>{{ old('about_mission', $about_mission) }}</textarea>
        </div>

        <hr>

        <!-- Core Values -->
        @php
            $values = [
                'value_excellence' => 'Excellence',
                'value_integrity' => 'Integrity',
                'value_innovation' => 'Innovation',
                'value_development' => 'Professional Development',
                'value_teamwork' => 'Teamwork',
                'value_employees' => 'Care for Employees',
                'value_community' => 'Community Engagement',
            ];
        @endphp

        @foreach($values as $key => $label)
            <div class="mb-3">
                <label for="{{ $key }}" class="form-label">{{ $label }}</label>
                <textarea name="{{ $key }}" id="{{ $key }}" rows="3" class="form-control" required>{{ old($key, $$key ?? '') }}</textarea>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.about.preview') }}" class="btn btn-secondary">Preview Changes</a>
    </form>
</div>
@endsection
