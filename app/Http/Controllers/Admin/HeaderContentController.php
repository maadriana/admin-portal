<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class HeaderContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.header.preview');
    }

    public function preview()
    {
        $sections = [
            // Top Bar Contact Information
            'header_contact_email' => 'Contact Email',
            'header_contact_phone' => 'Contact Phone',

            // Social Media Links
            'header_social_twitter' => 'Twitter URL',
            'header_social_facebook' => 'Facebook URL',
            'header_social_instagram' => 'Instagram URL',
            'header_social_linkedin' => 'LinkedIn URL',

            // Logo
            'header_logo' => 'Company Logo',

            // Navigation Menu Items
            'nav_home_text' => 'Home Menu Text',
            'nav_services_text' => 'Services Menu Text',
            'nav_people_text' => 'People Menu Text',
            'nav_careers_text' => 'Careers Menu Text',
            'nav_international_text' => 'International Menu Text',
            'nav_contact_text' => 'Contact Menu Text',
            'nav_about_text' => 'About Menu Text',

            // Service Submenu Items
            'nav_service_audit' => 'Audit and Assurance Text',
            'nav_service_advisory' => 'Business Advisory Text',
            'nav_service_outsourcing' => 'Outsourcing Text',
            'nav_service_restructuring' => 'Business Restructuring Text',
            'nav_service_finance' => 'Corporate Finance Text',
            'nav_service_forensic' => 'Forensic Text',
            'nav_service_governance' => 'Governance Text',
            'nav_service_taxation' => 'Taxation Text',

            // Career Submenu Items
            'nav_career_vacancies' => 'Current Vacancies Text',
            'nav_career_professionals' => 'Experienced Professionals Text',
            'nav_career_graduate' => 'Graduate Text',
            'nav_career_internship' => 'Internship Opportunities Text',
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

        return view('pages.header', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Top Bar Contact Information
            'header_contact_email' => Content::where('key', 'header_contact_email')->value('value'),
            'header_contact_phone' => Content::where('key', 'header_contact_phone')->value('value'),

            // Social Media Links
            'header_social_twitter' => Content::where('key', 'header_social_twitter')->value('value'),
            'header_social_facebook' => Content::where('key', 'header_social_facebook')->value('value'),
            'header_social_instagram' => Content::where('key', 'header_social_instagram')->value('value'),
            'header_social_linkedin' => Content::where('key', 'header_social_linkedin')->value('value'),

            // Logo
            'header_logo' => Content::where('key', 'header_logo')->first(),

            // Navigation Menu Items
            'nav_home_text' => Content::where('key', 'nav_home_text')->value('value'),
            'nav_services_text' => Content::where('key', 'nav_services_text')->value('value'),
            'nav_people_text' => Content::where('key', 'nav_people_text')->value('value'),
            'nav_careers_text' => Content::where('key', 'nav_careers_text')->value('value'),
            'nav_international_text' => Content::where('key', 'nav_international_text')->value('value'),
            'nav_contact_text' => Content::where('key', 'nav_contact_text')->value('value'),
            'nav_about_text' => Content::where('key', 'nav_about_text')->value('value'),

            // Service Submenu Items
            'nav_service_audit' => Content::where('key', 'nav_service_audit')->value('value'),
            'nav_service_advisory' => Content::where('key', 'nav_service_advisory')->value('value'),
            'nav_service_outsourcing' => Content::where('key', 'nav_service_outsourcing')->value('value'),
            'nav_service_restructuring' => Content::where('key', 'nav_service_restructuring')->value('value'),
            'nav_service_finance' => Content::where('key', 'nav_service_finance')->value('value'),
            'nav_service_forensic' => Content::where('key', 'nav_service_forensic')->value('value'),
            'nav_service_governance' => Content::where('key', 'nav_service_governance')->value('value'),
            'nav_service_taxation' => Content::where('key', 'nav_service_taxation')->value('value'),

            // Career Submenu Items
            'nav_career_vacancies' => Content::where('key', 'nav_career_vacancies')->value('value'),
            'nav_career_professionals' => Content::where('key', 'nav_career_professionals')->value('value'),
            'nav_career_graduate' => Content::where('key', 'nav_career_graduate')->value('value'),
            'nav_career_internship' => Content::where('key', 'nav_career_internship')->value('value'),
        ];

        return view('pages.header.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Top Bar Contact Information
            'header_contact_email' => 'required|email|max:255',
            'header_contact_phone' => 'required|string|max:255',

            // Social Media Links
            'header_social_twitter' => 'nullable|url',
            'header_social_facebook' => 'nullable|url',
            'header_social_instagram' => 'nullable|url',
            'header_social_linkedin' => 'nullable|url',

            // Logo
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'remove_header_logo' => 'nullable|boolean',

            // Navigation Menu Items
            'nav_home_text' => 'required|string|max:50',
            'nav_services_text' => 'required|string|max:50',
            'nav_people_text' => 'required|string|max:50',
            'nav_careers_text' => 'required|string|max:50',
            'nav_international_text' => 'required|string|max:50',
            'nav_contact_text' => 'required|string|max:50',
            'nav_about_text' => 'required|string|max:50',

            // Service Submenu Items
            'nav_service_audit' => 'required|string|max:100',
            'nav_service_advisory' => 'required|string|max:100',
            'nav_service_outsourcing' => 'required|string|max:100',
            'nav_service_restructuring' => 'required|string|max:100',
            'nav_service_finance' => 'required|string|max:100',
            'nav_service_forensic' => 'required|string|max:100',
            'nav_service_governance' => 'required|string|max:100',
            'nav_service_taxation' => 'required|string|max:100',

            // Career Submenu Items
            'nav_career_vacancies' => 'required|string|max:100',
            'nav_career_professionals' => 'required|string|max:100',
            'nav_career_graduate' => 'required|string|max:100',
            'nav_career_internship' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'header_contact_email', 'header_contact_phone',
            'header_social_twitter', 'header_social_facebook', 'header_social_instagram', 'header_social_linkedin',
            'nav_home_text', 'nav_services_text', 'nav_people_text', 'nav_careers_text',
            'nav_international_text', 'nav_contact_text', 'nav_about_text',
            'nav_service_audit', 'nav_service_advisory', 'nav_service_outsourcing', 'nav_service_restructuring',
            'nav_service_finance', 'nav_service_forensic', 'nav_service_governance', 'nav_service_taxation',
            'nav_career_vacancies', 'nav_career_professionals', 'nav_career_graduate', 'nav_career_internship'
        ];

        foreach ($textFields as $key) {
            $newValue = $request->input($key) ?? '';
            $existing = Content::where('key', $key)->first();

            if (!$existing || $existing->value !== $newValue) {
                Content::updateOrCreate(
                    ['key' => $key],
                    ['value' => $newValue, 'updated_by' => Auth::id()]
                );
                $hasChanged = true;
            }
        }

        // Handle logo removal
        if ($request->has('remove_header_logo') && $request->remove_header_logo) {
            $existing = Content::where('key', 'header_logo')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle logo upload
        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $binaryData = file_get_contents($file);
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'header_logo')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'header_logo',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }
            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.header.preview')->with('success', 'Header updated successfully!')
            : redirect()->route('admin.header.preview');
    }
}
