@extends('layouts.master')

@section('title', 'About Page Content')

@section('content')
<div>

    <h4 class="fw-bold py-3 mb-4">About Page Content</h4>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">About Page Sections</h5>
            <a href="{{ route('admin.about.edit') }}" class="btn btn-sm btn-primary">Edit</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25%">Section</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Intro Paragraph 1</strong></td>
                        <td>{{ getContent('about_intro_1') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Intro Paragraph 2</strong></td>
                        <td>{{ getContent('about_intro_2') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Intro Paragraph 3</strong></td>
                        <td>{{ getContent('about_intro_3') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Vision Statement</strong></td>
                        <td>{{ getContent('about_vision') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Mission Statement</strong></td>
                        <td>{{ getContent('about_mission') }}</td>
                    </tr>
                    @php
                        $coreValues = [
                            'Excellence' => 'value_excellence',
                            'Integrity' => 'value_integrity',
                            'Innovation' => 'value_innovation',
                            'Professional Development' => 'value_development',
                            'Teamwork' => 'value_teamwork',
                            'Care for Employees' => 'value_employees',
                            'Community Engagement' => 'value_community',
                        ];
                    @endphp
                    @foreach($coreValues as $label => $key)
                        <tr>
                            <td><strong>{{ $label }}</strong></td>
                            <td>{{ getContent($key) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
