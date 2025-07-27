<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.news.preview');
    }

    public function preview()
    {
        $sections = [
            // Homepage News Section
            'news_section_title' => 'News Section Title',
            'news_section_subtitle' => 'News Section Subtitle',
            'news_intro_description' => 'News Introduction Description',

            // News Updates Page
            'news_page_title' => 'News Page Title',
            'news_page_subtitle' => 'News Page Subtitle',
            'news_description_paragraph1' => 'News Description Paragraph 1',
            'news_description_paragraph2' => 'News Description Paragraph 2',

            // Search and Filter
            'news_search_title' => 'Search Title',
            'news_search_placeholder' => 'Search Placeholder',
            'news_filter_year_title' => 'Filter Year Title',
            'news_filter_month_title' => 'Filter Month Title',
            'news_filter_all_news' => 'View All News Text',
            'news_load_more_text' => 'Load More Button Text',

            // Article 1 (BIR)
            'news_article1_title' => 'Article 1 Title',
            'news_article1_category' => 'Article 1 Category',
            'news_article1_date' => 'Article 1 Date',
            'news_article1_read_time' => 'Article 1 Read Time',
            'news_article1_excerpt' => 'Article 1 Excerpt',
            'news_article1_external_link' => 'Article 1 External Link',
            'news_article1_read_more_text' => 'Article 1 Read More Text',

            // Article 2 (SEC)
            'news_article2_title' => 'Article 2 Title',
            'news_article2_category' => 'Article 2 Category',
            'news_article2_date' => 'Article 2 Date',
            'news_article2_read_time' => 'Article 2 Read Time',
            'news_article2_excerpt' => 'Article 2 Excerpt',
            'news_article2_external_link' => 'Article 2 External Link',
            'news_article2_read_more_text' => 'Article 2 Read More Text',

            // Article 3 (PSA)
            'news_article3_title' => 'Article 3 Title',
            'news_article3_category' => 'Article 3 Category',
            'news_article3_date' => 'Article 3 Date',
            'news_article3_read_time' => 'Article 3 Read Time',
            'news_article3_excerpt' => 'Article 3 Excerpt',
            'news_article3_external_link' => 'Article 3 External Link',
            'news_article3_read_more_text' => 'Article 3 Read More Text',

            // Article Images
            'news_article1_image' => 'Article 1 Image',
            'news_article2_image' => 'Article 2 Image',
            'news_article3_image' => 'Article 3 Image',

            // Month/Year Counts (for sidebar)
            'news_count_all' => 'Total Articles Count',
            'news_count_2025' => '2025 Articles Count',
            'news_count_2024' => '2024 Articles Count',
            'news_count_january' => 'January Articles Count',
            'news_count_december' => 'December Articles Count',
        ];

        $contentData = [];
        foreach ($sections as $key => $label) {
            $item = Content::with('editor')->where('key', $key)->first();
            $contentData[] = [
                'key' => $key,
                'label' => $label,
                'item' => $item
            ];
        }

        return view('pages.news', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Homepage News Section
            'news_section_title' => Content::where('key', 'news_section_title')->value('value'),
            'news_section_subtitle' => Content::where('key', 'news_section_subtitle')->value('value'),
            'news_intro_description' => Content::where('key', 'news_intro_description')->value('value'),

            // News Updates Page
            'news_page_title' => Content::where('key', 'news_page_title')->value('value'),
            'news_page_subtitle' => Content::where('key', 'news_page_subtitle')->value('value'),
            'news_description_paragraph1' => Content::where('key', 'news_description_paragraph1')->value('value'),
            'news_description_paragraph2' => Content::where('key', 'news_description_paragraph2')->value('value'),

            // Search and Filter
            'news_search_title' => Content::where('key', 'news_search_title')->value('value'),
            'news_search_placeholder' => Content::where('key', 'news_search_placeholder')->value('value'),
            'news_filter_year_title' => Content::where('key', 'news_filter_year_title')->value('value'),
            'news_filter_month_title' => Content::where('key', 'news_filter_month_title')->value('value'),
            'news_filter_all_news' => Content::where('key', 'news_filter_all_news')->value('value'),
            'news_load_more_text' => Content::where('key', 'news_load_more_text')->value('value'),

            // Article 1 (BIR)
            'news_article1_title' => Content::where('key', 'news_article1_title')->value('value'),
            'news_article1_category' => Content::where('key', 'news_article1_category')->value('value'),
            'news_article1_date' => Content::where('key', 'news_article1_date')->value('value'),
            'news_article1_read_time' => Content::where('key', 'news_article1_read_time')->value('value'),
            'news_article1_excerpt' => Content::where('key', 'news_article1_excerpt')->value('value'),
            'news_article1_external_link' => Content::where('key', 'news_article1_external_link')->value('value'),
            'news_article1_read_more_text' => Content::where('key', 'news_article1_read_more_text')->value('value'),

            // Article 2 (SEC)
            'news_article2_title' => Content::where('key', 'news_article2_title')->value('value'),
            'news_article2_category' => Content::where('key', 'news_article2_category')->value('value'),
            'news_article2_date' => Content::where('key', 'news_article2_date')->value('value'),
            'news_article2_read_time' => Content::where('key', 'news_article2_read_time')->value('value'),
            'news_article2_excerpt' => Content::where('key', 'news_article2_excerpt')->value('value'),
            'news_article2_external_link' => Content::where('key', 'news_article2_external_link')->value('value'),
            'news_article2_read_more_text' => Content::where('key', 'news_article2_read_more_text')->value('value'),

            // Article 3 (PSA)
            'news_article3_title' => Content::where('key', 'news_article3_title')->value('value'),
            'news_article3_category' => Content::where('key', 'news_article3_category')->value('value'),
            'news_article3_date' => Content::where('key', 'news_article3_date')->value('value'),
            'news_article3_read_time' => Content::where('key', 'news_article3_read_time')->value('value'),
            'news_article3_excerpt' => Content::where('key', 'news_article3_excerpt')->value('value'),
            'news_article3_external_link' => Content::where('key', 'news_article3_external_link')->value('value'),
            'news_article3_read_more_text' => Content::where('key', 'news_article3_read_more_text')->value('value'),

            // Sidebar Counts
            'news_count_all' => Content::where('key', 'news_count_all')->value('value'),
            'news_count_2025' => Content::where('key', 'news_count_2025')->value('value'),
            'news_count_2024' => Content::where('key', 'news_count_2024')->value('value'),
            'news_count_january' => Content::where('key', 'news_count_january')->value('value'),
            'news_count_december' => Content::where('key', 'news_count_december')->value('value'),
        ];

        return view('pages.news.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Homepage News Section
            'news_section_title' => 'required|string|max:255',
            'news_section_subtitle' => 'required|string',
            'news_intro_description' => 'required|string',

            // News Updates Page
            'news_page_title' => 'required|string|max:255',
            'news_page_subtitle' => 'required|string',
            'news_description_paragraph1' => 'required|string',
            'news_description_paragraph2' => 'required|string',

            // Search and Filter
            'news_search_title' => 'required|string|max:255',
            'news_search_placeholder' => 'required|string|max:255',
            'news_filter_year_title' => 'required|string|max:255',
            'news_filter_month_title' => 'required|string|max:255',
            'news_filter_all_news' => 'required|string|max:255',
            'news_load_more_text' => 'required|string|max:255',

            // Articles
            'news_article1_title' => 'required|string|max:255',
            'news_article1_category' => 'required|string|max:100',
            'news_article1_date' => 'required|string|max:100',
            'news_article1_read_time' => 'required|string|max:100',
            'news_article1_excerpt' => 'required|string',
            'news_article1_external_link' => 'nullable|url',
            'news_article1_read_more_text' => 'required|string|max:100',

            'news_article2_title' => 'required|string|max:255',
            'news_article2_category' => 'required|string|max:100',
            'news_article2_date' => 'required|string|max:100',
            'news_article2_read_time' => 'required|string|max:100',
            'news_article2_excerpt' => 'required|string',
            'news_article2_external_link' => 'nullable|url',
            'news_article2_read_more_text' => 'required|string|max:100',

            'news_article3_title' => 'required|string|max:255',
            'news_article3_category' => 'required|string|max:100',
            'news_article3_date' => 'required|string|max:100',
            'news_article3_read_time' => 'required|string|max:100',
            'news_article3_excerpt' => 'required|string',
            'news_article3_external_link' => 'nullable|url',
            'news_article3_read_more_text' => 'required|string|max:100',

            // Sidebar Counts
            'news_count_all' => 'required|string|max:10',
            'news_count_2025' => 'required|string|max:10',
            'news_count_2024' => 'required|string|max:10',
            'news_count_january' => 'required|string|max:10',
            'news_count_december' => 'required|string|max:10',

            // Images
            'news_article1_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'news_article2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'news_article3_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $hasChanged = false;

        $fields = [
            // Homepage News Section
            'news_section_title', 'news_section_subtitle', 'news_intro_description',

            // News Updates Page
            'news_page_title', 'news_page_subtitle', 'news_description_paragraph1', 'news_description_paragraph2',

            // Search and Filter
            'news_search_title', 'news_search_placeholder', 'news_filter_year_title', 'news_filter_month_title',
            'news_filter_all_news', 'news_load_more_text',

            // Articles
            'news_article1_title', 'news_article1_category', 'news_article1_date', 'news_article1_read_time',
            'news_article1_excerpt', 'news_article1_external_link', 'news_article1_read_more_text',

            'news_article2_title', 'news_article2_category', 'news_article2_date', 'news_article2_read_time',
            'news_article2_excerpt', 'news_article2_external_link', 'news_article2_read_more_text',

            'news_article3_title', 'news_article3_category', 'news_article3_date', 'news_article3_read_time',
            'news_article3_excerpt', 'news_article3_external_link', 'news_article3_read_more_text',

            // Sidebar Counts
            'news_count_all', 'news_count_2025', 'news_count_2024', 'news_count_january', 'news_count_december',
        ];

        foreach ($fields as $key) {
            $newValue = $request->input($key);
            $existing = Content::where('key', $key)->first();

            if (!$existing || $existing->value !== $newValue) {
                Content::updateOrCreate(
                    ['key' => $key],
                    ['value' => $newValue, 'updated_by' => Auth::id()]
                );
                $hasChanged = true;
            }
        }

        // Handle image uploads
        $imageKeys = [
            'news_article1_image',
            'news_article2_image',
            'news_article3_image',
        ];

        foreach ($imageKeys as $imageKey) {
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageData = file_get_contents($image->getRealPath());

                Content::updateOrCreate(
                    ['key' => $imageKey],
                    [
                        'value' => $imageKey,
                        'image' => $imageData,
                        'updated_by' => Auth::id(),
                    ]
                );
                $hasChanged = true;
            }
        }

        return $hasChanged
            ? redirect()->route('admin.news.preview')->with('success', 'News content updated successfully!')
            : redirect()->route('admin.news.preview');
    }

    public function removeImage(Request $request)
    {
        $request->validate([
            'image_key' => 'required|string'
        ]);

        $content = Content::where('key', $request->image_key)->first();
        if ($content) {
            $content->update([
                'image' => null,
                'updated_by' => Auth::id(),
            ]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Preview individual article content (for BIR article editing)
     */
    public function articlePreview($slug = 'bir-digital-tax-receipts')
    {
        // Get all content related to the specific article
        $articleSections = [
            'bir_article_title' => 'Article Title',
            'bir_article_category' => 'Article Category',
            'bir_article_date' => 'Article Date',
            'bir_article_read_time' => 'Read Time',
            'bir_article_author' => 'Author',
            'bir_article_subtitle' => 'Article Subtitle',
            'bir_article_intro' => 'Introduction',
            'bir_article_requirements_title' => 'Requirements Section Title',
            'bir_article_requirements_intro' => 'Requirements Introduction',
            'bir_article_technical_title' => 'Technical Specifications Title',
            'bir_article_technical_content' => 'Technical Content',
            'bir_article_timeline_title' => 'Timeline Title',
            'bir_article_phase1_date' => 'Phase 1 Date',
            'bir_article_phase1_title' => 'Phase 1 Title',
            'bir_article_phase1_desc' => 'Phase 1 Description',
            'bir_article_impact_title' => 'Impact Section Title',
            'bir_article_recommendations_title' => 'Recommendations Title',
            'bir_cta_title' => 'CTA Title',
            'bir_cta_description' => 'CTA Description',
            'bir_cta_button' => 'CTA Button Text',
        ];

        $contentData = [];
        foreach ($articleSections as $key => $label) {
            $item = Content::with('editor')->where('key', $key)->first();
            $contentData[] = [
                'key' => $key,
                'label' => $label,
                'item' => $item
            ];
        }

        return view('pages.news.article-preview', compact('contentData', 'slug'));
    }

    /**
     * Edit individual article content
     */
    public function articleEdit($slug = 'bir-digital-tax-receipts')
    {
        $data = [
            'slug' => $slug,
            'bir_article_title' => Content::where('key', 'bir_article_title')->value('value'),
            'bir_article_category' => Content::where('key', 'bir_article_category')->value('value'),
            'bir_article_date' => Content::where('key', 'bir_article_date')->value('value'),
            'bir_article_read_time' => Content::where('key', 'bir_article_read_time')->value('value'),
            'bir_article_author' => Content::where('key', 'bir_article_author')->value('value'),
            'bir_article_subtitle' => Content::where('key', 'bir_article_subtitle')->value('value'),
            'bir_article_intro' => Content::where('key', 'bir_article_intro')->value('value'),
            'bir_article_requirements_title' => Content::where('key', 'bir_article_requirements_title')->value('value'),
            'bir_article_requirements_intro' => Content::where('key', 'bir_article_requirements_intro')->value('value'),
            'bir_article_technical_title' => Content::where('key', 'bir_article_technical_title')->value('value'),
            'bir_article_technical_content' => Content::where('key', 'bir_article_technical_content')->value('value'),
            'bir_article_timeline_title' => Content::where('key', 'bir_article_timeline_title')->value('value'),
            'bir_article_phase1_date' => Content::where('key', 'bir_article_phase1_date')->value('value'),
            'bir_article_phase1_title' => Content::where('key', 'bir_article_phase1_title')->value('value'),
            'bir_article_phase1_desc' => Content::where('key', 'bir_article_phase1_desc')->value('value'),
            'bir_article_impact_title' => Content::where('key', 'bir_article_impact_title')->value('value'),
            'bir_article_recommendations_title' => Content::where('key', 'bir_article_recommendations_title')->value('value'),
            'bir_cta_title' => Content::where('key', 'bir_cta_title')->value('value'),
            'bir_cta_description' => Content::where('key', 'bir_cta_description')->value('value'),
            'bir_cta_button' => Content::where('key', 'bir_cta_button')->value('value'),
        ];

        return view('pages.news.article-edit', $data);
    }

    /**
     * Update individual article content
     */
    public function articleUpdate(Request $request, $slug = 'bir-digital-tax-receipts')
    {
        $request->validate([
            'bir_article_title' => 'required|string|max:255',
            'bir_article_category' => 'required|string|max:100',
            'bir_article_date' => 'required|string|max:100',
            'bir_article_read_time' => 'required|string|max:100',
            'bir_article_author' => 'required|string|max:255',
            'bir_article_subtitle' => 'required|string',
            'bir_article_intro' => 'required|string',
            'bir_article_requirements_title' => 'required|string|max:255',
            'bir_article_requirements_intro' => 'required|string',
            'bir_article_technical_title' => 'required|string|max:255',
            'bir_article_technical_content' => 'required|string',
            'bir_article_timeline_title' => 'required|string|max:255',
            'bir_article_phase1_date' => 'required|string|max:100',
            'bir_article_phase1_title' => 'required|string|max:255',
            'bir_article_phase1_desc' => 'required|string',
            'bir_article_impact_title' => 'required|string|max:255',
            'bir_article_recommendations_title' => 'required|string|max:255',
            'bir_cta_title' => 'required|string|max:255',
            'bir_cta_description' => 'required|string',
            'bir_cta_button' => 'required|string|max:100',
        ]);

        $hasChanged = false;
        $fields = [
            'bir_article_title', 'bir_article_category', 'bir_article_date', 'bir_article_read_time',
            'bir_article_author', 'bir_article_subtitle', 'bir_article_intro',
            'bir_article_requirements_title', 'bir_article_requirements_intro',
            'bir_article_technical_title', 'bir_article_technical_content',
            'bir_article_timeline_title', 'bir_article_phase1_date', 'bir_article_phase1_title',
            'bir_article_phase1_desc', 'bir_article_impact_title', 'bir_article_recommendations_title',
            'bir_cta_title', 'bir_cta_description', 'bir_cta_button',
        ];

        foreach ($fields as $key) {
            $newValue = $request->input($key);
            $existing = Content::where('key', $key)->first();

            if (!$existing || $existing->value !== $newValue) {
                Content::updateOrCreate(
                    ['key' => $key],
                    ['value' => $newValue, 'updated_by' => Auth::id()]
                );
                $hasChanged = true;
            }
        }

        return $hasChanged
            ? redirect()->route('admin.news.article.preview', $slug)->with('success', 'Article content updated successfully!')
            : redirect()->route('admin.news.article.preview', $slug);
    }
}
