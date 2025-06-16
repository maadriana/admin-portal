<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class AuditContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.audit.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'audit_page_title' => 'Page Title',
            'audit_page_subtitle' => 'Page Subtitle',

            // Service Image
            'audit_service_image' => 'Service Image',

            // Service Overview
            'audit_overview_title' => 'Overview Title',
            'audit_overview_paragraph1' => 'Overview Paragraph 1',
            'audit_overview_paragraph2' => 'Overview Paragraph 2',

            // Approach Section
            'audit_approach_title' => 'Approach Section Title',
            'audit_approach_item1_title' => 'Approach Item 1 Title',
            'audit_approach_item1_description' => 'Approach Item 1 Description',
            'audit_approach_item2_title' => 'Approach Item 2 Title',
            'audit_approach_item2_description' => 'Approach Item 2 Description',
            'audit_approach_item3_title' => 'Approach Item 3 Title',
            'audit_approach_item3_description' => 'Approach Item 3 Description',

            // Services Section
            'audit_services_title' => 'Services Section Title',
            'audit_service1_title' => 'Service 1 Title',
            'audit_service1_description' => 'Service 1 Description',
            'audit_service2_title' => 'Service 2 Title',
            'audit_service2_description' => 'Service 2 Description',

            // Benefits Section
            'audit_benefits_title' => 'Benefits Section Title',
            'audit_benefit1_title' => 'Benefit 1 Title',
            'audit_benefit1_description' => 'Benefit 1 Description',
            'audit_benefit2_title' => 'Benefit 2 Title',
            'audit_benefit2_description' => 'Benefit 2 Description',
            'audit_benefit3_title' => 'Benefit 3 Title',
            'audit_benefit3_description' => 'Benefit 3 Description',
            'audit_benefit4_title' => 'Benefit 4 Title',
            'audit_benefit4_description' => 'Benefit 4 Description',

            // Sidebar Content
            'audit_cta_title' => 'CTA Title',
            'audit_cta_description' => 'CTA Description',
            'audit_cta_button_text' => 'CTA Button Text',

            // Quick Facts
            'audit_fact1_label' => 'Quick Fact 1 Label',
            'audit_fact1_value' => 'Quick Fact 1 Value',
            'audit_fact2_label' => 'Quick Fact 2 Label',
            'audit_fact2_value' => 'Quick Fact 2 Value',
            'audit_fact3_label' => 'Quick Fact 3 Label',
            'audit_fact3_value' => 'Quick Fact 3 Value',

            // Related Services
            'audit_related_service1' => 'Related Service 1',
            'audit_related_service2' => 'Related Service 2',
            'audit_related_service3' => 'Related Service 3',
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

        return view('pages.audit', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'audit_page_title' => Content::where('key', 'audit_page_title')->value('value'),
            'audit_page_subtitle' => Content::where('key', 'audit_page_subtitle')->value('value'),

            // Service Image
            'audit_service_image' => Content::where('key', 'audit_service_image')->first(),

            // Service Overview
            'audit_overview_title' => Content::where('key', 'audit_overview_title')->value('value'),
            'audit_overview_paragraph1' => Content::where('key', 'audit_overview_paragraph1')->value('value'),
            'audit_overview_paragraph2' => Content::where('key', 'audit_overview_paragraph2')->value('value'),

            // Approach Section
            'audit_approach_title' => Content::where('key', 'audit_approach_title')->value('value'),
            'audit_approach_item1_title' => Content::where('key', 'audit_approach_item1_title')->value('value'),
            'audit_approach_item1_description' => Content::where('key', 'audit_approach_item1_description')->value('value'),
            'audit_approach_item2_title' => Content::where('key', 'audit_approach_item2_title')->value('value'),
            'audit_approach_item2_description' => Content::where('key', 'audit_approach_item2_description')->value('value'),
            'audit_approach_item3_title' => Content::where('key', 'audit_approach_item3_title')->value('value'),
            'audit_approach_item3_description' => Content::where('key', 'audit_approach_item3_description')->value('value'),

            // Services Section
            'audit_services_title' => Content::where('key', 'audit_services_title')->value('value'),
            'audit_service1_title' => Content::where('key', 'audit_service1_title')->value('value'),
            'audit_service1_description' => Content::where('key', 'audit_service1_description')->value('value'),
            'audit_service2_title' => Content::where('key', 'audit_service2_title')->value('value'),
            'audit_service2_description' => Content::where('key', 'audit_service2_description')->value('value'),

            // Benefits Section
            'audit_benefits_title' => Content::where('key', 'audit_benefits_title')->value('value'),
            'audit_benefit1_title' => Content::where('key', 'audit_benefit1_title')->value('value'),
            'audit_benefit1_description' => Content::where('key', 'audit_benefit1_description')->value('value'),
            'audit_benefit2_title' => Content::where('key', 'audit_benefit2_title')->value('value'),
            'audit_benefit2_description' => Content::where('key', 'audit_benefit2_description')->value('value'),
            'audit_benefit3_title' => Content::where('key', 'audit_benefit3_title')->value('value'),
            'audit_benefit3_description' => Content::where('key', 'audit_benefit3_description')->value('value'),
            'audit_benefit4_title' => Content::where('key', 'audit_benefit4_title')->value('value'),
            'audit_benefit4_description' => Content::where('key', 'audit_benefit4_description')->value('value'),

            // Sidebar Content
            'audit_cta_title' => Content::where('key', 'audit_cta_title')->value('value'),
            'audit_cta_description' => Content::where('key', 'audit_cta_description')->value('value'),
            'audit_cta_button_text' => Content::where('key', 'audit_cta_button_text')->value('value'),

            // Quick Facts
            'audit_fact1_label' => Content::where('key', 'audit_fact1_label')->value('value'),
            'audit_fact1_value' => Content::where('key', 'audit_fact1_value')->value('value'),
            'audit_fact2_label' => Content::where('key', 'audit_fact2_label')->value('value'),
            'audit_fact2_value' => Content::where('key', 'audit_fact2_value')->value('value'),
            'audit_fact3_label' => Content::where('key', 'audit_fact3_label')->value('value'),
            'audit_fact3_value' => Content::where('key', 'audit_fact3_value')->value('value'),

            // Related Services
            'audit_related_service1' => Content::where('key', 'audit_related_service1')->value('value'),
            'audit_related_service2' => Content::where('key', 'audit_related_service2')->value('value'),
            'audit_related_service3' => Content::where('key', 'audit_related_service3')->value('value'),
        ];

        return view('pages.audit.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'audit_page_title' => 'required|string|max:255',
            'audit_page_subtitle' => 'required|string|max:500',

            // Service Image
            'audit_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_audit_service_image' => 'nullable|boolean',

            // Service Overview
            'audit_overview_title' => 'required|string|max:255',
            'audit_overview_paragraph1' => 'required|string',
            'audit_overview_paragraph2' => 'required|string',

            // Approach Section
            'audit_approach_title' => 'required|string|max:255',
            'audit_approach_item1_title' => 'required|string|max:255',
            'audit_approach_item1_description' => 'required|string',
            'audit_approach_item2_title' => 'required|string|max:255',
            'audit_approach_item2_description' => 'required|string',
            'audit_approach_item3_title' => 'required|string|max:255',
            'audit_approach_item3_description' => 'required|string',

            // Services Section
            'audit_services_title' => 'required|string|max:255',
            'audit_service1_title' => 'required|string|max:255',
            'audit_service1_description' => 'required|string',
            'audit_service2_title' => 'required|string|max:255',
            'audit_service2_description' => 'required|string',

            // Benefits Section
            'audit_benefits_title' => 'required|string|max:255',
            'audit_benefit1_title' => 'required|string|max:255',
            'audit_benefit1_description' => 'required|string|max:500',
            'audit_benefit2_title' => 'required|string|max:255',
            'audit_benefit2_description' => 'required|string|max:500',
            'audit_benefit3_title' => 'required|string|max:255',
            'audit_benefit3_description' => 'required|string|max:500',
            'audit_benefit4_title' => 'required|string|max:255',
            'audit_benefit4_description' => 'required|string|max:500',

            // Sidebar Content
            'audit_cta_title' => 'required|string|max:255',
            'audit_cta_description' => 'required|string|max:500',
            'audit_cta_button_text' => 'required|string|max:50',

            // Quick Facts
            'audit_fact1_label' => 'required|string|max:100',
            'audit_fact1_value' => 'required|string|max:50',
            'audit_fact2_label' => 'required|string|max:100',
            'audit_fact2_value' => 'required|string|max:50',
            'audit_fact3_label' => 'required|string|max:100',
            'audit_fact3_value' => 'required|string|max:50',

            // Related Services
            'audit_related_service1' => 'required|string|max:100',
            'audit_related_service2' => 'required|string|max:100',
            'audit_related_service3' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'audit_page_title', 'audit_page_subtitle', 'audit_overview_title', 'audit_overview_paragraph1',
            'audit_overview_paragraph2', 'audit_approach_title', 'audit_approach_item1_title',
            'audit_approach_item1_description', 'audit_approach_item2_title', 'audit_approach_item2_description',
            'audit_approach_item3_title', 'audit_approach_item3_description', 'audit_services_title',
            'audit_service1_title', 'audit_service1_description', 'audit_service2_title', 'audit_service2_description',
            'audit_benefits_title', 'audit_benefit1_title', 'audit_benefit1_description', 'audit_benefit2_title',
            'audit_benefit2_description', 'audit_benefit3_title', 'audit_benefit3_description', 'audit_benefit4_title',
            'audit_benefit4_description', 'audit_cta_title', 'audit_cta_description', 'audit_cta_button_text',
            'audit_fact1_label', 'audit_fact1_value', 'audit_fact2_label', 'audit_fact2_value',
            'audit_fact3_label', 'audit_fact3_value', 'audit_related_service1', 'audit_related_service2',
            'audit_related_service3'
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
        if ($request->has('remove_audit_service_image') && $request->remove_audit_service_image) {
            $existing = Content::where('key', 'audit_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('audit_service_image')) {
            $file = $request->file('audit_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'audit_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'audit_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'audit_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.audit.preview')->with('success', 'Audit page updated successfully!')
            : redirect()->route('admin.audit.preview');
    }
}
