<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class GovernanceContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.governance.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'governance_page_title' => 'Page Title',
            'governance_page_subtitle' => 'Page Subtitle',

            // Service Image
            'governance_service_image' => 'Service Image',

            // Service Overview
            'governance_overview_title' => 'Overview Title',
            'governance_overview_paragraph1' => 'Overview Paragraph 1',
            'governance_overview_paragraph2' => 'Overview Paragraph 2',

            // Approach Section
            'governance_approach_title' => 'Approach Section Title',
            'governance_approach_item1_title' => 'Approach Item 1 Title',
            'governance_approach_item1_description' => 'Approach Item 1 Description',
            'governance_approach_item2_title' => 'Approach Item 2 Title',
            'governance_approach_item2_description' => 'Approach Item 2 Description',
            'governance_approach_item3_title' => 'Approach Item 3 Title',
            'governance_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'governance_services_title' => 'Services Section Title',
            'governance_service1_title' => 'Service 1 Title',
            'governance_service1_description' => 'Service 1 Description',
            'governance_service2_title' => 'Service 2 Title',
            'governance_service2_description' => 'Service 2 Description',

            // Benefits Section
            'governance_benefits_title' => 'Benefits Section Title',
            'governance_benefit1_title' => 'Benefit 1 Title',
            'governance_benefit1_description' => 'Benefit 1 Description',
            'governance_benefit2_title' => 'Benefit 2 Title',
            'governance_benefit2_description' => 'Benefit 2 Description',
            'governance_benefit3_title' => 'Benefit 3 Title',
            'governance_benefit3_description' => 'Benefit 3 Description',
            'governance_benefit4_title' => 'Benefit 4 Title',
            'governance_benefit4_description' => 'Benefit 4 Description',

            // Sidebar Content
            'governance_cta_title' => 'CTA Title',
            'governance_cta_description' => 'CTA Description',
            'governance_cta_button_text' => 'CTA Button Text',

            // Quick Facts
            'governance_fact1_label' => 'Quick Fact 1 Label',
            'governance_fact1_value' => 'Quick Fact 1 Value',
            'governance_fact2_label' => 'Quick Fact 2 Label',
            'governance_fact2_value' => 'Quick Fact 2 Value',
            'governance_fact3_label' => 'Quick Fact 3 Label',
            'governance_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'governance_related_service1' => 'Related Service 1',
            'governance_related_service2' => 'Related Service 2',
            'governance_related_service3' => 'Related Service 3',
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

        return view('pages.governance', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'governance_page_title' => Content::where('key', 'governance_page_title')->value('value'),
            'governance_page_subtitle' => Content::where('key', 'governance_page_subtitle')->value('value'),

            // Service Image
            'governance_service_image' => Content::where('key', 'governance_service_image')->first(),

            // Service Overview
            'governance_overview_title' => Content::where('key', 'governance_overview_title')->value('value'),
            'governance_overview_paragraph1' => Content::where('key', 'governance_overview_paragraph1')->value('value'),
            'governance_overview_paragraph2' => Content::where('key', 'governance_overview_paragraph2')->value('value'),

            // Approach Section
            'governance_approach_title' => Content::where('key', 'governance_approach_title')->value('value'),
            'governance_approach_item1_title' => Content::where('key', 'governance_approach_item1_title')->value('value'),
            'governance_approach_item1_description' => Content::where('key', 'governance_approach_item1_description')->value('value'),
            'governance_approach_item2_title' => Content::where('key', 'governance_approach_item2_title')->value('value'),
            'governance_approach_item2_description' => Content::where('key', 'governance_approach_item2_description')->value('value'),
            'governance_approach_item3_title' => Content::where('key', 'governance_approach_item3_title')->value('value'),
            'governance_approach_item3_description' => Content::where('key', 'governance_approach_item3_description')->value('value'),

            // Services Section
            'governance_services_title' => Content::where('key', 'governance_services_title')->value('value'),
            'governance_service1_title' => Content::where('key', 'governance_service1_title')->value('value'),
            'governance_service1_description' => Content::where('key', 'governance_service1_description')->value('value'),
            'governance_service2_title' => Content::where('key', 'governance_service2_title')->value('value'),
            'governance_service2_description' => Content::where('key', 'governance_service2_description')->value('value'),

            // Benefits Section
            'governance_benefits_title' => Content::where('key', 'governance_benefits_title')->value('value'),
            'governance_benefit1_title' => Content::where('key', 'governance_benefit1_title')->value('value'),
            'governance_benefit1_description' => Content::where('key', 'governance_benefit1_description')->value('value'),
            'governance_benefit2_title' => Content::where('key', 'governance_benefit2_title')->value('value'),
            'governance_benefit2_description' => Content::where('key', 'governance_benefit2_description')->value('value'),
            'governance_benefit3_title' => Content::where('key', 'governance_benefit3_title')->value('value'),
            'governance_benefit3_description' => Content::where('key', 'governance_benefit3_description')->value('value'),
            'governance_benefit4_title' => Content::where('key', 'governance_benefit4_title')->value('value'),
            'governance_benefit4_description' => Content::where('key', 'governance_benefit4_description')->value('value'),

            // Sidebar Content
            'governance_cta_title' => Content::where('key', 'governance_cta_title')->value('value'),
            'governance_cta_description' => Content::where('key', 'governance_cta_description')->value('value'),
            'governance_cta_button_text' => Content::where('key', 'governance_cta_button_text')->value('value'),

            // Quick Facts
            'governance_fact1_label' => Content::where('key', 'governance_fact1_label')->value('value'),
            'governance_fact1_value' => Content::where('key', 'governance_fact1_value')->value('value'),
            'governance_fact2_label' => Content::where('key', 'governance_fact2_label')->value('value'),
            'governance_fact2_value' => Content::where('key', 'governance_fact2_value')->value('value'),
            'governance_fact3_label' => Content::where('key', 'governance_fact3_label')->value('value'),
            'governance_fact3_value' => Content::where('key', 'governance_fact3_value')->value('value'),

            // Related Services
            'governance_related_service1' => Content::where('key', 'governance_related_service1')->value('value'),
            'governance_related_service2' => Content::where('key', 'governance_related_service2')->value('value'),
            'governance_related_service3' => Content::where('key', 'governance_related_service3')->value('value'),
        ];

        return view('pages.governance.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'governance_page_title' => 'required|string|max:255',
            'governance_page_subtitle' => 'required|string|max:500',

            // Service Image
            'governance_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_governance_service_image' => 'nullable|boolean',

            // Service Overview
            'governance_overview_title' => 'required|string|max:255',
            'governance_overview_paragraph1' => 'required|string',
            'governance_overview_paragraph2' => 'required|string',

            // Approach Section
            'governance_approach_title' => 'required|string|max:255',
            'governance_approach_item1_title' => 'required|string|max:255',
            'governance_approach_item1_description' => 'required|string',
            'governance_approach_item2_title' => 'required|string|max:255',
            'governance_approach_item2_description' => 'required|string',
            'governance_approach_item3_title' => 'required|string|max:255',
            'governance_approach_item3_description' => 'required|string',

            // Services Section
            'governance_services_title' => 'required|string|max:255',
            'governance_service1_title' => 'required|string|max:255',
            'governance_service1_description' => 'required|string',
            'governance_service2_title' => 'required|string|max:255',
            'governance_service2_description' => 'required|string',

            // Benefits Section
            'governance_benefits_title' => 'required|string|max:255',
            'governance_benefit1_title' => 'required|string|max:255',
            'governance_benefit1_description' => 'required|string|max:500',
            'governance_benefit2_title' => 'required|string|max:255',
            'governance_benefit2_description' => 'required|string|max:500',
            'governance_benefit3_title' => 'required|string|max:255',
            'governance_benefit3_description' => 'required|string|max:500',
            'governance_benefit4_title' => 'required|string|max:255',
            'governance_benefit4_description' => 'required|string|max:500',

            // Sidebar Content
            'governance_cta_title' => 'required|string|max:255',
            'governance_cta_description' => 'required|string|max:500',
            'governance_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'governance_fact1_label' => 'required|string|max:100',
            'governance_fact1_value' => 'required|string|max:50',
            'governance_fact2_label' => 'required|string|max:100',
            'governance_fact2_value' => 'required|string|max:50',
            'governance_fact3_label' => 'required|string|max:100',
            'governance_fact3_value' => 'required|string|max:50',

            // Related Services
            'governance_related_service1' => 'required|string|max:100',
            'governance_related_service2' => 'required|string|max:100',
            'governance_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'governance_page_title', 'governance_page_subtitle', 'governance_overview_title',
            'governance_overview_paragraph1', 'governance_overview_paragraph2', 'governance_approach_title',
            'governance_approach_item1_title', 'governance_approach_item1_description',
            'governance_approach_item2_title', 'governance_approach_item2_description',
            'governance_approach_item3_title', 'governance_approach_item3_description',
            'governance_services_title', 'governance_service1_title', 'governance_service1_description',
            'governance_service2_title', 'governance_service2_description', 'governance_benefits_title',
            'governance_benefit1_title', 'governance_benefit1_description', 'governance_benefit2_title',
            'governance_benefit2_description', 'governance_benefit3_title', 'governance_benefit3_description',
            'governance_benefit4_title', 'governance_benefit4_description', 'governance_cta_title',
            'governance_cta_description', 'governance_cta_button_text', 'governance_fact1_label',
            'governance_fact1_value', 'governance_fact2_label', 'governance_fact2_value',
            'governance_fact3_label', 'governance_fact3_value', 'governance_related_service1',
            'governance_related_service2', 'governance_related_service3'
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

        // Handle image removal
        if ($request->has('remove_governance_service_image') && $request->remove_governance_service_image) {
            $existing = Content::where('key', 'governance_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('governance_service_image')) {
            $file = $request->file('governance_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'governance_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'governance_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'governance_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.governance.preview')->with('success', 'Governance page updated successfully!')
            : redirect()->route('admin.governance.preview');
    }
}
