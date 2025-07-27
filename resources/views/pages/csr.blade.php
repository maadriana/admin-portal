@extends('layouts.master')

@section('title', 'CSR Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">CSR Page Content</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage Corporate Social Responsibility page content</small>
                </div>
                <a href="{{ route('admin.csr.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    <!-- Hero Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Hero Section</strong></td>
                    </tr>
                    @foreach([
                        'csr_hero_title' => 'Hero Title',
                        'csr_hero_subtitle' => 'Hero Subtitle',
                        'csr_cta_overview' => 'Overview Button Text',
                        'csr_cta_programs' => 'Programs Button Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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

                    <!-- Overview Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Overview Section</strong></td>
                    </tr>
                    @foreach([
                        'csr_overview_badge' => 'Overview Badge',
                        'csr_overview_title' => 'Overview Title',
                        'csr_overview_paragraph1' => 'Overview Paragraph 1',
                        'csr_overview_paragraph2' => 'Overview Quote',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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

                    <!-- Programs Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Programs Section</strong></td>
                    </tr>
                    @foreach([
                        'csr_programs_badge' => 'Programs Badge',
                        'csr_programs_title' => 'Programs Title',
                        'csr_programs_description' => 'Programs Description',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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

                    <!-- Education Program -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Education Program</strong></td>
                    </tr>
                    @foreach([
                        'csr_education_title' => 'Education Title',
                        'csr_education_description' => 'Education Description',
                        'csr_education_focus' => 'Education Focus',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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

                    <!-- Environmental Program -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Environmental Program</strong></td>
                    </tr>
                    @foreach([
                        'csr_environment_title' => 'Environment Title',
                        'csr_environment_description' => 'Environment Description',
                        'csr_environment_focus' => 'Environment Focus',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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

                    <!-- Community Program -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Community Program</strong></td>
                    </tr>
                    @foreach([
                        'csr_community_title' => 'Community Title',
                        'csr_community_description' => 'Community Description',
                        'csr_community_donation' => 'Donation Text',
                        'csr_community_support' => 'Support Text',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}</td>
                        <td>
                            @if($item && $item->editor)
                                @if(isset($item->editor->email))
                                    {{ $item->editor->email }}
                                @elseif(isset($item->editor->given_name) && isset($item->editor->surname))
                                    {{ $item->editor->given_name }} {{ $item->editor->surname }}
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
