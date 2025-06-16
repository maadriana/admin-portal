<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class FooterContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.footer.preview');
    }

    public function preview()
    {
        $sections = [
            // Company Information
            'footer_logo' => 'Footer Logo',
            'footer_address_line1' => 'Address Line 1',
            'footer_address_line2' => 'Address Line 2',
            'footer_address_line3' => 'Address Line 3',
            'footer_address_line4' => 'Address Line 4',
            'footer_address_line5' => 'Address Line 5',
            'footer_phone' => 'Phone Number',
            'footer_email' => 'Email Address',

            // Useful Links Section
            'footer_useful_links_title' => 'Useful Links Title',
            'footer_link1_text' => 'Link 1 Text',
            'footer_link2_text' => 'Link 2 Text',
            'footer_link3_text' => 'Link 3 Text',
            'footer_link4_text' => 'Link 4 Text',

            // Services Section
            'footer_services_title' => 'Services Section Title',
            'footer_service1_text' => 'Service 1 Text',
            'footer_service2_text' => 'Service 2 Text',
            'footer_service3_text' => 'Service 3 Text',
            'footer_service4_text' => 'Service 4 Text',
            'footer_service5_text' => 'Service 5 Text',
            'footer_service6_text' => 'Service 6 Text',
            'footer_service7_text' => 'Service 7 Text',
            'footer_service8_text' => 'Service 8 Text',

            // Contact Section
            'footer_contact_title' => 'Contact Section Title',
            'footer_contact_description' => 'Contact Description',

            // Social Media
            'footer_social_twitter' => 'Twitter URL',
            'footer_social_facebook' => 'Facebook URL',
            'footer_social_instagram' => 'Instagram URL',
            'footer_social_linkedin' => 'LinkedIn URL',

            // Copyright Section
            'footer_copyright_text' => 'Copyright Text',
            'footer_company_name' => 'Company Name',
            'footer_rights_text' => 'Rights Text',
            'footer_credits_text' => 'Credits Text',
            'footer_credits_link' => 'Credits Link URL',
            'footer_credits_name' => 'Credits Name',
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

        return view('pages.footer', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Company Information
            'footer_logo' => Content::where('key', 'footer_logo')->first(),
            'footer_address_line1' => Content::where('key', 'footer_address_line1')->value('value'),
            'footer_address_line2' => Content::where('key', 'footer_address_line2')->value('value'),
            'footer_address_line3' => Content::where('key', 'footer_address_line3')->value('value'),
            'footer_address_line4' => Content::where('key', 'footer_address_line4')->value('value'),
            'footer_address_line5' => Content::where('key', 'footer_address_line5')->value('value'),
            'footer_phone' => Content::where('key', 'footer_phone')->value('value'),
            'footer_email' => Content::where('key', 'footer_email')->value('value'),

            // Useful Links Section
            'footer_useful_links_title' => Content::where('key', 'footer_useful_links_title')->value('value'),
            'footer_link1_text' => Content::where('key', 'footer_link1_text')->value('value'),
            'footer_link2_text' => Content::where('key', 'footer_link2_text')->value('value'),
            'footer_link3_text' => Content::where('key', 'footer_link3_text')->value('value'),
            'footer_link4_text' => Content::where('key', 'footer_link4_text')->value('value'),

            // Services Section
            'footer_services_title' => Content::where('key', 'footer_services_title')->value('value'),
            'footer_service1_text' => Content::where('key', 'footer_service1_text')->value('value'),
            'footer_service2_text' => Content::where('key', 'footer_service2_text')->value('value'),
            'footer_service3_text' => Content::where('key', 'footer_service3_text')->value('value'),
            'footer_service4_text' => Content::where('key', 'footer_service4_text')->value('value'),
            'footer_service5_text' => Content::where('key', 'footer_service5_text')->value('value'),
            'footer_service6_text' => Content::where('key', 'footer_service6_text')->value('value'),
            'footer_service7_text' => Content::where('key', 'footer_service7_text')->value('value'),
            'footer_service8_text' => Content::where('key', 'footer_service8_text')->value('value'),

            // Contact Section
            'footer_contact_title' => Content::where('key', 'footer_contact_title')->value('value'),
            'footer_contact_description' => Content::where('key', 'footer_contact_description')->value('value'),

            // Social Media
            'footer_social_twitter' => Content::where('key', 'footer_social_twitter')->value('value'),
            'footer_social_facebook' => Content::where('key', 'footer_social_facebook')->value('value'),
            'footer_social_instagram' => Content::where('key', 'footer_social_instagram')->value('value'),
            'footer_social_linkedin' => Content::where('key', 'footer_social_linkedin')->value('value'),

            // Copyright Section
            'footer_copyright_text' => Content::where('key', 'footer_copyright_text')->value('value'),
            'footer_company_name' => Content::where('key', 'footer_company_name')->value('value'),
            'footer_rights_text' => Content::where('key', 'footer_rights_text')->value('value'),
            'footer_credits_text' => Content::where('key', 'footer_credits_text')->value('value'),
            'footer_credits_link' => Content::where('key', 'footer_credits_link')->value('value'),
            'footer_credits_name' => Content::where('key', 'footer_credits_name')->value('value'),
        ];

        return view('pages.footer.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Company Information
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_address_line1' => 'nullable|string|max:255',
            'footer_address_line2' => 'nullable|string|max:255',
            'footer_address_line3' => 'nullable|string|max:255',
            'footer_address_line4' => 'nullable|string|max:255',
            'footer_address_line5' => 'nullable|string|max:255',
            'footer_phone' => 'required|string|max:255',
            'footer_email' => 'required|email|max:255',
            'remove_footer_logo' => 'nullable|boolean',

            // Useful Links Section
            'footer_useful_links_title' => 'required|string|max:255',
            'footer_link1_text' => 'required|string|max:255',
            'footer_link2_text' => 'required|string|max:255',
            'footer_link3_text' => 'required|string|max:255',
            'footer_link4_text' => 'required|string|max:255',

            // Services Section
            'footer_services_title' => 'required|string|max:255',
            'footer_service1_text' => 'required|string|max:255',
            'footer_service2_text' => 'required|string|max:255',
            'footer_service3_text' => 'required|string|max:255',
            'footer_service4_text' => 'required|string|max:255',
            'footer_service5_text' => 'required|string|max:255',
            'footer_service6_text' => 'required|string|max:255',
            'footer_service7_text' => 'required|string|max:255',
            'footer_service8_text' => 'required|string|max:255',

            // Contact Section
            'footer_contact_title' => 'required|string|max:255',
            'footer_contact_description' => 'required|string',

            // Social Media
            'footer_social_twitter' => 'nullable|url',
            'footer_social_facebook' => 'nullable|url',
            'footer_social_instagram' => 'nullable|url',
            'footer_social_linkedin' => 'nullable|url',

            // Copyright Section
            'footer_copyright_text' => 'required|string|max:255',
            'footer_company_name' => 'required|string|max:255',
            'footer_rights_text' => 'required|string|max:255',
            'footer_credits_text' => 'required|string|max:255',
            'footer_credits_link' => 'nullable|url',
            'footer_credits_name' => 'required|string|max:255',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'footer_address_line1', 'footer_address_line2', 'footer_address_line3',
            'footer_address_line4', 'footer_address_line5', 'footer_phone', 'footer_email',
            'footer_useful_links_title', 'footer_link1_text', 'footer_link2_text',
            'footer_link3_text', 'footer_link4_text', 'footer_services_title',
            'footer_service1_text', 'footer_service2_text', 'footer_service3_text',
            'footer_service4_text', 'footer_service5_text', 'footer_service6_text',
            'footer_service7_text', 'footer_service8_text', 'footer_contact_title',
            'footer_contact_description', 'footer_social_twitter', 'footer_social_facebook',
            'footer_social_instagram', 'footer_social_linkedin', 'footer_copyright_text',
            'footer_company_name', 'footer_rights_text', 'footer_credits_text',
            'footer_credits_link', 'footer_credits_name'
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
        if ($request->has('remove_footer_logo') && $request->remove_footer_logo) {
            $existing = Content::where('key', 'footer_logo')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null;
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle logo upload
        if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $binaryData = file_get_contents($file);
            $filename = 'footer_logo_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'footer_logo')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename;
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'footer_logo',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }
            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.footer.preview')->with('success', 'Footer updated successfully!')
            : redirect()->route('admin.footer.preview');
    }
}
