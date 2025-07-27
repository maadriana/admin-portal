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
            'history_hero_title' => 'Hero Title',
            'history_hero_subtitle' => 'Hero Subtitle',
            'history_established_year' => 'Established Year',
            'history_mtc_year' => 'MTC Year',
            'history_agn_year' => 'AGN Year',
            'history_circular_quote' => 'Circular Quote',

            // Timeline Section
            'history_timeline_badge' => 'Timeline Badge',
            'history_timeline_title' => 'Timeline Title',

            // Timeline Events
            'history_year_2002' => '2002 Year Label',
            'history_2002_title' => '2002 Event Title',
            'history_2002_description' => '2002 Event Description',
            'history_year_2023' => '2023 Year Label',
            'history_2023_title' => '2023 Event Title',
            'history_2023_description' => '2023 Event Description',
            'history_year_2024' => '2024 Year Label',
            'history_2024_title' => '2024 Event Title',
            'history_2024_description' => '2024 Event Description',
            'history_year_present' => 'Present Year Label',
            'history_present_title' => 'Present Event Title',
            'history_present_description' => 'Present Event Description',

            // Legacy Section
            'history_legacy_badge' => 'Legacy Badge',
            'history_legacy_title' => 'Legacy Title',
            'history_legacy_paragraph1' => 'Legacy Paragraph 1',
            'history_legacy_paragraph2' => 'Legacy Paragraph 2',
            'history_legacy_paragraph3' => 'Legacy Paragraph 3',

            // Legacy Cards
            'history_agn_card_title' => 'AGN Card Title',
            'history_agn_card_description' => 'AGN Card Description',
            'history_memberships_card_title' => 'Memberships Card Title',
            'history_memberships_card_description' => 'Memberships Card Description',
            'history_passion_card_title' => 'Passion Card Title',
            'history_passion_card_description' => 'Passion Card Description',

            // Future Vision Section
            'history_future_badge' => 'Future Badge',
            'history_future_title' => 'Future Title',
            'history_future_section_title' => 'Future Section Title',
            'history_future_paragraph1' => 'Future Paragraph 1',
            'history_future_paragraph2' => 'Future Paragraph 2',
            'history_cta_text' => 'CTA Text',

            // About Legacy Section
            'history_about_badge' => 'About Badge',
            'history_about_title' => 'About Title',
            'history_about_paragraph1' => 'About Paragraph 1',
            'history_about_paragraph2' => 'About Paragraph 2',
            'history_about_paragraph3' => 'About Paragraph 3',

            // Vision & Mission
            'history_vision_mission_badge' => 'Vision Mission Badge',
            'history_vision_mission_title' => 'Vision Mission Title',
            'history_vision_badge' => 'Vision Badge',
            'history_vision_text' => 'Vision Text',
            'history_mission_badge' => 'Mission Badge',
            'history_mission_text' => 'Mission Text',

            // Values Section
            'history_values_badge' => 'Values Badge',
            'history_values_title' => 'Values Title',

            // Core Values
            'history_value_excellence_title' => 'Excellence Value Title',
            'history_value_excellence_desc' => 'Excellence Value Description',
            'history_value_integrity_title' => 'Integrity Value Title',
            'history_value_integrity_desc' => 'Integrity Value Description',
            'history_value_innovation_title' => 'Innovation Value Title',
            'history_value_innovation_desc' => 'Innovation Value Description',
            'history_value_development_title' => 'Development Value Title',
            'history_value_development_desc' => 'Development Value Description',
            'history_value_teamwork_title' => 'Teamwork Value Title',
            'history_value_teamwork_desc' => 'Teamwork Value Description',
            'history_value_care_title' => 'Care Value Title',
            'history_value_care_desc' => 'Care Value Description',
            'history_value_community_title' => 'Community Value Title',
            'history_value_community_desc' => 'Community Value Description',
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
            'history_hero_title' => Content::where('key', 'history_hero_title')->value('value'),
            'history_hero_subtitle' => Content::where('key', 'history_hero_subtitle')->value('value'),
            'history_established_year' => Content::where('key', 'history_established_year')->value('value'),
            'history_mtc_year' => Content::where('key', 'history_mtc_year')->value('value'),
            'history_agn_year' => Content::where('key', 'history_agn_year')->value('value'),
            'history_circular_quote' => Content::where('key', 'history_circular_quote')->value('value'),

            // Timeline Section
            'history_timeline_badge' => Content::where('key', 'history_timeline_badge')->value('value'),
            'history_timeline_title' => Content::where('key', 'history_timeline_title')->value('value'),

            // Timeline Events
            'history_year_2002' => Content::where('key', 'history_year_2002')->value('value'),
            'history_2002_title' => Content::where('key', 'history_2002_title')->value('value'),
            'history_2002_description' => Content::where('key', 'history_2002_description')->value('value'),
            'history_year_2023' => Content::where('key', 'history_year_2023')->value('value'),
            'history_2023_title' => Content::where('key', 'history_2023_title')->value('value'),
            'history_2023_description' => Content::where('key', 'history_2023_description')->value('value'),
            'history_year_2024' => Content::where('key', 'history_year_2024')->value('value'),
            'history_2024_title' => Content::where('key', 'history_2024_title')->value('value'),
            'history_2024_description' => Content::where('key', 'history_2024_description')->value('value'),
            'history_year_present' => Content::where('key', 'history_year_present')->value('value'),
            'history_present_title' => Content::where('key', 'history_present_title')->value('value'),
            'history_present_description' => Content::where('key', 'history_present_description')->value('value'),

            // Legacy Section
            'history_legacy_badge' => Content::where('key', 'history_legacy_badge')->value('value'),
            'history_legacy_title' => Content::where('key', 'history_legacy_title')->value('value'),
            'history_legacy_paragraph1' => Content::where('key', 'history_legacy_paragraph1')->value('value'),
            'history_legacy_paragraph2' => Content::where('key', 'history_legacy_paragraph2')->value('value'),
            'history_legacy_paragraph3' => Content::where('key', 'history_legacy_paragraph3')->value('value'),

            // Legacy Cards
            'history_agn_card_title' => Content::where('key', 'history_agn_card_title')->value('value'),
            'history_agn_card_description' => Content::where('key', 'history_agn_card_description')->value('value'),
            'history_memberships_card_title' => Content::where('key', 'history_memberships_card_title')->value('value'),
            'history_memberships_card_description' => Content::where('key', 'history_memberships_card_description')->value('value'),
            'history_passion_card_title' => Content::where('key', 'history_passion_card_title')->value('value'),
            'history_passion_card_description' => Content::where('key', 'history_passion_card_description')->value('value'),

            // Future Vision Section
            'history_future_badge' => Content::where('key', 'history_future_badge')->value('value'),
            'history_future_title' => Content::where('key', 'history_future_title')->value('value'),
            'history_future_section_title' => Content::where('key', 'history_future_section_title')->value('value'),
            'history_future_paragraph1' => Content::where('key', 'history_future_paragraph1')->value('value'),
            'history_future_paragraph2' => Content::where('key', 'history_future_paragraph2')->value('value'),
            'history_cta_text' => Content::where('key', 'history_cta_text')->value('value'),

            // About Legacy Section
            'history_about_badge' => Content::where('key', 'history_about_badge')->value('value'),
            'history_about_title' => Content::where('key', 'history_about_title')->value('value'),
            'history_about_paragraph1' => Content::where('key', 'history_about_paragraph1')->value('value'),
            'history_about_paragraph2' => Content::where('key', 'history_about_paragraph2')->value('value'),
            'history_about_paragraph3' => Content::where('key', 'history_about_paragraph3')->value('value'),

            // Vision & Mission
            'history_vision_mission_badge' => Content::where('key', 'history_vision_mission_badge')->value('value'),
            'history_vision_mission_title' => Content::where('key', 'history_vision_mission_title')->value('value'),
            'history_vision_badge' => Content::where('key', 'history_vision_badge')->value('value'),
            'history_vision_text' => Content::where('key', 'history_vision_text')->value('value'),
            'history_mission_badge' => Content::where('key', 'history_mission_badge')->value('value'),
            'history_mission_text' => Content::where('key', 'history_mission_text')->value('value'),

            // Values Section
            'history_values_badge' => Content::where('key', 'history_values_badge')->value('value'),
            'history_values_title' => Content::where('key', 'history_values_title')->value('value'),

            // Core Values
            'history_value_excellence_title' => Content::where('key', 'history_value_excellence_title')->value('value'),
            'history_value_excellence_desc' => Content::where('key', 'history_value_excellence_desc')->value('value'),
            'history_value_integrity_title' => Content::where('key', 'history_value_integrity_title')->value('value'),
            'history_value_integrity_desc' => Content::where('key', 'history_value_integrity_desc')->value('value'),
            'history_value_innovation_title' => Content::where('key', 'history_value_innovation_title')->value('value'),
            'history_value_innovation_desc' => Content::where('key', 'history_value_innovation_desc')->value('value'),
            'history_value_development_title' => Content::where('key', 'history_value_development_title')->value('value'),
            'history_value_development_desc' => Content::where('key', 'history_value_development_desc')->value('value'),
            'history_value_teamwork_title' => Content::where('key', 'history_value_teamwork_title')->value('value'),
            'history_value_teamwork_desc' => Content::where('key', 'history_value_teamwork_desc')->value('value'),
            'history_value_care_title' => Content::where('key', 'history_value_care_title')->value('value'),
            'history_value_care_desc' => Content::where('key', 'history_value_care_desc')->value('value'),
            'history_value_community_title' => Content::where('key', 'history_value_community_title')->value('value'),
            'history_value_community_desc' => Content::where('key', 'history_value_community_desc')->value('value'),
        ];

        return view('pages.about.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero Section
            'history_hero_title' => 'required|string',
            'history_hero_subtitle' => 'required|string',
            'history_established_year' => 'required|string|max:10',
            'history_mtc_year' => 'required|string|max:10',
            'history_agn_year' => 'required|string|max:10',
            'history_circular_quote' => 'required|string|max:100',

            // Timeline Section
            'history_timeline_badge' => 'required|string|max:50',
            'history_timeline_title' => 'required|string',

            // Timeline Events
            'history_year_2002' => 'required|string|max:20',
            'history_2002_title' => 'required|string|max:100',
            'history_2002_description' => 'required|string',
            'history_year_2023' => 'required|string|max:20',
            'history_2023_title' => 'required|string|max:100',
            'history_2023_description' => 'required|string',
            'history_year_2024' => 'required|string|max:20',
            'history_2024_title' => 'required|string|max:100',
            'history_2024_description' => 'required|string',
            'history_year_present' => 'required|string|max:20',
            'history_present_title' => 'required|string|max:100',
            'history_present_description' => 'required|string',

            // Legacy Section
            'history_legacy_badge' => 'required|string|max:50',
            'history_legacy_title' => 'required|string',
            'history_legacy_paragraph1' => 'required|string',
            'history_legacy_paragraph2' => 'required|string',
            'history_legacy_paragraph3' => 'required|string',

            // Legacy Cards
            'history_agn_card_title' => 'required|string|max:100',
            'history_agn_card_description' => 'required|string',
            'history_memberships_card_title' => 'required|string|max:100',
            'history_memberships_card_description' => 'required|string',
            'history_passion_card_title' => 'required|string|max:100',
            'history_passion_card_description' => 'required|string',

            // Future Vision Section
            'history_future_badge' => 'required|string|max:50',
            'history_future_title' => 'required|string',
            'history_future_section_title' => 'required|string|max:100',
            'history_future_paragraph1' => 'required|string',
            'history_future_paragraph2' => 'required|string',
            'history_cta_text' => 'required|string|max:50',

            // About Legacy Section
            'history_about_badge' => 'required|string|max:50',
            'history_about_title' => 'required|string',
            'history_about_paragraph1' => 'required|string',
            'history_about_paragraph2' => 'required|string',
            'history_about_paragraph3' => 'required|string',

            // Vision & Mission
            'history_vision_mission_badge' => 'required|string|max:50',
            'history_vision_mission_title' => 'required|string',
            'history_vision_badge' => 'required|string|max:50',
            'history_vision_text' => 'required|string',
            'history_mission_badge' => 'required|string|max:50',
            'history_mission_text' => 'required|string',

            // Values Section
            'history_values_badge' => 'required|string|max:50',
            'history_values_title' => 'required|string',

            // Core Values
            'history_value_excellence_title' => 'required|string|max:100',
            'history_value_excellence_desc' => 'required|string',
            'history_value_integrity_title' => 'required|string|max:100',
            'history_value_integrity_desc' => 'required|string',
            'history_value_innovation_title' => 'required|string|max:100',
            'history_value_innovation_desc' => 'required|string',
            'history_value_development_title' => 'required|string|max:100',
            'history_value_development_desc' => 'required|string',
            'history_value_teamwork_title' => 'required|string|max:100',
            'history_value_teamwork_desc' => 'required|string',
            'history_value_care_title' => 'required|string|max:100',
            'history_value_care_desc' => 'required|string',
            'history_value_community_title' => 'required|string|max:100',
            'history_value_community_desc' => 'required|string',
        ]);

        $hasChanged = false;

        // Get all field keys
        $fields = [
            // Hero Section
            'history_hero_title', 'history_hero_subtitle', 'history_established_year', 'history_mtc_year',
            'history_agn_year', 'history_circular_quote',

            // Timeline Section
            'history_timeline_badge', 'history_timeline_title',

            // Timeline Events
            'history_year_2002', 'history_2002_title', 'history_2002_description',
            'history_year_2023', 'history_2023_title', 'history_2023_description',
            'history_year_2024', 'history_2024_title', 'history_2024_description',
            'history_year_present', 'history_present_title', 'history_present_description',

            // Legacy Section
            'history_legacy_badge', 'history_legacy_title', 'history_legacy_paragraph1',
            'history_legacy_paragraph2', 'history_legacy_paragraph3',

            // Legacy Cards
            'history_agn_card_title', 'history_agn_card_description', 'history_memberships_card_title',
            'history_memberships_card_description', 'history_passion_card_title', 'history_passion_card_description',

            // Future Vision Section
            'history_future_badge', 'history_future_title', 'history_future_section_title',
            'history_future_paragraph1', 'history_future_paragraph2', 'history_cta_text',

            // About Legacy Section
            'history_about_badge', 'history_about_title', 'history_about_paragraph1',
            'history_about_paragraph2', 'history_about_paragraph3',

            // Vision & Mission
            'history_vision_mission_badge', 'history_vision_mission_title', 'history_vision_badge',
            'history_vision_text', 'history_mission_badge', 'history_mission_text',

            // Values Section
            'history_values_badge', 'history_values_title',

            // Core Values
            'history_value_excellence_title', 'history_value_excellence_desc', 'history_value_integrity_title',
            'history_value_integrity_desc', 'history_value_innovation_title', 'history_value_innovation_desc',
            'history_value_development_title', 'history_value_development_desc', 'history_value_teamwork_title',
            'history_value_teamwork_desc', 'history_value_care_title', 'history_value_care_desc',
            'history_value_community_title', 'history_value_community_desc'
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
            ? redirect()->route('admin.about.preview')->with('success', 'History page updated successfully!')
            : redirect()->route('admin.about.preview');
    }
}
