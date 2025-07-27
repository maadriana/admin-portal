@extends('layouts.master')

@section('title', 'Edit History Page Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit History Page Content</h4>

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
                    <label for="history_hero_title" class="form-label">Hero Title</label>
                    <input type="text" name="history_hero_title" id="history_hero_title" class="form-control"
                        value="{{ old('history_hero_title', $history_hero_title) }}" required>
                    <small class="form-text text-muted">Use HTML tags like &lt;br&gt; and &lt;span&gt; for formatting</small>
                </div>

                <div class="mb-3">
                    <label for="history_hero_subtitle" class="form-label">Hero Subtitle</label>
                    <textarea name="history_hero_subtitle" id="history_hero_subtitle" rows="2" class="form-control"
                        required>{{ old('history_hero_subtitle', $history_hero_subtitle) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="history_established_year" class="form-label">Established Year</label>
                            <input type="text" name="history_established_year" id="history_established_year" class="form-control"
                                value="{{ old('history_established_year', $history_established_year) }}" required>
                            <small class="form-text text-muted">e.g., 2002</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="history_mtc_year" class="form-label">MTC Established Year</label>
                            <input type="text" name="history_mtc_year" id="history_mtc_year" class="form-control"
                                value="{{ old('history_mtc_year', $history_mtc_year) }}" required>
                            <small class="form-text text-muted">e.g., 2023</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="history_agn_year" class="form-label">AGN Member Year</label>
                            <input type="text" name="history_agn_year" id="history_agn_year" class="form-control"
                                value="{{ old('history_agn_year', $history_agn_year) }}" required>
                            <small class="form-text text-muted">e.g., 2024</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="history_circular_quote" class="form-label">Circular Quote</label>
                    <input type="text" name="history_circular_quote" id="history_circular_quote" class="form-control"
                        value="{{ old('history_circular_quote', $history_circular_quote) }}" required>
                    <small class="form-text text-muted">Quote in circular element, include quotes if needed</small>
                </div>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Timeline Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_timeline_badge" class="form-label">Timeline Badge</label>
                            <input type="text" name="history_timeline_badge" id="history_timeline_badge" class="form-control"
                                value="{{ old('history_timeline_badge', $history_timeline_badge) }}" required>
                            <small class="form-text text-muted">e.g., "Our Journey"</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_timeline_title" class="form-label">Timeline Title</label>
                            <input type="text" name="history_timeline_title" id="history_timeline_title" class="form-control"
                                value="{{ old('history_timeline_title', $history_timeline_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Events -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Timeline Events</h5>
            </div>
            <div class="card-body">
                <!-- 2002 Event -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">2002 - Foundation Event</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="history_year_2002" class="form-label">Year Label</label>
                                <input type="text" name="history_year_2002" id="history_year_2002" class="form-control"
                                    value="{{ old('history_year_2002', $history_year_2002) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="history_2002_title" class="form-label">Event Title</label>
                                <input type="text" name="history_2002_title" id="history_2002_title" class="form-control"
                                    value="{{ old('history_2002_title', $history_2002_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="history_2002_description" class="form-label">Event Description</label>
                                <textarea name="history_2002_description" id="history_2002_description" rows="3" class="form-control"
                                    required>{{ old('history_2002_description', $history_2002_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2023 Event -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">2023 - MTC Establishment</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="history_year_2023" class="form-label">Year Label</label>
                                <input type="text" name="history_year_2023" id="history_year_2023" class="form-control"
                                    value="{{ old('history_year_2023', $history_year_2023) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="history_2023_title" class="form-label">Event Title</label>
                                <input type="text" name="history_2023_title" id="history_2023_title" class="form-control"
                                    value="{{ old('history_2023_title', $history_2023_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="history_2023_description" class="form-label">Event Description</label>
                                <textarea name="history_2023_description" id="history_2023_description" rows="3" class="form-control"
                                    required>{{ old('history_2023_description', $history_2023_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2024 Event -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">2024 - AGN International</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="history_year_2024" class="form-label">Year Label</label>
                                <input type="text" name="history_year_2024" id="history_year_2024" class="form-control"
                                    value="{{ old('history_year_2024', $history_year_2024) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="history_2024_title" class="form-label">Event Title</label>
                                <input type="text" name="history_2024_title" id="history_2024_title" class="form-control"
                                    value="{{ old('history_2024_title', $history_2024_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="history_2024_description" class="form-label">Event Description</label>
                                <textarea name="history_2024_description" id="history_2024_description" rows="3" class="form-control"
                                    required>{{ old('history_2024_description', $history_2024_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Present Day Event -->
                <div class="border p-3 mb-3 rounded">
                    <h6 class="text-primary mb-3">Present Day</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="history_year_present" class="form-label">Year Label</label>
                                <input type="text" name="history_year_present" id="history_year_present" class="form-control"
                                    value="{{ old('history_year_present', $history_year_present) }}" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="history_present_title" class="form-label">Event Title</label>
                                <input type="text" name="history_present_title" id="history_present_title" class="form-control"
                                    value="{{ old('history_present_title', $history_present_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="history_present_description" class="form-label">Event Description</label>
                                <textarea name="history_present_description" id="history_present_description" rows="3" class="form-control"
                                    required>{{ old('history_present_description', $history_present_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Legacy Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Legacy Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_legacy_badge" class="form-label">Legacy Badge</label>
                            <input type="text" name="history_legacy_badge" id="history_legacy_badge" class="form-control"
                                value="{{ old('history_legacy_badge', $history_legacy_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_legacy_title" class="form-label">Legacy Title</label>
                            <input type="text" name="history_legacy_title" id="history_legacy_title" class="form-control"
                                value="{{ old('history_legacy_title', $history_legacy_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="history_legacy_paragraph1" class="form-label">Legacy Paragraph 1</label>
                    <textarea name="history_legacy_paragraph1" id="history_legacy_paragraph1" rows="4" class="form-control"
                        required>{{ old('history_legacy_paragraph1', $history_legacy_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_legacy_paragraph2" class="form-label">Legacy Paragraph 2</label>
                    <textarea name="history_legacy_paragraph2" id="history_legacy_paragraph2" rows="4" class="form-control"
                        required>{{ old('history_legacy_paragraph2', $history_legacy_paragraph2) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_legacy_paragraph3" class="form-label">Legacy Paragraph 3</label>
                    <textarea name="history_legacy_paragraph3" id="history_legacy_paragraph3" rows="4" class="form-control"
                        required>{{ old('history_legacy_paragraph3', $history_legacy_paragraph3) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Legacy Cards Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Legacy Cards Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- AGN Card -->
                    <div class="col-md-4">
                        <h6>AGN International Card</h6>
                        <div class="mb-3">
                            <label for="history_agn_card_title" class="form-label">Title</label>
                            <input type="text" name="history_agn_card_title" id="history_agn_card_title" class="form-control"
                                value="{{ old('history_agn_card_title', $history_agn_card_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_agn_card_description" class="form-label">Description</label>
                            <textarea name="history_agn_card_description" id="history_agn_card_description" rows="3" class="form-control"
                                required>{{ old('history_agn_card_description', $history_agn_card_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Memberships Card -->
                    <div class="col-md-4">
                        <h6>Professional Memberships Card</h6>
                        <div class="mb-3">
                            <label for="history_memberships_card_title" class="form-label">Title</label>
                            <input type="text" name="history_memberships_card_title" id="history_memberships_card_title" class="form-control"
                                value="{{ old('history_memberships_card_title', $history_memberships_card_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_memberships_card_description" class="form-label">Description</label>
                            <textarea name="history_memberships_card_description" id="history_memberships_card_description" rows="3" class="form-control"
                                required>{{ old('history_memberships_card_description', $history_memberships_card_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Passion Card -->
                    <div class="col-md-4">
                        <h6>Our Promise Card</h6>
                        <div class="mb-3">
                            <label for="history_passion_card_title" class="form-label">Title</label>
                            <input type="text" name="history_passion_card_title" id="history_passion_card_title" class="form-control"
                                value="{{ old('history_passion_card_title', $history_passion_card_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_passion_card_description" class="form-label">Description</label>
                            <textarea name="history_passion_card_description" id="history_passion_card_description" rows="3" class="form-control"
                                required>{{ old('history_passion_card_description', $history_passion_card_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Future Vision Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Future Vision Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_future_badge" class="form-label">Future Badge</label>
                            <input type="text" name="history_future_badge" id="history_future_badge" class="form-control"
                                value="{{ old('history_future_badge', $history_future_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_future_title" class="form-label">Future Title</label>
                            <input type="text" name="history_future_title" id="history_future_title" class="form-control"
                                value="{{ old('history_future_title', $history_future_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="history_future_section_title" class="form-label">Future Section Title</label>
                    <input type="text" name="history_future_section_title" id="history_future_section_title" class="form-control"
                        value="{{ old('history_future_section_title', $history_future_section_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="history_future_paragraph1" class="form-label">Future Paragraph 1</label>
                    <textarea name="history_future_paragraph1" id="history_future_paragraph1" rows="3" class="form-control"
                        required>{{ old('history_future_paragraph1', $history_future_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_future_paragraph2" class="form-label">Future Paragraph 2</label>
                    <textarea name="history_future_paragraph2" id="history_future_paragraph2" rows="3" class="form-control"
                        required>{{ old('history_future_paragraph2', $history_future_paragraph2) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_cta_text" class="form-label">CTA Button Text</label>
                    <input type="text" name="history_cta_text" id="history_cta_text" class="form-control"
                        value="{{ old('history_cta_text', $history_cta_text) }}" required>
                </div>
            </div>
        </div>

        <!-- About Legacy Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">About Legacy Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_about_badge" class="form-label">About Badge</label>
                            <input type="text" name="history_about_badge" id="history_about_badge" class="form-control"
                                value="{{ old('history_about_badge', $history_about_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_about_title" class="form-label">About Title</label>
                            <input type="text" name="history_about_title" id="history_about_title" class="form-control"
                                value="{{ old('history_about_title', $history_about_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="history_about_paragraph1" class="form-label">About Paragraph 1</label>
                    <textarea name="history_about_paragraph1" id="history_about_paragraph1" rows="4" class="form-control"
                        required>{{ old('history_about_paragraph1', $history_about_paragraph1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_about_paragraph2" class="form-label">About Paragraph 2</label>
                    <textarea name="history_about_paragraph2" id="history_about_paragraph2" rows="4" class="form-control"
                        required>{{ old('history_about_paragraph2', $history_about_paragraph2) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="history_about_paragraph3" class="form-label">About Paragraph 3</label>
                    <textarea name="history_about_paragraph3" id="history_about_paragraph3" rows="4" class="form-control"
                        required>{{ old('history_about_paragraph3', $history_about_paragraph3) }}</textarea>
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
                            <label for="history_vision_mission_badge" class="form-label">Vision Mission Badge</label>
                            <input type="text" name="history_vision_mission_badge" id="history_vision_mission_badge" class="form-control"
                                value="{{ old('history_vision_mission_badge', $history_vision_mission_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_vision_mission_title" class="form-label">Vision Mission Title</label>
                            <input type="text" name="history_vision_mission_title" id="history_vision_mission_title" class="form-control"
                                value="{{ old('history_vision_mission_title', $history_vision_mission_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_vision_badge" class="form-label">Vision Badge</label>
                            <input type="text" name="history_vision_badge" id="history_vision_badge" class="form-control"
                                value="{{ old('history_vision_badge', $history_vision_badge) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_vision_text" class="form-label">Vision Text</label>
                            <textarea name="history_vision_text" id="history_vision_text" rows="5" class="form-control"
                                required>{{ old('history_vision_text', $history_vision_text) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_mission_badge" class="form-label">Mission Badge</label>
                            <input type="text" name="history_mission_badge" id="history_mission_badge" class="form-control"
                                value="{{ old('history_mission_badge', $history_mission_badge) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_mission_text" class="form-label">Mission Text</label>
                            <textarea name="history_mission_text" id="history_mission_text" rows="5" class="form-control"
                                required>{{ old('history_mission_text', $history_mission_text) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Values Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_values_badge" class="form-label">Values Badge</label>
                            <input type="text" name="history_values_badge" id="history_values_badge" class="form-control"
                                value="{{ old('history_values_badge', $history_values_badge) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="history_values_title" class="form-label">Values Title</label>
                            <input type="text" name="history_values_title" id="history_values_title" class="form-control"
                                value="{{ old('history_values_title', $history_values_title) }}" required>
                            <small class="form-text text-muted">Use HTML &lt;span&gt; tags for highlighted text</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Core Values</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Excellence Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Excellence</h6>
                        <div class="mb-3">
                            <label for="history_value_excellence_title" class="form-label">Title</label>
                            <input type="text" name="history_value_excellence_title" id="history_value_excellence_title" class="form-control"
                                value="{{ old('history_value_excellence_title', $history_value_excellence_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_excellence_desc" class="form-label">Description</label>
                            <textarea name="history_value_excellence_desc" id="history_value_excellence_desc" rows="3" class="form-control"
                                required>{{ old('history_value_excellence_desc', $history_value_excellence_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Integrity Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Integrity</h6>
                        <div class="mb-3">
                            <label for="history_value_integrity_title" class="form-label">Title</label>
                            <input type="text" name="history_value_integrity_title" id="history_value_integrity_title" class="form-control"
                                value="{{ old('history_value_integrity_title', $history_value_integrity_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_integrity_desc" class="form-label">Description</label>
                            <textarea name="history_value_integrity_desc" id="history_value_integrity_desc" rows="3" class="form-control"
                                required>{{ old('history_value_integrity_desc', $history_value_integrity_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Innovation Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Innovation</h6>
                        <div class="mb-3">
                            <label for="history_value_innovation_title" class="form-label">Title</label>
                            <input type="text" name="history_value_innovation_title" id="history_value_innovation_title" class="form-control"
                                value="{{ old('history_value_innovation_title', $history_value_innovation_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_innovation_desc" class="form-label">Description</label>
                            <textarea name="history_value_innovation_desc" id="history_value_innovation_desc" rows="3" class="form-control"
                                required>{{ old('history_value_innovation_desc', $history_value_innovation_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Professional Development Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Professional Development</h6>
                        <div class="mb-3">
                            <label for="history_value_development_title" class="form-label">Title</label>
                            <input type="text" name="history_value_development_title" id="history_value_development_title" class="form-control"
                                value="{{ old('history_value_development_title', $history_value_development_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_development_desc" class="form-label">Description</label>
                            <textarea name="history_value_development_desc" id="history_value_development_desc" rows="3" class="form-control"
                                required>{{ old('history_value_development_desc', $history_value_development_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Teamwork Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Teamwork</h6>
                        <div class="mb-3">
                            <label for="history_value_teamwork_title" class="form-label">Title</label>
                            <input type="text" name="history_value_teamwork_title" id="history_value_teamwork_title" class="form-control"
                                value="{{ old('history_value_teamwork_title', $history_value_teamwork_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_teamwork_desc" class="form-label">Description</label>
                            <textarea name="history_value_teamwork_desc" id="history_value_teamwork_desc" rows="3" class="form-control"
                                required>{{ old('history_value_teamwork_desc', $history_value_teamwork_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Care for Employees Value -->
                    <div class="col-md-6 col-lg-4">
                        <h6>Care for Employees</h6>
                        <div class="mb-3">
                            <label for="history_value_care_title" class="form-label">Title</label>
                            <input type="text" name="history_value_care_title" id="history_value_care_title" class="form-control"
                                value="{{ old('history_value_care_title', $history_value_care_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_care_desc" class="form-label">Description</label>
                            <textarea name="history_value_care_desc" id="history_value_care_desc" rows="3" class="form-control"
                                required>{{ old('history_value_care_desc', $history_value_care_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Community Engagement Value -->
                    <div class="col-md-6 col-lg-4 mx-auto">
                        <h6>Community Engagement</h6>
                        <div class="mb-3">
                            <label for="history_value_community_title" class="form-label">Title</label>
                            <input type="text" name="history_value_community_title" id="history_value_community_title" class="form-control"
                                value="{{ old('history_value_community_title', $history_value_community_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="history_value_community_desc" class="form-label">Description</label>
                            <textarea name="history_value_community_desc" id="history_value_community_desc" rows="3" class="form-control"
                                required>{{ old('history_value_community_desc', $history_value_community_desc) }}</textarea>
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
