<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class EmmanuelContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.people.emmanuel.preview');
    }

    public function preview()
    {
        $sections = [
            // Basic Information
            'emmanuel_full_name' => 'Full Name',
            'emmanuel_position' => 'Position',
            'emmanuel_email' => 'Email Address',
            'emmanuel_company' => 'Company',
            'emmanuel_profile_image' => 'Profile Image',

            // Hero Stats
            'emmanuel_stat1_value' => 'Stat 1 Value',
            'emmanuel_stat1_label' => 'Stat 1 Label',
            'emmanuel_stat2_value' => 'Stat 2 Value',
            'emmanuel_stat2_label' => 'Stat 2 Label',
            'emmanuel_stat3_value' => 'Stat 3 Value',
            'emmanuel_stat3_label' => 'Stat 3 Label',

            // Biography Sections
            'emmanuel_bio_section1_title' => 'Biography Section 1 Title',
            'emmanuel_bio_section1_content' => 'Biography Section 1 Content',
            'emmanuel_bio_section2_title' => 'Biography Section 2 Title',
            'emmanuel_bio_section2_content' => 'Biography Section 2 Content',
            'emmanuel_bio_section3_title' => 'Biography Section 3 Title',
            'emmanuel_bio_section3_content' => 'Biography Section 3 Content',

            // Education
            'emmanuel_education1_degree' => 'Education 1 Degree',
            'emmanuel_education1_institution' => 'Education 1 Institution',
            'emmanuel_education2_degree' => 'Education 2 Degree',
            'emmanuel_education2_institution' => 'Education 2 Institution',

            // Professional Affiliations
            'emmanuel_affiliation1_name' => 'Affiliation 1 Name',
            'emmanuel_affiliation1_description' => 'Affiliation 1 Description',
            'emmanuel_affiliation2_name' => 'Affiliation 2 Name',
            'emmanuel_affiliation2_description' => 'Affiliation 2 Description',
            'emmanuel_affiliation3_name' => 'Affiliation 3 Name',
            'emmanuel_affiliation3_description' => 'Affiliation 3 Description',
            'emmanuel_affiliation4_name' => 'Affiliation 4 Name',
            'emmanuel_affiliation4_description' => 'Affiliation 4 Description',

            // Quote/Philosophy
            'emmanuel_quote' => 'Professional Quote',
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

        return view('pages.emmanuel', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Basic Information
            'emmanuel_full_name' => Content::where('key', 'emmanuel_full_name')->value('value'),
            'emmanuel_position' => Content::where('key', 'emmanuel_position')->value('value'),
            'emmanuel_email' => Content::where('key', 'emmanuel_email')->value('value'),
            'emmanuel_company' => Content::where('key', 'emmanuel_company')->value('value'),
            'emmanuel_profile_image' => Content::where('key', 'emmanuel_profile_image')->first(),

            // Hero Stats
            'emmanuel_stat1_value' => Content::where('key', 'emmanuel_stat1_value')->value('value'),
            'emmanuel_stat1_label' => Content::where('key', 'emmanuel_stat1_label')->value('value'),
            'emmanuel_stat2_value' => Content::where('key', 'emmanuel_stat2_value')->value('value'),
            'emmanuel_stat2_label' => Content::where('key', 'emmanuel_stat2_label')->value('value'),
            'emmanuel_stat3_value' => Content::where('key', 'emmanuel_stat3_value')->value('value'),
            'emmanuel_stat3_label' => Content::where('key', 'emmanuel_stat3_label')->value('value'),

            // Biography Sections
            'emmanuel_bio_section1_title' => Content::where('key', 'emmanuel_bio_section1_title')->value('value'),
            'emmanuel_bio_section1_content' => Content::where('key', 'emmanuel_bio_section1_content')->value('value'),
            'emmanuel_bio_section2_title' => Content::where('key', 'emmanuel_bio_section2_title')->value('value'),
            'emmanuel_bio_section2_content' => Content::where('key', 'emmanuel_bio_section2_content')->value('value'),
            'emmanuel_bio_section3_title' => Content::where('key', 'emmanuel_bio_section3_title')->value('value'),
            'emmanuel_bio_section3_content' => Content::where('key', 'emmanuel_bio_section3_content')->value('value'),

            // Education
            'emmanuel_education1_degree' => Content::where('key', 'emmanuel_education1_degree')->value('value'),
            'emmanuel_education1_institution' => Content::where('key', 'emmanuel_education1_institution')->value('value'),
            'emmanuel_education2_degree' => Content::where('key', 'emmanuel_education2_degree')->value('value'),
            'emmanuel_education2_institution' => Content::where('key', 'emmanuel_education2_institution')->value('value'),

            // Professional Affiliations
            'emmanuel_affiliation1_name' => Content::where('key', 'emmanuel_affiliation1_name')->value('value'),
            'emmanuel_affiliation1_description' => Content::where('key', 'emmanuel_affiliation1_description')->value('value'),
            'emmanuel_affiliation2_name' => Content::where('key', 'emmanuel_affiliation2_name')->value('value'),
            'emmanuel_affiliation2_description' => Content::where('key', 'emmanuel_affiliation2_description')->value('value'),
            'emmanuel_affiliation3_name' => Content::where('key', 'emmanuel_affiliation3_name')->value('value'),
            'emmanuel_affiliation3_description' => Content::where('key', 'emmanuel_affiliation3_description')->value('value'),
            'emmanuel_affiliation4_name' => Content::where('key', 'emmanuel_affiliation4_name')->value('value'),
            'emmanuel_affiliation4_description' => Content::where('key', 'emmanuel_affiliation4_description')->value('value'),

            // Quote/Philosophy
            'emmanuel_quote' => Content::where('key', 'emmanuel_quote')->value('value'),
        ];

        return view('pages.emmanuel.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Basic Information
            'emmanuel_full_name' => 'required|string|max:255',
            'emmanuel_position' => 'required|string|max:255',
            'emmanuel_email' => 'required|email|max:255',
            'emmanuel_company' => 'required|string|max:255',
            'emmanuel_profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_emmanuel_profile_image' => 'nullable|boolean',

            // Hero Stats
            'emmanuel_stat1_value' => 'required|string|max:50',
            'emmanuel_stat1_label' => 'required|string|max:100',
            'emmanuel_stat2_value' => 'required|string|max:50',
            'emmanuel_stat2_label' => 'required|string|max:100',
            'emmanuel_stat3_value' => 'required|string|max:50',
            'emmanuel_stat3_label' => 'required|string|max:100',

            // Biography Sections
            'emmanuel_bio_section1_title' => 'required|string|max:255',
            'emmanuel_bio_section1_content' => 'required|string',
            'emmanuel_bio_section2_title' => 'required|string|max:255',
            'emmanuel_bio_section2_content' => 'required|string',
            'emmanuel_bio_section3_title' => 'required|string|max:255',
            'emmanuel_bio_section3_content' => 'required|string',

            // Education
            'emmanuel_education1_degree' => 'required|string|max:255',
            'emmanuel_education1_institution' => 'required|string|max:255',
            'emmanuel_education2_degree' => 'required|string|max:255',
            'emmanuel_education2_institution' => 'required|string|max:255',

            // Professional Affiliations
            'emmanuel_affiliation1_name' => 'required|string|max:255',
            'emmanuel_affiliation1_description' => 'required|string|max:255',
            'emmanuel_affiliation2_name' => 'required|string|max:255',
            'emmanuel_affiliation2_description' => 'required|string|max:255',
            'emmanuel_affiliation3_name' => 'required|string|max:255',
            'emmanuel_affiliation3_description' => 'required|string|max:255',
            'emmanuel_affiliation4_name' => 'required|string|max:255',
            'emmanuel_affiliation4_description' => 'required|string|max:255',

            // Quote/Philosophy
            'emmanuel_quote' => 'required|string',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'emmanuel_full_name', 'emmanuel_position', 'emmanuel_email', 'emmanuel_company',
            'emmanuel_stat1_value', 'emmanuel_stat1_label', 'emmanuel_stat2_value', 'emmanuel_stat2_label',
            'emmanuel_stat3_value', 'emmanuel_stat3_label', 'emmanuel_bio_section1_title', 'emmanuel_bio_section1_content',
            'emmanuel_bio_section2_title', 'emmanuel_bio_section2_content', 'emmanuel_bio_section3_title', 'emmanuel_bio_section3_content',
            'emmanuel_education1_degree', 'emmanuel_education1_institution', 'emmanuel_education2_degree', 'emmanuel_education2_institution',
            'emmanuel_affiliation1_name', 'emmanuel_affiliation1_description', 'emmanuel_affiliation2_name', 'emmanuel_affiliation2_description',
            'emmanuel_affiliation3_name', 'emmanuel_affiliation3_description', 'emmanuel_affiliation4_name', 'emmanuel_affiliation4_description',
            'emmanuel_quote'
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
        if ($request->has('remove_emmanuel_profile_image') && $request->remove_emmanuel_profile_image) {
            $existing = Content::where('key', 'emmanuel_profile_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('emmanuel_profile_image')) {
            $file = $request->file('emmanuel_profile_image');
            $binaryData = file_get_contents($file);
            $filename = 'emmanuel_profile_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'emmanuel_profile_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'emmanuel_profile_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.people.emmanuel.preview')->with('success', 'Emmanuel profile updated successfully!')
            : redirect()->route('admin.people.emmanuel.preview');
    }
}
