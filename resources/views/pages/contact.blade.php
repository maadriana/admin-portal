@extends('layouts.master')

@section('title', 'Contact Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Contact Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage contact page content here</small>
                </div>
                <a href="{{ route('admin.contact.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Header Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Header Section</strong></td>
                    </tr>
                    @foreach([
                        'contact_main_title' => 'Main Title',
                        'contact_subtitle' => 'Subtitle',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{!! \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' !!}</td>
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

                    <!-- Contact Information Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Address Information</strong></td>
                    </tr>
                    @foreach([
                        'contact_address_title' => 'Address Title',
                        'contact_address_line1' => 'Address Line 1',
                        'contact_address_line2' => 'Address Line 2',
                        'contact_address_line3' => 'Address Line 3',
                        'contact_address_line4' => 'Address Line 4',
                        'contact_address_line5' => 'Address Line 5',
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

                    <!-- Phone Information -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Phone Information</strong></td>
                    </tr>
                    @foreach([
                        'contact_phone_title' => 'Phone Title',
                        'contact_phone_number' => 'Phone Number',
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

                    <!-- Email Information -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Email Information</strong></td>
                    </tr>
                    @foreach([
                        'contact_email_title' => 'Email Title',
                        'contact_email_address' => 'Email Address',
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

                    <!-- Map Settings -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Map Settings</strong></td>
                    </tr>
                    @foreach([
                        'contact_map_embed_url' => 'Google Maps Embed URL',
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

                    <!-- Form Labels -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Contact Form Labels</strong></td>
                    </tr>
                    @foreach([
                        'contact_form_name_label' => 'Name Field Label',
                        'contact_form_email_label' => 'Email Field Label',
                        'contact_form_subject_label' => 'Subject Field Label',
                        'contact_form_message_label' => 'Message Field Label',
                        'contact_form_button_text' => 'Submit Button Text',
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

                    <!-- Success/Error Messages -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Messages</strong></td>
                    </tr>
                    @foreach([
                        'contact_success_message' => 'Success Message',
                        'contact_error_message' => 'Error Message',
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
