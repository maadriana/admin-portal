<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class PamelaContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.people.pamela.preview');
    }

    public function preview()
    {
        $sections = [
            // Basic Information
            'pamela_full_name' => 'Full Name',
            'pamela_position' => 'Position',
            'pamela_email' => 'Email Address',
            'pamela_company' => 'Company',
            'pamela_profile_image' => 'Profile Image',

            // Hero Stats
            'pamela_stat1_value' => 'Stat 1 Value',
            'pamela_stat1_label' => 'Stat 1 Label',
            'pamela_stat2_value' => 'Stat 2 Value',
            'pamela_stat2_label' => 'Stat 2 Label',
            'pamela_stat3_value' => 'Stat 3 Value',
            'pamela_stat3_label' => 'Stat 3 Label',

            // Professional Badge
            'pamela_badge_title' => 'Professional Badge Title',
            'pamela_badge_subtitle' => 'Professional Badge Subtitle',

            // Biography Sections
            'pamela_bio_section1_title' => 'Biography Section 1 Title',
            'pamela_bio_section1_content' => 'Biography Section 1 Content',
            'pamela_bio_section2_title' => 'Biography Section 2 Title',
            'pamela_bio_section2_content' => 'Biography Section 2 Content',
            'pamela_bio_section3_title' => 'Biography Section 3 Title',
            'pamela_bio_section3_content' => 'Biography Section 3 Content',

            // Education
            'pamela_education1_degree' => 'Education 1 Degree',
            'pamela_education1_institution' => 'Education 1 Institution',
            'pamela_education2_degree' => 'Education 2 Degree',
            'pamela_education2_institution' => 'Education 2 Institution',

            // Professional Affiliations
            'pamela_affiliation1_name' => 'Affiliation 1 Name',
            'pamela_affiliation1_description' => 'Affiliation 1 Description',
            'pamela_affiliation2_name' => 'Affiliation 2 Name',
            'pamela_affiliation2_description' => 'Affiliation 2 Description',

            // Accreditation
            'pamela_accreditation1_name' => 'Accreditation 1 Name',
            'pamela_accreditation1_description' => 'Accreditation 1 Description',
            'pamela_accreditation2_name' => 'Accreditation 2 Name',
            'pamela_accreditation2_description' => 'Accreditation 2 Description',

            // Quote/Philosophy
            'pamela_quote' => 'Professional Quote',
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

        return view('pages.pamela', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Basic Information
            'pamela_full_name' => Content::where('key', 'pamela_full_name')->value('value'),
            'pamela_position' => Content::where('key', 'pamela_position')->value('value'),
            'pamela_email' => Content::where('key', 'pamela_email')->value('value'),
            'pamela_company' => Content::where('key', 'pamela_company')->value('value'),
            'pamela_profile_image' => Content::where('key', 'pamela_profile_image')->first(),

            // Hero Stats
            'pamela_stat1_value' => Content::where('key', 'pamela_stat1_value')->value('value'),
            'pamela_stat1_label' => Content::where('key', 'pamela_stat1_label')->value('value'),
            'pamela_stat2_value' => Content::where('key', 'pamela_stat2_value')->value('value'),
            'pamela_stat2_label' => Content::where('key', 'pamela_stat2_label')->value('value'),
            'pamela_stat3_value' => Content::where('key', 'pamela_stat3_value')->value('value'),
            'pamela_stat3_label' => Content::where('key', 'pamela_stat3_label')->value('value'),

            // Professional Badge
            'pamela_badge_title' => Content::where('key', 'pamela_badge_title')->value('value'),
            'pamela_badge_subtitle' => Content::where('key', 'pamela_badge_subtitle')->value('value'),

            // Biography Sections
            'pamela_bio_section1_title' => Content::where('key', 'pamela_bio_section1_title')->value('value'),
            'pamela_bio_section1_content' => Content::where('key', 'pamela_bio_section1_content')->value('value'),
            'pamela_bio_section2_title' => Content::where('key', 'pamela_bio_section2_title')->value('value'),
            'pamela_bio_section2_content' => Content::where('key', 'pamela_bio_section2_content')->value('value'),
            'pamela_bio_section3_title' => Content::where('key', 'pamela_bio_section3_title')->value('value'),
            'pamela_bio_section3_content' => Content::where('key', 'pamela_bio_section3_content')->value('value'),

            // Education
            'pamela_education1_degree' => Content::where('key', 'pamela_education1_degree')->value('value'),
            'pamela_education1_institution' => Content::where('key', 'pamela_education1_institution')->value('value'),
            'pamela_education2_degree' => Content::where('key', 'pamela_education2_degree')->value('value'),
            'pamela_education2_institution' => Content::where('key', 'pamela_education2_institution')->value('value'),

            // Professional Affiliations
            'pamela_affiliation1_name' => Content::where('key', 'pamela_affiliation1_name')->value('value'),
            'pamela_affiliation1_description' => Content::where('key', 'pamela_affiliation1_description')->value('value'),
            'pamela_affiliation2_name' => Content::where('key', 'pamela_affiliation2_name')->value('value'),
            'pamela_affiliation2_description' => Content::where('key', 'pamela_affiliation2_description')->value('value'),

            // Accreditation
            'pamela_accreditation1_name' => Content::where('key', 'pamela_accreditation1_name')->value('value'),
            'pamela_accreditation1_description' => Content::where('key', 'pamela_accreditation1_description')->value('value'),
            'pamela_accreditation2_name' => Content::where('key', 'pamela_accreditation2_name')->value('value'),
            'pamela_accreditation2_description' => Content::where('key', 'pamela_accreditation2_description')->value('value'),

            // Quote/Philosophy
            'pamela_quote' => Content::where('key', 'pamela_quote')->value('value'),
        ];

        return view('pages.pamela.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Basic Information
            'pamela_full_name' => 'required|string|max:255',
            'pamela_position' => 'required|string|max:255',
            'pamela_email' => 'required|email|max:255',
            'pamela_company' => 'required|string|max:255',
            'pamela_profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_pamela_profile_image' => 'nullable|boolean',

            // Hero Stats
            'pamela_stat1_value' => 'required|string|max:50',
            'pamela_stat1_label' => 'required|string|max:100',
            'pamela_stat2_value' => 'required|string|max:50',
            'pamela_stat2_label' => 'required|string|max:100',
            'pamela_stat3_value' => 'required|string|max:50',
            'pamela_stat3_label' => 'required|string|max:100',

            // Professional Badge
            'pamela_badge_title' => 'required|string|max:50',
            'pamela_badge_subtitle' => 'required|string|max:100',

            // Biography Sections
            'pamela_bio_section1_title' => 'required|string|max:255',
            'pamela_bio_section1_content' => 'required|string',
            'pamela_bio_section2_title' => 'required|string|max:255',
            'pamela_bio_section2_content' => 'required|string',
            'pamela_bio_section3_title' => 'required|string|max:255',
            'pamela_bio_section3_content' => 'required|string',

            // Education
            'pamela_education1_degree' => 'required|string|max:255',
            'pamela_education1_institution' => 'required|string|max:255',
            'pamela_education2_degree' => 'nullable|string|max:255',
            'pamela_education2_institution' => 'nullable|string|max:255',

            // Professional Affiliations
            'pamela_affiliation1_name' => 'required|string|max:255',
            'pamela_affiliation1_description' => 'required|string|max:255',
            'pamela_affiliation2_name' => 'nullable|string|max:255',
            'pamela_affiliation2_description' => 'nullable|string|max:255',

            // Accreditation
            'pamela_accreditation1_name' => 'required|string|max:255',
            'pamela_accreditation1_description' => 'required|string|max:255',
            'pamela_accreditation2_name' => 'nullable|string|max:255',
            'pamela_accreditation2_description' => 'nullable|string|max:255',

            // Quote/Philosophy
            'pamela_quote' => 'required|string',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'pamela_full_name', 'pamela_position', 'pamela_email', 'pamela_company',
            'pamela_stat1_value', 'pamela_stat1_label', 'pamela_stat2_value', 'pamela_stat2_label',
            'pamela_stat3_value', 'pamela_stat3_label', 'pamela_badge_title', 'pamela_badge_subtitle',
            'pamela_bio_section1_title', 'pamela_bio_section1_content', 'pamela_bio_section2_title', 'pamela_bio_section2_content',
            'pamela_bio_section3_title', 'pamela_bio_section3_content', 'pamela_education1_degree', 'pamela_education1_institution',
            'pamela_education2_degree', 'pamela_education2_institution',
            'pamela_affiliation1_name', 'pamela_affiliation1_description',
            'pamela_affiliation2_name', 'pamela_affiliation2_description',
            'pamela_accreditation1_name', 'pamela_accreditation1_description',
            'pamela_accreditation2_name', 'pamela_accreditation2_description',
            'pamela_quote'
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
        if ($request->has('remove_pamela_profile_image') && $request->remove_pamela_profile_image) {
            $existing = Content::where('key', 'pamela_profile_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('pamela_profile_image')) {
            $file = $request->file('pamela_profile_image');
            $binaryData = file_get_contents($file);
            $filename = 'pamela_profile_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'pamela_profile_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'pamela_profile_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.people.pamela.preview')->with('success', 'Pamela profile updated successfully!')
            : redirect()->route('admin.people.pamela.preview');
    }
}
