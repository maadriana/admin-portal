@extends('layouts.master')

@section('title', 'News & Updates Content')

@section('content')
<div>
    @include('layouts.popups')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1" style="font-size: 1.5rem; font-weight: bold;">News & Updates Content</h5>
                    <small class="text-muted" style="font-size: 1rem;">Manage news sections and articles</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.news.edit') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-1"></i>Edit Content
                    </a>
                    <a href="{{ route('admin.news.article.preview', 'bir-digital-tax-receipts') }}" class="btn btn-sm btn-info">
                        <i class="fas fa-newspaper me-1"></i>Manage Articles
                    </a>
                </div>
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
                    <!-- Homepage News Section -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-home me-2"></i>Homepage News Section</strong></td>
                    </tr>
                    @foreach([
                        'news_section_title' => 'Section Title',
                        'news_section_subtitle' => 'Section Subtitle',
                        'news_intro_description' => 'Introduction Description',
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

                    <!-- News Updates Page -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-newspaper me-2"></i>News Updates Page</strong></td>
                    </tr>
                    @foreach([
                        'news_page_title' => 'Page Title',
                        'news_page_subtitle' => 'Page Subtitle',
                        'news_description_paragraph1' => 'Description Paragraph 1',
                        'news_description_paragraph2' => 'Description Paragraph 2',
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

                    <!-- Article 1 (BIR) -->
                    <tr class="table-secondary">
                        <td colspan="4">
                            <strong><i class="fas fa-receipt me-2"></i>Article 1 (BIR Digital Tax Receipts)</strong>
                            <a href="{{ route('admin.news.article.preview', 'bir-digital-tax-receipts') }}" class="btn btn-xs btn-outline-primary ms-2">
                                <i class="fas fa-edit me-1"></i>Edit Full Article
                            </a>
                        </td>
                    </tr>
                    @foreach([
                        'news_article1_title' => 'Title',
                        'news_article1_category' => 'Category',
                        'news_article1_date' => 'Date',
                        'news_article1_read_time' => 'Read Time',
                        'news_article1_excerpt' => 'Excerpt',
                        'news_article1_external_link' => 'External Link',
                        'news_article1_read_more_text' => 'Read More Text',
                        'news_article1_image' => 'Article Image',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            @if($key === 'news_article1_image')
                                @if($item && !empty($item->image))
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Article 1 Image"
                                        class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em class="text-muted">No image</em>
                                @endif
                            @elseif($key === 'news_article1_external_link')
                                @if($item && !empty($item->value))
                                    <a href="{{ $item->value }}" target="_blank" rel="noopener noreferrer" class="text-primary">
                                        {{ \Illuminate\Support\Str::limit($item->value, 40) }}
                                        <i class="fas fa-external-link-alt ms-1"></i>
                                    </a>
                                    <span class="badge bg-success ms-2">External Link Active</span>
                                @else
                                    <em class="text-muted">Internal article page</em>
                                    <span class="badge bg-info ms-2">Internal Link</span>
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

                    <!-- Article 2 (SEC) -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-file-contract me-2"></i>Article 2 (SEC Financial Reporting)</strong></td>
                    </tr>
                    @foreach([
                        'news_article2_title' => 'Title',
                        'news_article2_category' => 'Category',
                        'news_article2_date' => 'Date',
                        'news_article2_read_time' => 'Read Time',
                        'news_article2_excerpt' => 'Excerpt',
                        'news_article2_external_link' => 'External Link',
                        'news_article2_read_more_text' => 'Read More Text',
                        'news_article2_image' => 'Article Image',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            @if($key === 'news_article2_image')
                                @if($item && !empty($item->image))
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Article 2 Image"
                                        class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em class="text-muted">No image</em>
                                @endif
                            @elseif($key === 'news_article2_external_link')
                                @if($item && !empty($item->value))
                                    <a href="{{ $item->value }}" target="_blank" rel="noopener noreferrer" class="text-primary">
                                        {{ \Illuminate\Support\Str::limit($item->value, 40) }}
                                        <i class="fas fa-external-link-alt ms-1"></i>
                                    </a>
                                    <span class="badge bg-success ms-2">External Link Active</span>
                                @else
                                    <em class="text-muted">Internal article page</em>
                                    <span class="badge bg-info ms-2">Internal Link</span>
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

                    <!-- Article 3 (PSA) -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-balance-scale me-2"></i>Article 3 (PSA Updates)</strong></td>
                    </tr>
                    @foreach([
                        'news_article3_title' => 'Title',
                        'news_article3_category' => 'Category',
                        'news_article3_date' => 'Date',
                        'news_article3_read_time' => 'Read Time',
                        'news_article3_excerpt' => 'Excerpt',
                        'news_article3_external_link' => 'External Link',
                        'news_article3_read_more_text' => 'Read More Text',
                        'news_article3_image' => 'Article Image',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            @if($key === 'news_article3_image')
                                @if($item && !empty($item->image))
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Article 3 Image"
                                        class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <em class="text-muted">No image</em>
                                @endif
                            @elseif($key === 'news_article3_external_link')
                                @if($item && !empty($item->value))
                                    <a href="{{ $item->value }}" target="_blank" rel="noopener noreferrer" class="text-primary">
                                        {{ \Illuminate\Support\Str::limit($item->value, 40) }}
                                        <i class="fas fa-external-link-alt ms-1"></i>
                                    </a>
                                    <span class="badge bg-success ms-2">External Link Active</span>
                                @else
                                    <em class="text-muted">Internal article page</em>
                                    <span class="badge bg-info ms-2">Internal Link</span>
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

                    <!-- Search and Filter Settings -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-search me-2"></i>Search & Filter Settings</strong></td>
                    </tr>
                    @foreach([
                        'news_search_title' => 'Search Title',
                        'news_search_placeholder' => 'Search Placeholder',
                        'news_filter_year_title' => 'Year Filter Title',
                        'news_filter_month_title' => 'Month Filter Title',
                        'news_filter_all_news' => 'View All News Text',
                        'news_load_more_text' => 'Load More Button Text',
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

                    <!-- Sidebar Counts -->
                    <tr class="table-secondary">
                        <td colspan="4"><strong><i class="fas fa-chart-bar me-2"></i>Sidebar Article Counts</strong></td>
                    </tr>
                    @foreach([
                        'news_count_all' => 'Total Articles Count',
                        'news_count_2025' => '2025 Articles Count',
                        'news_count_2024' => '2024 Articles Count',
                        'news_count_january' => 'January Articles Count',
                        'news_count_december' => 'December Articles Count',
                    ] as $key => $label)
                    @php
                        $item = \App\Models\Content::with('editor')->where('key', $key)->first();
                    @endphp
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td>
                            <span class="badge bg-primary">{{ $item->value ?? 'N/A' }}</span>
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

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Individual Articles</h5>
                    <p class="card-text">Manage detailed article content like the BIR Digital Tax Receipts article.</p>
                    <a href="{{ route('admin.news.article.preview', 'bir-digital-tax-receipts') }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Manage Articles
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-link fa-3x text-info mb-3"></i>
                    <h5 class="card-title">External Links</h5>
                    <p class="card-text">Add external source links to redirect articles to public news sources.</p>
                    <div class="d-flex justify-content-center gap-2">
                        @php
                            $hasExternalLinks = false;
                            for($i = 1; $i <= 3; $i++) {
                                $link = \App\Models\Content::where('key', 'news_article'.$i.'_external_link')->value('value');
                                if(!empty($link)) {
                                    $hasExternalLinks = true;
                                    break;
                                }
                            }
                        @endphp
                        @if($hasExternalLinks)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-images fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Article Images</h5>
                    <p class="card-text">Upload and manage images for each news article.</p>
                    <div class="d-flex justify-content-center gap-2">
                        @php
                            $imageCount = 0;
                            for($i = 1; $i <= 3; $i++) {
                                $image = \App\Models\Content::where('key', 'news_article'.$i.'_image')->first();
                                if($image && !empty($image->image)) {
                                    $imageCount++;
                                }
                            }
                        @endphp
                        <span class="badge bg-primary">{{ $imageCount }}/3 Images</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-eye fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Preview Website</h5>
                    <p class="card-text">View how the news section appears on the main website.</p>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('news.updates') }}" target="_blank" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i>News Page
                        </a>
                        <a href="{{ url('/#news') }}" target="_blank" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i>Homepage Section
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Information -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>External Link Feature</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="mb-2"><strong>How External Links Work:</strong></p>
                            <ul class="mb-3">
                                <li>When you add an external link to an article, the "Read More" button will redirect visitors to that external source</li>
                                <li>This is perfect for linking to official government announcements, news sites, or other authoritative sources</li>
                                <li>Leave the external link field empty to use the internal article page (like the BIR Digital Tax Receipts article)</li>
                                <li>External links open in a new tab/window for better user experience</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-route fa-4x text-info mb-2"></i>
                                <p class="small text-muted">Smart routing between internal articles and external sources</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

<style>
.btn-xs {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

.badge {
    font-size: 0.75em;
}
</style>
