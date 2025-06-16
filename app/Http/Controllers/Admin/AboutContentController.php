<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class AboutContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.about.preview');
    }

    public function preview()
    {
        $sections = [
            // Hero Section
            'about_hero_title' => 'Hero Title',
            'about_hero_subtitle' => 'Hero Subtitle',
            'about_years_legacy' => 'Years Legacy Number',
            'about_clients_served' => 'Clients Served Number',
            'about_circular_quote' => 'Circular Quote Text',

            // Story Section
            'about_story_badge' => 'Story Section Badge',
            'about_story_title' => 'Story Section Title',
            'about_story_paragraph1' => 'Story Paragraph 1',
            'about_story_paragraph2' => 'Story Paragraph 2',

            // Cards Section
            'about_card1_title' => 'Excellence Card Title',
            'about_card1_description' => 'Excellence Card Description',
            'about_card2_title' => 'Innovation Card Title',
            'about_card2_description' => 'Innovation Card Description',
            'about_card3_title' => 'Promise Card Title',
            'about_card3_description' => 'Promise Card Description',

            // Vision & Mission
            'about_vision_text' => 'Vision Text',
            'about_mission_text' => 'Mission Text',

            // Core Values
            'about_value1_title' => 'Excellence Value Title',
            'about_value1_description' => 'Excellence Value Description',
            'about_value2_title' => 'Integrity Value Title',
            'about_value2_description' => 'Integrity Value Description',
            'about_value3_title' => 'Innovation Value Title',
            'about_value3_description' => 'Innovation Value Description',
            'about_value4_title' => 'Professional Growth Value Title',
            'about_value4_description' => 'Professional Growth Value Description',
            'about_value5_title' => 'Teamwork Value Title',
            'about_value5_description' => 'Teamwork Value Description',
            'about_value6_title' => 'Employee Care Value Title',
            'about_value6_description' => 'Employee Care Value Description',
            'about_value7_title' => 'Community Engagement Value Title',
            'about_value7_description' => 'Community Engagement Value Description',
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

        return view('pages.about', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Hero Section
            'about_hero_title' => Content::where('key', 'about_hero_title')->value('value'),
            'about_hero_subtitle' => Content::where('key', 'about_hero_subtitle')->value('value'),
            'about_years_legacy' => Content::where('key', 'about_years_legacy')->value('value'),
            'about_clients_served' => Content::where('key', 'about_clients_served')->value('value'),
            'about_circular_quote' => Content::where('key', 'about_circular_quote')->value('value'),

            // Story Section
            'about_story_badge' => Content::where('key', 'about_story_badge')->value('value'),
            'about_story_title' => Content::where('key', 'about_story_title')->value('value'),
            'about_story_paragraph1' => Content::where('key', 'about_story_paragraph1')->value('value'),
            'about_story_paragraph2' => Content::where('key', 'about_story_paragraph2')->value('value'),

            // Cards Section
            'about_card1_title' => Content::where('key', 'about_card1_title')->value('value'),
            'about_card1_description' => Content::where('key', 'about_card1_description')->value('value'),
            'about_card2_title' => Content::where('key', 'about_card2_title')->value('value'),
            'about_card2_description' => Content::where('key', 'about_card2_description')->value('value'),
            'about_card3_title' => Content::where('key', 'about_card3_title')->value('value'),
            'about_card3_description' => Content::where('key', 'about_card3_description')->value('value'),

            // Vision & Mission
            'about_vision_text' => Content::where('key', 'about_vision_text')->value('value'),
            'about_mission_text' => Content::where('key', 'about_mission_text')->value('value'),

            // Core Values
            'about_value1_title' => Content::where('key', 'about_value1_title')->value('value'),
            'about_value1_description' => Content::where('key', 'about_value1_description')->value('value'),
            'about_value2_title' => Content::where('key', 'about_value2_title')->value('value'),
            'about_value2_description' => Content::where('key', 'about_value2_description')->value('value'),
            'about_value3_title' => Content::where('key', 'about_value3_title')->value('value'),
            'about_value3_description' => Content::where('key', 'about_value3_description')->value('value'),
            'about_value4_title' => Content::where('key', 'about_value4_title')->value('value'),
            'about_value4_description' => Content::where('key', 'about_value4_description')->value('value'),
            'about_value5_title' => Content::where('key', 'about_value5_title')->value('value'),
            'about_value5_description' => Content::where('key', 'about_value5_description')->value('value'),
            'about_value6_title' => Content::where('key', 'about_value6_title')->value('value'),
            'about_value6_description' => Content::where('key', 'about_value6_description')->value('value'),
            'about_value7_title' => Content::where('key', 'about_value7_title')->value('value'),
            'about_value7_description' => Content::where('key', 'about_value7_description')->value('value'),
        ];

        return view('pages.about.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero Section
            'about_hero_title' => 'required|string|max:255',
            'about_hero_subtitle' => 'required|string|max:500',
            'about_years_legacy' => 'required|string|max:10',
            'about_clients_served' => 'required|string|max:10',
            'about_circular_quote' => 'required|string|max:100',

            // Story Section
            'about_story_badge' => 'required|string|max:50',
            'about_story_title' => 'required|string|max:100',
            'about_story_paragraph1' => 'required|string',
            'about_story_paragraph2' => 'required|string',

            // Cards Section
            'about_card1_title' => 'required|string|max:100',
            'about_card1_description' => 'required|string',
            'about_card2_title' => 'required|string|max:100',
            'about_card2_description' => 'required|string',
            'about_card3_title' => 'required|string|max:100',
            'about_card3_description' => 'required|string',

            // Vision & Mission
            'about_vision_text' => 'required|string',
            'about_mission_text' => 'required|string',

            // Core Values
            'about_value1_title' => 'required|string|max:100',
            'about_value1_description' => 'required|string|max:500',
            'about_value2_title' => 'required|string|max:100',
            'about_value2_description' => 'required|string|max:500',
            'about_value3_title' => 'required|string|max:100',
            'about_value3_description' => 'required|string|max:500',
            'about_value4_title' => 'required|string|max:100',
            'about_value4_description' => 'required|string|max:500',
            'about_value5_title' => 'required|string|max:100',
            'about_value5_description' => 'required|string|max:500',
            'about_value6_title' => 'required|string|max:100',
            'about_value6_description' => 'required|string|max:500',
            'about_value7_title' => 'required|string|max:100',
            'about_value7_description' => 'required|string|max:500',
        ]);

        $hasChanged = false;

        // Get all field keys
        $fields = [
            'about_hero_title', 'about_hero_subtitle', 'about_years_legacy', 'about_clients_served', 'about_circular_quote',
            'about_story_badge', 'about_story_title', 'about_story_paragraph1', 'about_story_paragraph2',
            'about_card1_title', 'about_card1_description', 'about_card2_title', 'about_card2_description',
            'about_card3_title', 'about_card3_description', 'about_vision_text', 'about_mission_text',
            'about_value1_title', 'about_value1_description', 'about_value2_title', 'about_value2_description',
            'about_value3_title', 'about_value3_description', 'about_value4_title', 'about_value4_description',
            'about_value5_title', 'about_value5_description', 'about_value6_title', 'about_value6_description',
            'about_value7_title', 'about_value7_description'
        ];

        // Update each field
        foreach ($fields as $key) {
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

        return $hasChanged
            ? redirect()->route('admin.about.preview')->with('success', 'About page updated successfully!')
            : redirect()->route('admin.about.preview');
    }
}
