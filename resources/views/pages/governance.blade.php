@extends('layouts.master')

@section('title', 'Governance & Risk Management Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Governance & Risk Management Page</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage governance and risk management page content</small>
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

                    <!-- Key Approaches (Dynamic) -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Key Approaches (Dynamic)</strong></td>
                    </tr>

                    <!-- Approach Title -->
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', 'governance_approach_title')->first();
                    @endphp
                    <tr>
                        <td><strong>Approach Section Title</strong></td>
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

                    <!-- Dynamic Approach Items -->
                    @php
                        $dynamicApproachItems = [];
                        $i = 1;
                        while(true) {
                            $titleKey = "governance_approach_item{$i}_title";
                            $descKey = "governance_approach_item{$i}_description";
                            $titleItem = \App\Models\Content::with('editor')->where('key', $titleKey)->first();
                            $descItem = \App\Models\Content::with('editor')->where('key', $descKey)->first();

                            if ($titleItem || $descItem) {
                                $dynamicApproachItems[] = [
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

                    @if(count($dynamicApproachItems) > 0)
                        @foreach($dynamicApproachItems as $approachItem)
                        <tr>
                            <td><strong>Approach {{ $approachItem['index'] }} Title</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($approachItem['title_item']->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($approachItem['title_item'])
                                    @if($approachItem['title_item']->editor)
                                        {{ $approachItem['title_item']->editor->email }}
                                    @elseif($approachItem['title_item']->updated_by)
                                        @php
                                            $user = \App\Models\User::find($approachItem['title_item']->updated_by);
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
                                @if($approachItem['title_item'] && $approachItem['title_item']->updated_at)
                                    {{ $approachItem['title_item']->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Approach {{ $approachItem['index'] }} Description</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($approachItem['desc_item']->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($approachItem['desc_item'])
                                    @if($approachItem['desc_item']->editor)
                                        {{ $approachItem['desc_item']->editor->email }}
                                    @elseif($approachItem['desc_item']->updated_by)
                                        @php
                                            $user = \App\Models\User::find($approachItem['desc_item']->updated_by);
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
                                @if($approachItem['desc_item'] && $approachItem['desc_item']->updated_at)
                                    {{ $approachItem['desc_item']->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>No approach items configured yet</em></td>
                        </tr>
                    @endif

                    <!-- Value Proposition Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Value Proposition Section</strong></td>
                    </tr>
                    @foreach([
                        'governance_value_title' => 'Value Proposition Title',
                        'governance_value_description' => 'Value Proposition Description',
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
                        $item = \App\Models\Content::with('editor')->where('key', 'governance_cta_text')->first();
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
                        'governance_sidebar_cta_title' => 'Sidebar CTA Title',
                        'governance_sidebar_cta_description' => 'Sidebar CTA Description',
                        'governance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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
