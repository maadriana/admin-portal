<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class RestructuringContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.restructuring.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'restructuring_page_title' => 'Page Title',
            'restructuring_page_subtitle' => 'Page Subtitle',

            // Service Image
            'restructuring_service_image' => 'Service Image',

            // Service Overview
            'restructuring_overview_title' => 'Overview Title',
            'restructuring_overview_paragraph' => 'Overview Paragraph',

            // Approach Section
            'restructuring_approach_title' => 'Approach Section Title',
            'restructuring_approach_item1_title' => 'Approach Item 1 Title',
            'restructuring_approach_item1_description' => 'Approach Item 1 Description',
            'restructuring_approach_item2_title' => 'Approach Item 2 Title',
            'restructuring_approach_item2_description' => 'Approach Item 2 Description',
            'restructuring_approach_item3_title' => 'Approach Item 3 Title',
            'restructuring_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'restructuring_services_title' => 'Services Section Title',
            'restructuring_service1' => 'Service 1',
            'restructuring_service2' => 'Service 2',
            'restructuring_service3' => 'Service 3',
            'restructuring_service4' => 'Service 4',

            // Benefits Section
            'restructuring_benefits_title' => 'Benefits Section Title',
            'restructuring_benefit1_title' => 'Benefit 1 Title',
            'restructuring_benefit1_description' => 'Benefit 1 Description',
            'restructuring_benefit2_title' => 'Benefit 2 Title',
            'restructuring_benefit2_description' => 'Benefit 2 Description',

            // Sidebar Content
            'restructuring_cta_title' => 'CTA Title',
            'restructuring_cta_description' => 'CTA Description',
            'restructuring_cta_button_text' => 'CTA Button Text',

            // Quick Facts
            'restructuring_fact1_label' => 'Quick Fact 1 Label',
            'restructuring_fact1_value' => 'Quick Fact 1 Value',
            'restructuring_fact2_label' => 'Quick Fact 2 Label',
            'restructuring_fact2_value' => 'Quick Fact 2 Value',
            'restructuring_fact3_label' => 'Quick Fact 3 Label',
            'restructuring_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'restructuring_related_service1' => 'Related Service 1',
            'restructuring_related_service2' => 'Related Service 2',
            'restructuring_related_service3' => 'Related Service 3',
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

        return view('pages.restructuring', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'restructuring_page_title' => Content::where('key', 'restructuring_page_title')->value('value'),
            'restructuring_page_subtitle' => Content::where('key', 'restructuring_page_subtitle')->value('value'),

            // Service Image
            'restructuring_service_image' => Content::where('key', 'restructuring_service_image')->first(),

            // Service Overview
            'restructuring_overview_title' => Content::where('key', 'restructuring_overview_title')->value('value'),
            'restructuring_overview_paragraph' => Content::where('key', 'restructuring_overview_paragraph')->value('value'),

            // Approach Section
            'restructuring_approach_title' => Content::where('key', 'restructuring_approach_title')->value('value'),
            'restructuring_approach_item1_title' => Content::where('key', 'restructuring_approach_item1_title')->value('value'),
            'restructuring_approach_item1_description' => Content::where('key', 'restructuring_approach_item1_description')->value('value'),
            'restructuring_approach_item2_title' => Content::where('key', 'restructuring_approach_item2_title')->value('value'),
            'restructuring_approach_item2_description' => Content::where('key', 'restructuring_approach_item2_description')->value('value'),
            'restructuring_approach_item3_title' => Content::where('key', 'restructuring_approach_item3_title')->value('value'),
            'restructuring_approach_item3_description' => Content::where('key', 'restructuring_approach_item3_description')->value('value'),

            // Services Section
            'restructuring_services_title' => Content::where('key', 'restructuring_services_title')->value('value'),
            'restructuring_service1' => Content::where('key', 'restructuring_service1')->value('value'),
            'restructuring_service2' => Content::where('key', 'restructuring_service2')->value('value'),
            'restructuring_service3' => Content::where('key', 'restructuring_service3')->value('value'),
            'restructuring_service4' => Content::where('key', 'restructuring_service4')->value('value'),

            // Benefits Section
            'restructuring_benefits_title' => Content::where('key', 'restructuring_benefits_title')->value('value'),
            'restructuring_benefit1_title' => Content::where('key', 'restructuring_benefit1_title')->value('value'),
            'restructuring_benefit1_description' => Content::where('key', 'restructuring_benefit1_description')->value('value'),
            'restructuring_benefit2_title' => Content::where('key', 'restructuring_benefit2_title')->value('value'),
            'restructuring_benefit2_description' => Content::where('key', 'restructuring_benefit2_description')->value('value'),

            // Sidebar Content
            'restructuring_cta_title' => Content::where('key', 'restructuring_cta_title')->value('value'),
            'restructuring_cta_description' => Content::where('key', 'restructuring_cta_description')->value('value'),
            'restructuring_cta_button_text' => Content::where('key', 'restructuring_cta_button_text')->value('value'),

            // Quick Facts
            'restructuring_fact1_label' => Content::where('key', 'restructuring_fact1_label')->value('value'),
            'restructuring_fact1_value' => Content::where('key', 'restructuring_fact1_value')->value('value'),
            'restructuring_fact2_label' => Content::where('key', 'restructuring_fact2_label')->value('value'),
            'restructuring_fact2_value' => Content::where('key', 'restructuring_fact2_value')->value('value'),
            'restructuring_fact3_label' => Content::where('key', 'restructuring_fact3_label')->value('value'),
            'restructuring_fact3_value' => Content::where('key', 'restructuring_fact3_value')->value('value'),

            // Related Services
            'restructuring_related_service1' => Content::where('key', 'restructuring_related_service1')->value('value'),
            'restructuring_related_service2' => Content::where('key', 'restructuring_related_service2')->value('value'),
            'restructuring_related_service3' => Content::where('key', 'restructuring_related_service3')->value('value'),
        ];

        return view('pages.restructuring.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'restructuring_page_title' => 'required|string|max:255',
            'restructuring_page_subtitle' => 'required|string|max:500',

            // Service Image
            'restructuring_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_restructuring_service_image' => 'nullable|boolean',

            // Service Overview
            'restructuring_overview_title' => 'required|string|max:255',
            'restructuring_overview_paragraph' => 'required|string',

            // Approach Section
            'restructuring_approach_title' => 'required|string|max:255',
            'restructuring_approach_item1_title' => 'required|string|max:255',
            'restructuring_approach_item1_description' => 'required|string',
            'restructuring_approach_item2_title' => 'required|string|max:255',
            'restructuring_approach_item2_description' => 'required|string',
            'restructuring_approach_item3_title' => 'required|string|max:255',
            'restructuring_approach_item3_description' => 'required|string',

            // Services Section
            'restructuring_services_title' => 'required|string|max:255',
            'restructuring_service1' => 'required|string|max:255',
            'restructuring_service2' => 'required|string|max:255',
            'restructuring_service3' => 'required|string|max:255',
            'restructuring_service4' => 'required|string|max:255',

            // Benefits Section
            'restructuring_benefits_title' => 'required|string|max:255',
            'restructuring_benefit1_title' => 'required|string|max:255',
            'restructuring_benefit1_description' => 'required|string|max:500',
            'restructuring_benefit2_title' => 'required|string|max:255',
            'restructuring_benefit2_description' => 'required|string|max:500',

            // Sidebar Content
            'restructuring_cta_title' => 'required|string|max:255',
            'restructuring_cta_description' => 'required|string|max:500',
            'restructuring_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'restructuring_fact1_label' => 'required|string|max:100',
            'restructuring_fact1_value' => 'required|string|max:50',
            'restructuring_fact2_label' => 'required|string|max:100',
            'restructuring_fact2_value' => 'required|string|max:50',
            'restructuring_fact3_label' => 'required|string|max:100',
            'restructuring_fact3_value' => 'required|string|max:50',

            // Related Services
            'restructuring_related_service1' => 'required|string|max:100',
            'restructuring_related_service2' => 'required|string|max:100',
            'restructuring_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'restructuring_page_title', 'restructuring_page_subtitle', 'restructuring_overview_title',
            'restructuring_overview_paragraph', 'restructuring_approach_title', 'restructuring_approach_item1_title',
            'restructuring_approach_item1_description', 'restructuring_approach_item2_title', 'restructuring_approach_item2_description',
            'restructuring_approach_item3_title', 'restructuring_approach_item3_description', 'restructuring_services_title',
            'restructuring_service1', 'restructuring_service2', 'restructuring_service3', 'restructuring_service4',
            'restructuring_benefits_title', 'restructuring_benefit1_title', 'restructuring_benefit1_description',
            'restructuring_benefit2_title', 'restructuring_benefit2_description', 'restructuring_cta_title',
            'restructuring_cta_description', 'restructuring_cta_button_text', 'restructuring_fact1_label',
            'restructuring_fact1_value', 'restructuring_fact2_label', 'restructuring_fact2_value',
            'restructuring_fact3_label', 'restructuring_fact3_value', 'restructuring_related_service1',
            'restructuring_related_service2', 'restructuring_related_service3'
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
        if ($request->has('remove_restructuring_service_image') && $request->remove_restructuring_service_image) {
            $existing = Content::where('key', 'restructuring_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('restructuring_service_image')) {
            $file = $request->file('restructuring_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'restructuring_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'restructuring_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'restructuring_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.restructuring.preview')->with('success', 'Business Restructuring page updated successfully!')
            : redirect()->route('admin.restructuring.preview');
    }
}
