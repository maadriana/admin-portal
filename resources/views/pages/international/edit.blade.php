@extends('layouts.master')

@section('title', 'Edit AGN International Content')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit AGN International Page Content</h4>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.international.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Hero Section - AGN International -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section - AGN International</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agn_hero_title" class="form-label">AGN Hero Title</label>
                            <input type="text" name="agn_hero_title" id="agn_hero_title" class="form-control"
                                value="{{ old('agn_hero_title', $agn_hero_title) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agn_hero_subtitle" class="form-label">AGN Hero Subtitle</label>
                            <input type="text" name="agn_hero_subtitle" id="agn_hero_subtitle" class="form-control"
                                value="{{ old('agn_hero_subtitle', $agn_hero_subtitle) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Network Stats -->
                <h6 class="mt-4 mb-3">Network Statistics</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="agn_member_firms_count" class="form-label">Member Firms Count</label>
                            <input type="text" name="agn_member_firms_count" id="agn_member_firms_count" class="form-control"
                                value="{{ old('agn_member_firms_count', $agn_member_firms_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="agn_member_firms_label" class="form-label">Member Firms Label</label>
                            <input type="text" name="agn_member_firms_label" id="agn_member_firms_label" class="form-control"
                                value="{{ old('agn_member_firms_label', $agn_member_firms_label) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="agn_countries_count" class="form-label">Countries Count</label>
                            <input type="text" name="agn_countries_count" id="agn_countries_count" class="form-control"
                                value="{{ old('agn_countries_count', $agn_countries_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="agn_countries_label" class="form-label">Countries Label</label>
                            <input type="text" name="agn_countries_label" id="agn_countries_label" class="form-control"
                                value="{{ old('agn_countries_label', $agn_countries_label) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="agn_reach_count" class="form-label">Reach Count</label>
                            <input type="text" name="agn_reach_count" id="agn_reach_count" class="form-control"
                                value="{{ old('agn_reach_count', $agn_reach_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="agn_reach_label" class="form-label">Reach Label</label>
                            <input type="text" name="agn_reach_label" id="agn_reach_label" class="form-control"
                                value="{{ old('agn_reach_label', $agn_reach_label) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MTC and AGN International Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">MTC and AGN International Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="mtc_agn_title" class="form-label">MTC and AGN Title</label>
                    <input type="text" name="mtc_agn_title" id="mtc_agn_title" class="form-control"
                        value="{{ old('mtc_agn_title', $mtc_agn_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="mtc_agn_description" class="form-label">MTC and AGN Description</label>
                    <textarea name="mtc_agn_description" id="mtc_agn_description" rows="4" class="form-control"
                        required>{{ old('mtc_agn_description', $mtc_agn_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Network Statistics Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Network Information Statistics</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="network_stats_firms_count" class="form-label">Network Stats - Firms Count</label>
                            <input type="text" name="network_stats_firms_count" id="network_stats_firms_count" class="form-control"
                                value="{{ old('network_stats_firms_count', $network_stats_firms_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="network_stats_firms_label" class="form-label">Network Stats - Firms Label</label>
                            <input type="text" name="network_stats_firms_label" id="network_stats_firms_label" class="form-control"
                                value="{{ old('network_stats_firms_label', $network_stats_firms_label) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="network_stats_countries_count" class="form-label">Network Stats - Countries Count</label>
                            <input type="text" name="network_stats_countries_count" id="network_stats_countries_count" class="form-control"
                                value="{{ old('network_stats_countries_count', $network_stats_countries_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="network_stats_countries_label" class="form-label">Network Stats - Countries Label</label>
                            <input type="text" name="network_stats_countries_label" id="network_stats_countries_label" class="form-control"
                                value="{{ old('network_stats_countries_label', $network_stats_countries_label) }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="network_stats_global_count" class="form-label">Network Stats - Global Count</label>
                            <input type="text" name="network_stats_global_count" id="network_stats_global_count" class="form-control"
                                value="{{ old('network_stats_global_count', $network_stats_global_count) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="network_stats_global_label" class="form-label">Network Stats - Global Label</label>
                            <input type="text" name="network_stats_global_label" id="network_stats_global_label" class="form-control"
                                value="{{ old('network_stats_global_label', $network_stats_global_label) }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trusted Experts Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">A Network of Trusted Experts</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="trusted_experts_title" class="form-label">Trusted Experts Title</label>
                    <input type="text" name="trusted_experts_title" id="trusted_experts_title" class="form-control"
                        value="{{ old('trusted_experts_title', $trusted_experts_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="trusted_experts_description_1" class="form-label">Trusted Experts Description 1</label>
                    <textarea name="trusted_experts_description_1" id="trusted_experts_description_1" rows="4" class="form-control"
                        required>{{ old('trusted_experts_description_1', $trusted_experts_description_1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="trusted_experts_description_2" class="form-label">Trusted Experts Description 2</label>
                    <textarea name="trusted_experts_description_2" id="trusted_experts_description_2" rows="4" class="form-control"
                        required>{{ old('trusted_experts_description_2', $trusted_experts_description_2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Client Benefits Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Client Benefits Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="client_benefits_title" class="form-label">Client Benefits Title</label>
                    <input type="text" name="client_benefits_title" id="client_benefits_title" class="form-control"
                        value="{{ old('client_benefits_title', $client_benefits_title) }}" required>
                </div>

                <!-- Benefits Cards -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="benefit1_title" class="form-label">Benefit 1 Title</label>
                            <input type="text" name="benefit1_title" id="benefit1_title" class="form-control"
                                value="{{ old('benefit1_title', $benefit1_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit1_description" class="form-label">Benefit 1 Description</label>
                            <textarea name="benefit1_description" id="benefit1_description" rows="3" class="form-control"
                                required>{{ old('benefit1_description', $benefit1_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="benefit2_title" class="form-label">Benefit 2 Title</label>
                            <input type="text" name="benefit2_title" id="benefit2_title" class="form-control"
                                value="{{ old('benefit2_title', $benefit2_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit2_description" class="form-label">Benefit 2 Description</label>
                            <textarea name="benefit2_description" id="benefit2_description" rows="3" class="form-control"
                                required>{{ old('benefit2_description', $benefit2_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="benefit3_title" class="form-label">Benefit 3 Title</label>
                            <input type="text" name="benefit3_title" id="benefit3_title" class="form-control"
                                value="{{ old('benefit3_title', $benefit3_title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="benefit3_description" class="form-label">Benefit 3 Description</label>
                            <textarea name="benefit3_description" id="benefit3_description" rows="3" class="form-control"
                                required>{{ old('benefit3_description', $benefit3_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About AGN International Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">About AGN International</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="about_agn_title" class="form-label">About AGN Title</label>
                    <input type="text" name="about_agn_title" id="about_agn_title" class="form-control"
                        value="{{ old('about_agn_title', $about_agn_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="about_agn_description_1" class="form-label">About AGN Description 1</label>
                    <textarea name="about_agn_description_1" id="about_agn_description_1" rows="3" class="form-control"
                        required>{{ old('about_agn_description_1', $about_agn_description_1) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="about_agn_description_2" class="form-label">About AGN Description 2</label>
                    <textarea name="about_agn_description_2" id="about_agn_description_2" rows="3" class="form-control"
                        required>{{ old('about_agn_description_2', $about_agn_description_2) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="agn_website_url" class="form-label">AGN Website URL</label>
                    <input type="url" name="agn_website_url" id="agn_website_url" class="form-control"
                        value="{{ old('agn_website_url', $agn_website_url) }}" required>
                </div>
            </div>
        </div>

        <!-- Disclaimer Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Disclaimer Section</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="disclaimer_title" class="form-label">Disclaimer Title</label>
                    <input type="text" name="disclaimer_title" id="disclaimer_title" class="form-control"
                        value="{{ old('disclaimer_title', $disclaimer_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="disclaimer_content" class="form-label">Disclaimer Content</label>
                    <textarea name="disclaimer_content" id="disclaimer_content" rows="6" class="form-control"
                        required>{{ old('disclaimer_content', $disclaimer_content) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Contact CTA Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Call-to-Action</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="contact_cta_title" class="form-label">Contact CTA Title</label>
                    <input type="text" name="contact_cta_title" id="contact_cta_title" class="form-control"
                        value="{{ old('contact_cta_title', $contact_cta_title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contact_cta_description" class="form-label">Contact CTA Description</label>
                    <textarea name="contact_cta_description" id="contact_cta_description" rows="3" class="form-control"
                        required>{{ old('contact_cta_description', $contact_cta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="contact_cta_button" class="form-label">Contact CTA Button Text</label>
                    <input type="text" name="contact_cta_button" id="contact_cta_button" class="form-control"
                        value="{{ old('contact_cta_button', $contact_cta_button) }}" required>
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
