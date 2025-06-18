@extends('layouts.master')

@section('title', 'Edit International Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit International Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.international.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="international_hero_subtitle" class="form-label">Hero Subtitle</label>
                    <textarea name="international_hero_subtitle" id="international_hero_subtitle" rows="3" class="form-control"
                        required>{{ old('international_hero_subtitle', $international_hero_subtitle) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="international_trust_indicator1" class="form-label">Trust Indicator 1</label>
                            <input type="text" name="international_trust_indicator1" id="international_trust_indicator1" class="form-control"
                                value="{{ old('international_trust_indicator1', $international_trust_indicator1) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="international_trust_indicator2" class="form-label">Trust Indicator 2</label>
                            <input type="text" name="international_trust_indicator2" id="international_trust_indicator2" class="form-control"
                                value="{{ old('international_trust_indicator2', $international_trust_indicator2) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="international_hub_title" class="form-label">Hub Title</label>
                            <input type="text" name="international_hub_title" id="international_hub_title" class="form-control"
                                value="{{ old('international_hub_title', $international_hub_title) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="international_hub_subtitle" class="form-label">Hub Subtitle</label>
                            <input type="text" name="international_hub_subtitle" id="international_hub_subtitle" class="form-control"
                                value="{{ old('international_hub_subtitle', $international_hub_subtitle) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expertise Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Expertise Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="expertise_title" class="form-label">Expertise Title</label>
                    <input type="text" name="expertise_title" id="expertise_title" class="form-control"
                        value="{{ old('expertise_title', $expertise_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="expertise_description" class="form-label">Expertise Description</label>
                    <textarea name="expertise_description" id="expertise_description" rows="3" class="form-control"
                        required>{{ old('expertise_description', $expertise_description) }}</textarea>
                </div>

                <!-- Expertise Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="expertise_card1_title" class="form-label">Card 1 Title</label>
                            <input type="text" name="expertise_card1_title" id="expertise_card1_title" class="form-control"
                                value="{{ old('expertise_card1_title', $expertise_card1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expertise_card1_description" class="form-label">Card 1 Description</label>
                            <textarea name="expertise_card1_description" id="expertise_card1_description" rows="3" class="form-control"
                                required>{{ old('expertise_card1_description', $expertise_card1_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="expertise_card2_title" class="form-label">Card 2 Title</label>
                            <input type="text" name="expertise_card2_title" id="expertise_card2_title" class="form-control"
                                value="{{ old('expertise_card2_title', $expertise_card2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expertise_card2_description" class="form-label">Card 2 Description</label>
                            <textarea name="expertise_card2_description" id="expertise_card2_description" rows="3" class="form-control"
                                required>{{ old('expertise_card2_description', $expertise_card2_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="expertise_card3_title" class="form-label">Card 3 Title</label>
                            <input type="text" name="expertise_card3_title" id="expertise_card3_title" class="form-control"
                                value="{{ old('expertise_card3_title', $expertise_card3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expertise_card3_description" class="form-label">Card 3 Description</label>
                            <textarea name="expertise_card3_description" id="expertise_card3_description" rows="3" class="form-control"
                                required>{{ old('expertise_card3_description', $expertise_card3_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="expertise_card4_title" class="form-label">Card 4 Title</label>
                            <input type="text" name="expertise_card4_title" id="expertise_card4_title" class="form-control"
                                value="{{ old('expertise_card4_title', $expertise_card4_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expertise_card4_description" class="form-label">Card 4 Description</label>
                            <textarea name="expertise_card4_description" id="expertise_card4_description" rows="3" class="form-control"
                                required>{{ old('expertise_card4_description', $expertise_card4_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Services Timeline Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="services_title" class="form-label">Services Title</label>
                    <input type="text" name="services_title" id="services_title" class="form-control"
                        value="{{ old('services_title', $services_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="services_description" class="form-label">Services Description</label>
                    <textarea name="services_description" id="services_description" rows="3" class="form-control"
                        required>{{ old('services_description', $services_description) }}</textarea>
                </div>

                <!-- Timeline Services -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="timeline_service1_title" class="form-label">Service 1 Title</label>
                            <input type="text" name="timeline_service1_title" id="timeline_service1_title" class="form-control"
                                value="{{ old('timeline_service1_title', $timeline_service1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="timeline_service1_description" class="form-label">Service 1 Description</label>
                            <textarea name="timeline_service1_description" id="timeline_service1_description" rows="3" class="form-control"
                                required>{{ old('timeline_service1_description', $timeline_service1_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="timeline_service2_title" class="form-label">Service 2 Title</label>
                            <input type="text" name="timeline_service2_title" id="timeline_service2_title" class="form-control"
                                value="{{ old('timeline_service2_title', $timeline_service2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="timeline_service2_description" class="form-label">Service 2 Description</label>
                            <textarea name="timeline_service2_description" id="timeline_service2_description" rows="3" class="form-control"
                                required>{{ old('timeline_service2_description', $timeline_service2_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="timeline_service3_title" class="form-label">Service 3 Title</label>
                            <input type="text" name="timeline_service3_title" id="timeline_service3_title" class="form-control"
                                value="{{ old('timeline_service3_title', $timeline_service3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="timeline_service3_description" class="form-label">Service 3 Description</label>
                            <textarea name="timeline_service3_description" id="timeline_service3_description" rows="3" class="form-control"
                                required>{{ old('timeline_service3_description', $timeline_service3_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="timeline_service4_title" class="form-label">Service 4 Title</label>
                            <input type="text" name="timeline_service4_title" id="timeline_service4_title" class="form-control"
                                value="{{ old('timeline_service4_title', $timeline_service4_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="timeline_service4_description" class="form-label">Service 4 Description</label>
                            <textarea name="timeline_service4_description" id="timeline_service4_description" rows="3" class="form-control"
                                required>{{ old('timeline_service4_description', $timeline_service4_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Global Network Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Global Network & Partnerships</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="network_title" class="form-label">Network Title</label>
                    <input type="text" name="network_title" id="network_title" class="form-control"
                        value="{{ old('network_title', $network_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="network_description" class="form-label">Network Description</label>
                    <textarea name="network_description" id="network_description" rows="3" class="form-control"
                        required>{{ old('network_description', $network_description) }}</textarea>
                </div>

                <!-- Benefits -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="benefit1_title" class="form-label">Benefit 1 Title</label>
                            <input type="text" name="benefit1_title" id="benefit1_title" class="form-control"
                                value="{{ old('benefit1_title', $benefit1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit1_description" class="form-label">Benefit 1 Description</label>
                            <textarea name="benefit1_description" id="benefit1_description" rows="2" class="form-control"
                                required>{{ old('benefit1_description', $benefit1_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="benefit2_title" class="form-label">Benefit 2 Title</label>
                            <input type="text" name="benefit2_title" id="benefit2_title" class="form-control"
                                value="{{ old('benefit2_title', $benefit2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit2_description" class="form-label">Benefit 2 Description</label>
                            <textarea name="benefit2_description" id="benefit2_description" rows="2" class="form-control"
                                required>{{ old('benefit2_description', $benefit2_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="benefit3_title" class="form-label">Benefit 3 Title</label>
                            <input type="text" name="benefit3_title" id="benefit3_title" class="form-control"
                                value="{{ old('benefit3_title', $benefit3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit3_description" class="form-label">Benefit 3 Description</label>
                            <textarea name="benefit3_description" id="benefit3_description" rows="2" class="form-control"
                                required>{{ old('benefit3_description', $benefit3_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="network_cta" class="form-label">Network CTA Button</label>
                    <input type="text" name="network_cta" id="network_cta" class="form-control"
                        value="{{ old('network_cta', $network_cta) }}" required>
                </div>

                <!-- Map Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="map_title" class="form-label">Map Title</label>
                            <input type="text" name="map_title" id="map_title" class="form-control"
                                value="{{ old('map_title', $map_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="map_subtitle" class="form-label">Map Subtitle</label>
                            <input type="text" name="map_subtitle" id="map_subtitle" class="form-control"
                                value="{{ old('map_subtitle', $map_subtitle) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="region1_name" class="form-label">Region 1 Name</label>
                                    <input type="text" name="region1_name" id="region1_name" class="form-control"
                                        value="{{ old('region1_name', $region1_name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="region3_name" class="form-label">Region 3 Name</label>
                                    <input type="text" name="region3_name" id="region3_name" class="form-control"
                                        value="{{ old('region3_name', $region3_name) }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="region2_name" class="form-label">Region 2 Name</label>
                                    <input type="text" name="region2_name" id="region2_name" class="form-control"
                                        value="{{ old('region2_name', $region2_name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="region4_name" class="form-label">Region 4 Name</label>
                                    <input type="text" name="region4_name" id="region4_name" class="form-control"
                                        value="{{ old('region4_name', $region4_name) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Call to Action Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="cta_title" class="form-label">CTA Title</label>
                    <input type="text" name="cta_title" id="cta_title" class="form-control"
                        value="{{ old('cta_title', $cta_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="cta_description" class="form-label">CTA Description</label>
                    <textarea name="cta_description" id="cta_description" rows="3" class="form-control"
                        required>{{ old('cta_description', $cta_description) }}</textarea>
                </div>

                <!-- Action Items -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="action1_title" class="form-label">Action 1 Title</label>
                            <input type="text" name="action1_title" id="action1_title" class="form-control"
                                value="{{ old('action1_title', $action1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="action1_subtitle" class="form-label">Action 1 Subtitle</label>
                            <input type="text" name="action1_subtitle" id="action1_subtitle" class="form-control"
                                value="{{ old('action1_subtitle', $action1_subtitle) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="action2_title" class="form-label">Action 2 Title</label>
                            <input type="text" name="action2_title" id="action2_title" class="form-control"
                                value="{{ old('action2_title', $action2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="action2_subtitle" class="form-label">Action 2 Subtitle</label>
                            <input type="text" name="action2_subtitle" id="action2_subtitle" class="form-control"
                                value="{{ old('action2_subtitle', $action2_subtitle) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_primary_button" class="form-label">Primary Button Text</label>
                            <input type="text" name="cta_primary_button" id="cta_primary_button" class="form-control"
                                value="{{ old('cta_primary_button', $cta_primary_button) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cta_phone_button" class="form-label">Phone Button Text</label>
                            <input type="text" name="cta_phone_button" id="cta_phone_button" class="form-control"
                                value="{{ old('cta_phone_button', $cta_phone_button) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_card_title" class="form-label">Contact Card Title</label>
                            <input type="text" name="contact_card_title" id="contact_card_title" class="form-control"
                                value="{{ old('contact_card_title', $contact_card_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_card_description" class="form-label">Contact Card Description</label>
                            <textarea name="contact_card_description" id="contact_card_description" rows="2" class="form-control"
                                required>{{ old('contact_card_description', $contact_card_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="text" name="contact_email" id="contact_email" class="form-control"
                                value="{{ old('contact_email', $contact_email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_hours" class="form-label">Contact Hours</label>
                            <input type="text" name="contact_hours" id="contact_hours" class="form-control"
                                value="{{ old('contact_hours', $contact_hours) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.international.preview') }}" class="btn btn-secondary">Preview Changes</a>
        </div>
    </form>
</div>
@endsection
