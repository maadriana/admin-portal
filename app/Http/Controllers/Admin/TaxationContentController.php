<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class TaxationContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.taxation.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'taxation_page_title' => 'Page Title',
            'taxation_page_subtitle' => 'Page Subtitle',

            // Service Image
            'taxation_service_image' => 'Service Image',

            // Service Overview
            'taxation_overview_title' => 'Overview Title',
            'taxation_overview_paragraph1' => 'Overview Paragraph 1',

            // Approach Section
            'taxation_approach_title' => 'Approach Section Title',
            'taxation_approach_item1_title' => 'Approach Item 1 Title',
            'taxation_approach_item1_description' => 'Approach Item 1 Description',
            'taxation_approach_item2_title' => 'Approach Item 2 Title',
            'taxation_approach_item2_description' => 'Approach Item 2 Description',
            'taxation_approach_item3_title' => 'Approach Item 3 Title',
            'taxation_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'taxation_services_title' => 'Services Section Title',
            'taxation_service1' => 'Service 1',
            'taxation_service2' => 'Service 2',
            'taxation_service3' => 'Service 3',
            'taxation_service4' => 'Service 4',

            // CTA Section
            'taxation_cta_text' => 'CTA Text',

            // Sidebar Content
            'taxation_sidebar_cta_title' => 'Sidebar CTA Title',
            'taxation_sidebar_cta_description' => 'Sidebar CTA Description',
            'taxation_sidebar_cta_button_text' => 'Sidebar CTA Button Text',

            // Quick Facts
            'taxation_related_title' => 'Quick Facts Title',
            'taxation_fact1_label' => 'Quick Fact 1 Label',
            'taxation_fact1_value' => 'Quick Fact 1 Value',
            'taxation_fact2_label' => 'Quick Fact 2 Label',
            'taxation_fact2_value' => 'Quick Fact 2 Value',
            'taxation_fact3_label' => 'Quick Fact 3 Label',
            'taxation_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'taxation_related_service1' => 'Related Service 1',
            'taxation_related_service2' => 'Related Service 2',
            'taxation_related_service3' => 'Related Service 3',
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

        return view('pages.taxation', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'taxation_page_title' => Content::where('key', 'taxation_page_title')->value('value'),
            'taxation_page_subtitle' => Content::where('key', 'taxation_page_subtitle')->value('value'),

            // Service Image
            'taxation_service_image' => Content::where('key', 'taxation_service_image')->first(),

            // Service Overview
            'taxation_overview_title' => Content::where('key', 'taxation_overview_title')->value('value'),
            'taxation_overview_paragraph1' => Content::where('key', 'taxation_overview_paragraph1')->value('value'),

            // Approach Section
            'taxation_approach_title' => Content::where('key', 'taxation_approach_title')->value('value'),
            'taxation_approach_item1_title' => Content::where('key', 'taxation_approach_item1_title')->value('value'),
            'taxation_approach_item1_description' => Content::where('key', 'taxation_approach_item1_description')->value('value'),
            'taxation_approach_item2_title' => Content::where('key', 'taxation_approach_item2_title')->value('value'),
            'taxation_approach_item2_description' => Content::where('key', 'taxation_approach_item2_description')->value('value'),
            'taxation_approach_item3_title' => Content::where('key', 'taxation_approach_item3_title')->value('value'),
            'taxation_approach_item3_description' => Content::where('key', 'taxation_approach_item3_description')->value('value'),

            // Services Section
            'taxation_services_title' => Content::where('key', 'taxation_services_title')->value('value'),
            'taxation_service1' => Content::where('key', 'taxation_service1')->value('value'),
            'taxation_service2' => Content::where('key', 'taxation_service2')->value('value'),
            'taxation_service3' => Content::where('key', 'taxation_service3')->value('value'),
            'taxation_service4' => Content::where('key', 'taxation_service4')->value('value'),

            // CTA Section
            'taxation_cta_text' => Content::where('key', 'taxation_cta_text')->value('value'),

            // Sidebar Content
            'taxation_sidebar_cta_title' => Content::where('key', 'taxation_sidebar_cta_title')->value('value'),
            'taxation_sidebar_cta_description' => Content::where('key', 'taxation_sidebar_cta_description')->value('value'),
            'taxation_sidebar_cta_button_text' => Content::where('key', 'taxation_sidebar_cta_button_text')->value('value'),

            // Quick Facts
            'taxation_related_title' => Content::where('key', 'taxation_related_title')->value('value'),
            'taxation_fact1_label' => Content::where('key', 'taxation_fact1_label')->value('value'),
            'taxation_fact1_value' => Content::where('key', 'taxation_fact1_value')->value('value'),
            'taxation_fact2_label' => Content::where('key', 'taxation_fact2_label')->value('value'),
            'taxation_fact2_value' => Content::where('key', 'taxation_fact2_value')->value('value'),
            'taxation_fact3_label' => Content::where('key', 'taxation_fact3_label')->value('value'),
            'taxation_fact3_value' => Content::where('key', 'taxation_fact3_value')->value('value'),

            // Related Services
            'taxation_related_service1' => Content::where('key', 'taxation_related_service1')->value('value'),
            'taxation_related_service2' => Content::where('key', 'taxation_related_service2')->value('value'),
            'taxation_related_service3' => Content::where('key', 'taxation_related_service3')->value('value'),
        ];

        return view('pages.taxation.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'taxation_page_title' => 'required|string|max:255',
            'taxation_page_subtitle' => 'required|string|max:500',

            // Service Image
            'taxation_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_taxation_service_image' => 'nullable|boolean',

            // Service Overview
            'taxation_overview_title' => 'required|string|max:255',
            'taxation_overview_paragraph1' => 'required|string',

            // Approach Section
            'taxation_approach_title' => 'required|string|max:255',
            'taxation_approach_item1_title' => 'required|string|max:255',
            'taxation_approach_item1_description' => 'required|string',
            'taxation_approach_item2_title' => 'required|string|max:255',
            'taxation_approach_item2_description' => 'required|string',
            'taxation_approach_item3_title' => 'required|string|max:255',
            'taxation_approach_item3_description' => 'required|string',

            // Services Section
            'taxation_services_title' => 'required|string|max:255',
            'taxation_service1' => 'required|string|max:255',
            'taxation_service2' => 'required|string|max:255',
            'taxation_service3' => 'required|string|max:255',
            'taxation_service4' => 'required|string|max:255',

            // CTA Section
            'taxation_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'taxation_sidebar_cta_title' => 'required|string|max:255',
            'taxation_sidebar_cta_description' => 'required|string|max:500',
            'taxation_sidebar_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'taxation_related_title' => 'required|string|max:100',
            'taxation_fact1_label' => 'required|string|max:100',
            'taxation_fact1_value' => 'required|string|max:50',
            'taxation_fact2_label' => 'required|string|max:100',
            'taxation_fact2_value' => 'required|string|max:50',
            'taxation_fact3_label' => 'required|string|max:100',
            'taxation_fact3_value' => 'required|string|max:50',

            // Related Services
            'taxation_related_service1' => 'required|string|max:100',
            'taxation_related_service2' => 'required|string|max:100',
            'taxation_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'taxation_page_title', 'taxation_page_subtitle', 'taxation_overview_title', 'taxation_overview_paragraph1',
            'taxation_approach_title', 'taxation_approach_item1_title', 'taxation_approach_item1_description',
            'taxation_approach_item2_title', 'taxation_approach_item2_description', 'taxation_approach_item3_title',
            'taxation_approach_item3_description', 'taxation_services_title', 'taxation_service1', 'taxation_service2',
            'taxation_service3', 'taxation_service4', 'taxation_cta_text', 'taxation_sidebar_cta_title',
            'taxation_sidebar_cta_description', 'taxation_sidebar_cta_button_text', 'taxation_related_title',
            'taxation_fact1_label', 'taxation_fact1_value', 'taxation_fact2_label', 'taxation_fact2_value',
            'taxation_fact3_label', 'taxation_fact3_value', 'taxation_related_service1', 'taxation_related_service2',
            'taxation_related_service3'
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
        if ($request->has('remove_taxation_service_image') && $request->remove_taxation_service_image) {
            $existing = Content::where('key', 'taxation_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('taxation_service_image')) {
            $file = $request->file('taxation_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'taxation_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'taxation_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'taxation_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.taxation.preview')->with('success', 'Taxation page updated successfully!')
            : redirect()->route('admin.taxation.preview');
    }
}
