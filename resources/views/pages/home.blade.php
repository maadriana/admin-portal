@extends('layouts.master')

@section('title', 'Homepage Content')

@section('content')
<div>

    <h4 class="fw-bold py-3 mb-4">Home Page Content</h4>

    @include('layouts.popups')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Homepage Sections</h5>
            <a href="{{ route('admin.home.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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
                        <td><strong>Hero Title</strong></td>
                        <td>{!! getContent('hero_title', 'Default Hero Title') !!}</td>
                    </tr>
                    <tr>
                        <td><strong>Hero Subtitle</strong></td>
                        <td>{{ getContent('hero_subtitle', 'Default Hero Subtitle') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hero Button Text</strong></td>
                        <td>{{ getContent('hero_button', 'Click Here') }}</td>
                    </tr>
                    <tr>
                        <td><strong>About Text</strong></td>
                        <td>{{ getContent('about_text', 'Default about paragraph...') }}</td>
                    </tr>
                    <tr>
                        <td><strong>About Image</strong></td>
                        <td>
                            <img src="{{ asset('assets/img/' . getContent('about_image', 'about.jpg')) }}" alt="About"
                                style="max-width: 200px;" class="img-thumbnail">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection