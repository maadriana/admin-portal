<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class ForensicContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.forensic.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'forensic_page_title' => 'Page Title',
            'forensic_page_subtitle' => 'Page Subtitle',

            // Service Image
            'forensic_service_image' => 'Service Image',

            // Service Overview
            'forensic_overview_title' => 'Overview Title',
            'forensic_overview_paragraph1' => 'Overview Paragraph 1',

            // Approach Section
            'forensic_approach_title' => 'Approach Section Title',
            'forensic_approach_item1_title' => 'Approach Item 1 Title',
            'forensic_approach_item1_description' => 'Approach Item 1 Description',
            'forensic_approach_item2_title' => 'Approach Item 2 Title',
            'forensic_approach_item2_description' => 'Approach Item 2 Description',
            'forensic_approach_item3_title' => 'Approach Item 3 Title',
            'forensic_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'forensic_services_title' => 'Services Section Title',
            'forensic_service1' => 'Service 1',
            'forensic_service2' => 'Service 2',
            'forensic_service3' => 'Service 3',

            // CTA Section
            'forensic_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'forensic_sidebar_cta_title' => 'Sidebar CTA Title',
            'forensic_sidebar_cta_description' => 'Sidebar CTA Description',
            'forensic_sidebar_cta_button_text' => 'Sidebar CTA Button Text',

            // Quick Facts
            'forensic_fact1_label' => 'Quick Fact 1 Label',
            'forensic_fact1_value' => 'Quick Fact 1 Value',
            'forensic_fact2_label' => 'Quick Fact 2 Label',
            'forensic_fact2_value' => 'Quick Fact 2 Value',
            'forensic_fact3_label' => 'Quick Fact 3 Label',
            'forensic_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'forensic_related_title' => 'Related Services Title',
            'forensic_related_service1' => 'Related Service 1',
            'forensic_related_service2' => 'Related Service 2',
            'forensic_related_service3' => 'Related Service 3',
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

        return view('pages.forensic', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'forensic_page_title' => Content::where('key', 'forensic_page_title')->value('value'),
            'forensic_page_subtitle' => Content::where('key', 'forensic_page_subtitle')->value('value'),

            // Service Image
            'forensic_service_image' => Content::where('key', 'forensic_service_image')->first(),

            // Service Overview
            'forensic_overview_title' => Content::where('key', 'forensic_overview_title')->value('value'),
            'forensic_overview_paragraph1' => Content::where('key', 'forensic_overview_paragraph1')->value('value'),

            // Approach Section
            'forensic_approach_title' => Content::where('key', 'forensic_approach_title')->value('value'),
            'forensic_approach_item1_title' => Content::where('key', 'forensic_approach_item1_title')->value('value'),
            'forensic_approach_item1_description' => Content::where('key', 'forensic_approach_item1_description')->value('value'),
            'forensic_approach_item2_title' => Content::where('key', 'forensic_approach_item2_title')->value('value'),
            'forensic_approach_item2_description' => Content::where('key', 'forensic_approach_item2_description')->value('value'),
            'forensic_approach_item3_title' => Content::where('key', 'forensic_approach_item3_title')->value('value'),
            'forensic_approach_item3_description' => Content::where('key', 'forensic_approach_item3_description')->value('value'),

            // Services Section
            'forensic_services_title' => Content::where('key', 'forensic_services_title')->value('value'),
            'forensic_service1' => Content::where('key', 'forensic_service1')->value('value'),
            'forensic_service2' => Content::where('key', 'forensic_service2')->value('value'),
            'forensic_service3' => Content::where('key', 'forensic_service3')->value('value'),

            // CTA Section
            'forensic_cta_text' => Content::where('key', 'forensic_cta_text')->value('value'),

            // Sidebar Content
            'forensic_sidebar_cta_title' => Content::where('key', 'forensic_sidebar_cta_title')->value('value'),
            'forensic_sidebar_cta_description' => Content::where('key', 'forensic_sidebar_cta_description')->value('value'),
            'forensic_sidebar_cta_button_text' => Content::where('key', 'forensic_sidebar_cta_button_text')->value('value'),

            // Quick Facts
            'forensic_fact1_label' => Content::where('key', 'forensic_fact1_label')->value('value'),
            'forensic_fact1_value' => Content::where('key', 'forensic_fact1_value')->value('value'),
            'forensic_fact2_label' => Content::where('key', 'forensic_fact2_label')->value('value'),
            'forensic_fact2_value' => Content::where('key', 'forensic_fact2_value')->value('value'),
            'forensic_fact3_label' => Content::where('key', 'forensic_fact3_label')->value('value'),
            'forensic_fact3_value' => Content::where('key', 'forensic_fact3_value')->value('value'),

            // Related Services
            'forensic_related_title' => Content::where('key', 'forensic_related_title')->value('value'),
            'forensic_related_service1' => Content::where('key', 'forensic_related_service1')->value('value'),
            'forensic_related_service2' => Content::where('key', 'forensic_related_service2')->value('value'),
            'forensic_related_service3' => Content::where('key', 'forensic_related_service3')->value('value'),
        ];

        return view('pages.forensic.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'forensic_page_title' => 'required|string|max:255',
            'forensic_page_subtitle' => 'required|string|max:500',

            // Service Image
            'forensic_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_forensic_service_image' => 'nullable|boolean',

            // Service Overview
            'forensic_overview_title' => 'required|string|max:255',
            'forensic_overview_paragraph1' => 'required|string',

            // Approach Section
            'forensic_approach_title' => 'required|string|max:255',
            'forensic_approach_item1_title' => 'required|string|max:255',
            'forensic_approach_item1_description' => 'required|string',
            'forensic_approach_item2_title' => 'required|string|max:255',
            'forensic_approach_item2_description' => 'required|string',
            'forensic_approach_item3_title' => 'required|string|max:255',
            'forensic_approach_item3_description' => 'required|string',

            // Services Section
            'forensic_services_title' => 'required|string|max:255',
            'forensic_service1' => 'required|string',
            'forensic_service2' => 'required|string',
            'forensic_service3' => 'required|string',

            // CTA Section
            'forensic_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'forensic_sidebar_cta_title' => 'required|string|max:255',
            'forensic_sidebar_cta_description' => 'required|string|max:500',
            'forensic_sidebar_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'forensic_fact1_label' => 'required|string|max:100',
            'forensic_fact1_value' => 'required|string|max:50',
            'forensic_fact2_label' => 'required|string|max:100',
            'forensic_fact2_value' => 'required|string|max:50',
            'forensic_fact3_label' => 'required|string|max:100',
            'forensic_fact3_value' => 'required|string|max:50',

            // Related Services
            'forensic_related_title' => 'required|string|max:255',
            'forensic_related_service1' => 'required|string|max:100',
            'forensic_related_service2' => 'required|string|max:100',
            'forensic_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'forensic_page_title', 'forensic_page_subtitle', 'forensic_overview_title',
            'forensic_overview_paragraph1', 'forensic_approach_title',
            'forensic_approach_item1_title', 'forensic_approach_item1_description',
            'forensic_approach_item2_title', 'forensic_approach_item2_description',
            'forensic_approach_item3_title', 'forensic_approach_item3_description',
            'forensic_services_title', 'forensic_service1', 'forensic_service2', 'forensic_service3',
            'forensic_cta_text', 'forensic_sidebar_cta_title', 'forensic_sidebar_cta_description',
            'forensic_sidebar_cta_button_text', 'forensic_fact1_label', 'forensic_fact1_value',
            'forensic_fact2_label', 'forensic_fact2_value', 'forensic_fact3_label',
            'forensic_fact3_value', 'forensic_related_title', 'forensic_related_service1',
            'forensic_related_service2', 'forensic_related_service3'
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
        if ($request->has('remove_forensic_service_image') && $request->remove_forensic_service_image) {
            $existing = Content::where('key', 'forensic_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('forensic_service_image')) {
            $file = $request->file('forensic_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'forensic_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'forensic_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'forensic_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.forensic.preview')->with('success', 'Forensic & Litigation page updated successfully!')
            : redirect()->route('admin.forensic.preview');
    }
}
