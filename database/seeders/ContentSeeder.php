<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('contents')->insert([
            // Hero Section
            [
                'key' => 'hero_title',
                'value' => 'Welcome to <span>Mendoza Tugano & Co., CPAs</span>',
            ],
            [
                'key' => 'hero_subtitle',
                'value' => 'Preserving a legacy of excellence',
            ],
            [
                'key' => 'hero_button',
                'value' => 'Connect with us',
            ],

            // About Section
            [
                'key' => 'about_section_title',
                'value' => '<span>Find Out More</span> <span class="description-title">About Us</span>',
            ],
            [
                'key' => 'about_text',
                'value' => 'At Mendoza Tugano &amp; Co., CPAs, "Passion for Excellence" is not merely a motto — it\'s a pledge rooted in a heritage of trust and dedication. As we embrace the opportunities of the digital age, we do so with the same unwavering commitment to client success. With Mendoza Tugano &amp; Co., CPAs, we look forward to creating a future where our clients\' financial aspirations are not only realized but exceeded, ensuring that our legacy of excellence continues to thrive for generations to come.',
            ],
            [
                'key' => 'about_button_text',
                'value' => 'Learn More',
            ],
            [
                'key' => 'about_image',
                'value' => '', // Will be populated if user uploads image
            ],
        ]);
    }
}
