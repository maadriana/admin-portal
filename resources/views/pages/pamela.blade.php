@extends('layouts.master')

@section('title', 'Pamela Grace S. Tangso Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Pamela Grace S. Tangso Profile</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage Pamela's profile content</small>
                </div>
                <a href="{{ route('admin.people.pamela.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Basic Information -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Basic Information</strong></td>
                    </tr>
                    @foreach([
                        'pamela_full_name' => 'Full Name',
                        'pamela_position' => 'Position',
                        'pamela_email' => 'Email Address',
                        'pamela_company' => 'Company',
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

                    <!-- Profile Image -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Profile Image</strong></td>
                    </tr>
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'pamela_profile_image')->first();
                    @endphp
                    <tr>
                        <td><strong>Profile Image</strong></td>
                        <td>
                            @if($item && !empty($item->value))
                                <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Profile Image"
                                    class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <em>No image</em>
                            @endif
                        </td>
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

                    <!-- Hero Statistics -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Hero Statistics</strong></td>
                    </tr>
                    @foreach([
                        'pamela_stat1_value' => 'Stat 1 Value',
                        'pamela_stat1_label' => 'Stat 1 Label',
                        'pamela_stat2_value' => 'Stat 2 Value',
                        'pamela_stat2_label' => 'Stat 2 Label',
                        'pamela_stat3_value' => 'Stat 3 Value',
                        'pamela_stat3_label' => 'Stat 3 Label',
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

                    <!-- Professional Badge -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Professional Badge</strong></td>
                    </tr>
                    @foreach([
                        'pamela_badge_title' => 'Badge Title',
                        'pamela_badge_subtitle' => 'Badge Subtitle',
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

                    <!-- Biography Sections -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Biography Sections</strong></td>
                    </tr>
                    @foreach([
                        'pamela_bio_section1_title' => 'Bio Section 1 Title',
                        'pamela_bio_section1_content' => 'Bio Section 1 Content',
                        'pamela_bio_section2_title' => 'Bio Section 2 Title',
                        'pamela_bio_section2_content' => 'Bio Section 2 Content',
                        'pamela_bio_section3_title' => 'Bio Section 3 Title',
                        'pamela_bio_section3_content' => 'Bio Section 3 Content',
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

                    <!-- Education -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Education</strong></td>
                    </tr>
                    @foreach([
                        'pamela_education1_degree' => 'Education 1 Degree',
                        'pamela_education1_institution' => 'Education 1 Institution',
                        'pamela_education2_degree' => 'Education 2 Degree',
                        'pamela_education2_institution' => 'Education 2 Institution',
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

                    <!-- Industry Experience -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Industry Experience</strong></td>
                    </tr>
                    @for($i = 1; $i <= 12; $i++)
                    @php
                        $key = "pamela_industry{$i}";
                        $label = "Industry {$i}";
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
                    @endfor

                    <!-- Career Timeline -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Career Timeline</strong></td>
                    </tr>
                    @foreach([
                        'pamela_timeline1_period' => 'Timeline 1 Period',
                        'pamela_timeline1_position' => 'Timeline 1 Position',
                        'pamela_timeline2_period' => 'Timeline 2 Period',
                        'pamela_timeline2_position' => 'Timeline 2 Position',
                        'pamela_timeline3_period' => 'Timeline 3 Period',
                        'pamela_timeline3_position' => 'Timeline 3 Position',
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

                    <!-- Professional Affiliations -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Professional Affiliations</strong></td>
                    </tr>
                    @foreach([
                        'pamela_affiliation1_name' => 'Affiliation 1 Name',
                        'pamela_affiliation1_description' => 'Affiliation 1 Description',
                        'pamela_affiliation2_name' => 'Affiliation 2 Name',
                        'pamela_affiliation2_description' => 'Affiliation 2 Description',
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

                    <!-- Core Expertise -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Core Expertise</strong></td>
                    </tr>
                    @foreach([
                        'pamela_expertise1' => 'Expertise 1',
                        'pamela_expertise2' => 'Expertise 2',
                        'pamela_expertise3' => 'Expertise 3',
                        'pamela_expertise4' => 'Expertise 4',
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

                    <!-- Professional Quote -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Professional Quote</strong></td>
                    </tr>
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'pamela_quote')->first();
                    @endphp
                    <tr>
                        <td><strong>Professional Quote</strong></td>
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
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
