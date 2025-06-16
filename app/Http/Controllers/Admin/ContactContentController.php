<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class ContactContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.contact.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'contact_main_title' => 'Contact Main Title',
            'contact_subtitle' => 'Contact Subtitle',

            // Contact Information
            'contact_address_title' => 'Address Title',
            'contact_address_line1' => 'Address Line 1',
            'contact_address_line2' => 'Address Line 2',
            'contact_address_line3' => 'Address Line 3',
            'contact_address_line4' => 'Address Line 4',
            'contact_address_line5' => 'Address Line 5',

            'contact_phone_title' => 'Phone Title',
            'contact_phone_number' => 'Phone Number',

            'contact_email_title' => 'Email Title',
            'contact_email_address' => 'Email Address',

            // Map Settings
            'contact_map_embed_url' => 'Google Maps Embed URL',

            // Form Labels
            'contact_form_name_label' => 'Name Field Label',
            'contact_form_email_label' => 'Email Field Label',
            'contact_form_subject_label' => 'Subject Field Label',
            'contact_form_message_label' => 'Message Field Label',
            'contact_form_button_text' => 'Submit Button Text',

            // Success/Error Messages
            'contact_success_message' => 'Success Message',
            'contact_error_message' => 'Error Message',
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

        return view('pages.contact', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'contact_main_title' => Content::where('key', 'contact_main_title')->value('value'),
            'contact_subtitle' => Content::where('key', 'contact_subtitle')->value('value'),

            // Contact Information
            'contact_address_title' => Content::where('key', 'contact_address_title')->value('value'),
            'contact_address_line1' => Content::where('key', 'contact_address_line1')->value('value'),
            'contact_address_line2' => Content::where('key', 'contact_address_line2')->value('value'),
            'contact_address_line3' => Content::where('key', 'contact_address_line3')->value('value'),
            'contact_address_line4' => Content::where('key', 'contact_address_line4')->value('value'),
            'contact_address_line5' => Content::where('key', 'contact_address_line5')->value('value'),

            'contact_phone_title' => Content::where('key', 'contact_phone_title')->value('value'),
            'contact_phone_number' => Content::where('key', 'contact_phone_number')->value('value'),

            'contact_email_title' => Content::where('key', 'contact_email_title')->value('value'),
            'contact_email_address' => Content::where('key', 'contact_email_address')->value('value'),

            // Map Settings
            'contact_map_embed_url' => Content::where('key', 'contact_map_embed_url')->value('value'),

            // Form Labels
            'contact_form_name_label' => Content::where('key', 'contact_form_name_label')->value('value'),
            'contact_form_email_label' => Content::where('key', 'contact_form_email_label')->value('value'),
            'contact_form_subject_label' => Content::where('key', 'contact_form_subject_label')->value('value'),
            'contact_form_message_label' => Content::where('key', 'contact_form_message_label')->value('value'),
            'contact_form_button_text' => Content::where('key', 'contact_form_button_text')->value('value'),

            // Success/Error Messages
            'contact_success_message' => Content::where('key', 'contact_success_message')->value('value'),
            'contact_error_message' => Content::where('key', 'contact_error_message')->value('value'),
        ];

        return view('pages.contact.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'contact_main_title' => 'required|string|max:255',
            'contact_subtitle' => 'required|string|max:500',

            // Contact Information
            'contact_address_title' => 'required|string|max:255',
            'contact_address_line1' => 'nullable|string|max:255',
            'contact_address_line2' => 'nullable|string|max:255',
            'contact_address_line3' => 'nullable|string|max:255',
            'contact_address_line4' => 'nullable|string|max:255',
            'contact_address_line5' => 'nullable|string|max:255',

            'contact_phone_title' => 'required|string|max:255',
            'contact_phone_number' => 'required|string|max:255',

            'contact_email_title' => 'required|string|max:255',
            'contact_email_address' => 'required|email|max:255',

            // Map Settings
            'contact_map_embed_url' => 'required|url',

            // Form Labels
            'contact_form_name_label' => 'required|string|max:255',
            'contact_form_email_label' => 'required|string|max:255',
            'contact_form_subject_label' => 'required|string|max:255',
            'contact_form_message_label' => 'required|string|max:255',
            'contact_form_button_text' => 'required|string|max:255',

            // Success/Error Messages
            'contact_success_message' => 'required|string',
            'contact_error_message' => 'required|string',
        ]);

        $hasChanged = false;

        // Get all field keys
        $fields = [
            'contact_main_title', 'contact_subtitle',
            'contact_address_title', 'contact_address_line1', 'contact_address_line2',
            'contact_address_line3', 'contact_address_line4', 'contact_address_line5',
            'contact_phone_title', 'contact_phone_number',
            'contact_email_title', 'contact_email_address',
            'contact_map_embed_url',
            'contact_form_name_label', 'contact_form_email_label',
            'contact_form_subject_label', 'contact_form_message_label',
            'contact_form_button_text',
            'contact_success_message', 'contact_error_message'
        ];

        // Update each field
        foreach ($fields as $key) {
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

        return $hasChanged
            ? redirect()->route('admin.contact.preview')->with('success', 'Contact page updated successfully!')
            : redirect()->route('admin.contact.preview');
    }
}
