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
            // Hero Section - AGN International
            'agn_hero_title' => 'AGN Hero Title',
            'agn_hero_subtitle' => 'AGN Hero Subtitle',
            'agn_member_firms_count' => 'Member Firms Count',
            'agn_member_firms_label' => 'Member Firms Label',
            'agn_countries_count' => 'Countries Count',
            'agn_countries_label' => 'Countries Label',
            'agn_reach_count' => 'Reach Count',
            'agn_reach_label' => 'Reach Label',

            // MTC and AGN International Section
            'mtc_agn_title' => 'MTC and AGN Title',
            'mtc_agn_description' => 'MTC and AGN Description',

            // Network Information (Stats)
            'network_stats_firms_count' => 'Network Stats - Firms Count',
            'network_stats_firms_label' => 'Network Stats - Firms Label',
            'network_stats_countries_count' => 'Network Stats - Countries Count',
            'network_stats_countries_label' => 'Network Stats - Countries Label',
            'network_stats_global_count' => 'Network Stats - Global Count',
            'network_stats_global_label' => 'Network Stats - Global Label',

            // Trusted Experts Section
            'trusted_experts_title' => 'Trusted Experts Title',
            'trusted_experts_description_1' => 'Trusted Experts Description 1',
            'trusted_experts_description_2' => 'Trusted Experts Description 2',

            // Client Benefits Section
            'client_benefits_title' => 'Client Benefits Title',
            'benefit1_title' => 'Benefit 1 Title',
            'benefit1_description' => 'Benefit 1 Description',
            'benefit2_title' => 'Benefit 2 Title',
            'benefit2_description' => 'Benefit 2 Description',
            'benefit3_title' => 'Benefit 3 Title',
            'benefit3_description' => 'Benefit 3 Description',

            // About AGN International Section
            'about_agn_title' => 'About AGN Title',
            'about_agn_description_1' => 'About AGN Description 1',
            'about_agn_description_2' => 'About AGN Description 2',
            'agn_website_url' => 'AGN Website URL',

            // Disclaimer Section
            'disclaimer_title' => 'Disclaimer Title',
            'disclaimer_content' => 'Disclaimer Content',

            // Contact CTA Section
            'contact_cta_title' => 'Contact CTA Title',
            'contact_cta_description' => 'Contact CTA Description',
            'contact_cta_button' => 'Contact CTA Button',
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
            // Hero Section - AGN International
            'agn_hero_title' => Content::where('key', 'agn_hero_title')->value('value'),
            'agn_hero_subtitle' => Content::where('key', 'agn_hero_subtitle')->value('value'),
            'agn_member_firms_count' => Content::where('key', 'agn_member_firms_count')->value('value'),
            'agn_member_firms_label' => Content::where('key', 'agn_member_firms_label')->value('value'),
            'agn_countries_count' => Content::where('key', 'agn_countries_count')->value('value'),
            'agn_countries_label' => Content::where('key', 'agn_countries_label')->value('value'),
            'agn_reach_count' => Content::where('key', 'agn_reach_count')->value('value'),
            'agn_reach_label' => Content::where('key', 'agn_reach_label')->value('value'),

            // MTC and AGN International Section
            'mtc_agn_title' => Content::where('key', 'mtc_agn_title')->value('value'),
            'mtc_agn_description' => Content::where('key', 'mtc_agn_description')->value('value'),

            // Network Information (Stats)
            'network_stats_firms_count' => Content::where('key', 'network_stats_firms_count')->value('value'),
            'network_stats_firms_label' => Content::where('key', 'network_stats_firms_label')->value('value'),
            'network_stats_countries_count' => Content::where('key', 'network_stats_countries_count')->value('value'),
            'network_stats_countries_label' => Content::where('key', 'network_stats_countries_label')->value('value'),
            'network_stats_global_count' => Content::where('key', 'network_stats_global_count')->value('value'),
            'network_stats_global_label' => Content::where('key', 'network_stats_global_label')->value('value'),

            // Trusted Experts Section
            'trusted_experts_title' => Content::where('key', 'trusted_experts_title')->value('value'),
            'trusted_experts_description_1' => Content::where('key', 'trusted_experts_description_1')->value('value'),
            'trusted_experts_description_2' => Content::where('key', 'trusted_experts_description_2')->value('value'),

            // Client Benefits Section
            'client_benefits_title' => Content::where('key', 'client_benefits_title')->value('value'),
            'benefit1_title' => Content::where('key', 'benefit1_title')->value('value'),
            'benefit1_description' => Content::where('key', 'benefit1_description')->value('value'),
            'benefit2_title' => Content::where('key', 'benefit2_title')->value('value'),
            'benefit2_description' => Content::where('key', 'benefit2_description')->value('value'),
            'benefit3_title' => Content::where('key', 'benefit3_title')->value('value'),
            'benefit3_description' => Content::where('key', 'benefit3_description')->value('value'),

            // About AGN International Section
            'about_agn_title' => Content::where('key', 'about_agn_title')->value('value'),
            'about_agn_description_1' => Content::where('key', 'about_agn_description_1')->value('value'),
            'about_agn_description_2' => Content::where('key', 'about_agn_description_2')->value('value'),
            'agn_website_url' => Content::where('key', 'agn_website_url')->value('value'),

            // Disclaimer Section
            'disclaimer_title' => Content::where('key', 'disclaimer_title')->value('value'),
            'disclaimer_content' => Content::where('key', 'disclaimer_content')->value('value'),

            // Contact CTA Section
            'contact_cta_title' => Content::where('key', 'contact_cta_title')->value('value'),
            'contact_cta_description' => Content::where('key', 'contact_cta_description')->value('value'),
            'contact_cta_button' => Content::where('key', 'contact_cta_button')->value('value'),
        ];

        return view('pages.international.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero Section - AGN International
            'agn_hero_title' => 'required|string|max:100',
            'agn_hero_subtitle' => 'required|string|max:200',
            'agn_member_firms_count' => 'required|string|max:20',
            'agn_member_firms_label' => 'required|string|max:50',
            'agn_countries_count' => 'required|string|max:20',
            'agn_countries_label' => 'required|string|max:50',
            'agn_reach_count' => 'required|string|max:20',
            'agn_reach_label' => 'required|string|max:50',

            // MTC and AGN International Section
            'mtc_agn_title' => 'required|string|max:255',
            'mtc_agn_description' => 'required|string|max:1000',

            // Network Information (Stats)
            'network_stats_firms_count' => 'required|string|max:20',
            'network_stats_firms_label' => 'required|string|max:50',
            'network_stats_countries_count' => 'required|string|max:20',
            'network_stats_countries_label' => 'required|string|max:50',
            'network_stats_global_count' => 'required|string|max:20',
            'network_stats_global_label' => 'required|string|max:50',

            // Trusted Experts Section
            'trusted_experts_title' => 'required|string|max:255',
            'trusted_experts_description_1' => 'required|string|max:1500',
            'trusted_experts_description_2' => 'required|string|max:1500',

            // Client Benefits Section
            'client_benefits_title' => 'required|string|max:255',
            'benefit1_title' => 'required|string|max:100',
            'benefit1_description' => 'required|string|max:300',
            'benefit2_title' => 'required|string|max:100',
            'benefit2_description' => 'required|string|max:300',
            'benefit3_title' => 'required|string|max:100',
            'benefit3_description' => 'required|string|max:300',

            // About AGN International Section
            'about_agn_title' => 'required|string|max:255',
            'about_agn_description_1' => 'required|string|max:500',
            'about_agn_description_2' => 'required|string|max:500',
            'agn_website_url' => 'required|string|max:100',

            // Disclaimer Section
            'disclaimer_title' => 'required|string|max:100',
            'disclaimer_content' => 'required|string|max:2000',

            // Contact CTA Section
            'contact_cta_title' => 'required|string|max:255',
            'contact_cta_description' => 'required|string|max:500',
            'contact_cta_button' => 'required|string|max:50',
        ]);

        $hasChanged = false;

        // Handle all text fields
        $textFields = [
            'agn_hero_title', 'agn_hero_subtitle', 'agn_member_firms_count', 'agn_member_firms_label',
            'agn_countries_count', 'agn_countries_label', 'agn_reach_count', 'agn_reach_label',
            'mtc_agn_title', 'mtc_agn_description', 'network_stats_firms_count', 'network_stats_firms_label',
            'network_stats_countries_count', 'network_stats_countries_label', 'network_stats_global_count',
            'network_stats_global_label', 'trusted_experts_title', 'trusted_experts_description_1',
            'trusted_experts_description_2', 'client_benefits_title', 'benefit1_title', 'benefit1_description',
            'benefit2_title', 'benefit2_description', 'benefit3_title', 'benefit3_description',
            'about_agn_title', 'about_agn_description_1', 'about_agn_description_2', 'agn_website_url',
            'disclaimer_title', 'disclaimer_content', 'contact_cta_title', 'contact_cta_description',
            'contact_cta_button'
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
            ? redirect()->route('admin.international.preview')->with('success', 'AGN International page updated successfully!')
            : redirect()->route('admin.international.preview');
    }
}
