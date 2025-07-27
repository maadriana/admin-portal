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
        return view('pages.emmanuel');
    }

    public function edit()
    {
        $data = [
            // Basic Information
            'emmanuel_full_name' => Content::where('key', 'emmanuel_full_name')->value('value') ?? 'Emmanuel Y. Mendoza',
            'emmanuel_position' => Content::where('key', 'emmanuel_position')->value('value') ?? 'Managing Partner',
            'emmanuel_email' => Content::where('key', 'emmanuel_email')->value('value') ?? 'eymendoza@mtco.com.ph',
            'emmanuel_company' => Content::where('key', 'emmanuel_company')->value('value') ?? 'Mendoza Tugano & Co., CPAs',

            // Hero Stats
            'emmanuel_stat1_value' => Content::where('key', 'emmanuel_stat1_value')->value('value') ?? '10+',
            'emmanuel_stat1_label' => Content::where('key', 'emmanuel_stat1_label')->value('value') ?? 'Years at SGV & Co.',
            'emmanuel_stat2_value' => Content::where('key', 'emmanuel_stat2_value')->value('value') ?? '3',
            'emmanuel_stat2_label' => Content::where('key', 'emmanuel_stat2_label')->value('value') ?? 'Board Positions',
            'emmanuel_stat3_value' => Content::where('key', 'emmanuel_stat3_value')->value('value') ?? '2015',
            'emmanuel_stat3_label' => Content::where('key', 'emmanuel_stat3_label')->value('value') ?? 'Independent Director Since',

            // Biography Sections
            'emmanuel_bio_section1_title' => Content::where('key', 'emmanuel_bio_section1_title')->value('value') ?? 'Foundation Years at SGV & Co.',
            'emmanuel_bio_section1_content' => Content::where('key', 'emmanuel_bio_section1_content')->value('value') ?? 'Mr. Emmanuel Y. Mendoza commenced his distinguished career with a decade of service at SyCip, Gorres, Velayo & Co (SGV & Co.), the Philippines\' premier accounting firm.',
            'emmanuel_bio_section2_title' => Content::where('key', 'emmanuel_bio_section2_title')->value('value') ?? 'Executive Banking Leadership',
            'emmanuel_bio_section2_content' => Content::where('key', 'emmanuel_bio_section2_content')->value('value') ?? 'Transitioning into the complex world of banking operations, Mr. Mendoza served as First Vice President and Financial Controller of Global Business Bank.',
            'emmanuel_bio_section3_title' => Content::where('key', 'emmanuel_bio_section3_title')->value('value') ?? 'Current Leadership & Governance',
            'emmanuel_bio_section3_content' => Content::where('key', 'emmanuel_bio_section3_content')->value('value') ?? 'Mr. Mendoza\'s influence extends significantly into corporate governance as an Independent Director.',

            // Education
            'emmanuel_education1_degree' => Content::where('key', 'emmanuel_education1_degree')->value('value') ?? 'Master\'s in Management',
            'emmanuel_education1_institution' => Content::where('key', 'emmanuel_education1_institution')->value('value') ?? 'Asian Institute of Management',
            'emmanuel_education2_degree' => Content::where('key', 'emmanuel_education2_degree')->value('value') ?? 'Bachelor in Business Administration',
            'emmanuel_education2_institution' => Content::where('key', 'emmanuel_education2_institution')->value('value') ?? 'Accountancy • University of the Philippines',

            // Professional Affiliations
            'emmanuel_affiliation1_name' => Content::where('key', 'emmanuel_affiliation1_name')->value('value') ?? 'Board of Accountancy',
            'emmanuel_affiliation1_description' => Content::where('key', 'emmanuel_affiliation1_description')->value('value') ?? 'Professional Regulatory Board',
            'emmanuel_affiliation2_name' => Content::where('key', 'emmanuel_affiliation2_name')->value('value') ?? 'Securities and Exchange Commission',
            'emmanuel_affiliation2_description' => Content::where('key', 'emmanuel_affiliation2_description')->value('value') ?? 'Capital Markets Regulator',
            'emmanuel_affiliation3_name' => Content::where('key', 'emmanuel_affiliation3_name')->value('value') ?? 'Bureau of Internal Revenue',
            'emmanuel_affiliation3_description' => Content::where('key', 'emmanuel_affiliation3_description')->value('value') ?? 'Tax Administration Authority',
            'emmanuel_affiliation4_name' => Content::where('key', 'emmanuel_affiliation4_name')->value('value') ?? 'Insurance Commission',
            'emmanuel_affiliation4_description' => Content::where('key', 'emmanuel_affiliation4_description')->value('value') ?? 'Insurance Industry Regulator',

            // NEW: Accreditation
            'emmanuel_accreditation1_name' => Content::where('key', 'emmanuel_accreditation1_name')->value('value') ?? 'PICPA',
            'emmanuel_accreditation1_description' => Content::where('key', 'emmanuel_accreditation1_description')->value('value') ?? 'Philippine Institute of Certified Public Accountants',

            // Quote/Philosophy
            'emmanuel_quote' => Content::where('key', 'emmanuel_quote')->value('value') ?? 'Excellence in professional practice comes from the intersection of technical expertise, ethical leadership, and unwavering commitment to client success.',
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

            // NEW: Accreditation
            'emmanuel_accreditation1_name' => 'required|string|max:255',
            'emmanuel_accreditation1_description' => 'required|string|max:255',

            // Quote/Philosophy
            'emmanuel_quote' => 'required|string',
        ]);

        $hasChanged = false;

        // Handle text fields (including new accreditation fields)
        $textFields = [
            'emmanuel_full_name', 'emmanuel_position', 'emmanuel_email', 'emmanuel_company',
            'emmanuel_stat1_value', 'emmanuel_stat1_label', 'emmanuel_stat2_value', 'emmanuel_stat2_label',
            'emmanuel_stat3_value', 'emmanuel_stat3_label', 'emmanuel_bio_section1_title', 'emmanuel_bio_section1_content',
            'emmanuel_bio_section2_title', 'emmanuel_bio_section2_content', 'emmanuel_bio_section3_title', 'emmanuel_bio_section3_content',
            'emmanuel_education1_degree', 'emmanuel_education1_institution', 'emmanuel_education2_degree', 'emmanuel_education2_institution',
            'emmanuel_affiliation1_name', 'emmanuel_affiliation1_description', 'emmanuel_affiliation2_name', 'emmanuel_affiliation2_description',
            'emmanuel_affiliation3_name', 'emmanuel_affiliation3_description', 'emmanuel_affiliation4_name', 'emmanuel_affiliation4_description',
            // NEW: Accreditation fields
            'emmanuel_accreditation1_name', 'emmanuel_accreditation1_description',
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
