@extends('layouts.master')

@section('title', 'Emmanuel Y. Mendoza Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Emmanuel Y. Mendoza Profile</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage Emmanuel's profile content</small>
                </div>
                <a href="{{ route('admin.people.emmanuel.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'emmanuel_full_name' => 'Full Name',
                        'emmanuel_position' => 'Position',
                        'emmanuel_email' => 'Email Address',
                        'emmanuel_company' => 'Company',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'emmanuel_profile_image')->first();
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
                        'emmanuel_stat1_value' => 'Stat 1 Value',
                        'emmanuel_stat1_label' => 'Stat 1 Label',
                        'emmanuel_stat2_value' => 'Stat 2 Value',
                        'emmanuel_stat2_label' => 'Stat 2 Label',
                        'emmanuel_stat3_value' => 'Stat 3 Value',
                        'emmanuel_stat3_label' => 'Stat 3 Label',
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
                        'emmanuel_bio_section1_title' => 'Bio Section 1 Title',
                        'emmanuel_bio_section1_content' => 'Bio Section 1 Content',
                        'emmanuel_bio_section2_title' => 'Bio Section 2 Title',
                        'emmanuel_bio_section2_content' => 'Bio Section 2 Content',
                        'emmanuel_bio_section3_title' => 'Bio Section 3 Title',
                        'emmanuel_bio_section3_content' => 'Bio Section 3 Content',
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
                        'emmanuel_education1_degree' => 'Education 1 Degree',
                        'emmanuel_education1_institution' => 'Education 1 Institution',
                        'emmanuel_education2_degree' => 'Education 2 Degree',
                        'emmanuel_education2_institution' => 'Education 2 Institution',
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
                        'emmanuel_affiliation1_name' => 'Affiliation 1 Name',
                        'emmanuel_affiliation1_description' => 'Affiliation 1 Description',
                        'emmanuel_affiliation2_name' => 'Affiliation 2 Name',
                        'emmanuel_affiliation2_description' => 'Affiliation 2 Description',
                        'emmanuel_affiliation3_name' => 'Affiliation 3 Name',
                        'emmanuel_affiliation3_description' => 'Affiliation 3 Description',
                        'emmanuel_affiliation4_name' => 'Affiliation 4 Name',
                        'emmanuel_affiliation4_description' => 'Affiliation 4 Description',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'emmanuel_quote')->first();
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
