<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InternationalContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.international.preview');
    }

    public function preview()
    {
        $sections = [
            // Hero Section
            'international_hero_subtitle' => 'International Hero Subtitle',
            'international_trust_indicator1' => 'Trust Indicator 1',
            'international_trust_indicator2' => 'Trust Indicator 2',
            'international_hub_title' => 'Hub Title',
            'international_hub_subtitle' => 'Hub Subtitle',

            // Expertise Section
            'expertise_title' => 'Expertise Title',
            'expertise_description' => 'Expertise Description',
            'expertise_card1_title' => 'Expertise Card 1 Title',
            'expertise_card1_description' => 'Expertise Card 1 Description',
            'expertise_card2_title' => 'Expertise Card 2 Title',
            'expertise_card2_description' => 'Expertise Card 2 Description',
            'expertise_card3_title' => 'Expertise Card 3 Title',
            'expertise_card3_description' => 'Expertise Card 3 Description',
            'expertise_card4_title' => 'Expertise Card 4 Title',
            'expertise_card4_description' => 'Expertise Card 4 Description',

            // Services Section
            'services_title' => 'Services Title',
            'services_description' => 'Services Description',
            'timeline_service1_title' => 'Timeline Service 1 Title',
            'timeline_service1_description' => 'Timeline Service 1 Description',
            'timeline_service2_title' => 'Timeline Service 2 Title',
            'timeline_service2_description' => 'Timeline Service 2 Description',
            'timeline_service3_title' => 'Timeline Service 3 Title',
            'timeline_service3_description' => 'Timeline Service 3 Description',
            'timeline_service4_title' => 'Timeline Service 4 Title',
            'timeline_service4_description' => 'Timeline Service 4 Description',

            // Global Network Section
            'network_title' => 'Network Title',
            'network_description' => 'Network Description',
            'benefit1_title' => 'Benefit 1 Title',
            'benefit1_description' => 'Benefit 1 Description',
            'benefit2_title' => 'Benefit 2 Title',
            'benefit2_description' => 'Benefit 2 Description',
            'benefit3_title' => 'Benefit 3 Title',
            'benefit3_description' => 'Benefit 3 Description',
            'network_cta' => 'Network CTA',
            'map_title' => 'Map Title',
            'map_subtitle' => 'Map Subtitle',
            'region1_name' => 'Region 1 Name',
            'region2_name' => 'Region 2 Name',
            'region3_name' => 'Region 3 Name',
            'region4_name' => 'Region 4 Name',

            // Call to Action Section
            'cta_title' => 'CTA Title',
            'cta_description' => 'CTA Description',
            'action1_title' => 'Action 1 Title',
            'action1_subtitle' => 'Action 1 Subtitle',
            'action2_title' => 'Action 2 Title',
            'action2_subtitle' => 'Action 2 Subtitle',
            'cta_primary_button' => 'CTA Primary Button',
            'cta_phone_button' => 'CTA Phone Button',
            'contact_card_title' => 'Contact Card Title',
            'contact_card_description' => 'Contact Card Description',
            'contact_email' => 'Contact Email',
            'contact_hours' => 'Contact Hours',
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

        return view('pages.international', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Hero Section
            'international_hero_subtitle' => Content::where('key', 'international_hero_subtitle')->value('value'),
            'international_trust_indicator1' => Content::where('key', 'international_trust_indicator1')->value('value'),
            'international_trust_indicator2' => Content::where('key', 'international_trust_indicator2')->value('value'),
            'international_hub_title' => Content::where('key', 'international_hub_title')->value('value'),
            'international_hub_subtitle' => Content::where('key', 'international_hub_subtitle')->value('value'),

            // Expertise Section
            'expertise_title' => Content::where('key', 'expertise_title')->value('value'),
            'expertise_description' => Content::where('key', 'expertise_description')->value('value'),
            'expertise_card1_title' => Content::where('key', 'expertise_card1_title')->value('value'),
            'expertise_card1_description' => Content::where('key', 'expertise_card1_description')->value('value'),
            'expertise_card2_title' => Content::where('key', 'expertise_card2_title')->value('value'),
            'expertise_card2_description' => Content::where('key', 'expertise_card2_description')->value('value'),
            'expertise_card3_title' => Content::where('key', 'expertise_card3_title')->value('value'),
            'expertise_card3_description' => Content::where('key', 'expertise_card3_description')->value('value'),
            'expertise_card4_title' => Content::where('key', 'expertise_card4_title')->value('value'),
            'expertise_card4_description' => Content::where('key', 'expertise_card4_description')->value('value'),

            // Services Section
            'services_title' => Content::where('key', 'services_title')->value('value'),
            'services_description' => Content::where('key', 'services_description')->value('value'),
            'timeline_service1_title' => Content::where('key', 'timeline_service1_title')->value('value'),
            'timeline_service1_description' => Content::where('key', 'timeline_service1_description')->value('value'),
            'timeline_service2_title' => Content::where('key', 'timeline_service2_title')->value('value'),
            'timeline_service2_description' => Content::where('key', 'timeline_service2_description')->value('value'),
            'timeline_service3_title' => Content::where('key', 'timeline_service3_title')->value('value'),
            'timeline_service3_description' => Content::where('key', 'timeline_service3_description')->value('value'),
            'timeline_service4_title' => Content::where('key', 'timeline_service4_title')->value('value'),
            'timeline_service4_description' => Content::where('key', 'timeline_service4_description')->value('value'),

            // Global Network Section
            'network_title' => Content::where('key', 'network_title')->value('value'),
            'network_description' => Content::where('key', 'network_description')->value('value'),
            'benefit1_title' => Content::where('key', 'benefit1_title')->value('value'),
            'benefit1_description' => Content::where('key', 'benefit1_description')->value('value'),
            'benefit2_title' => Content::where('key', 'benefit2_title')->value('value'),
            'benefit2_description' => Content::where('key', 'benefit2_description')->value('value'),
            'benefit3_title' => Content::where('key', 'benefit3_title')->value('value'),
            'benefit3_description' => Content::where('key', 'benefit3_description')->value('value'),
            'network_cta' => Content::where('key', 'network_cta')->value('value'),
            'map_title' => Content::where('key', 'map_title')->value('value'),
            'map_subtitle' => Content::where('key', 'map_subtitle')->value('value'),
            'region1_name' => Content::where('key', 'region1_name')->value('value'),
            'region2_name' => Content::where('key', 'region2_name')->value('value'),
            'region3_name' => Content::where('key', 'region3_name')->value('value'),
            'region4_name' => Content::where('key', 'region4_name')->value('value'),

            // Call to Action Section
            'cta_title' => Content::where('key', 'cta_title')->value('value'),
            'cta_description' => Content::where('key', 'cta_description')->value('value'),
            'action1_title' => Content::where('key', 'action1_title')->value('value'),
            'action1_subtitle' => Content::where('key', 'action1_subtitle')->value('value'),
            'action2_title' => Content::where('key', 'action2_title')->value('value'),
            'action2_subtitle' => Content::where('key', 'action2_subtitle')->value('value'),
            'cta_primary_button' => Content::where('key', 'cta_primary_button')->value('value'),
            'cta_phone_button' => Content::where('key', 'cta_phone_button')->value('value'),
            'contact_card_title' => Content::where('key', 'contact_card_title')->value('value'),
            'contact_card_description' => Content::where('key', 'contact_card_description')->value('value'),
            'contact_email' => Content::where('key', 'contact_email')->value('value'),
            'contact_hours' => Content::where('key', 'contact_hours')->value('value'),
        ];

        return view('pages.international.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero Section
            'international_hero_subtitle' => 'required|string|max:500',
            'international_trust_indicator1' => 'required|string|max:100',
            'international_trust_indicator2' => 'required|string|max:100',
            'international_hub_title' => 'required|string|max:100',
            'international_hub_subtitle' => 'required|string|max:200',

            // Expertise Section
            'expertise_title' => 'required|string|max:255',
            'expertise_description' => 'required|string|max:1000',
            'expertise_card1_title' => 'required|string|max:100',
            'expertise_card1_description' => 'required|string|max:500',
            'expertise_card2_title' => 'required|string|max:100',
            'expertise_card2_description' => 'required|string|max:500',
            'expertise_card3_title' => 'required|string|max:100',
            'expertise_card3_description' => 'required|string|max:500',
            'expertise_card4_title' => 'required|string|max:100',
            'expertise_card4_description' => 'required|string|max:500',

            // Services Section
            'services_title' => 'required|string|max:255',
            'services_description' => 'required|string|max:1000',
            'timeline_service1_title' => 'required|string|max:100',
            'timeline_service1_description' => 'required|string|max:500',
            'timeline_service2_title' => 'required|string|max:100',
            'timeline_service2_description' => 'required|string|max:500',
            'timeline_service3_title' => 'required|string|max:100',
            'timeline_service3_description' => 'required|string|max:500',
            'timeline_service4_title' => 'required|string|max:100',
            'timeline_service4_description' => 'required|string|max:500',

            // Global Network Section
            'network_title' => 'required|string|max:255',
            'network_description' => 'required|string|max:1000',
            'benefit1_title' => 'required|string|max:100',
            'benefit1_description' => 'required|string|max:300',
            'benefit2_title' => 'required|string|max:100',
            'benefit2_description' => 'required|string|max:300',
            'benefit3_title' => 'required|string|max:100',
            'benefit3_description' => 'required|string|max:300',
            'network_cta' => 'required|string|max:100',
            'map_title' => 'required|string|max:100',
            'map_subtitle' => 'required|string|max:200',
            'region1_name' => 'required|string|max:50',
            'region2_name' => 'required|string|max:50',
            'region3_name' => 'required|string|max:50',
            'region4_name' => 'required|string|max:50',

            // Call to Action Section
            'cta_title' => 'required|string|max:255',
            'cta_description' => 'required|string|max:1000',
            'action1_title' => 'required|string|max:100',
            'action1_subtitle' => 'required|string|max:200',
            'action2_title' => 'required|string|max:100',
            'action2_subtitle' => 'required|string|max:200',
            'cta_primary_button' => 'required|string|max:50',
            'cta_phone_button' => 'required|string|max:50',
            'contact_card_title' => 'required|string|max:100',
            'contact_card_description' => 'required|string|max:300',
            'contact_email' => 'required|string|max:100',
            'contact_hours' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle all text fields
        $textFields = [
            'international_hero_subtitle', 'international_trust_indicator1', 'international_trust_indicator2',
            'international_hub_title', 'international_hub_subtitle', 'expertise_title', 'expertise_description',
            'expertise_card1_title', 'expertise_card1_description', 'expertise_card2_title', 'expertise_card2_description',
            'expertise_card3_title', 'expertise_card3_description', 'expertise_card4_title', 'expertise_card4_description',
            'services_title', 'services_description', 'timeline_service1_title', 'timeline_service1_description',
            'timeline_service2_title', 'timeline_service2_description', 'timeline_service3_title', 'timeline_service3_description',
            'timeline_service4_title', 'timeline_service4_description', 'network_title', 'network_description',
            'benefit1_title', 'benefit1_description', 'benefit2_title', 'benefit2_description',
            'benefit3_title', 'benefit3_description', 'network_cta', 'map_title', 'map_subtitle',
            'region1_name', 'region2_name', 'region3_name', 'region4_name', 'cta_title', 'cta_description',
            'action1_title', 'action1_subtitle', 'action2_title', 'action2_subtitle', 'cta_primary_button',
            'cta_phone_button', 'contact_card_title', 'contact_card_description', 'contact_email', 'contact_hours'
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

        return $hasChanged
            ? redirect()->route('admin.international.preview')->with('success', 'International page updated successfully!')
            : redirect()->route('admin.international.preview');
    }
}
