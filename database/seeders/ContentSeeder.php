<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('contents')->insert([
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
            [
                'key' => 'about_text',
                'value' => 'At Mendoza Tugano &amp; Co., CPAs, "Passion for Excellence" is not merely a motto — it\'s a pledge rooted in a heritage of trust and dedication. As we embrace the opportunities of the digital age, we do so with the same unwavering commitment to client success. With Mendoza Tugano &amp; Co., CPAs, we look forward to creating a future where our clients\' financial aspirations are not only realized but exceeded, ensuring that our legacy of excellence continues to thrive for generations to come.',
            ],
            [
                'key' => 'about_image',
                'value' => 'assets/img/about.jpg', // path to the current image
            ],
        ]);
    }
}
