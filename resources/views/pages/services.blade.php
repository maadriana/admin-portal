@extends('layouts.master')

@section('title', 'Services Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Services Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage services page content here</small>
                </div>
                <a href="{{ route('admin.services.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'services_main_title' => 'Main Title',
                        'services_subtitle' => 'Subtitle',
                        'services_description_paragraph1' => 'Description Paragraph 1',
                        'services_description_paragraph2' => 'Description Paragraph 2',
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

                    <!-- Service Cards Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Service Cards</strong></td>
                    </tr>
                    @for($i = 1; $i <= 8; $i++)
                        @php
                            $titleKey = "service{$i}_title";
                            $descKey = "service{$i}_description";
                            $imageKey = "service{$i}_image";

                            $titleItem = \App\Models\Content::with('editor')->where('key', $titleKey)->first();
                            $descItem = \App\Models\Content::with('editor')->where('key', $descKey)->first();
                            $imageItem = \App\Models\Content::with('editor')->where('key', $imageKey)->first();

                            $serviceNames = [
                                1 => 'Audit and Assurance',
                                2 => 'Business Advisory',
                                3 => 'Outsourcing',
                                4 => 'Business Restructuring',
                                5 => 'Corporate Finance',
                                6 => 'Forensic',
                                7 => 'Governance',
                                8 => 'Taxation'
                            ];
                        @endphp

                        <!-- Service Title -->
                        <tr>
                            <td><strong>{{ $serviceNames[$i] }} - Title</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($titleItem->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($titleItem && $titleItem->editor)
                                    {{ $titleItem->editor->email }}
                                @elseif($titleItem && $titleItem->updated_by)
                                    @php
                                        $user = \App\Models\User::find($titleItem->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($titleItem && $titleItem->updated_at)
                                    {{ $titleItem->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <!-- Service Description -->
                        <tr>
                            <td><strong>{{ $serviceNames[$i] }} - Description</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($descItem->value ?? ''), 60) ?: 'N/A' }}</td>
                            <td>
                                @if($descItem && $descItem->editor)
                                    {{ $descItem->editor->email }}
                                @elseif($descItem && $descItem->updated_by)
                                    @php
                                        $user = \App\Models\User::find($descItem->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($descItem && $descItem->updated_at)
                                    {{ $descItem->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>

                        <!-- Service Image -->
                        <tr>
                            <td><strong>{{ $serviceNames[$i] }} - Image</strong></td>
                            <td>
                                @if($imageItem && $imageItem->image)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($imageItem->image) }}" alt="{{ $serviceNames[$i] }}" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em>No image</em>
                                @endif
                            </td>
                            <td>
                                @if($imageItem && $imageItem->editor)
                                    {{ $imageItem->editor->email }}
                                @elseif($imageItem && $imageItem->updated_by)
                                    @php
                                        $user = \App\Models\User::find($imageItem->updated_by);
                                    @endphp
                                    {{ $user ? $user->email : 'Unknown User' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($imageItem && $imageItem->updated_at)
                                    {{ $imageItem->updated_at->format('M d, Y h:i A') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
