<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class EphraimContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.people.ephraim.preview');
    }

    public function preview()
    {
        $sections = [
            // Basic Information
            'ephraim_full_name' => 'Full Name',
            'ephraim_position' => 'Position',
            'ephraim_email' => 'Email Address',
            'ephraim_company' => 'Company',
            'ephraim_profile_image' => 'Profile Image',

            // Hero Stats
            'ephraim_stat1_value' => 'Stat 1 Value',
            'ephraim_stat1_label' => 'Stat 1 Label',
            'ephraim_stat2_value' => 'Stat 2 Value',
            'ephraim_stat2_label' => 'Stat 2 Label',
            'ephraim_stat3_value' => 'Stat 3 Value',
            'ephraim_stat3_label' => 'Stat 3 Label',

            // Biography Sections
            'ephraim_bio_section1_title' => 'Biography Section 1 Title',
            'ephraim_bio_section1_content' => 'Biography Section 1 Content',
            'ephraim_bio_section2_title' => 'Biography Section 2 Title',
            'ephraim_bio_section2_content' => 'Biography Section 2 Content',
            'ephraim_bio_section3_title' => 'Biography Section 3 Title',
            'ephraim_bio_section3_content' => 'Biography Section 3 Content',

            // Education
            'ephraim_education1_degree' => 'Education 1 Degree',
            'ephraim_education1_institution' => 'Education 1 Institution',
            'ephraim_education2_degree' => 'Education 2 Degree',
            'ephraim_education2_institution' => 'Education 2 Institution',

            // Professional Affiliations
            'ephraim_affiliation1_name' => 'Affiliation 1 Name',
            'ephraim_affiliation1_description' => 'Affiliation 1 Description',
            'ephraim_affiliation2_name' => 'Affiliation 2 Name',
            'ephraim_affiliation2_description' => 'Affiliation 2 Description',
            'ephraim_affiliation3_name' => 'Affiliation 3 Name',
            'ephraim_affiliation3_description' => 'Affiliation 3 Description',
            'ephraim_affiliation4_name' => 'Affiliation 4 Name',
            'ephraim_affiliation4_description' => 'Affiliation 4 Description',

            // Accreditation (New section)
            'ephraim_accreditation1_name' => 'Accreditation 1 Name',
            'ephraim_accreditation1_description' => 'Accreditation 1 Description',
            'ephraim_accreditation2_name' => 'Accreditation 2 Name',
            'ephraim_accreditation2_description' => 'Accreditation 2 Description',

            // Industry Expertise
            'ephraim_industry1' => 'Industry 1',
            'ephraim_industry2' => 'Industry 2',
            'ephraim_industry3' => 'Industry 3',
            'ephraim_industry4' => 'Industry 4',
            'ephraim_industry5' => 'Industry 5',
            'ephraim_industry6' => 'Industry 6',
            'ephraim_industry7' => 'Industry 7',
            'ephraim_industry8' => 'Industry 8',

            // Core Competencies
            'ephraim_competency1' => 'Competency 1',
            'ephraim_competency2' => 'Competency 2',
            'ephraim_competency3' => 'Competency 3',
            'ephraim_competency4' => 'Competency 4',
            'ephraim_competency5' => 'Competency 5',

            // Quote/Philosophy
            'ephraim_quote' => 'Professional Quote',
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

        return view('pages.ephraim', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Basic Information
            'ephraim_full_name' => Content::where('key', 'ephraim_full_name')->value('value'),
            'ephraim_position' => Content::where('key', 'ephraim_position')->value('value'),
            'ephraim_email' => Content::where('key', 'ephraim_email')->value('value'),
            'ephraim_company' => Content::where('key', 'ephraim_company')->value('value'),
            'ephraim_profile_image' => Content::where('key', 'ephraim_profile_image')->first(),

            // Hero Stats
            'ephraim_stat1_value' => Content::where('key', 'ephraim_stat1_value')->value('value'),
            'ephraim_stat1_label' => Content::where('key', 'ephraim_stat1_label')->value('value'),
            'ephraim_stat2_value' => Content::where('key', 'ephraim_stat2_value')->value('value'),
            'ephraim_stat2_label' => Content::where('key', 'ephraim_stat2_label')->value('value'),
            'ephraim_stat3_value' => Content::where('key', 'ephraim_stat3_value')->value('value'),
            'ephraim_stat3_label' => Content::where('key', 'ephraim_stat3_label')->value('value'),

            // Biography Sections
            'ephraim_bio_section1_title' => Content::where('key', 'ephraim_bio_section1_title')->value('value'),
            'ephraim_bio_section1_content' => Content::where('key', 'ephraim_bio_section1_content')->value('value'),
            'ephraim_bio_section2_title' => Content::where('key', 'ephraim_bio_section2_title')->value('value'),
            'ephraim_bio_section2_content' => Content::where('key', 'ephraim_bio_section2_content')->value('value'),
            'ephraim_bio_section3_title' => Content::where('key', 'ephraim_bio_section3_title')->value('value'),
            'ephraim_bio_section3_content' => Content::where('key', 'ephraim_bio_section3_content')->value('value'),

            // Education
            'ephraim_education1_degree' => Content::where('key', 'ephraim_education1_degree')->value('value'),
            'ephraim_education1_institution' => Content::where('key', 'ephraim_education1_institution')->value('value'),
            'ephraim_education2_degree' => Content::where('key', 'ephraim_education2_degree')->value('value'),
            'ephraim_education2_institution' => Content::where('key', 'ephraim_education2_institution')->value('value'),

            // Professional Affiliations
            'ephraim_affiliation1_name' => Content::where('key', 'ephraim_affiliation1_name')->value('value'),
            'ephraim_affiliation1_description' => Content::where('key', 'ephraim_affiliation1_description')->value('value'),
            'ephraim_affiliation2_name' => Content::where('key', 'ephraim_affiliation2_name')->value('value'),
            'ephraim_affiliation2_description' => Content::where('key', 'ephraim_affiliation2_description')->value('value'),
            'ephraim_affiliation3_name' => Content::where('key', 'ephraim_affiliation3_name')->value('value'),
            'ephraim_affiliation3_description' => Content::where('key', 'ephraim_affiliation3_description')->value('value'),
            'ephraim_affiliation4_name' => Content::where('key', 'ephraim_affiliation4_name')->value('value'),
            'ephraim_affiliation4_description' => Content::where('key', 'ephraim_affiliation4_description')->value('value'),

            // Accreditation (New section)
            'ephraim_accreditation1_name' => Content::where('key', 'ephraim_accreditation1_name')->value('value'),
            'ephraim_accreditation1_description' => Content::where('key', 'ephraim_accreditation1_description')->value('value'),
            'ephraim_accreditation2_name' => Content::where('key', 'ephraim_accreditation2_name')->value('value'),
            'ephraim_accreditation2_description' => Content::where('key', 'ephraim_accreditation2_description')->value('value'),

            // Industry Expertise
            'ephraim_industry1' => Content::where('key', 'ephraim_industry1')->value('value'),
            'ephraim_industry2' => Content::where('key', 'ephraim_industry2')->value('value'),
            'ephraim_industry3' => Content::where('key', 'ephraim_industry3')->value('value'),
            'ephraim_industry4' => Content::where('key', 'ephraim_industry4')->value('value'),
            'ephraim_industry5' => Content::where('key', 'ephraim_industry5')->value('value'),
            'ephraim_industry6' => Content::where('key', 'ephraim_industry6')->value('value'),
            'ephraim_industry7' => Content::where('key', 'ephraim_industry7')->value('value'),
            'ephraim_industry8' => Content::where('key', 'ephraim_industry8')->value('value'),

            // Core Competencies
            'ephraim_competency1' => Content::where('key', 'ephraim_competency1')->value('value'),
            'ephraim_competency2' => Content::where('key', 'ephraim_competency2')->value('value'),
            'ephraim_competency3' => Content::where('key', 'ephraim_competency3')->value('value'),
            'ephraim_competency4' => Content::where('key', 'ephraim_competency4')->value('value'),
            'ephraim_competency5' => Content::where('key', 'ephraim_competency5')->value('value'),

            // Quote/Philosophy
            'ephraim_quote' => Content::where('key', 'ephraim_quote')->value('value'),
        ];

        return view('pages.ephraim.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Basic Information
            'ephraim_full_name' => 'required|string|max:255',
            'ephraim_position' => 'required|string|max:255',
            'ephraim_email' => 'required|email|max:255',
            'ephraim_company' => 'required|string|max:255',
            'ephraim_profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_ephraim_profile_image' => 'nullable|boolean',

            // Hero Stats
            'ephraim_stat1_value' => 'required|string|max:50',
            'ephraim_stat1_label' => 'required|string|max:100',
            'ephraim_stat2_value' => 'required|string|max:50',
            'ephraim_stat2_label' => 'required|string|max:100',
            'ephraim_stat3_value' => 'required|string|max:50',
            'ephraim_stat3_label' => 'required|string|max:100',

            // Biography Sections
            'ephraim_bio_section1_title' => 'required|string|max:255',
            'ephraim_bio_section1_content' => 'required|string',
            'ephraim_bio_section2_title' => 'required|string|max:255',
            'ephraim_bio_section2_content' => 'required|string',
            'ephraim_bio_section3_title' => 'required|string|max:255',
            'ephraim_bio_section3_content' => 'required|string',

            // Education
            'ephraim_education1_degree' => 'required|string|max:255',
            'ephraim_education1_institution' => 'required|string|max:255',
            'ephraim_education2_degree' => 'nullable|string|max:255',
            'ephraim_education2_institution' => 'nullable|string|max:255',

            // Professional Affiliations
            'ephraim_affiliation1_name' => 'required|string|max:255',
            'ephraim_affiliation1_description' => 'required|string|max:255',
            'ephraim_affiliation2_name' => 'nullable|string|max:255',
            'ephraim_affiliation2_description' => 'nullable|string|max:255',
            'ephraim_affiliation3_name' => 'nullable|string|max:255',
            'ephraim_affiliation3_description' => 'nullable|string|max:255',
            'ephraim_affiliation4_name' => 'nullable|string|max:255',
            'ephraim_affiliation4_description' => 'nullable|string|max:255',

            // Accreditation (New section)
            'ephraim_accreditation1_name' => 'required|string|max:255',
            'ephraim_accreditation1_description' => 'required|string|max:255',
            'ephraim_accreditation2_name' => 'nullable|string|max:255',
            'ephraim_accreditation2_description' => 'nullable|string|max:255',

            // Industry Expertise
            'ephraim_industry1' => 'required|string|max:100',
            'ephraim_industry2' => 'required|string|max:100',
            'ephraim_industry3' => 'required|string|max:100',
            'ephraim_industry4' => 'required|string|max:100',
            'ephraim_industry5' => 'nullable|string|max:100',
            'ephraim_industry6' => 'nullable|string|max:100',
            'ephraim_industry7' => 'nullable|string|max:100',
            'ephraim_industry8' => 'nullable|string|max:100',

            // Core Competencies
            'ephraim_competency1' => 'required|string|max:255',
            'ephraim_competency2' => 'required|string|max:255',
            'ephraim_competency3' => 'required|string|max:255',
            'ephraim_competency4' => 'nullable|string|max:255',
            'ephraim_competency5' => 'nullable|string|max:255',

            // Quote/Philosophy
            'ephraim_quote' => 'required|string',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'ephraim_full_name', 'ephraim_position', 'ephraim_email', 'ephraim_company',
            'ephraim_stat1_value', 'ephraim_stat1_label', 'ephraim_stat2_value', 'ephraim_stat2_label',
            'ephraim_stat3_value', 'ephraim_stat3_label', 'ephraim_bio_section1_title', 'ephraim_bio_section1_content',
            'ephraim_bio_section2_title', 'ephraim_bio_section2_content', 'ephraim_bio_section3_title', 'ephraim_bio_section3_content',
            'ephraim_education1_degree', 'ephraim_education1_institution', 'ephraim_education2_degree', 'ephraim_education2_institution',
            'ephraim_affiliation1_name', 'ephraim_affiliation1_description', 'ephraim_affiliation2_name', 'ephraim_affiliation2_description',
            'ephraim_affiliation3_name', 'ephraim_affiliation3_description', 'ephraim_affiliation4_name', 'ephraim_affiliation4_description',
            'ephraim_accreditation1_name', 'ephraim_accreditation1_description', 'ephraim_accreditation2_name', 'ephraim_accreditation2_description',
            'ephraim_industry1', 'ephraim_industry2', 'ephraim_industry3', 'ephraim_industry4',
            'ephraim_industry5', 'ephraim_industry6', 'ephraim_industry7', 'ephraim_industry8',
            'ephraim_competency1', 'ephraim_competency2', 'ephraim_competency3', 'ephraim_competency4', 'ephraim_competency5',
            'ephraim_quote'
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
        if ($request->has('remove_ephraim_profile_image') && $request->remove_ephraim_profile_image) {
            $existing = Content::where('key', 'ephraim_profile_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('ephraim_profile_image')) {
            $file = $request->file('ephraim_profile_image');
            $binaryData = file_get_contents($file);
            $filename = 'ephraim_profile_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'ephraim_profile_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'ephraim_profile_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.people.ephraim.preview')->with('success', 'Ephraim profile updated successfully!')
            : redirect()->route('admin.people.ephraim.preview');
    }
}
