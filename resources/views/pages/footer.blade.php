@extends('layouts.master')

@section('title', 'Footer Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Footer Content</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage footer content and links here</small>
                </div>
                <a href="{{ route('admin.footer.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Company Information -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Company Information</strong></td>
                    </tr>

                    <!-- Address Information -->
                    @foreach([
                        'footer_address_line1' => 'Address Line 1',
                        'footer_address_line2' => 'Address Line 2',
                        'footer_address_line3' => 'Address Line 3',
                        'footer_address_line4' => 'Address Line 4',
                        'footer_address_line5' => 'Address Line 5',
                        'footer_phone' => 'Phone Number',
                        'footer_email' => 'Email Address',
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

                    <!-- Useful Links Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Useful Links Section</strong></td>
                    </tr>
                    @foreach([
                        'footer_useful_links_title' => 'Section Title',
                        'footer_link1_text' => 'Link 1 Text',
                        'footer_link2_text' => 'Link 2 Text',
                        'footer_link3_text' => 'Link 3 Text',
                        'footer_link4_text' => 'Link 4 Text',
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

                    <!-- Services Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Services Section</strong></td>
                    </tr>
                    @foreach([
                        'footer_services_title' => 'Section Title',
                        'footer_service1_text' => 'Service 1 Text',
                        'footer_service2_text' => 'Service 2 Text',
                        'footer_service3_text' => 'Service 3 Text',
                        'footer_service4_text' => 'Service 4 Text',
                        'footer_service5_text' => 'Service 5 Text',
                        'footer_service6_text' => 'Service 6 Text',
                        'footer_service7_text' => 'Service 7 Text',
                        'footer_service8_text' => 'Service 8 Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->value ?? '', 60) ?: 'N/A' }}</td>
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

                    <!-- Contact Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Contact Section</strong></td>
                    </tr>
                    @foreach([
                        'footer_contact_title' => 'Contact Title',
                        'footer_contact_description' => 'Contact Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->value ?? '', 60) ?: 'N/A' }}</td>
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

                    <!-- Social Media -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Social Media Links</strong></td>
                    </tr>
                    @foreach([
                        'footer_social_twitter' => 'Twitter URL',
                        'footer_social_facebook' => 'Facebook URL',
                        'footer_social_instagram' => 'Instagram URL',
                        'footer_social_linkedin' => 'LinkedIn URL',
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

                    <!-- Copyright Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Copyright Section</strong></td>
                    </tr>
                    @foreach([
                        'footer_copyright_text' => 'Copyright Text',
                        'footer_company_name' => 'Company Name',
                        'footer_rights_text' => 'Rights Text',
                        'footer_credits_text' => 'Credits Text',
                        'footer_credits_link' => 'Credits Link',
                        'footer_credits_name' => 'Credits Name',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit($item->value ?? '', 60) ?: 'N/A' }}</td>
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
