@extends('layouts.master')

@section('title', 'Careers Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Careers Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage careers page content here</small>
                </div>
                <a href="{{ route('admin.careers.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'careers_main_title' => 'Main Title',
                        'careers_subtitle' => 'Subtitle',
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

                    <!-- Description Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Description Section</strong></td>
                    </tr>
                    @foreach([
                        'careers_description_paragraph1' => 'Description Paragraph 1',
                        'careers_description_paragraph2' => 'Description Paragraph 2',
                        'careers_description_paragraph3' => 'Description Paragraph 3',
                        'careers_description_paragraph4' => 'Description Paragraph 4',
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

                    <!-- Career Opportunity Cards -->
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $cardNames = [
                                1 => 'Current Vacancies',
                                2 => 'Experienced Professionals',
                                3 => 'Graduate',
                                4 => 'Internship Opportunities'
                            ];
                        @endphp
                        <tr class="table-secondary">
                            <td colspan="4"><strong>{{ $cardNames[$i] }} Card</strong></td>
                        </tr>

                        @foreach([
                            "career_card{$i}_title" => 'Title',
                            "career_card{$i}_description" => 'Description',
                            "career_card{$i}_icon" => 'Icon Class',
                        ] as $key => $label)
                        @php
                            $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                        @endphp
                        <tr>
                            <td><strong>{{ $label }}</strong></td>
                            <td>
                                @if($key === "career_card{$i}_icon")
                                    <code>{{ $item->value ?? 'N/A' }}</code>
                                @else
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}
                                @endif
                            </td>
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
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
