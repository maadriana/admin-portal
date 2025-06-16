@extends('layouts.master')

@section('title', 'Header Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Header & Navigation</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage header and navigation content here</small>
                </div>
                <a href="{{ route('admin.header.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Top Bar Contact Information -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Top Bar Contact Information</strong></td>
                    </tr>
                    @foreach([
                        'header_contact_email' => 'Contact Email',
                        'header_contact_phone' => 'Contact Phone',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ $item->value ?? 'N/A' }}</td>
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

                    <!-- Social Media Links -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Social Media Links</strong></td>
                    </tr>
                    @foreach([
                        'header_social_twitter' => 'Twitter URL',
                        'header_social_facebook' => 'Facebook URL',
                        'header_social_instagram' => 'Instagram URL',
                        'header_social_linkedin' => 'LinkedIn URL',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->value ?? '', 60) ?: 'Not set' }}</td>
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

                    <!-- Logo -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Company Logo</strong></td>
                    </tr>
                    @php
                        $logoItem = \App\Models\Content::with('editor')->where('key', 'header_logo')->first();
                    @endphp
                    <tr>
                        <td><strong>Company Logo</strong></td>
                        <td>
                            @if($logoItem && $logoItem->image)
                                <img src="data:image/jpeg;base64,{{ base64_encode($logoItem->image) }}" alt="Company Logo" class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <em>Using default logo</em>
                            @endif
                        </td>
                        <td>
                            @if($logoItem && $logoItem->editor)
                                {{ $logoItem->editor->email }}
                            @elseif($logoItem && $logoItem->updated_by)
                                @php
                                    $user = \App\Models\User::find($logoItem->updated_by);
                                @endphp
                                {{ $user ? $user->email : 'Unknown User' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($logoItem && $logoItem->updated_at)
                                {{ $logoItem->updated_at->format('M d, Y h:i A') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                    <!-- Main Navigation -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Main Navigation Menu</strong></td>
                    </tr>
                    @foreach([
                        'nav_home_text' => 'Home Menu Text',
                        'nav_services_text' => 'Services Menu Text',
                        'nav_people_text' => 'People Menu Text',
                        'nav_careers_text' => 'Careers Menu Text',
                        'nav_international_text' => 'International Menu Text',
                        'nav_contact_text' => 'Contact Menu Text',
                        'nav_about_text' => 'About Menu Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ $item->value ?? 'N/A' }}</td>
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

                    <!-- Services Submenu -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Services Submenu</strong></td>
                    </tr>
                    @foreach([
                        'nav_service_audit' => 'Audit and Assurance',
                        'nav_service_advisory' => 'Business Advisory',
                        'nav_service_outsourcing' => 'Outsourcing',
                        'nav_service_restructuring' => 'Business Restructuring',
                        'nav_service_finance' => 'Corporate Finance',
                        'nav_service_forensic' => 'Forensic',
                        'nav_service_governance' => 'Governance',
                        'nav_service_taxation' => 'Taxation',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ $item->value ?? 'N/A' }}</td>
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

                    <!-- Careers Submenu -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Careers Submenu</strong></td>
                    </tr>
                    @foreach([
                        'nav_career_vacancies' => 'Current Vacancies',
                        'nav_career_professionals' => 'Experienced Professionals',
                        'nav_career_graduate' => 'Graduate',
                        'nav_career_internship' => 'Internship Opportunities',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ $item->value ?? 'N/A' }}</td>
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
