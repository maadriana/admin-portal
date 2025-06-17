{{-- views/pages/governance.blade.php (Admin Portal Preview) --}}
@extends('layouts.master')

@section('title', 'Governance & Risk Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Governance, Risk & Internal Audit</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage governance & risk page content</small>
                </div>
                <a href="{{ route('admin.governance.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'governance_page_title' => 'Page Title',
                        'governance_page_subtitle' => 'Page Subtitle',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'governance_service_image')->first();
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
                        'governance_overview_title' => 'Overview Title',
                        'governance_overview_paragraph1' => 'Overview Paragraph 1',
                        'governance_overview_paragraph2' => 'Overview Paragraph 2',
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
                        'governance_approach_title' => 'Approach Title',
                        'governance_approach_item1_title' => 'Approach Item 1 Title',
                        'governance_approach_item1_description' => 'Approach Item 1 Description',
                        'governance_approach_item2_title' => 'Approach Item 2 Title',
                        'governance_approach_item2_description' => 'Approach Item 2 Description',
                        'governance_approach_item3_title' => 'Approach Item 3 Title',
                        'governance_approach_item3_description' => 'Approach Item 3 Description',
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
                        'governance_services_title' => 'Services Title',
                        'governance_service1_title' => 'Service 1 Title',
                        'governance_service1_description' => 'Service 1 Description',
                        'governance_service2_title' => 'Service 2 Title',
                        'governance_service2_description' => 'Service 2 Description',
                        'governance_service3_title' => 'Service 3 Title',
                        'governance_service3_description' => 'Service 3 Description',
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

                    <!-- Benefits Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Benefits Section</strong></td>
                    </tr>
                    @foreach([
                        'governance_benefits_title' => 'Benefits Title',
                        'governance_benefit1_title' => 'Benefit 1 Title',
                        'governance_benefit1_description' => 'Benefit 1 Description',
                        'governance_benefit2_title' => 'Benefit 2 Title',
                        'governance_benefit2_description' => 'Benefit 2 Description',
                        'governance_benefit3_title' => 'Benefit 3 Title',
                        'governance_benefit3_description' => 'Benefit 3 Description',
                        'governance_benefit4_title' => 'Benefit 4 Title',
                        'governance_benefit4_description' => 'Benefit 4 Description',
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

                    <!-- Sidebar Content -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Sidebar Content</strong></td>
                    </tr>
                    @foreach([
                        'governance_sidebar_cta_title' => 'Sidebar CTA Title',
                        'governance_sidebar_cta_description' => 'Sidebar CTA Description',
                        'governance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
                        'governance_fact1_label' => 'Quick Fact 1 Label',
                        'governance_fact1_value' => 'Quick Fact 1 Value',
                        'governance_fact2_label' => 'Quick Fact 2 Label',
                        'governance_fact2_value' => 'Quick Fact 2 Value',
                        'governance_fact3_label' => 'Quick Fact 3 Label',
                        'governance_fact3_value' => 'Quick Fact 3 Value',
                        'governance_related_title' => 'Related Services Title',
                        'governance_related_service1' => 'Related Service 1',
                        'governance_related_service2' => 'Related Service 2',
                        'governance_related_service3' => 'Related Service 3',
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
