@extends('layouts.master')

@section('title', 'MTC Care Content')

@section('content')
<div>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">MTC Care Section</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage MTC Care main section content</small>
                </div>
                <a href="{{ route('admin.mtc-care.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        'mtc_care_title' => 'Main Title',
                        'mtc_care_subtitle' => 'Subtitle',
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

                    <!-- CSR Card Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>CSR Card</strong></td>
                    </tr>
                    @foreach([
                        'mtc_care_csr_title' => 'CSR Title',
                        'mtc_care_csr_description' => 'CSR Description',
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

                    <!-- Galleries Card Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong>Galleries Card</strong></td>
                    </tr>
                    @foreach([
                        'mtc_care_galleries_title' => 'Galleries Title',
                        'mtc_care_galleries_description' => 'Galleries Description',
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

    <!-- Quick Links Section -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">CSR Content</h5>
                    <p class="card-text">Manage Corporate Social Responsibility page content and programs.</p>
                    <a href="{{ route('admin.csr.index') }}" class="btn btn-primary">Manage CSR</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-images fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Galleries Content</h5>
                    <p class="card-text">Manage galleries page content and upload images for CSR and team events.</p>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-info">Manage Galleries</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
