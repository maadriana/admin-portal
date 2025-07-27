<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class GovernanceContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.governance.preview');
    }

    public function preview()
    {
        // Get dynamic approach items
        $dynamicApproachItems = [];
        $i = 1;
        while(true) {
            $titleKey = "governance_approach_item{$i}_title";
            $descKey = "governance_approach_item{$i}_description";
            $titleItem = Content::with('editor')->where('key', $titleKey)->first();
            $descItem = Content::with('editor')->where('key', $descKey)->first();

            if ($titleItem || $descItem) {
                $dynamicApproachItems[$titleKey] = "Approach {$i} Title";
                $dynamicApproachItems[$descKey] = "Approach {$i} Description";
                $i++;
            } else {
                break;
            }
        }

        $sections = [
            // Header Section
            'governance_page_title' => 'Page Title',
            'governance_page_subtitle' => 'Page Subtitle',

            // Service Image
            'governance_service_image' => 'Service Image',

            // Service Overview
            'governance_overview_title' => 'Overview Title',
            'governance_overview_paragraph1' => 'Overview Paragraph',

            // Approach Section Title
            'governance_approach_title' => 'Approach Section Title',
        ];

        // Add dynamic approach items to sections
        $sections = array_merge($sections, $dynamicApproachItems);

        // Add remaining sections
        $sections = array_merge($sections, [
            // Value Proposition
            'governance_value_title' => 'Value Proposition Title',
            'governance_value_description' => 'Value Proposition Description',

            // CTA
            'governance_cta_text' => 'CTA Button Text',

            // Sidebar Content
            'governance_sidebar_cta_title' => 'Sidebar CTA Title',
            'governance_sidebar_cta_description' => 'Sidebar CTA Description',
            'governance_sidebar_cta_button_text' => 'Sidebar CTA Button Text',
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

        return view('pages.governance', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'governance_page_title' => Content::where('key', 'governance_page_title')->value('value'),
            'governance_page_subtitle' => Content::where('key', 'governance_page_subtitle')->value('value'),

            // Service Image
            'governance_service_image' => Content::where('key', 'governance_service_image')->first(),

            // Service Overview
            'governance_overview_title' => Content::where('key', 'governance_overview_title')->value('value'),
            'governance_overview_paragraph1' => Content::where('key', 'governance_overview_paragraph1')->value('value'),

            // Approach Section
            'governance_approach_title' => Content::where('key', 'governance_approach_title')->value('value'),

            // Value Proposition
            'governance_value_title' => Content::where('key', 'governance_value_title')->value('value'),
            'governance_value_description' => Content::where('key', 'governance_value_description')->value('value'),

            // CTA
            'governance_cta_text' => Content::where('key', 'governance_cta_text')->value('value'),

            // Sidebar Content
            'governance_sidebar_cta_title' => Content::where('key', 'governance_sidebar_cta_title')->value('value'),
            'governance_sidebar_cta_description' => Content::where('key', 'governance_sidebar_cta_description')->value('value'),
            'governance_sidebar_cta_button_text' => Content::where('key', 'governance_sidebar_cta_button_text')->value('value'),
        ];

        return view('pages.governance.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'governance_page_title' => 'required|string|max:255',
            'governance_page_subtitle' => 'required|string|max:500',

            // Service Image
            'governance_service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_governance_service_image' => 'nullable|boolean',

            // Service Overview
            'governance_overview_title' => 'required|string|max:255',
            'governance_overview_paragraph1' => 'required|string',

            // Approach Section
            'governance_approach_title' => 'required|string|max:255',
            'approach_items' => 'required|array|min:1',
            'approach_items.*.title' => 'required|string|max:255',
            'approach_items.*.description' => 'required|string',

            // Value Proposition
            'governance_value_title' => 'required|string|max:255',
            'governance_value_description' => 'required|string',

            // CTA
            'governance_cta_text' => 'required|string|max:100',

            // Sidebar Content
            'governance_sidebar_cta_title' => 'required|string|max:255',
            'governance_sidebar_cta_description' => 'required|string',
            'governance_sidebar_cta_button_text' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields (non-dynamic)
        $textFields = [
            'governance_page_title', 'governance_page_subtitle', 'governance_overview_title',
            'governance_overview_paragraph1', 'governance_approach_title', 'governance_value_title',
            'governance_value_description', 'governance_cta_text', 'governance_sidebar_cta_title',
            'governance_sidebar_cta_description', 'governance_sidebar_cta_button_text'
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

        // Handle dynamic approach items
        $approachItems = $request->input('approach_items', []);

        // First, delete all existing approach item content
        Content::where('key', 'like', 'governance_approach_item%_title')
               ->orWhere('key', 'like', 'governance_approach_item%_description')
               ->delete();

        // Then create new approach item content
        foreach ($approachItems as $index => $approachItem) {
            if (!empty($approachItem['title']) && !empty($approachItem['description'])) {
                Content::create([
                    'key' => "governance_approach_item{$index}_title",
                    'value' => $approachItem['title'],
                    'updated_by' => Auth::id(),
                ]);

                Content::create([
                    'key' => "governance_approach_item{$index}_description",
                    'value' => $approachItem['description'],
                    'updated_by' => Auth::id(),
                ]);

                $hasChanged = true;
            }
        }

        // Handle image removal
        if ($request->has('remove_governance_service_image') && $request->remove_governance_service_image) {
            $existing = Content::where('key', 'governance_service_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('governance_service_image')) {
            $file = $request->file('governance_service_image');
            $binaryData = file_get_contents($file);
            $filename = 'governance_service_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'governance_service_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'governance_service_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.governance.preview')->with('success', 'Governance page updated successfully!')
            : redirect()->route('admin.governance.preview');
    }
}
