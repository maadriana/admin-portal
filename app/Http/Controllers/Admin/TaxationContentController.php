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
        // Get all dynamic service items from database
        $dynamicServiceItems = [];
        $i = 1;
        while(true) {
            $titleKey = "taxation_service_item{$i}_title";
            $descKey = "taxation_service_item{$i}_description";
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
            'taxation_page_title' => 'Page Title',
            'taxation_page_subtitle' => 'Page Subtitle',

            // Service Image
            'taxation_service_image' => 'Service Image',

            // Service Overview
            'taxation_overview_title' => 'Overview Title',
            'taxation_overview_paragraph1' => 'Overview Paragraph 1',
            'taxation_overview_paragraph2' => 'Overview Paragraph 2',

            // Services Section Title
            'taxation_services_title' => 'Services Section Title',
        ];

        // Add dynamic service items to sections
        $sections = array_merge($sections, $dynamicServiceItems);

        // Add remaining sections
        $sections = array_merge($sections, [
            // Value Proposition
            'taxation_value_title' => 'Value Proposition Title',
            'taxation_value_description' => 'Value Proposition Description',

            // CTA
            'taxation_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'taxation_sidebar_cta_title' => 'Sidebar CTA Title',
            'taxation_sidebar_cta_description' => 'Sidebar CTA Description',
            'taxation_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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
            'taxation_overview_paragraph2' => Content::where('key', 'taxation_overview_paragraph2')->value('value'),

            // Services Section
            'taxation_services_title' => Content::where('key', 'taxation_services_title')->value('value'),

            // Value Proposition
            'taxation_value_title' => Content::where('key', 'taxation_value_title')->value('value'),
            'taxation_value_description' => Content::where('key', 'taxation_value_description')->value('value'),

            // CTA
            'taxation_cta_text' => Content::where('key', 'taxation_cta_text')->value('value'),

            // Sidebar Content
            'taxation_sidebar_cta_title' => Content::where('key', 'taxation_sidebar_cta_title')->value('value'),
            'taxation_sidebar_cta_description' => Content::where('key', 'taxation_sidebar_cta_description')->value('value'),
            'taxation_sidebar_cta_button_text' => Content::where('key', 'taxation_sidebar_cta_button_text')->value('value'),
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
            'taxation_overview_paragraph2' => 'required|string',

            // Services Section
            'taxation_services_title' => 'required|string|max:255',
            'service_items' => 'required|array|min:1',
            'service_items.*.title' => 'required|string|max:255',
            'service_items.*.description' => 'required|string',

            // Value Proposition
            'taxation_value_title' => 'required|string|max:255',
            'taxation_value_description' => 'required|string',

            // CTA
            'taxation_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'taxation_sidebar_cta_title' => 'required|string|max:255',
            'taxation_sidebar_cta_description' => 'required|string',
            'taxation_sidebar_cta_button_text' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields (non-dynamic)
        $textFields = [
            'taxation_page_title', 'taxation_page_subtitle', 'taxation_overview_title', 'taxation_overview_paragraph1',
            'taxation_overview_paragraph2', 'taxation_services_title', 'taxation_value_title', 'taxation_value_description',
            'taxation_cta_text', 'taxation_sidebar_cta_title', 'taxation_sidebar_cta_description', 'taxation_sidebar_cta_button_text'
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
        Content::where('key', 'like', 'taxation_service_item%_title')
               ->orWhere('key', 'like', 'taxation_service_item%_description')
               ->delete();

        // Then create new service item content
        foreach ($serviceItems as $index => $serviceItem) {
            if (!empty($serviceItem['title']) && !empty($serviceItem['description'])) {
                Content::create([
                    'key' => "taxation_service_item{$index}_title",
                    'value' => $serviceItem['title'],
                    'updated_by' => Auth::id(),
                ]);

                Content::create([
                    'key' => "taxation_service_item{$index}_description",
                    'value' => $serviceItem['description'],
                    'updated_by' => Auth::id(),
                ]);

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
