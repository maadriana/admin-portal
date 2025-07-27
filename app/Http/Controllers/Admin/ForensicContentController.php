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
        // Get all dynamic service items from database
        $dynamicServiceItems = [];
        $i = 1;
        while(true) {
            $titleKey = "forensic_service_item{$i}_title";
            $descKey = "forensic_service_item{$i}_description";
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
            'forensic_page_title' => 'Page Title',
            'forensic_page_subtitle' => 'Page Subtitle',

            // Service Image
            'forensic_service_image' => 'Service Image',

            // Service Overview
            'forensic_overview_title' => 'Overview Title',
            'forensic_overview_paragraph1' => 'Overview Paragraph 1',
            'forensic_overview_paragraph2' => 'Overview Paragraph 2',

            // Services Section Title
            'forensic_services_title' => 'Services Section Title',
        ];

        // Add dynamic service items to sections
        $sections = array_merge($sections, $dynamicServiceItems);

        // Add remaining sections
        $sections = array_merge($sections, [
            // Value Proposition
            'forensic_value_title' => 'Value Proposition Title',
            'forensic_value_description' => 'Value Proposition Description',

            // CTA
            'forensic_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'forensic_sidebar_cta_title' => 'Sidebar CTA Title',
            'forensic_sidebar_cta_description' => 'Sidebar CTA Description',
            'forensic_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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
            'forensic_overview_paragraph2' => Content::where('key', 'forensic_overview_paragraph2')->value('value'),

            // Services Section
            'forensic_services_title' => Content::where('key', 'forensic_services_title')->value('value'),

            // Value Proposition
            'forensic_value_title' => Content::where('key', 'forensic_value_title')->value('value'),
            'forensic_value_description' => Content::where('key', 'forensic_value_description')->value('value'),

            // CTA
            'forensic_cta_text' => Content::where('key', 'forensic_cta_text')->value('value'),

            // Sidebar Content
            'forensic_sidebar_cta_title' => Content::where('key', 'forensic_sidebar_cta_title')->value('value'),
            'forensic_sidebar_cta_description' => Content::where('key', 'forensic_sidebar_cta_description')->value('value'),
            'forensic_sidebar_cta_button_text' => Content::where('key', 'forensic_sidebar_cta_button_text')->value('value'),
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
            'forensic_overview_paragraph2' => 'required|string',

            // Services Section
            'forensic_services_title' => 'required|string|max:255',
            'service_items' => 'required|array|min:1',
            'service_items.*.title' => 'required|string|max:255',
            'service_items.*.description' => 'required|string',

            // Value Proposition
            'forensic_value_title' => 'required|string|max:255',
            'forensic_value_description' => 'required|string',

            // CTA
            'forensic_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'forensic_sidebar_cta_title' => 'required|string|max:255',
            'forensic_sidebar_cta_description' => 'required|string',
            'forensic_sidebar_cta_button_text' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields (non-dynamic)
        $textFields = [
            'forensic_page_title', 'forensic_page_subtitle', 'forensic_overview_title', 'forensic_overview_paragraph1',
            'forensic_overview_paragraph2', 'forensic_services_title', 'forensic_value_title', 'forensic_value_description',
            'forensic_cta_text', 'forensic_sidebar_cta_title', 'forensic_sidebar_cta_description', 'forensic_sidebar_cta_button_text'
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
        Content::where('key', 'like', 'forensic_service_item%_title')
               ->orWhere('key', 'like', 'forensic_service_item%_description')
               ->delete();

        // Then create new service item content
        foreach ($serviceItems as $index => $serviceItem) {
            if (!empty($serviceItem['title']) && !empty($serviceItem['description'])) {
                Content::create([
                    'key' => "forensic_service_item{$index}_title",
                    'value' => $serviceItem['title'],
                    'updated_by' => Auth::id(),
                ]);

                Content::create([
                    'key' => "forensic_service_item{$index}_description",
                    'value' => $serviceItem['description'],
                    'updated_by' => Auth::id(),
                ]);

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
