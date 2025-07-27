@extends('layouts.master')

@section('title', 'History Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">History Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage history page content here</small>
                </div>
                <a href="{{ route('admin.about.edit') }}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th style="width: 25%;">Section</th>
                        <th style="width: 35%;">Content</th>
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
                        'history_hero_title' => 'Hero Title',
                        'history_hero_subtitle' => 'Hero Subtitle',
                        'history_established_year' => 'Established Year',
                        'history_mtc_year' => 'MTC Year',
                        'history_agn_year' => 'AGN Year',
                        'history_circular_quote' => 'Circular Quote',
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

                    <!-- Timeline Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Timeline Section</strong></td>
                    </tr>
                    @foreach([
                        'history_timeline_badge' => 'Timeline Badge',
                        'history_timeline_title' => 'Timeline Title',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Timeline Events -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Timeline Events</strong></td>
                    </tr>
                    @foreach([
                        'history_year_2002' => '2002 Year Label',
                        'history_2002_title' => '2002 Event Title',
                        'history_2002_description' => '2002 Event Description',
                        'history_year_2023' => '2023 Year Label',
                        'history_2023_title' => '2023 Event Title',
                        'history_2023_description' => '2023 Event Description',
                        'history_year_2024' => '2024 Year Label',
                        'history_2024_title' => '2024 Event Title',
                        'history_2024_description' => '2024 Event Description',
                        'history_year_present' => 'Present Year Label',
                        'history_present_title' => 'Present Event Title',
                        'history_present_description' => 'Present Event Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Legacy Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Legacy Section</strong></td>
                    </tr>
                    @foreach([
                        'history_legacy_badge' => 'Legacy Badge',
                        'history_legacy_title' => 'Legacy Title',
                        'history_legacy_paragraph1' => 'Legacy Paragraph 1',
                        'history_legacy_paragraph2' => 'Legacy Paragraph 2',
                        'history_legacy_paragraph3' => 'Legacy Paragraph 3',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Legacy Cards Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Legacy Cards</strong></td>
                    </tr>
                    @foreach([
                        'history_agn_card_title' => 'AGN Card Title',
                        'history_agn_card_description' => 'AGN Card Description',
                        'history_memberships_card_title' => 'Memberships Card Title',
                        'history_memberships_card_description' => 'Memberships Card Description',
                        'history_passion_card_title' => 'Passion Card Title',
                        'history_passion_card_description' => 'Passion Card Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Future Vision Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Future Vision Section</strong></td>
                    </tr>
                    @foreach([
                        'history_future_badge' => 'Future Badge',
                        'history_future_title' => 'Future Title',
                        'history_future_section_title' => 'Future Section Title',
                        'history_future_paragraph1' => 'Future Paragraph 1',
                        'history_future_paragraph2' => 'Future Paragraph 2',
                        'history_cta_text' => 'CTA Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- About Legacy Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>About Legacy Section</strong></td>
                    </tr>
                    @foreach([
                        'history_about_badge' => 'About Badge',
                        'history_about_title' => 'About Title',
                        'history_about_paragraph1' => 'About Paragraph 1',
                        'history_about_paragraph2' => 'About Paragraph 2',
                        'history_about_paragraph3' => 'About Paragraph 3',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Vision & Mission Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Vision & Mission Section</strong></td>
                    </tr>
                    @foreach([
                        'history_vision_mission_badge' => 'Vision Mission Badge',
                        'history_vision_mission_title' => 'Vision Mission Title',
                        'history_vision_badge' => 'Vision Badge',
                        'history_vision_text' => 'Vision Text',
                        'history_mission_badge' => 'Mission Badge',
                        'history_mission_text' => 'Mission Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Values Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Values Section</strong></td>
                    </tr>
                    @foreach([
                        'history_values_badge' => 'Values Badge',
                        'history_values_title' => 'Values Title',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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

                    <!-- Core Values Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Core Values</strong></td>
                    </tr>
                    @foreach([
                        'history_value_excellence_title' => 'Excellence Value Title',
                        'history_value_excellence_desc' => 'Excellence Value Description',
                        'history_value_integrity_title' => 'Integrity Value Title',
                        'history_value_integrity_desc' => 'Integrity Value Description',
                        'history_value_innovation_title' => 'Innovation Value Title',
                        'history_value_innovation_desc' => 'Innovation Value Description',
                        'history_value_development_title' => 'Development Value Title',
                        'history_value_development_desc' => 'Development Value Description',
                        'history_value_teamwork_title' => 'Teamwork Value Title',
                        'history_value_teamwork_desc' => 'Teamwork Value Description',
                        'history_value_care_title' => 'Care Value Title',
                        'history_value_care_desc' => 'Care Value Description',
                        'history_value_community_title' => 'Community Value Title',
                        'history_value_community_desc' => 'Community Value Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                {{ $item->editor->email }}
                            @elseif($item && $item->updated_by)
                                @php
                                    $user = \App\Models\User::find($item->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
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
