@extends('layouts.master')

@section('title', 'Taxation Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Taxation Page</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage taxation page content</small>
                </div>
                <a href="{{ route('admin.taxation.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Header Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Header Section</strong></td>
                    </tr>
                    @foreach([
                        'taxation_page_title' => 'Page Title',
                        'taxation_page_subtitle' => 'Page Subtitle',
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

                    <!-- Service Image -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Service Image</strong></td>
                    </tr>
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'taxation_service_image')->first();
                    @endphp
                    <tr>
                        <td><strong>Service Image</strong></td>
                        <td>
                            @if($item && !empty($item->value))
                                <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Service Image"
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

                    <!-- Service Overview -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Service Overview</strong></td>
                    </tr>
                    @foreach([
                        'taxation_overview_title' => 'Overview Title',
                        'taxation_overview_paragraph1' => 'Overview Paragraph',
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

                    <!-- Approach Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Our Approach Section</strong></td>
                    </tr>
                    @foreach([
                        'taxation_approach_title' => 'Approach Title',
                        'taxation_approach_item1_title' => 'Approach Item 1 Title',
                        'taxation_approach_item1_description' => 'Approach Item 1 Description',
                        'taxation_approach_item2_title' => 'Approach Item 2 Title',
                        'taxation_approach_item2_description' => 'Approach Item 2 Description',
                        'taxation_approach_item3_title' => 'Approach Item 3 Title',
                        'taxation_approach_item3_description' => 'Approach Item 3 Description',
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
                        <td colspan="4"><strong>Services Section</strong></td>
                    </tr>
                    @foreach([
                        'taxation_services_title' => 'Services Title',
                        'taxation_service1' => 'Service 1',
                        'taxation_service2' => 'Service 2',
                        'taxation_service3' => 'Service 3',
                        'taxation_service4' => 'Service 4',
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

                    <!-- CTA Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Call to Action</strong></td>
                    </tr>
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'taxation_cta_text')->first();
                    @endphp
                    <tr>
                        <td><strong>CTA Button Text</strong></td>
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

                    <!-- Sidebar Content -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Sidebar Content</strong></td>
                    </tr>
                    @foreach([
                        'taxation_sidebar_cta_title' => 'Sidebar CTA Title',
                        'taxation_sidebar_cta_description' => 'Sidebar CTA Description',
                        'taxation_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
                        'taxation_related_title' => 'Quick Facts Title',
                        'taxation_fact1_label' => 'Quick Fact 1 Label',
                        'taxation_fact1_value' => 'Quick Fact 1 Value',
                        'taxation_fact2_label' => 'Quick Fact 2 Label',
                        'taxation_fact2_value' => 'Quick Fact 2 Value',
                        'taxation_fact3_label' => 'Quick Fact 3 Label',
                        'taxation_fact3_value' => 'Quick Fact 3 Value',
                        'taxation_related_service1' => 'Related Service 1',
                        'taxation_related_service2' => 'Related Service 2',
                        'taxation_related_service3' => 'Related Service 3',
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
