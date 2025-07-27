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
        // Get dynamic service items
        $dynamicServiceItems = [];
        $i = 1;
        while(true) {
            $titleKey = "finance_service_item{$i}_title";
            $descKey = "finance_service_item{$i}_description";
            $titleItem = Content::with('editor')->where('key', $titleKey)->first();
            $descItem = Content::with('editor')->where('key', $descKey)->first();

            if ($titleItem || $descItem) {
                $dynamicServiceItems[$titleKey] = "Service {$i} Title";
                $dynamicServiceItems[$descKey] = "Service {$i} Description";
                $i++;
            } else {
                break;
            }
        }

        $sections = [
            // Header Section
            'finance_page_title' => 'Page Title',
            'finance_page_subtitle' => 'Page Subtitle',

            // Service Image
            'finance_service_image' => 'Service Image',

            // Service Overview
            'finance_overview_title' => 'Overview Title',
            'finance_overview_paragraph1' => 'Overview Paragraph 1',
            'finance_overview_paragraph2' => 'Overview Paragraph 2',

            // Services Section Title
            'finance_services_title' => 'Services Section Title',
        ];

        // Add dynamic service items to sections
        $sections = array_merge($sections, $dynamicServiceItems);

        // Add remaining sections
        $sections = array_merge($sections, [
            // Advisory Approach
            'finance_approach_title' => 'Approach Title',
            'finance_approach_description' => 'Approach Description',

            // CTA
            'finance_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'finance_sidebar_cta_title' => 'Sidebar CTA Title',
            'finance_sidebar_cta_description' => 'Sidebar CTA Description',
            'finance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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
            'finance_overview_paragraph2' => Content::where('key', 'finance_overview_paragraph2')->value('value'),

            // Services Section
            'finance_services_title' => Content::where('key', 'finance_services_title')->value('value'),

            // Advisory Approach
            'finance_approach_title' => Content::where('key', 'finance_approach_title')->value('value'),
            'finance_approach_description' => Content::where('key', 'finance_approach_description')->value('value'),

            // CTA
            'finance_cta_text' => Content::where('key', 'finance_cta_text')->value('value'),

            // Sidebar Content
            'finance_sidebar_cta_title' => Content::where('key', 'finance_sidebar_cta_title')->value('value'),
            'finance_sidebar_cta_description' => Content::where('key', 'finance_sidebar_cta_description')->value('value'),
            'finance_sidebar_cta_button_text' => Content::where('key', 'finance_sidebar_cta_button_text')->value('value'),
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
            'finance_overview_paragraph2' => 'required|string',

            // Services Section
            'finance_services_title' => 'required|string|max:255',
            'service_items' => 'required|array|min:1',
            'service_items.*.title' => 'required|string|max:255',
            'service_items.*.description' => 'required|string',

            // Advisory Approach
            'finance_approach_title' => 'required|string|max:255',
            'finance_approach_description' => 'required|string',

            // CTA
            'finance_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'finance_sidebar_cta_title' => 'required|string|max:255',
            'finance_sidebar_cta_description' => 'required|string',
            'finance_sidebar_cta_button_text' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields (non-dynamic)
        $textFields = [
            'finance_page_title', 'finance_page_subtitle', 'finance_overview_title', 'finance_overview_paragraph1',
            'finance_overview_paragraph2', 'finance_services_title', 'finance_approach_title', 'finance_approach_description',
            'finance_cta_text', 'finance_sidebar_cta_title', 'finance_sidebar_cta_description', 'finance_sidebar_cta_button_text'
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
        Content::where('key', 'like', 'finance_service_item%_title')
               ->orWhere('key', 'like', 'finance_service_item%_description')
               ->delete();

        // Then create new service item content
        foreach ($serviceItems as $index => $serviceItem) {
            if (!empty($serviceItem['title']) && !empty($serviceItem['description'])) {
                Content::create([
                    'key' => "finance_service_item{$index}_title",
                    'value' => $serviceItem['title'],
                    'updated_by' => Auth::id(),
                ]);

                Content::create([
                    'key' => "finance_service_item{$index}_description",
                    'value' => $serviceItem['description'],
                    'updated_by' => Auth::id(),
                ]);

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
