@extends('layouts.master')

@section('title', 'Team Page Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Team Page Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage team page content here</small>
                </div>
                <a href="{{ route('admin.team.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'team_main_title' => 'Main Title',
                        'team_subtitle' => 'Subtitle',
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

                    <!-- Team Members Section -->
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $memberNames = [
                                1 => 'Emmanuel Y. Mendoza',
                                2 => 'Ephraim T. Tugano',
                                3 => 'Pamela Grace S. Tangso',
                                4 => 'Jekell G. Salosagcol'
                            ];
                        @endphp
                        <tr class="table-secondary">
                            <td colspan="4"><strong>Team Member {{ $i }}: {{ $memberNames[$i] ?? "Member $i" }}</strong></td>
                        </tr>

                        @foreach([
                            "team_member{$i}_name" => 'Name',
                            "team_member{$i}_role" => 'Role',
                            "team_member{$i}_slug" => 'URL Slug',
                            "team_member{$i}_image" => 'Image',
                            "team_member{$i}_twitter" => 'Twitter URL',
                            "team_member{$i}_facebook" => 'Facebook URL',
                            "team_member{$i}_instagram" => 'Instagram URL',
                            "team_member{$i}_linkedin" => 'LinkedIn URL',
                        ] as $key => $label)
                        @php
                            $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                        @endphp
                        <tr>
                            <td><strong>{{ $label }}</strong></td>
                            <td>
                                @if($key === "team_member{$i}_image")
                                    @if($item && $item->image)
                                        <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Team Member {{ $i }}" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        <em>No image</em>
                                    @endif
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
