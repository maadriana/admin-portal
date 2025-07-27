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
        // Get dynamic service items
        $dynamicServiceItems = [];
        $i = 1;
        while(true) {
            $titleKey = "audit_service_item{$i}_title";
            $descKey = "audit_service_item{$i}_description";
            $titleItem = Content::with('editor')->where('key', $titleKey)->first();
            $descItem = Content::with('editor')->where('key', $descKey)->first();

            if ($titleItem || $descItem) {
                $dynamicServiceItems[$titleKey] = "Service Area {$i} Title";
                $dynamicServiceItems[$descKey] = "Service Area {$i} Description";
                $i++;
            } else {
                break;
            }
        }

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

            // Services Section Title
            'audit_services_title' => 'Services Section Title',
        ];

        // Add dynamic service items to sections
        $sections = array_merge($sections, $dynamicServiceItems);

        // Add remaining sections
        $sections = array_merge($sections, [
            // Value Proposition
            'audit_value_title' => 'Value Proposition Title',
            'audit_value_description' => 'Value Proposition Description',

            // CTA
            'audit_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'audit_sidebar_cta_title' => 'Sidebar CTA Title',
            'audit_sidebar_cta_description' => 'Sidebar CTA Description',
            'audit_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
        ]);

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

            // Services Section
            'audit_services_title' => Content::where('key', 'audit_services_title')->value('value'),

            // Value Proposition
            'audit_value_title' => Content::where('key', 'audit_value_title')->value('value'),
            'audit_value_description' => Content::where('key', 'audit_value_description')->value('value'),

            // CTA
            'audit_cta_text' => Content::where('key', 'audit_cta_text')->value('value'),

            // Sidebar Content
            'audit_sidebar_cta_title' => Content::where('key', 'audit_sidebar_cta_title')->value('value'),
            'audit_sidebar_cta_description' => Content::where('key', 'audit_sidebar_cta_description')->value('value'),
            'audit_sidebar_cta_button_text' => Content::where('key', 'audit_sidebar_cta_button_text')->value('value'),
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

            // Services Section
            'audit_services_title' => 'required|string|max:255',
            'service_items' => 'required|array|min:1',
            'service_items.*.title' => 'required|string|max:255',
            'service_items.*.description' => 'required|string',

            // Value Proposition
            'audit_value_title' => 'required|string|max:255',
            'audit_value_description' => 'required|string',

            // CTA
            'audit_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'audit_sidebar_cta_title' => 'required|string|max:255',
            'audit_sidebar_cta_description' => 'required|string',
            'audit_sidebar_cta_button_text' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields (non-dynamic)
        $textFields = [
            'audit_page_title', 'audit_page_subtitle', 'audit_overview_title', 'audit_overview_paragraph1',
            'audit_overview_paragraph2', 'audit_services_title', 'audit_value_title', 'audit_value_description',
            'audit_cta_text', 'audit_sidebar_cta_title', 'audit_sidebar_cta_description', 'audit_sidebar_cta_button_text'
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

        // Handle dynamic service items
        $serviceItems = $request->input('service_items', []);

        // First, delete all existing service item content
        Content::where('key', 'like', 'audit_service_item%_title')
               ->orWhere('key', 'like', 'audit_service_item%_description')
               ->delete();

        // Then create new service item content
        foreach ($serviceItems as $index => $serviceItem) {
            if (!empty($serviceItem['title']) && !empty($serviceItem['description'])) {
                Content::create([
                    'key' => "audit_service_item{$index}_title",
                    'value' => $serviceItem['title'],
                    'updated_by' => Auth::id(),
                ]);

                Content::create([
                    'key' => "audit_service_item{$index}_description",
                    'value' => $serviceItem['description'],
                    'updated_by' => Auth::id(),
                ]);

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
