@extends('layouts.master')

@section('title', 'International Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">International Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage international page content here</small>
                </div>
                <a href="{{ route('admin.international.edit') }}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th style="width: 20%;">Section</th>
                        <th style="width: 40%;">Content</th>
                        <th style="width: 20%;">Last Edited By</th>
                        <th style="width: 20%;">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hero Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Hero Section</strong></td>
                    </tr>
                    @foreach([
                        'international_hero_subtitle' => 'Hero Subtitle',
                        'international_trust_indicator1' => 'Trust Indicator 1',
                        'international_trust_indicator2' => 'Trust Indicator 2',
                        'international_hub_title' => 'Hub Title',
                        'international_hub_subtitle' => 'Hub Subtitle',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item)
                                @if($item->editor)
                                    {{ $item->editor->email }}
                                @elseif($item->updated_by)
                                    @php
                                        $user = \App\Models\User::find($item->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    System
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item && $item->updated_at)
                                {{ $item->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <!-- Expertise Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Expertise Section</strong></td>
                    </tr>
                    @foreach([
                        'expertise_title' => 'Expertise Title',
                        'expertise_description' => 'Expertise Description',
                        'expertise_card1_title' => 'Card 1 Title',
                        'expertise_card1_description' => 'Card 1 Description',
                        'expertise_card2_title' => 'Card 2 Title',
                        'expertise_card2_description' => 'Card 2 Description',
                        'expertise_card3_title' => 'Card 3 Title',
                        'expertise_card3_description' => 'Card 3 Description',
                        'expertise_card4_title' => 'Card 4 Title',
                        'expertise_card4_description' => 'Card 4 Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item)
                                @if($item->editor)
                                    {{ $item->editor->email }}
                                @elseif($item->updated_by)
                                    @php
                                        $user = \App\Models\User::find($item->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    System
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item && $item->updated_at)
                                {{ $item->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <!-- Services Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Services Timeline</strong></td>
                    </tr>
                    @foreach([
                        'services_title' => 'Services Title',
                        'services_description' => 'Services Description',
                        'timeline_service1_title' => 'Service 1 Title',
                        'timeline_service1_description' => 'Service 1 Description',
                        'timeline_service2_title' => 'Service 2 Title',
                        'timeline_service2_description' => 'Service 2 Description',
                        'timeline_service3_title' => 'Service 3 Title',
                        'timeline_service3_description' => 'Service 3 Description',
                        'timeline_service4_title' => 'Service 4 Title',
                        'timeline_service4_description' => 'Service 4 Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item)
                                @if($item->editor)
                                    {{ $item->editor->email }}
                                @elseif($item->updated_by)
                                    @php
                                        $user = \App\Models\User::find($item->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    System
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item && $item->updated_at)
                                {{ $item->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <!-- Global Network Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Global Network & Partnerships</strong></td>
                    </tr>
                    @foreach([
                        'network_title' => 'Network Title',
                        'network_description' => 'Network Description',
                        'benefit1_title' => 'Benefit 1 Title',
                        'benefit1_description' => 'Benefit 1 Description',
                        'benefit2_title' => 'Benefit 2 Title',
                        'benefit2_description' => 'Benefit 2 Description',
                        'benefit3_title' => 'Benefit 3 Title',
                        'benefit3_description' => 'Benefit 3 Description',
                        'network_cta' => 'Network CTA Button',
                        'map_title' => 'Map Title',
                        'map_subtitle' => 'Map Subtitle',
                        'region1_name' => 'Region 1 Name',
                        'region2_name' => 'Region 2 Name',
                        'region3_name' => 'Region 3 Name',
                        'region4_name' => 'Region 4 Name',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item)
                                @if($item->editor)
                                    {{ $item->editor->email }}
                                @elseif($item->updated_by)
                                    @php
                                        $user = \App\Models\User::find($item->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    System
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item && $item->updated_at)
                                {{ $item->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <!-- Call to Action Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Call to Action Section</strong></td>
                    </tr>
                    @foreach([
                        'cta_title' => 'CTA Title',
                        'cta_description' => 'CTA Description',
                        'action1_title' => 'Action 1 Title',
                        'action1_subtitle' => 'Action 1 Subtitle',
                        'action2_title' => 'Action 2 Title',
                        'action2_subtitle' => 'Action 2 Subtitle',
                        'cta_primary_button' => 'Primary Button',
                        'cta_phone_button' => 'Phone Button',
                        'contact_card_title' => 'Contact Card Title',
                        'contact_card_description' => 'Contact Card Description',
                        'contact_email' => 'Contact Email',
                        'contact_hours' => 'Contact Hours',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item)
                                @if($item->editor)
                                    {{ $item->editor->email }}
                                @elseif($item->updated_by)
                                    @php
                                        $user = \App\Models\User::find($item->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    System
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item && $item->updated_at)
                                {{ $item->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
