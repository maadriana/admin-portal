@extends('layouts.master')

@section('title', 'Corporate Finance Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Corporate Finance & Advisory Page</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage corporate finance page content</small>
                </div>
                <a href="{{ route('admin.finance.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'finance_page_title' => 'Page Title',
                        'finance_page_subtitle' => 'Page Subtitle',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'finance_service_image')->first();
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
                        'finance_overview_title' => 'Overview Title',
                        'finance_overview_paragraph1' => 'Overview Paragraph 1',
                        'finance_overview_paragraph2' => 'Overview Paragraph 2',
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

                    <!-- Core Services Section (Dynamic) -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Core Services Section (Dynamic)</strong></td>
                    </tr>

                    <!-- Services Title -->
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'finance_services_title')->first();
                    @endphp
                    <tr>
                        <td><strong>Services Section Title</strong></td>
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

                    <!-- Dynamic Service Items -->
                    @php
                        $dynamicServiceItems = [];
                        $i = 1;
                        while(true) {
                            $titleKey = "finance_service_item{$i}_title";
                            $descKey = "finance_service_item{$i}_description";
                            $titleItem = \App\Models\Content::with('editor')->where('key', $titleKey)->first();
                            $descItem = \App\Models\Content::with('editor')->where('key', $descKey)->first();

                            if ($titleItem || $descItem) {
                                $dynamicServiceItems[] = [
                                    'index' => $i,
                                    'title_key' => $titleKey,
                                    'desc_key' => $descKey,
                                    'title_item' => $titleItem,
                                    'desc_item' => $descItem
                                ];
                                $i++;
                            } else {
                                break;
                            }
                        }
                    @endphp

                    @if(count($dynamicServiceItems) > 0)
                        @foreach($dynamicServiceItems as $serviceItem)
                        <tr>
                            <td><strong>Service {{ $serviceItem['index'] }} Title</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($serviceItem['title_item']->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($serviceItem['title_item'])
                                    @if($serviceItem['title_item']->editor)
                                        {{ $serviceItem['title_item']->editor->email }}
                                    @elseif($serviceItem['title_item']->updated_by)
                                        @php
                                            $user = \App\Models\User::find($serviceItem['title_item']->updated_by);
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
                                @if($serviceItem['title_item'] && $serviceItem['title_item']->updated_at)
                                    {{ $serviceItem['title_item']->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Service {{ $serviceItem['index'] }} Description</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($serviceItem['desc_item']->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($serviceItem['desc_item'])
                                    @if($serviceItem['desc_item']->editor)
                                        {{ $serviceItem['desc_item']->editor->email }}
                                    @elseif($serviceItem['desc_item']->updated_by)
                                        @php
                                            $user = \App\Models\User::find($serviceItem['desc_item']->updated_by);
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
                                @if($serviceItem['desc_item'] && $serviceItem['desc_item']->updated_at)
                                    {{ $serviceItem['desc_item']->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>No services configured yet</em></td>
                        </tr>
                    @endif

                    <!-- Advisory Approach Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Advisory Approach Section</strong></td>
                    </tr>
                    @foreach([
                        'finance_approach_title' => 'Approach Title',
                        'finance_approach_description' => 'Approach Description',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'finance_cta_text')->first();
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
                        'finance_sidebar_cta_title' => 'Sidebar CTA Title',
                        'finance_sidebar_cta_description' => 'Sidebar CTA Description',
                        'finance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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
