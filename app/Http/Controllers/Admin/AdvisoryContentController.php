<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class AdvisoryContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.advisory.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'advisory_page_title' => 'Page Title',
            'advisory_page_subtitle' => 'Page Subtitle',

            // Service Overview
            'advisory_overview_title' => 'Overview Title',
            'advisory_overview_paragraph' => 'Overview Paragraph',

            // Approach Section
            'advisory_approach_title' => 'Approach Section Title',
            'advisory_approach_item1_title' => 'Approach Item 1 Title',
            'advisory_approach_item1_description' => 'Approach Item 1 Description',
            'advisory_approach_item2_title' => 'Approach Item 2 Title',
            'advisory_approach_item2_description' => 'Approach Item 2 Description',
            'advisory_approach_item3_title' => 'Approach Item 3 Title',
            'advisory_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'advisory_services_title' => 'Services Section Title',
            'advisory_service1' => 'Service 1',
            'advisory_service2' => 'Service 2',

            // Benefits Section
            'advisory_benefits_title' => 'Benefits Section Title',
            'advisory_benefit1_title' => 'Benefit 1 Title',
            'advisory_benefit1_description' => 'Benefit 1 Description',
            'advisory_benefit2_title' => 'Benefit 2 Title',
            'advisory_benefit2_description' => 'Benefit 2 Description',

            // Sidebar Content
            'advisory_cta_title' => 'CTA Title',
            'advisory_cta_description' => 'CTA Description',
            'advisory_cta_button_text' => 'CTA Button Text',

            // Quick Facts
            'advisory_fact1_label' => 'Quick Fact 1 Label',
            'advisory_fact1_value' => 'Quick Fact 1 Value',
            'advisory_fact2_label' => 'Quick Fact 2 Label',
            'advisory_fact2_value' => 'Quick Fact 2 Value',
            'advisory_fact3_label' => 'Quick Fact 3 Label',
            'advisory_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'advisory_related_service1' => 'Related Service 1',
            'advisory_related_service2' => 'Related Service 2',
            'advisory_related_service3' => 'Related Service 3',
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

        return view('pages.advisory', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'advisory_page_title' => Content::where('key', 'advisory_page_title')->value('value'),
            'advisory_page_subtitle' => Content::where('key', 'advisory_page_subtitle')->value('value'),

            // Service Overview
            'advisory_overview_title' => Content::where('key', 'advisory_overview_title')->value('value'),
            'advisory_overview_paragraph' => Content::where('key', 'advisory_overview_paragraph')->value('value'),

            // Approach Section
            'advisory_approach_title' => Content::where('key', 'advisory_approach_title')->value('value'),
            'advisory_approach_item1_title' => Content::where('key', 'advisory_approach_item1_title')->value('value'),
            'advisory_approach_item1_description' => Content::where('key', 'advisory_approach_item1_description')->value('value'),
            'advisory_approach_item2_title' => Content::where('key', 'advisory_approach_item2_title')->value('value'),
            'advisory_approach_item2_description' => Content::where('key', 'advisory_approach_item2_description')->value('value'),
            'advisory_approach_item3_title' => Content::where('key', 'advisory_approach_item3_title')->value('value'),
            'advisory_approach_item3_description' => Content::where('key', 'advisory_approach_item3_description')->value('value'),

            // Services Section
            'advisory_services_title' => Content::where('key', 'advisory_services_title')->value('value'),
            'advisory_service1' => Content::where('key', 'advisory_service1')->value('value'),
            'advisory_service2' => Content::where('key', 'advisory_service2')->value('value'),

            // Benefits Section
            'advisory_benefits_title' => Content::where('key', 'advisory_benefits_title')->value('value'),
            'advisory_benefit1_title' => Content::where('key', 'advisory_benefit1_title')->value('value'),
            'advisory_benefit1_description' => Content::where('key', 'advisory_benefit1_description')->value('value'),
            'advisory_benefit2_title' => Content::where('key', 'advisory_benefit2_title')->value('value'),
            'advisory_benefit2_description' => Content::where('key', 'advisory_benefit2_description')->value('value'),

            // Sidebar Content
            'advisory_cta_title' => Content::where('key', 'advisory_cta_title')->value('value'),
            'advisory_cta_description' => Content::where('key', 'advisory_cta_description')->value('value'),
            'advisory_cta_button_text' => Content::where('key', 'advisory_cta_button_text')->value('value'),

            // Quick Facts
            'advisory_fact1_label' => Content::where('key', 'advisory_fact1_label')->value('value'),
            'advisory_fact1_value' => Content::where('key', 'advisory_fact1_value')->value('value'),
            'advisory_fact2_label' => Content::where('key', 'advisory_fact2_label')->value('value'),
            'advisory_fact2_value' => Content::where('key', 'advisory_fact2_value')->value('value'),
            'advisory_fact3_label' => Content::where('key', 'advisory_fact3_label')->value('value'),
            'advisory_fact3_value' => Content::where('key', 'advisory_fact3_value')->value('value'),

            // Related Services
            'advisory_related_service1' => Content::where('key', 'advisory_related_service1')->value('value'),
            'advisory_related_service2' => Content::where('key', 'advisory_related_service2')->value('value'),
            'advisory_related_service3' => Content::where('key', 'advisory_related_service3')->value('value'),
        ];

        return view('pages.advisory.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'advisory_page_title' => 'required|string|max:255',
            'advisory_page_subtitle' => 'required|string|max:500',

            // Service Overview
            'advisory_overview_title' => 'required|string|max:255',
            'advisory_overview_paragraph' => 'required|string',

            // Approach Section
            'advisory_approach_title' => 'required|string|max:255',
            'advisory_approach_item1_title' => 'required|string|max:255',
            'advisory_approach_item1_description' => 'required|string',
            'advisory_approach_item2_title' => 'required|string|max:255',
            'advisory_approach_item2_description' => 'required|string',
            'advisory_approach_item3_title' => 'required|string|max:255',
            'advisory_approach_item3_description' => 'required|string',

            // Services Section
            'advisory_services_title' => 'required|string|max:255',
            'advisory_service1' => 'required|string|max:255',
            'advisory_service2' => 'required|string|max:255',

            // Benefits Section
            'advisory_benefits_title' => 'required|string|max:255',
            'advisory_benefit1_title' => 'required|string|max:255',
            'advisory_benefit1_description' => 'required|string|max:500',
            'advisory_benefit2_title' => 'required|string|max:255',
            'advisory_benefit2_description' => 'required|string|max:500',

            // Sidebar Content
            'advisory_cta_title' => 'required|string|max:255',
            'advisory_cta_description' => 'required|string|max:500',
            'advisory_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'advisory_fact1_label' => 'required|string|max:100',
            'advisory_fact1_value' => 'required|string|max:50',
            'advisory_fact2_label' => 'required|string|max:100',
            'advisory_fact2_value' => 'required|string|max:50',
            'advisory_fact3_label' => 'required|string|max:100',
            'advisory_fact3_value' => 'required|string|max:50',

            // Related Services
            'advisory_related_service1' => 'required|string|max:100',
            'advisory_related_service2' => 'required|string|max:100',
            'advisory_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'advisory_page_title', 'advisory_page_subtitle', 'advisory_overview_title', 'advisory_overview_paragraph',
            'advisory_approach_title', 'advisory_approach_item1_title', 'advisory_approach_item1_description',
            'advisory_approach_item2_title', 'advisory_approach_item2_description', 'advisory_approach_item3_title',
            'advisory_approach_item3_description', 'advisory_services_title', 'advisory_service1', 'advisory_service2',
            'advisory_benefits_title', 'advisory_benefit1_title', 'advisory_benefit1_description',
            'advisory_benefit2_title', 'advisory_benefit2_description', 'advisory_cta_title', 'advisory_cta_description',
            'advisory_cta_button_text', 'advisory_fact1_label', 'advisory_fact1_value', 'advisory_fact2_label',
            'advisory_fact2_value', 'advisory_fact3_label', 'advisory_fact3_value', 'advisory_related_service1',
            'advisory_related_service2', 'advisory_related_service3'
        ];

        foreach ($textFields as $key) {
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
            ? redirect()->route('admin.advisory.preview')->with('success', 'Business Advisory page updated successfully!')
            : redirect()->route('admin.advisory.preview');
    }
}
