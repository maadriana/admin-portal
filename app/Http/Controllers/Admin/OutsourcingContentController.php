<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class OutsourcingContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.outsourcing.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'outsourcing_page_title' => 'Page Title',
            'outsourcing_page_subtitle' => 'Page Subtitle',

            // Service Image
            'outsourcing_service_image' => 'Service Image',

            // Service Overview
            'outsourcing_overview_title' => 'Overview Title',
            'outsourcing_overview_paragraph1' => 'Overview Paragraph 1',
            'outsourcing_overview_paragraph2' => 'Overview Paragraph 2',

            // Approach Section
            'outsourcing_approach_title' => 'Approach Section Title',
            'outsourcing_approach_item1_title' => 'Approach Item 1 Title',
            'outsourcing_approach_item1_description' => 'Approach Item 1 Description',
            'outsourcing_approach_item2_title' => 'Approach Item 2 Title',
            'outsourcing_approach_item2_description' => 'Approach Item 2 Description',
            'outsourcing_approach_item3_title' => 'Approach Item 3 Title',
            'outsourcing_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'outsourcing_services_title' => 'Services Section Title',
            'outsourcing_service1_title' => 'Service 1 Title',
            'outsourcing_service1_description' => 'Service 1 Description',
            'outsourcing_service2_title' => 'Service 2 Title',
            'outsourcing_service2_description' => 'Service 2 Description',

            // Benefits Section
            'outsourcing_benefits_title' => 'Benefits Section Title',
            'outsourcing_benefit1_title' => 'Benefit 1 Title',
            'outsourcing_benefit1_description' => 'Benefit 1 Description',
            'outsourcing_benefit2_title' => 'Benefit 2 Title',
            'outsourcing_benefit2_description' => 'Benefit 2 Description',
            'outsourcing_benefit3_title' => 'Benefit 3 Title',
            'outsourcing_benefit3_description' => 'Benefit 3 Description',
            'outsourcing_benefit4_title' => 'Benefit 4 Title',
            'outsourcing_benefit4_description' => 'Benefit 4 Description',

            // Sidebar Content
            'outsourcing_cta_title' => 'CTA Title',
            'outsourcing_cta_description' => 'CTA Description',
            'outsourcing_cta_button_text' => 'CTA Button Text',

            // Quick Facts
            'outsourcing_fact1_label' => 'Quick Fact 1 Label',
            'outsourcing_fact1_value' => 'Quick Fact 1 Value',
            'outsourcing_fact2_label' => 'Quick Fact 2 Label',
            'outsourcing_fact2_value' => 'Quick Fact 2 Value',
            'outsourcing_fact3_label' => 'Quick Fact 3 Label',
            'outsourcing_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'outsourcing_related_service1' => 'Related Service 1',
            'outsourcing_related_service2' => 'Related Service 2',
            'outsourcing_related_service3' => 'Related Service 3',
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

        return view('pages.outsourcing', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'outsourcing_page_title' => Content::where('key', 'outsourcing_page_title')->value('value'),
            'outsourcing_page_subtitle' => Content::where('key', 'outsourcing_page_subtitle')->value('value'),

            // Service Image
            'outsourcing_service_image' => Content::where('key', 'outsourcing_service_image')->first(),

            // Service Overview
            'outsourcing_overview_title' => Content::where('key', 'outsourcing_overview_title')->value('value'),
            'outsourcing_overview_paragraph1' => Content::where('key', 'outsourcing_overview_paragraph1')->value('value'),
            'outsourcing_overview_paragraph2' => Content::where('key', 'outsourcing_overview_paragraph2')->value('value'),

            // Approach Section
            'outsourcing_approach_title' => Content::where('key', 'outsourcing_approach_title')->value('value'),
            'outsourcing_approach_item1_title' => Content::where('key', 'outsourcing_approach_item1_title')->value('value'),
            'outsourcing_approach_item1_description' => Content::where('key', 'outsourcing_approach_item1_description')->value('value'),
            'outsourcing_approach_item2_title' => Content::where('key', 'outsourcing_approach_item2_title')->value('value'),
            'outsourcing_approach_item2_description' => Content::where('key', 'outsourcing_approach_item2_description')->value('value'),
            'outsourcing_approach_item3_title' => Content::where('key', 'outsourcing_approach_item3_title')->value('value'),
            'outsourcing_approach_item3_description' => Content::where('key', 'outsourcing_approach_item3_description')->value('value'),

            // Services Section
            'outsourcing_services_title' => Content::where('key', 'outsourcing_services_title')->value('value'),
            'outsourcing_service1_title' => Content::where('key', 'outsourcing_service1_title')->value('value'),
            'outsourcing_service1_description' => Content::where('key', 'outsourcing_service1_description')->value('value'),
            'outsourcing_service2_title' => Content::where('key', 'outsourcing_service2_title')->value('value'),
            'outsourcing_service2_description' => Content::where('key', 'outsourcing_service2_description')->value('value'),

            // Benefits Section
            'outsourcing_benefits_title' => Content::where('key', 'outsourcing_benefits_title')->value('value'),
            'outsourcing_benefit1_title' => Content::where('key', 'outsourcing_benefit1_title')->value('value'),
            'outsourcing_benefit1_description' => Content::where('key', 'outsourcing_benefit1_description')->value('value'),
            'outsourcing_benefit2_title' => Content::where('key', 'outsourcing_benefit2_title')->value('value'),
            'outsourcing_benefit2_description' => Content::where('key', 'outsourcing_benefit2_description')->value('value'),
            'outsourcing_benefit3_title' => Content::where('key', 'outsourcing_benefit3_title')->value('value'),
            'outsourcing_benefit3_description' => Content::where('key', 'outsourcing_benefit3_description')->value('value'),
            'outsourcing_benefit4_title' => Content::where('key', 'outsourcing_benefit4_title')->value('value'),
            'outsourcing_benefit4_description' => Content::where('key', 'outsourcing_benefit4_description')->value('value'),

            // Sidebar Content
            'outsourcing_cta_title' => Content::where('key', 'outsourcing_cta_title')->value('value'),
            'outsourcing_cta_description' => Content::where('key', 'outsourcing_cta_description')->value('value'),
            'outsourcing_cta_button_text' => Content::where('key', 'outsourcing_cta_button_text')->value('value'),

            // Quick Facts
            'outsourcing_fact1_label' => Content::where('key', 'outsourcing_fact1_label')->value('value'),
            'outsourcing_fact1_value' => Content::where('key', 'outsourcing_fact1_value')->value('value'),
            'outsourcing_fact2_label' => Content::where('key', 'outsourcing_fact2_label')->value('value'),
            'outsourcing_fact2_value' => Content::where('key', 'outsourcing_fact2_value')->value('value'),
            'outsourcing_fact3_label' => Content::where('key', 'outsourcing_fact3_label')->value('value'),
            'outsourcing_fact3_value' => Content::where('key', 'outsourcing_fact3_value')->value('value'),

            // Related Services
            'outsourcing_related_service1' => Content::where('key', 'outsourcing_related_service1')->value('value'),
            'outsourcing_related_service2' => Content::where('key', 'outsourcing_related_service2')->value('value'),
            'outsourcing_related_service3' => Content::where('key', 'outsourcing_related_service3')->value('value'),
        ];

        return view('pages.outsourcing.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'outsourcing_page_title' => 'required|string|max:255',
            'outsourcing_page_subtitle' => 'required|string|max:500',

            // Service Image
            'outsourcing_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_outsourcing_service_image' => 'nullable|boolean',

            // Service Overview
            'outsourcing_overview_title' => 'required|string|max:255',
            'outsourcing_overview_paragraph1' => 'required|string',
            'outsourcing_overview_paragraph2' => 'required|string',

            // Approach Section
            'outsourcing_approach_title' => 'required|string|max:255',
            'outsourcing_approach_item1_title' => 'required|string|max:255',
            'outsourcing_approach_item1_description' => 'required|string',
            'outsourcing_approach_item2_title' => 'required|string|max:255',
            'outsourcing_approach_item2_description' => 'required|string',
            'outsourcing_approach_item3_title' => 'required|string|max:255',
            'outsourcing_approach_item3_description' => 'required|string',

            // Services Section
            'outsourcing_services_title' => 'required|string|max:255',
            'outsourcing_service1_title' => 'required|string|max:255',
            'outsourcing_service1_description' => 'required|string',
            'outsourcing_service2_title' => 'required|string|max:255',
            'outsourcing_service2_description' => 'required|string',

            // Benefits Section
            'outsourcing_benefits_title' => 'required|string|max:255',
            'outsourcing_benefit1_title' => 'required|string|max:255',
            'outsourcing_benefit1_description' => 'required|string|max:500',
            'outsourcing_benefit2_title' => 'required|string|max:255',
            'outsourcing_benefit2_description' => 'required|string|max:500',
            'outsourcing_benefit3_title' => 'required|string|max:255',
            'outsourcing_benefit3_description' => 'required|string|max:500',
            'outsourcing_benefit4_title' => 'required|string|max:255',
            'outsourcing_benefit4_description' => 'required|string|max:500',

            // Sidebar Content
            'outsourcing_cta_title' => 'required|string|max:255',
            'outsourcing_cta_description' => 'required|string|max:500',
            'outsourcing_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'outsourcing_fact1_label' => 'required|string|max:100',
            'outsourcing_fact1_value' => 'required|string|max:50',
            'outsourcing_fact2_label' => 'required|string|max:100',
            'outsourcing_fact2_value' => 'required|string|max:50',
            'outsourcing_fact3_label' => 'required|string|max:100',
            'outsourcing_fact3_value' => 'required|string|max:50',

            // Related Services
            'outsourcing_related_service1' => 'required|string|max:100',
            'outsourcing_related_service2' => 'required|string|max:100',
            'outsourcing_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'outsourcing_page_title', 'outsourcing_page_subtitle', 'outsourcing_overview_title',
            'outsourcing_overview_paragraph1', 'outsourcing_overview_paragraph2', 'outsourcing_approach_title',
            'outsourcing_approach_item1_title', 'outsourcing_approach_item1_description',
            'outsourcing_approach_item2_title', 'outsourcing_approach_item2_description',
            'outsourcing_approach_item3_title', 'outsourcing_approach_item3_description',
            'outsourcing_services_title', 'outsourcing_service1_title', 'outsourcing_service1_description',
            'outsourcing_service2_title', 'outsourcing_service2_description', 'outsourcing_benefits_title',
            'outsourcing_benefit1_title', 'outsourcing_benefit1_description', 'outsourcing_benefit2_title',
            'outsourcing_benefit2_description', 'outsourcing_benefit3_title', 'outsourcing_benefit3_description',
            'outsourcing_benefit4_title', 'outsourcing_benefit4_description', 'outsourcing_cta_title',
            'outsourcing_cta_description', 'outsourcing_cta_button_text', 'outsourcing_fact1_label',
            'outsourcing_fact1_value', 'outsourcing_fact2_label', 'outsourcing_fact2_value',
            'outsourcing_fact3_label', 'outsourcing_fact3_value', 'outsourcing_related_service1',
            'outsourcing_related_service2', 'outsourcing_related_service3'
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
        if ($request->has('remove_outsourcing_service_image') && $request->remove_outsourcing_service_image) {
            $existing = Content::where('key', 'outsourcing_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('outsourcing_service_image')) {
            $file = $request->file('outsourcing_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'outsourcing_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'outsourcing_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'outsourcing_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.outsourcing.preview')->with('success', 'Outsourcing page updated successfully!')
            : redirect()->route('admin.outsourcing.preview');
    }
}
