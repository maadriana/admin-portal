<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class JekellContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.people.jekell.preview');
    }

    public function preview()
    {
        $sections = [
            // Basic Information
            'jekell_full_name' => 'Full Name',
            'jekell_position' => 'Position',
            'jekell_email' => 'Email Address',
            'jekell_company' => 'Company',
            'jekell_profile_image' => 'Profile Image',

            // Hero Stats
            'jekell_stat1_value' => 'Stat 1 Value',
            'jekell_stat1_label' => 'Stat 1 Label',
            'jekell_stat2_value' => 'Stat 2 Value',
            'jekell_stat2_label' => 'Stat 2 Label',
            'jekell_stat3_value' => 'Stat 3 Value',
            'jekell_stat3_label' => 'Stat 3 Label',

            // Professional Badge
            'jekell_badge_title' => 'Professional Badge Title',
            'jekell_badge_subtitle' => 'Professional Badge Subtitle',

            // Biography Sections
            'jekell_bio_section1_title' => 'Biography Section 1 Title',
            'jekell_bio_section1_content' => 'Biography Section 1 Content',
            'jekell_bio_section2_title' => 'Biography Section 2 Title',
            'jekell_bio_section2_content' => 'Biography Section 2 Content',
            'jekell_bio_section3_title' => 'Biography Section 3 Title',
            'jekell_bio_section3_content' => 'Biography Section 3 Content',

            // Education & Achievement
            'jekell_education1_degree' => 'Education 1 Degree',
            'jekell_education1_institution' => 'Education 1 Institution',
            'jekell_education1_year' => 'Education 1 Year',
            'jekell_education1_achievement' => 'Education 1 Achievement',
            'jekell_current_role_title' => 'Current Role Title',
            'jekell_current_role_institution' => 'Current Role Institution',

            // Published Works
            'jekell_publication1_title' => 'Publication 1 Title',
            'jekell_publication1_description' => 'Publication 1 Description',
            'jekell_publication2_title' => 'Publication 2 Title',
            'jekell_publication2_description' => 'Publication 2 Description',

            // Committee Memberships (5 committees)
            'jekell_committee1' => 'Committee 1',
            'jekell_committee2' => 'Committee 2',
            'jekell_committee3' => 'Committee 3',
            'jekell_committee4' => 'Committee 4',
            'jekell_committee5' => 'Committee 5',

            // Notable Clients (8 major clients)
            'jekell_client1' => 'Client 1',
            'jekell_client2' => 'Client 2',
            'jekell_client3' => 'Client 3',
            'jekell_client4' => 'Client 4',
            'jekell_client5' => 'Client 5',
            'jekell_client6' => 'Client 6',
            'jekell_client7' => 'Client 7',
            'jekell_client8' => 'Client 8',

            // Professional Affiliations
            'jekell_affiliation1_name' => 'Affiliation 1 Name',
            'jekell_affiliation1_description' => 'Affiliation 1 Description',
            'jekell_affiliation2_name' => 'Affiliation 2 Name',
            'jekell_affiliation2_description' => 'Affiliation 2 Description',

            // Quote/Philosophy
            'jekell_quote' => 'Professional Quote',
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

        return view('pages.jekell', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Basic Information
            'jekell_full_name' => Content::where('key', 'jekell_full_name')->value('value'),
            'jekell_position' => Content::where('key', 'jekell_position')->value('value'),
            'jekell_email' => Content::where('key', 'jekell_email')->value('value'),
            'jekell_company' => Content::where('key', 'jekell_company')->value('value'),
            'jekell_profile_image' => Content::where('key', 'jekell_profile_image')->first(),

            // Hero Stats
            'jekell_stat1_value' => Content::where('key', 'jekell_stat1_value')->value('value'),
            'jekell_stat1_label' => Content::where('key', 'jekell_stat1_label')->value('value'),
            'jekell_stat2_value' => Content::where('key', 'jekell_stat2_value')->value('value'),
            'jekell_stat2_label' => Content::where('key', 'jekell_stat2_label')->value('value'),
            'jekell_stat3_value' => Content::where('key', 'jekell_stat3_value')->value('value'),
            'jekell_stat3_label' => Content::where('key', 'jekell_stat3_label')->value('value'),

            // Professional Badge
            'jekell_badge_title' => Content::where('key', 'jekell_badge_title')->value('value'),
            'jekell_badge_subtitle' => Content::where('key', 'jekell_badge_subtitle')->value('value'),

            // Biography Sections
            'jekell_bio_section1_title' => Content::where('key', 'jekell_bio_section1_title')->value('value'),
            'jekell_bio_section1_content' => Content::where('key', 'jekell_bio_section1_content')->value('value'),
            'jekell_bio_section2_title' => Content::where('key', 'jekell_bio_section2_title')->value('value'),
            'jekell_bio_section2_content' => Content::where('key', 'jekell_bio_section2_content')->value('value'),
            'jekell_bio_section3_title' => Content::where('key', 'jekell_bio_section3_title')->value('value'),
            'jekell_bio_section3_content' => Content::where('key', 'jekell_bio_section3_content')->value('value'),

            // Education & Achievement
            'jekell_education1_degree' => Content::where('key', 'jekell_education1_degree')->value('value'),
            'jekell_education1_institution' => Content::where('key', 'jekell_education1_institution')->value('value'),
            'jekell_education1_year' => Content::where('key', 'jekell_education1_year')->value('value'),
            'jekell_education1_achievement' => Content::where('key', 'jekell_education1_achievement')->value('value'),
            'jekell_current_role_title' => Content::where('key', 'jekell_current_role_title')->value('value'),
            'jekell_current_role_institution' => Content::where('key', 'jekell_current_role_institution')->value('value'),

            // Published Works
            'jekell_publication1_title' => Content::where('key', 'jekell_publication1_title')->value('value'),
            'jekell_publication1_description' => Content::where('key', 'jekell_publication1_description')->value('value'),
            'jekell_publication2_title' => Content::where('key', 'jekell_publication2_title')->value('value'),
            'jekell_publication2_description' => Content::where('key', 'jekell_publication2_description')->value('value'),

            // Committee Memberships
            'jekell_committee1' => Content::where('key', 'jekell_committee1')->value('value'),
            'jekell_committee2' => Content::where('key', 'jekell_committee2')->value('value'),
            'jekell_committee3' => Content::where('key', 'jekell_committee3')->value('value'),
            'jekell_committee4' => Content::where('key', 'jekell_committee4')->value('value'),
            'jekell_committee5' => Content::where('key', 'jekell_committee5')->value('value'),

            // Notable Clients
            'jekell_client1' => Content::where('key', 'jekell_client1')->value('value'),
            'jekell_client2' => Content::where('key', 'jekell_client2')->value('value'),
            'jekell_client3' => Content::where('key', 'jekell_client3')->value('value'),
            'jekell_client4' => Content::where('key', 'jekell_client4')->value('value'),
            'jekell_client5' => Content::where('key', 'jekell_client5')->value('value'),
            'jekell_client6' => Content::where('key', 'jekell_client6')->value('value'),
            'jekell_client7' => Content::where('key', 'jekell_client7')->value('value'),
            'jekell_client8' => Content::where('key', 'jekell_client8')->value('value'),

            // Professional Affiliations
            'jekell_affiliation1_name' => Content::where('key', 'jekell_affiliation1_name')->value('value'),
            'jekell_affiliation1_description' => Content::where('key', 'jekell_affiliation1_description')->value('value'),
            'jekell_affiliation2_name' => Content::where('key', 'jekell_affiliation2_name')->value('value'),
            'jekell_affiliation2_description' => Content::where('key', 'jekell_affiliation2_description')->value('value'),

            // Quote/Philosophy
            'jekell_quote' => Content::where('key', 'jekell_quote')->value('value'),
        ];

        return view('pages.jekell.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Basic Information
            'jekell_full_name' => 'required|string|max:255',
            'jekell_position' => 'required|string|max:255',
            'jekell_email' => 'required|email|max:255',
            'jekell_company' => 'required|string|max:255',
            'jekell_profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_jekell_profile_image' => 'nullable|boolean',

            // Hero Stats
            'jekell_stat1_value' => 'required|string|max:50',
            'jekell_stat1_label' => 'required|string|max:100',
            'jekell_stat2_value' => 'required|string|max:50',
            'jekell_stat2_label' => 'required|string|max:100',
            'jekell_stat3_value' => 'required|string|max:50',
            'jekell_stat3_label' => 'required|string|max:100',

            // Professional Badge
            'jekell_badge_title' => 'required|string|max:50',
            'jekell_badge_subtitle' => 'required|string|max:100',

            // Biography Sections
            'jekell_bio_section1_title' => 'required|string|max:255',
            'jekell_bio_section1_content' => 'required|string',
            'jekell_bio_section2_title' => 'required|string|max:255',
            'jekell_bio_section2_content' => 'required|string',
            'jekell_bio_section3_title' => 'required|string|max:255',
            'jekell_bio_section3_content' => 'required|string',

            // Education & Achievement
            'jekell_education1_degree' => 'required|string|max:255',
            'jekell_education1_institution' => 'required|string|max:255',
            'jekell_education1_year' => 'required|string|max:50',
            'jekell_education1_achievement' => 'required|string|max:255',
            'jekell_current_role_title' => 'required|string|max:255',
            'jekell_current_role_institution' => 'required|string|max:255',

            // Published Works
            'jekell_publication1_title' => 'required|string|max:255',
            'jekell_publication1_description' => 'required|string|max:255',
            'jekell_publication2_title' => 'required|string|max:255',
            'jekell_publication2_description' => 'required|string|max:255',

            // Committee Memberships
            'jekell_committee1' => 'required|string|max:255',
            'jekell_committee2' => 'required|string|max:255',
            'jekell_committee3' => 'nullable|string|max:255',
            'jekell_committee4' => 'nullable|string|max:255',
            'jekell_committee5' => 'nullable|string|max:255',

            // Notable Clients
            'jekell_client1' => 'required|string|max:100',
            'jekell_client2' => 'required|string|max:100',
            'jekell_client3' => 'required|string|max:100',
            'jekell_client4' => 'required|string|max:100',
            'jekell_client5' => 'nullable|string|max:100',
            'jekell_client6' => 'nullable|string|max:100',
            'jekell_client7' => 'nullable|string|max:100',
            'jekell_client8' => 'nullable|string|max:100',

            // Professional Affiliations
            'jekell_affiliation1_name' => 'required|string|max:255',
            'jekell_affiliation1_description' => 'required|string|max:255',
            'jekell_affiliation2_name' => 'nullable|string|max:255',
            'jekell_affiliation2_description' => 'nullable|string|max:255',

            // Quote/Philosophy
            'jekell_quote' => 'required|string',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'jekell_full_name', 'jekell_position', 'jekell_email', 'jekell_company',
            'jekell_stat1_value', 'jekell_stat1_label', 'jekell_stat2_value', 'jekell_stat2_label',
            'jekell_stat3_value', 'jekell_stat3_label', 'jekell_badge_title', 'jekell_badge_subtitle',
            'jekell_bio_section1_title', 'jekell_bio_section1_content', 'jekell_bio_section2_title', 'jekell_bio_section2_content',
            'jekell_bio_section3_title', 'jekell_bio_section3_content', 'jekell_education1_degree', 'jekell_education1_institution',
            'jekell_education1_year', 'jekell_education1_achievement', 'jekell_current_role_title', 'jekell_current_role_institution',
            'jekell_publication1_title', 'jekell_publication1_description', 'jekell_publication2_title', 'jekell_publication2_description',
            'jekell_committee1', 'jekell_committee2', 'jekell_committee3', 'jekell_committee4', 'jekell_committee5',
            'jekell_client1', 'jekell_client2', 'jekell_client3', 'jekell_client4',
            'jekell_client5', 'jekell_client6', 'jekell_client7', 'jekell_client8',
            'jekell_affiliation1_name', 'jekell_affiliation1_description', 'jekell_affiliation2_name', 'jekell_affiliation2_description',
            'jekell_quote'
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
        if ($request->has('remove_jekell_profile_image') && $request->remove_jekell_profile_image) {
            $existing = Content::where('key', 'jekell_profile_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('jekell_profile_image')) {
            $file = $request->file('jekell_profile_image');
            $binaryData = file_get_contents($file);
            $filename = 'jekell_profile_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'jekell_profile_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'jekell_profile_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.people.jekell.preview')->with('success', 'Jekell profile updated successfully!')
            : redirect()->route('admin.people.jekell.preview');
    }
}
