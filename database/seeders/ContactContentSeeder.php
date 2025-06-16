<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactContentSeeder extends Seeder
{
    public function run()
    {
        $contactContent = [
            // Header Section
            [
                'key' => 'contact_main_title',
                'value' => 'Contact',
            ],
            [
                'key' => 'contact_subtitle',
                'value' => '<span>Need Help?</span> <span class="description-title">Contact Us</span>',
            ],

            // Address Information
            [
                'key' => 'contact_address_title',
                'value' => 'Address',
            ],
            [
                'key' => 'contact_address_line1',
                'value' => '16F The Salcedo Towers',
            ],
            [
                'key' => 'contact_address_line2',
                'value' => '169 H.V. de la Costa St.',
            ],
            [
                'key' => 'contact_address_line3',
                'value' => 'Salcedo Village',
            ],
            [
                'key' => 'contact_address_line4',
                'value' => 'Makati City 1227',
            ],
            [
                'key' => 'contact_address_line5',
                'value' => 'Philippines',
            ],

            // Phone Information
            [
                'key' => 'contact_phone_title',
                'value' => 'Call Us',
            ],
            [
                'key' => 'contact_phone_number',
                'value' => '+632 8887 1888',
            ],

            // Email Information
            [
                'key' => 'contact_email_title',
                'value' => 'Email Us',
            ],
            [
                'key' => 'contact_email_address',
                'value' => 'contact@mtco.com.ph',
            ],

            // Map Settings
            [
                'key' => 'contact_map_embed_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.018732062944!2d121.02433507509568!3d14.56086078591368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9e4f6db6c37%3A0xdffb3b5b3329e8c3!2sThe%20Salcedo%20Towers%2C%20169%20H.%20V.%20Dela%20Costa%2C%20Makati%2C%201220%20Metro%20Manila%2C%20Philippines!5e0!3m2!1sen!2sph!4v1716829892686!5m2!1sen!2sph',
            ],

            // Form Labels
            [
                'key' => 'contact_form_name_label',
                'value' => 'Your Name',
            ],
            [
                'key' => 'contact_form_email_label',
                'value' => 'Your Email',
            ],
            [
                'key' => 'contact_form_subject_label',
                'value' => 'Subject',
            ],
            [
                'key' => 'contact_form_message_label',
                'value' => 'Message',
            ],
            [
                'key' => 'contact_form_button_text',
                'value' => 'Send Message',
            ],

            // Success/Error Messages
            [
                'key' => 'contact_success_message',
                'value' => 'Thank you for your message! We will get back to you as soon as possible.',
            ],
            [
                'key' => 'contact_error_message',
                'value' => 'Sorry, there was an error sending your message. Please try again later or contact us directly.',
            ],
        ];

        foreach ($contactContent as $content) {
            DB::table('contents')->updateOrInsert(
                ['key' => $content['key']],
                [
                    'value' => $content['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
