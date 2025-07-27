@extends('layouts.master')

@section('title', 'Edit News & Updates Content')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Edit News & Updates Content</h4>
        <a href="{{ route('admin.news.preview') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Overview
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.news.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Homepage News Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-home me-2"></i>Homepage News Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_section_title" class="form-label">Section Title</label>
                            <input type="text" name="news_section_title" id="news_section_title" class="form-control"
                                value="{{ old('news_section_title', $news_section_title) }}" required>
                            @error('news_section_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_section_subtitle" class="form-label">Section Subtitle</label>
                            <textarea name="news_section_subtitle" id="news_section_subtitle" rows="2" class="form-control"
                                required>{{ old('news_section_subtitle', $news_section_subtitle) }}</textarea>
                            <small class="form-text text-muted">Use &lt;span&gt; tags for highlighted text</small>
                            @error('news_section_subtitle')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="news_intro_description" class="form-label">Introduction Description</label>
                    <textarea name="news_intro_description" id="news_intro_description" rows="3" class="form-control"
                        required>{{ old('news_intro_description', $news_intro_description) }}</textarea>
                    @error('news_intro_description')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- News Updates Page -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>News Updates Page</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_page_title" class="form-label">Page Title</label>
                            <input type="text" name="news_page_title" id="news_page_title" class="form-control"
                                value="{{ old('news_page_title', $news_page_title) }}" required>
                            @error('news_page_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_page_subtitle" class="form-label">Page Subtitle</label>
                            <textarea name="news_page_subtitle" id="news_page_subtitle" rows="2" class="form-control"
                                required>{{ old('news_page_subtitle', $news_page_subtitle) }}</textarea>
                            @error('news_page_subtitle')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_description_paragraph1" class="form-label">Description Paragraph 1</label>
                            <textarea name="news_description_paragraph1" id="news_description_paragraph1" rows="3" class="form-control"
                                required>{{ old('news_description_paragraph1', $news_description_paragraph1) }}</textarea>
                            @error('news_description_paragraph1')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="news_description_paragraph2" class="form-label">Description Paragraph 2</label>
                            <textarea name="news_description_paragraph2" id="news_description_paragraph2" rows="3" class="form-control"
                                required>{{ old('news_description_paragraph2', $news_description_paragraph2) }}</textarea>
                            @error('news_description_paragraph2')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Settings -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0"><i class="fas fa-search me-2"></i>Search & Filter Settings</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_search_title" class="form-label">Search Section Title</label>
                            <input type="text" name="news_search_title" id="news_search_title" class="form-control"
                                value="{{ old('news_search_title', $news_search_title) }}" required>
                            @error('news_search_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_search_placeholder" class="form-label">Search Placeholder</label>
                            <input type="text" name="news_search_placeholder" id="news_search_placeholder" class="form-control"
                                value="{{ old('news_search_placeholder', $news_search_placeholder) }}" required>
                            @error('news_search_placeholder')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_filter_all_news" class="form-label">View All News Text</label>
                            <input type="text" name="news_filter_all_news" id="news_filter_all_news" class="form-control"
                                value="{{ old('news_filter_all_news', $news_filter_all_news) }}" required>
                            @error('news_filter_all_news')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_filter_year_title" class="form-label">Year Filter Title</label>
                            <input type="text" name="news_filter_year_title" id="news_filter_year_title" class="form-control"
                                value="{{ old('news_filter_year_title', $news_filter_year_title) }}" required>
                            @error('news_filter_year_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_filter_month_title" class="form-label">Month Filter Title</label>
                            <input type="text" name="news_filter_month_title" id="news_filter_month_title" class="form-control"
                                value="{{ old('news_filter_month_title', $news_filter_month_title) }}" required>
                            @error('news_filter_month_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="news_load_more_text" class="form-label">Load More Button Text</label>
                            <input type="text" name="news_load_more_text" id="news_load_more_text" class="form-control"
                                value="{{ old('news_load_more_text', $news_load_more_text) }}" required>
                            @error('news_load_more_text')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sidebar Counts -->
                <hr>
                <h6 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Sidebar Article Counts</h6>
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_count_all" class="form-label">Total Articles</label>
                                    <input type="text" name="news_count_all" id="news_count_all" class="form-control"
                                        value="{{ old('news_count_all', $news_count_all) }}" required>
                                    @error('news_count_all')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_count_2025" class="form-label">2025 Articles</label>
                                    <input type="text" name="news_count_2025" id="news_count_2025" class="form-control"
                                        value="{{ old('news_count_2025', $news_count_2025) }}" required>
                                    @error('news_count_2025')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="news_count_2024" class="form-label">2024 Articles</label>
                                    <input type="text" name="news_count_2024" id="news_count_2024" class="form-control"
                                        value="{{ old('news_count_2024', $news_count_2024) }}" required>
                                    @error('news_count_2024')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="news_count_january" class="form-label">January</label>
                                    <input type="text" name="news_count_january" id="news_count_january" class="form-control"
                                        value="{{ old('news_count_january', $news_count_january) }}" required>
                                    @error('news_count_january')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="news_count_december" class="form-label">December</label>
                                    <input type="text" name="news_count_december" id="news_count_december" class="form-control"
                                        value="{{ old('news_count_december', $news_count_december) }}" required>
                                    @error('news_count_december')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="row">
            <!-- Article 1 (BIR) -->
            <div class="col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="fas fa-receipt me-2"></i>Article 1 (BIR Digital Tax Receipts)</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="news_article1_title" class="form-label">Title</label>
                            <input type="text" name="news_article1_title" id="news_article1_title" class="form-control"
                                value="{{ old('news_article1_title', $news_article1_title) }}" required>
                            @error('news_article1_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article1_category" class="form-label">Category</label>
                                    <input type="text" name="news_article1_category" id="news_article1_category" class="form-control"
                                        value="{{ old('news_article1_category', $news_article1_category) }}" required>
                                    @error('news_article1_category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article1_date" class="form-label">Date</label>
                                    <input type="text" name="news_article1_date" id="news_article1_date" class="form-control"
                                        value="{{ old('news_article1_date', $news_article1_date) }}" required>
                                    @error('news_article1_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article1_read_time" class="form-label">Read Time</label>
                                    <input type="text" name="news_article1_read_time" id="news_article1_read_time" class="form-control"
                                        value="{{ old('news_article1_read_time', $news_article1_read_time) }}" required>
                                    @error('news_article1_read_time')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article1_read_more_text" class="form-label">Read More Text</label>
                                    <input type="text" name="news_article1_read_more_text" id="news_article1_read_more_text" class="form-control"
                                        value="{{ old('news_article1_read_more_text', $news_article1_read_more_text) }}" required>
                                    @error('news_article1_read_more_text')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="news_article1_excerpt" class="form-label">Excerpt</label>
                            <textarea name="news_article1_excerpt" id="news_article1_excerpt" rows="3" class="form-control"
                                required>{{ old('news_article1_excerpt', $news_article1_excerpt) }}</textarea>
                            @error('news_article1_excerpt')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article1_external_link" class="form-label">
                                <i class="fas fa-external-link-alt me-1"></i>External Link
                            </label>
                            <input type="url" name="news_article1_external_link" id="news_article1_external_link" class="form-control"
                                value="{{ old('news_article1_external_link', $news_article1_external_link) }}"
                                placeholder="https://example.com/article">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>Optional: Link to external news source. Leave empty to use internal article page.
                            </small>
                            @error('news_article1_external_link')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article1_image" class="form-label">Article Image</label>
                            <input type="file" name="news_article1_image" id="news_article1_image" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('news_article1_image'))
                                <div class="mt-2">
                                    <img src="{{ getContent('news_article1_image') }}" alt="Article 1 Image" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('news_article1_image')">
                                        <i class="fas fa-trash me-1"></i>Remove
                                    </button>
                                </div>
                            @endif
                            @error('news_article1_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3 pt-3 border-top">
                            <a href="{{ route('admin.news.article.preview', 'bir-digital-tax-receipts') }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit Full Article Content
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 2 (SEC) -->
            <div class="col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-header bg-warning text-dark">
                        <h6 class="mb-0"><i class="fas fa-file-contract me-2"></i>Article 2 (SEC Financial Reporting)</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="news_article2_title" class="form-label">Title</label>
                            <input type="text" name="news_article2_title" id="news_article2_title" class="form-control"
                                value="{{ old('news_article2_title', $news_article2_title) }}" required>
                            @error('news_article2_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article2_category" class="form-label">Category</label>
                                    <input type="text" name="news_article2_category" id="news_article2_category" class="form-control"
                                        value="{{ old('news_article2_category', $news_article2_category) }}" required>
                                    @error('news_article2_category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article2_date" class="form-label">Date</label>
                                    <input type="text" name="news_article2_date" id="news_article2_date" class="form-control"
                                        value="{{ old('news_article2_date', $news_article2_date) }}" required>
                                    @error('news_article2_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article2_read_time" class="form-label">Read Time</label>
                                    <input type="text" name="news_article2_read_time" id="news_article2_read_time" class="form-control"
                                        value="{{ old('news_article2_read_time', $news_article2_read_time) }}" required>
                                    @error('news_article2_read_time')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article2_read_more_text" class="form-label">Read More Text</label>
                                    <input type="text" name="news_article2_read_more_text" id="news_article2_read_more_text" class="form-control"
                                        value="{{ old('news_article2_read_more_text', $news_article2_read_more_text) }}" required>
                                    @error('news_article2_read_more_text')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="news_article2_excerpt" class="form-label">Excerpt</label>
                            <textarea name="news_article2_excerpt" id="news_article2_excerpt" rows="3" class="form-control"
                                required>{{ old('news_article2_excerpt', $news_article2_excerpt) }}</textarea>
                            @error('news_article2_excerpt')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article2_external_link" class="form-label">
                                <i class="fas fa-external-link-alt me-1"></i>External Link
                            </label>
                            <input type="url" name="news_article2_external_link" id="news_article2_external_link" class="form-control"
                                value="{{ old('news_article2_external_link', $news_article2_external_link) }}"
                                placeholder="https://example.com/article">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>Optional: Link to external news source. Leave empty to use internal article page.
                            </small>
                            @error('news_article2_external_link')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article2_image" class="form-label">Article Image</label>
                            <input type="file" name="news_article2_image" id="news_article2_image" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('news_article2_image'))
                                <div class="mt-2">
                                    <img src="{{ getContent('news_article2_image') }}" alt="Article 2 Image" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('news_article2_image')">
                                        <i class="fas fa-trash me-1"></i>Remove
                                    </button>
                                </div>
                            @endif
                            @error('news_article2_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 3 (PSA) -->
            <div class="col-lg-4">
                <div class="card mb-4 h-100">
                    <div class="card-header bg-danger text-white">
                        <h6 class="mb-0"><i class="fas fa-balance-scale me-2"></i>Article 3 (PSA Updates)</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="news_article3_title" class="form-label">Title</label>
                            <input type="text" name="news_article3_title" id="news_article3_title" class="form-control"
                                value="{{ old('news_article3_title', $news_article3_title) }}" required>
                            @error('news_article3_title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article3_category" class="form-label">Category</label>
                                    <input type="text" name="news_article3_category" id="news_article3_category" class="form-control"
                                        value="{{ old('news_article3_category', $news_article3_category) }}" required>
                                    @error('news_article3_category')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article3_date" class="form-label">Date</label>
                                    <input type="text" name="news_article3_date" id="news_article3_date" class="form-control"
                                        value="{{ old('news_article3_date', $news_article3_date) }}" required>
                                    @error('news_article3_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article3_read_time" class="form-label">Read Time</label>
                                    <input type="text" name="news_article3_read_time" id="news_article3_read_time" class="form-control"
                                        value="{{ old('news_article3_read_time', $news_article3_read_time) }}" required>
                                    @error('news_article3_read_time')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="news_article3_read_more_text" class="form-label">Read More Text</label>
                                    <input type="text" name="news_article3_read_more_text" id="news_article3_read_more_text" class="form-control"
                                        value="{{ old('news_article3_read_more_text', $news_article3_read_more_text) }}" required>
                                    @error('news_article3_read_more_text')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="news_article3_excerpt" class="form-label">Excerpt</label>
                            <textarea name="news_article3_excerpt" id="news_article3_excerpt" rows="3" class="form-control"
                                required>{{ old('news_article3_excerpt', $news_article3_excerpt) }}</textarea>
                            @error('news_article3_excerpt')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article3_external_link" class="form-label">
                                <i class="fas fa-external-link-alt me-1"></i>External Link
                            </label>
                            <input type="url" name="news_article3_external_link" id="news_article3_external_link" class="form-control"
                                value="{{ old('news_article3_external_link', $news_article3_external_link) }}"
                                placeholder="https://example.com/article">
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>Optional: Link to external news source. Leave empty to use internal article page.
                            </small>
                            @error('news_article3_external_link')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="news_article3_image" class="form-label">Article Image</label>
                            <input type="file" name="news_article3_image" id="news_article3_image" class="form-control"
                                accept="image/*">
                            @if(hasImageContent('news_article3_image'))
                                <div class="mt-2">
                                    <img src="{{ getContent('news_article3_image') }}" alt="Article 3 Image" class="img-thumbnail" style="max-width: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeImage('news_article3_image')">
                                        <i class="fas fa-trash me-1"></i>Remove
                                    </button>
                                </div>
                            @endif
                            @error('news_article3_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- External Link Feature Info -->
        <div class="alert alert-info mb-4">
            <div class="row align-items-center">
                <div class="col-md-1 text-center">
                    <i class="fas fa-route fa-3x text-info"></i>
                </div>
                <div class="col-md-11">
                    <h6><i class="fas fa-info-circle me-2"></i>External Link Feature</h6>
                    <p class="mb-2"><strong>How it works:</strong></p>
                    <ul class="mb-2 small">
                        <li>When you add an external link to an article, the "Read More" button will redirect visitors to that external source instead of the internal article page</li>
                        <li>This is perfect for linking to official government announcements, news sites, or other authoritative sources</li>
                        <li>Leave the external link field empty to use the internal article page (like the BIR Digital Tax Receipts article)</li>
                        <li>External links automatically open in a new tab for better user experience</li>
                    </ul>
                    <p class="mb-0 small text-muted">
                        <i class="fas fa-lightbulb me-1"></i>
                        <strong>Tip:</strong> Use external links for breaking news or official announcements, and internal articles for detailed analysis and commentary.
                    </p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i>Save All Changes
            </button>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.news.preview') }}" class="btn btn-secondary">
                    <i class="fas fa-eye me-2"></i>Preview
                </a>
                <a href="{{ route('news.updates') }}" target="_blank" class="btn btn-outline-primary">
                    <i class="fas fa-external-link-alt me-2"></i>View Website
                </a>
            </div>
        </div>
    </form>
</div>

<script>
function removeImage(imageKey) {
    if (confirm('Are you sure you want to remove this image?')) {
        fetch('{{ route("admin.news.remove-image") }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                image_key: imageKey
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error removing image. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error removing image. Please try again.');
        });
    }
}

// Auto-resize textareas
document.addEventListener('DOMContentLoaded', function() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
});

// External link validation and preview
document.querySelectorAll('input[type="url"]').forEach(input => {
    input.addEventListener('blur', function() {
        if (this.value && !this.value.startsWith('http')) {
            this.value = 'https://' + this.value;
        }
    });
});
</script>

<style>
.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.alert-info {
    border-left: 4px solid #17a2b8;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }

    .col-lg-4 {
        margin-bottom: 1rem;
    }

    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }

    .d-flex.gap-2 {
        justify-content: center;
    }
}
</style>

@endsection
