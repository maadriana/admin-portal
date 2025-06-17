<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class CorporateFinanceController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.finance.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'finance_page_title' => 'Page Title',
            'finance_page_subtitle' => 'Page Subtitle',

            // Service Image
            'finance_service_image' => 'Service Image',

            // Service Overview
            'finance_overview_title' => 'Overview Title',
            'finance_overview_paragraph1' => 'Overview Paragraph 1',

            // Approach Section
            'finance_approach_title' => 'Approach Section Title',
            'finance_approach_item1_title' => 'Approach Item 1 Title',
            'finance_approach_item1_description' => 'Approach Item 1 Description',
            'finance_approach_item2_title' => 'Approach Item 2 Title',
            'finance_approach_item2_description' => 'Approach Item 2 Description',
            'finance_approach_item3_title' => 'Approach Item 3 Title',
            'finance_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'finance_services_title' => 'Services Section Title',
            'finance_service1' => 'Service 1',
            'finance_service2' => 'Service 2',
            'finance_service3' => 'Service 3',
            'finance_service4' => 'Service 4',

            // CTA Section
            'finance_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'finance_sidebar_cta_title' => 'Sidebar CTA Title',
            'finance_sidebar_cta_description' => 'Sidebar CTA Description',
            'finance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',

            // Quick Facts
            'finance_fact1_label' => 'Quick Fact 1 Label',
            'finance_fact1_value' => 'Quick Fact 1 Value',
            'finance_fact2_label' => 'Quick Fact 2 Label',
            'finance_fact2_value' => 'Quick Fact 2 Value',
            'finance_fact3_label' => 'Quick Fact 3 Label',
            'finance_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'finance_related_title' => 'Related Services Title',
            'finance_related_service1' => 'Related Service 1',
            'finance_related_service2' => 'Related Service 2',
            'finance_related_service3' => 'Related Service 3',
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

        return view('pages.finance', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'finance_page_title' => Content::where('key', 'finance_page_title')->value('value'),
            'finance_page_subtitle' => Content::where('key', 'finance_page_subtitle')->value('value'),

            // Service Image
            'finance_service_image' => Content::where('key', 'finance_service_image')->first(),

            // Service Overview
            'finance_overview_title' => Content::where('key', 'finance_overview_title')->value('value'),
            'finance_overview_paragraph1' => Content::where('key', 'finance_overview_paragraph1')->value('value'),

            // Approach Section
            'finance_approach_title' => Content::where('key', 'finance_approach_title')->value('value'),
            'finance_approach_item1_title' => Content::where('key', 'finance_approach_item1_title')->value('value'),
            'finance_approach_item1_description' => Content::where('key', 'finance_approach_item1_description')->value('value'),
            'finance_approach_item2_title' => Content::where('key', 'finance_approach_item2_title')->value('value'),
            'finance_approach_item2_description' => Content::where('key', 'finance_approach_item2_description')->value('value'),
            'finance_approach_item3_title' => Content::where('key', 'finance_approach_item3_title')->value('value'),
            'finance_approach_item3_description' => Content::where('key', 'finance_approach_item3_description')->value('value'),

            // Services Section
            'finance_services_title' => Content::where('key', 'finance_services_title')->value('value'),
            'finance_service1' => Content::where('key', 'finance_service1')->value('value'),
            'finance_service2' => Content::where('key', 'finance_service2')->value('value'),
            'finance_service3' => Content::where('key', 'finance_service3')->value('value'),
            'finance_service4' => Content::where('key', 'finance_service4')->value('value'),

            // CTA Section
            'finance_cta_text' => Content::where('key', 'finance_cta_text')->value('value'),

            // Sidebar Content
            'finance_sidebar_cta_title' => Content::where('key', 'finance_sidebar_cta_title')->value('value'),
            'finance_sidebar_cta_description' => Content::where('key', 'finance_sidebar_cta_description')->value('value'),
            'finance_sidebar_cta_button_text' => Content::where('key', 'finance_sidebar_cta_button_text')->value('value'),

            // Quick Facts
            'finance_fact1_label' => Content::where('key', 'finance_fact1_label')->value('value'),
            'finance_fact1_value' => Content::where('key', 'finance_fact1_value')->value('value'),
            'finance_fact2_label' => Content::where('key', 'finance_fact2_label')->value('value'),
            'finance_fact2_value' => Content::where('key', 'finance_fact2_value')->value('value'),
            'finance_fact3_label' => Content::where('key', 'finance_fact3_label')->value('value'),
            'finance_fact3_value' => Content::where('key', 'finance_fact3_value')->value('value'),

            // Related Services
            'finance_related_title' => Content::where('key', 'finance_related_title')->value('value'),
            'finance_related_service1' => Content::where('key', 'finance_related_service1')->value('value'),
            'finance_related_service2' => Content::where('key', 'finance_related_service2')->value('value'),
            'finance_related_service3' => Content::where('key', 'finance_related_service3')->value('value'),
        ];

        return view('pages.finance.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'finance_page_title' => 'required|string|max:255',
            'finance_page_subtitle' => 'required|string|max:500',

            // Service Image
            'finance_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_finance_service_image' => 'nullable|boolean',

            // Service Overview
            'finance_overview_title' => 'required|string|max:255',
            'finance_overview_paragraph1' => 'required|string',

            // Approach Section
            'finance_approach_title' => 'required|string|max:255',
            'finance_approach_item1_title' => 'required|string|max:255',
            'finance_approach_item1_description' => 'required|string',
            'finance_approach_item2_title' => 'required|string|max:255',
            'finance_approach_item2_description' => 'required|string',
            'finance_approach_item3_title' => 'required|string|max:255',
            'finance_approach_item3_description' => 'required|string',

            // Services Section
            'finance_services_title' => 'required|string|max:255',
            'finance_service1' => 'required|string|max:255',
            'finance_service2' => 'required|string|max:255',
            'finance_service3' => 'required|string|max:255',
            'finance_service4' => 'required|string|max:255',

            // CTA Section
            'finance_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'finance_sidebar_cta_title' => 'required|string|max:255',
            'finance_sidebar_cta_description' => 'required|string|max:500',
            'finance_sidebar_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'finance_fact1_label' => 'required|string|max:100',
            'finance_fact1_value' => 'required|string|max:50',
            'finance_fact2_label' => 'required|string|max:100',
            'finance_fact2_value' => 'required|string|max:50',
            'finance_fact3_label' => 'required|string|max:100',
            'finance_fact3_value' => 'required|string|max:50',

            // Related Services
            'finance_related_title' => 'required|string|max:255',
            'finance_related_service1' => 'required|string|max:100',
            'finance_related_service2' => 'required|string|max:100',
            'finance_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'finance_page_title', 'finance_page_subtitle', 'finance_overview_title',
            'finance_overview_paragraph1', 'finance_approach_title',
            'finance_approach_item1_title', 'finance_approach_item1_description',
            'finance_approach_item2_title', 'finance_approach_item2_description',
            'finance_approach_item3_title', 'finance_approach_item3_description',
            'finance_services_title', 'finance_service1', 'finance_service2',
            'finance_service3', 'finance_service4', 'finance_cta_text',
            'finance_sidebar_cta_title', 'finance_sidebar_cta_description', 'finance_sidebar_cta_button_text',
            'finance_fact1_label', 'finance_fact1_value', 'finance_fact2_label',
            'finance_fact2_value', 'finance_fact3_label', 'finance_fact3_value',
            'finance_related_title', 'finance_related_service1',
            'finance_related_service2', 'finance_related_service3'
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
        if ($request->has('remove_finance_service_image') && $request->remove_finance_service_image) {
            $existing = Content::where('key', 'finance_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('finance_service_image')) {
            $file = $request->file('finance_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'finance_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'finance_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'finance_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.finance.preview')->with('success', 'Corporate Finance page updated successfully!')
            : redirect()->route('admin.finance.preview');
    }
}
