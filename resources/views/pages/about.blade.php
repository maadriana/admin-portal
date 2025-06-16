@extends('layouts.master')

@section('title', 'About Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">About Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage about page content here</small>
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
                        'about_hero_title' => 'Hero Title',
                        'about_hero_subtitle' => 'Hero Subtitle',
                        'about_years_legacy' => 'Years Legacy Number',
                        'about_clients_served' => 'Clients Served Number',
                        'about_circular_quote' => 'Circular Quote Text',
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

                    <!-- Story Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Story Section</strong></td>
                    </tr>
                    @foreach([
                        'about_story_badge' => 'Story Badge',
                        'about_story_title' => 'Story Title',
                        'about_story_paragraph1' => 'Story Paragraph 1',
                        'about_story_paragraph2' => 'Story Paragraph 2',
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

                    <!-- Cards Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Cards Section</strong></td>
                    </tr>
                    @foreach([
                        'about_card1_title' => 'Excellence Card Title',
                        'about_card1_description' => 'Excellence Card Description',
                        'about_card2_title' => 'Innovation Card Title',
                        'about_card2_description' => 'Innovation Card Description',
                        'about_card3_title' => 'Promise Card Title',
                        'about_card3_description' => 'Promise Card Description',
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
                        'about_vision_text' => 'Vision Text',
                        'about_mission_text' => 'Mission Text',
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
                        <td colspan="4"><strong>Core Values Section</strong></td>
                    </tr>
                    @foreach([
                        'about_value1_title' => 'Excellence Value Title',
                        'about_value1_description' => 'Excellence Value Description',
                        'about_value2_title' => 'Integrity Value Title',
                        'about_value2_description' => 'Integrity Value Description',
                        'about_value3_title' => 'Innovation Value Title',
                        'about_value3_description' => 'Innovation Value Description',
                        'about_value4_title' => 'Professional Growth Value Title',
                        'about_value4_description' => 'Professional Growth Value Description',
                        'about_value5_title' => 'Teamwork Value Title',
                        'about_value5_description' => 'Teamwork Value Description',
                        'about_value6_title' => 'Employee Care Value Title',
                        'about_value6_description' => 'Employee Care Value Description',
                        'about_value7_title' => 'Community Engagement Value Title',
                        'about_value7_description' => 'Community Engagement Value Description',
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
