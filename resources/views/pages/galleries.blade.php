@extends('layouts.master')

@section('title', 'Galleries Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Galleries Page Content</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage galleries page content and images</small>
                </div>
                <a href="{{ route('admin.galleries.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'galleries_hero_title' => 'Hero Title',
                        'galleries_hero_subtitle' => 'Hero Subtitle',
                        'galleries_cta_csr' => 'CSR Button Text',
                        'galleries_cta_team' => 'Team Button Text',
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
                        'galleries_overview_badge' => 'Overview Badge',
                        'galleries_overview_title' => 'Overview Title',
                        'galleries_overview_paragraph1' => 'Overview Paragraph 1',
                        'galleries_overview_paragraph2' => 'Overview Paragraph 2',
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

                    <!-- CSR Gallery Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>CSR Gallery Section</strong></td>
                    </tr>
                    @foreach([
                        'csr_gallery_badge' => 'CSR Badge',
                        'csr_gallery_title' => 'CSR Title',
                        'csr_gallery_description' => 'CSR Description',
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

                    <!-- CSR Gallery Images -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>CSR Gallery Images</strong></td>
                    </tr>
                    @foreach([
                        'csr_gallery_image1' => 'CSR Image 1',
                        'csr_gallery_image2' => 'CSR Image 2',
                        'csr_gallery_image3' => 'CSR Image 3',
                        'csr_gallery_image4' => 'CSR Image 4',
                        'csr_gallery_item1_title' => 'CSR Item 1 Title',
                        'csr_gallery_item2_title' => 'CSR Item 2 Title',
                        'csr_gallery_item3_title' => 'CSR Item 3 Title',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            @if(str_contains($key, 'image'))
                                @if($item && !empty($item->image))
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="{{ $label }}"
                                        class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em>No image</em>
                                @endif
                            @else
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}
                            @endif
                        </td>
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

                    <!-- Team Gallery Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Team Gallery Section</strong></td>
                    </tr>
                    @foreach([
                        'team_gallery_badge' => 'Team Badge',
                        'team_gallery_title' => 'Team Title',
                        'team_gallery_description' => 'Team Description',
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

                    <!-- Team Gallery Images -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Team Gallery Images</strong></td>
                    </tr>
                    @foreach([
                        'team_gallery_image1' => 'Team Image 1',
                        'team_gallery_image2' => 'Team Image 2',
                        'team_gallery_image3' => 'Team Image 3',
                        'team_gallery_item1_title' => 'Team Item 1 Title',
                        'team_gallery_item2_title' => 'Team Item 2 Title',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            @if(str_contains($key, 'image'))
                                @if($item && !empty($item->image))
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="{{ $label }}"
                                        class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em>No image</em>
                                @endif
                            @else
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}
                            @endif
                        </td>
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
