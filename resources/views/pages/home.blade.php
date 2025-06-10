@extends('layouts.master')

@section('title', 'Homepage Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">Homepage Sections</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage homepage content here</small>
                </div>
                <a href="{{ route('admin.home.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                    @foreach([
                        'hero_title' => 'Hero Title',
                        'hero_subtitle' => 'Hero Subtitle',
                        'hero_button' => 'Hero Button Text',
                        'about_text' => 'About Text',
                        'about_image' => 'About Image',
                    ] as $key => $label)
                        @php
                            $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                        @endphp
                        <tr>
                            <td><strong>{{ $label }}</strong></td>
                            <td>
                            @if($key === 'about_image')
                            @if($item && !empty($item->value))
                            <img src="{{ asset('storage/assets/img/' . $item->value) }}" alt="About Image" class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <em>No image</em>
                            @endif
                            @else
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->value ?? ''), 60) ?: 'N/A' }}
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
