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

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="about_hero_title" class="form-label">Hero Title</label>
                    <input type="text" name="about_hero_title" id="about_hero_title" class="form-control"
                        value="{{ old('about_hero_title', $about_hero_title) }}" required>
                    <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                </div>

                <div class="mb-3">
                    <label for="about_hero_subtitle" class="form-label">Hero Subtitle</label>
                    <textarea name="about_hero_subtitle" id="about_hero_subtitle" rows="2" class="form-control"
                        required>{{ old('about_hero_subtitle', $about_hero_subtitle) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="about_years_legacy" class="form-label">Years Legacy (Number)</label>
                            <input type="text" name="about_years_legacy" id="about_years_legacy" class="form-control"
                                value="{{ old('about_years_legacy', $about_years_legacy) }}" required>
                            <small class="form-text text-muted">e.g., 20+</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="about_clients_served" class="form-label">Clients Served (Number)</label>
                            <input type="text" name="about_clients_served" id="about_clients_served" class="form-control"
                                value="{{ old('about_clients_served', $about_clients_served) }}" required>
                            <small class="form-text text-muted">e.g., 100+</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="about_circular_quote" class="form-label">Circular Quote</label>
                            <input type="text" name="about_circular_quote" id="about_circular_quote" class="form-control"
                                value="{{ old('about_circular_quote', $about_circular_quote) }}" required>
                            <small class="form-text text-muted">Short quote in circular element</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Story Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Story Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about_story_badge" class="form-label">Story Badge Text</label>
                            <input type="text" name="about_story_badge" id="about_story_badge" class="form-control"
                                value="{{ old('about_story_badge', $about_story_badge) }}" required>
                            <small class="form-text text-muted">e.g., "Our Foundation"</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about_story_title" class="form-label">Story Title</label>
                            <input type="text" name="about_story_title" id="about_story_title" class="form-control"
                                value="{{ old('about_story_title', $about_story_title) }}" required>
                            <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="about_story_paragraph1" class="form-label">Story Paragraph 1</label>
                    <textarea name="about_story_paragraph1" id="about_story_paragraph1" rows="3" class="form-control"
                        required>{{ old('about_story_paragraph1', $about_story_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="about_story_paragraph2" class="form-label">Story Paragraph 2</label>
                    <textarea name="about_story_paragraph2" id="about_story_paragraph2" rows="3" class="form-control"
                        required>{{ old('about_story_paragraph2', $about_story_paragraph2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Cards Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <h6>Excellence Card</h6>
                        <div class="mb-3">
                            <label for="about_card1_title" class="form-label">Title</label>
                            <input type="text" name="about_card1_title" id="about_card1_title" class="form-control"
                                value="{{ old('about_card1_title', $about_card1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_card1_description" class="form-label">Description</label>
                            <textarea name="about_card1_description" id="about_card1_description" rows="3" class="form-control"
                                required>{{ old('about_card1_description', $about_card1_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <h6>Innovation Card</h6>
                        <div class="mb-3">
                            <label for="about_card2_title" class="form-label">Title</label>
                            <input type="text" name="about_card2_title" id="about_card2_title" class="form-control"
                                value="{{ old('about_card2_title', $about_card2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_card2_description" class="form-label">Description</label>
                            <textarea name="about_card2_description" id="about_card2_description" rows="3" class="form-control"
                                required>{{ old('about_card2_description', $about_card2_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <h6>Promise Card</h6>
                        <div class="mb-3">
                            <label for="about_card3_title" class="form-label">Title</label>
                            <input type="text" name="about_card3_title" id="about_card3_title" class="form-control"
                                value="{{ old('about_card3_title', $about_card3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_card3_description" class="form-label">Description</label>
                            <textarea name="about_card3_description" id="about_card3_description" rows="3" class="form-control"
                                required>{{ old('about_card3_description', $about_card3_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision & Mission Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Vision & Mission Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about_vision_text" class="form-label">Vision Text</label>
                            <textarea name="about_vision_text" id="about_vision_text" rows="4" class="form-control"
                                required>{{ old('about_vision_text', $about_vision_text) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about_mission_text" class="form-label">Mission Text</label>
                            <textarea name="about_mission_text" id="about_mission_text" rows="4" class="form-control"
                                required>{{ old('about_mission_text', $about_mission_text) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Core Values Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Value 1: Excellence -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Excellence</h6>
                        <div class="mb-3">
                            <label for="about_value1_title" class="form-label">Title</label>
                            <input type="text" name="about_value1_title" id="about_value1_title" class="form-control"
                                value="{{ old('about_value1_title', $about_value1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value1_description" class="form-label">Description</label>
                            <textarea name="about_value1_description" id="about_value1_description" rows="2" class="form-control"
                                required>{{ old('about_value1_description', $about_value1_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 2: Integrity -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Integrity</h6>
                        <div class="mb-3">
                            <label for="about_value2_title" class="form-label">Title</label>
                            <input type="text" name="about_value2_title" id="about_value2_title" class="form-control"
                                value="{{ old('about_value2_title', $about_value2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value2_description" class="form-label">Description</label>
                            <textarea name="about_value2_description" id="about_value2_description" rows="2" class="form-control"
                                required>{{ old('about_value2_description', $about_value2_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 3: Innovation -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Innovation</h6>
                        <div class="mb-3">
                            <label for="about_value3_title" class="form-label">Title</label>
                            <input type="text" name="about_value3_title" id="about_value3_title" class="form-control"
                                value="{{ old('about_value3_title', $about_value3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value3_description" class="form-label">Description</label>
                            <textarea name="about_value3_description" id="about_value3_description" rows="2" class="form-control"
                                required>{{ old('about_value3_description', $about_value3_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 4: Professional Growth -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Professional Growth</h6>
                        <div class="mb-3">
                            <label for="about_value4_title" class="form-label">Title</label>
                            <input type="text" name="about_value4_title" id="about_value4_title" class="form-control"
                                value="{{ old('about_value4_title', $about_value4_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value4_description" class="form-label">Description</label>
                            <textarea name="about_value4_description" id="about_value4_description" rows="2" class="form-control"
                                required>{{ old('about_value4_description', $about_value4_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 5: Teamwork -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Teamwork</h6>
                        <div class="mb-3">
                            <label for="about_value5_title" class="form-label">Title</label>
                            <input type="text" name="about_value5_title" id="about_value5_title" class="form-control"
                                value="{{ old('about_value5_title', $about_value5_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value5_description" class="form-label">Description</label>
                            <textarea name="about_value5_description" id="about_value5_description" rows="2" class="form-control"
                                required>{{ old('about_value5_description', $about_value5_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 6: Employee Care -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Employee Care</h6>
                        <div class="mb-3">
                            <label for="about_value6_title" class="form-label">Title</label>
                            <input type="text" name="about_value6_title" id="about_value6_title" class="form-control"
                                value="{{ old('about_value6_title', $about_value6_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value6_description" class="form-label">Description</label>
                            <textarea name="about_value6_description" id="about_value6_description" rows="2" class="form-control"
                                required>{{ old('about_value6_description', $about_value6_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Value 7: Community Engagement -->
                    <div class="col-md-6 col-lg-4 mx-auto">
                        <h6>Community Engagement</h6>
                        <div class="mb-3">
                            <label for="about_value7_title" class="form-label">Title</label>
                            <input type="text" name="about_value7_title" id="about_value7_title" class="form-control"
                                value="{{ old('about_value7_title', $about_value7_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_value7_description" class="form-label">Description</label>
                            <textarea name="about_value7_description" id="about_value7_description" rows="2" class="form-control"
                                required>{{ old('about_value7_description', $about_value7_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.about.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
