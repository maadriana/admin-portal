<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutContentSeeder extends Seeder
{
    public function run()
    {
        $historyContent = [
            // Hero Section
            [
                'key' => 'history_hero_title',
                'value' => 'Our<br><span style="font-weight: 600; color: #326D78;">Journey</span>',
            ],
            [
                'key' => 'history_hero_subtitle',
                'value' => 'From humble beginnings to global recognition - building a legacy of trust and excellence since 2002.',
            ],
            [
                'key' => 'history_established_year',
                'value' => '2002',
            ],
            [
                'key' => 'history_mtc_year',
                'value' => '2023',
            ],
            [
                'key' => 'history_agn_year',
                'value' => '2024',
            ],
            [
                'key' => 'history_circular_quote',
                'value' => '"Passion for Excellence"',
            ],

            // Timeline Section
            [
                'key' => 'history_timeline_badge',
                'value' => 'Our Journey',
            ],
            [
                'key' => 'history_timeline_title',
                'value' => 'Building a <span style="font-weight: 600; color: #326D78;">Legacy</span>',
            ],

            // Timeline Events
            [
                'key' => 'history_year_2002',
                'value' => '2002',
            ],
            [
                'key' => 'history_2002_title',
                'value' => 'The Foundation',
            ],
            [
                'key' => 'history_2002_description',
                'value' => 'Emmanuel Y. Mendoza founded Mendoza Querido & Co. (MQC), establishing a reputation for unwavering dedication, precision, and integrity in audit and accounting services.',
            ],
            [
                'key' => 'history_year_2023',
                'value' => 'December 2023',
            ],
            [
                'key' => 'history_2023_title',
                'value' => 'MTC is Born',
            ],
            [
                'key' => 'history_2023_description',
                'value' => 'Mendoza Tugano & Co., CPAs (MTC) was established, carrying forward the proud legacy of MQC. Representing not only continuity but also the elevation of core values and commitment to excellence.',
            ],
            [
                'key' => 'history_year_2024',
                'value' => '2024',
            ],
            [
                'key' => 'history_2024_title',
                'value' => 'Global Recognition',
            ],
            [
                'key' => 'history_2024_description',
                'value' => 'MTC was admitted as a member of AGN International, a worldwide association of independent accounting and advisory businesses serving clients globally for over 40 years.',
            ],
            [
                'key' => 'history_year_present',
                'value' => 'Present Day',
            ],
            [
                'key' => 'history_present_title',
                'value' => 'Continuing Excellence',
            ],
            [
                'key' => 'history_present_description',
                'value' => 'Today, MTC stands at the crossroads of tradition and innovation, leveraging advanced tools while staying true to timeless values that our clients have always relied on.',
            ],

            // Legacy Section
            [
                'key' => 'history_legacy_badge',
                'value' => 'Our Legacy',
            ],
            [
                'key' => 'history_legacy_title',
                'value' => 'Building on <span style="font-weight: 600; color: #326D78;">Strong Foundations</span>',
            ],
            [
                'key' => 'history_legacy_paragraph1',
                'value' => 'Mendoza Tugano & Co., CPAs (MTC) was established in December 2023, carrying forward the proud legacy of Mendoza Querido & Co. (MQC). Founded in 2002 by Emmanuel Y. Mendoza, a respected audit and accounting professional, MQC built a reputation for unwavering dedication, precision, and integrity—principles that continue to define MTC today.',
            ],
            [
                'key' => 'history_legacy_paragraph2',
                'value' => 'Building on this strong foundation, MTC represents not only continuity but also the elevation of these core values. We are driven by the same commitment to excellence and trusted client relationships that have distinguished our firm\'s heritage for nearly two decades.',
            ],
            [
                'key' => 'history_legacy_paragraph3',
                'value' => 'With a team of highly experienced professionals who share a passion for delivering precise, ethical, and personalized financial solutions, MTC stands at the crossroads of tradition and innovation. We leverage advanced tools and methodologies while staying true to the timeless values that our clients have always relied on.',
            ],

            // Legacy Cards
            [
                'key' => 'history_agn_card_title',
                'value' => 'AGN International Member',
            ],
            [
                'key' => 'history_agn_card_description',
                'value' => 'In 2024, MTC was admitted as a member of AGN International, a worldwide association of separate and independent accounting and advisory businesses that has been providing services across the globe for over 40 years.',
            ],
            [
                'key' => 'history_memberships_card_title',
                'value' => 'Professional Memberships',
            ],
            [
                'key' => 'history_memberships_card_description',
                'value' => 'MTC and its partners are active members of PICPA, TMAP, and ACPAPP. MTC is also duly accredited by the Board of Accountancy, Bureau of Internal Revenue, and the Insurance Commission.',
            ],
            [
                'key' => 'history_passion_card_title',
                'value' => 'Our Promise',
            ],
            [
                'key' => 'history_passion_card_description',
                'value' => 'At MTC, "Passion for Excellence" is more than a motto—it is our unwavering promise to every client and partner. As we embrace the opportunities of the digital age, we remain firmly grounded in the values that define us.',
            ],

            // Future Vision Section
            [
                'key' => 'history_future_badge',
                'value' => 'Looking Forward',
            ],
            [
                'key' => 'history_future_title',
                'value' => 'Building Tomorrow\'s <span style="font-weight: 600; color: #326D78;">Success</span>',
            ],
            [
                'key' => 'history_future_section_title',
                'value' => 'Your Trusted Partner',
            ],
            [
                'key' => 'history_future_paragraph1',
                'value' => 'With MTC, you gain a trusted partner invested in your long-term progress and prosperity. Together, we look forward to building a future where your aspirations are realized, your potential is maximized, and our legacy of excellence continues to flourish for generations to come.',
            ],
            [
                'key' => 'history_future_paragraph2',
                'value' => 'At MTC, we embrace the opportunities of the digital age with the same unwavering commitment to client success. With Mendoza Tugano & Co., CPAs, we look forward to creating a future where our clients\' financial aspirations are not only realized but exceeded, ensuring that our legacy of excellence continues to thrive for generations to come.',
            ],
            [
                'key' => 'history_cta_text',
                'value' => 'Partner With Us Today',
            ],

            // About Legacy Section
            [
                'key' => 'history_about_badge',
                'value' => 'About Us',
            ],
            [
                'key' => 'history_about_title',
                'value' => 'Preserving a Legacy of <span style="font-weight: 600; color: #326D78;">Excellence</span>',
            ],
            [
                'key' => 'history_about_paragraph1',
                'value' => 'Emmanuel Y. Mendoza, a seasoned audit and accounting practitioner, redefined the landscape of audit and accounting services. With Mendoza Querido & Co., he founded an institution that upheld unwavering dedication, precision, and integrity, earning a reputation as an industry luminary. Building on the legacy of Mendoza Querido & Co., Mendoza Tugano & Co., CPAs, emerged — a firm that seamlessly carries forward the same principles of excellence.',
            ],
            [
                'key' => 'history_about_paragraph2',
                'value' => 'Mendoza Tugano & Co., CPAs, represents not just continuity but an elevation of the principles that have defined the legacy of Mendoza Querido & Co. Our commitment to delivering precise, ethical, and personalized financial solutions mirrors the trust and reliability that clients have come to expect from our lineage. With a seasoned team of professionals who share the same vision, we stand at the intersection of tradition and innovation, ready to provide cutting-edge audit and accounting services.',
            ],
            [
                'key' => 'history_about_paragraph3',
                'value' => 'At Mendoza Tugano & Co., CPAs, "Passion for Excellence" is not merely a motto — it\'s a pledge rooted in a heritage of trust and dedication. As we embrace the opportunities of the digital age, we do so with the same unwavering commitment to client success. With Mendoza Tugano & Co., CPAs, we look forward to creating a future where our clients\' financial aspirations are not only realized but exceeded, ensuring that our legacy of excellence continues to thrive for generations to come.',
            ],

            // Vision & Mission Section
            [
                'key' => 'history_vision_mission_badge',
                'value' => 'Vision & Mission',
            ],
            [
                'key' => 'history_vision_mission_title',
                'value' => 'Our <span style="font-weight: 700; color: #326D78;">Direction</span>',
            ],
            [
                'key' => 'history_vision_badge',
                'value' => 'Vision Statement',
            ],
            [
                'key' => 'history_vision_text',
                'value' => 'To stand as the forefront in audit and accounting services, renowned for our unwavering commitment to "Passion for Excellence". We envisage a future where our commitment to trust, precision, and innovation not only shapes today\'s financial landscape but ensures our relevance and resiliency for generations to come.',
            ],
            [
                'key' => 'history_mission_badge',
                'value' => 'Mission Statement',
            ],
            [
                'key' => 'history_mission_text',
                'value' => 'At Mendoza Tugano & Co., CPAs, our mission is to deliver unmatched audit and accounting services, grounded in our unwavering "Passion for Excellence". We aim to redefine industry standards by consistently providing precision and trust. Through personalized, client-centric solutions and a firm commitment to ethical practices, we empower our clients to navigate the ever-evolving business landscape with confidence. Our steadfast dedication to "Passion for Excellence" propels us to remain at the forefront of our field, ensuring our enduring relevance as we contribute positively to our clients and communities, regardless of the changes that may come our way.',
            ],

            // Values Section
            [
                'key' => 'history_values_badge',
                'value' => 'Our Values',
            ],
            [
                'key' => 'history_values_title',
                'value' => 'What We <span style="font-weight: 600; color: #326D78;">Stand For</span>',
            ],

            // Core Values
            [
                'key' => 'history_value_excellence_title',
                'value' => 'Excellence',
            ],
            [
                'key' => 'history_value_excellence_desc',
                'value' => 'We are committed to achieving the highest standards of excellence in all our services and operations, reflecting our dedication to precision and professionalism.',
            ],
            [
                'key' => 'history_value_integrity_title',
                'value' => 'Integrity',
            ],
            [
                'key' => 'history_value_integrity_desc',
                'value' => 'Integrity is the cornerstone of our practice. We uphold the highest ethical standards, ensuring transparency, honesty, and accountability in all our interactions.',
            ],
            [
                'key' => 'history_value_innovation_title',
                'value' => 'Innovation',
            ],
            [
                'key' => 'history_value_innovation_desc',
                'value' => 'We embrace innovation and continuous improvement, staying at the forefront of industry advancements to provide cutting-edge audit and accounting services.',
            ],
            [
                'key' => 'history_value_development_title',
                'value' => 'Professional Development',
            ],
            [
                'key' => 'history_value_development_desc',
                'value' => 'We invest in the growth and development of our team, fostering a culture of continuous learning and expertise.',
            ],
            [
                'key' => 'history_value_teamwork_title',
                'value' => 'Teamwork',
            ],
            [
                'key' => 'history_value_teamwork_desc',
                'value' => 'We believe in the power of collaboration and teamwork. We recognize that our collective efforts are greater than individual contributions, and we actively foster a collaborative spirit among our team members to achieve our shared goals.',
            ],
            [
                'key' => 'history_value_care_title',
                'value' => 'Care for Employees',
            ],
            [
                'key' => 'history_value_care_desc',
                'value' => 'We value the well-being of our employees and create a supportive, inclusive, and nurturing work environment that promotes their physical and emotional health, growth, and job satisfaction.',
            ],
            [
                'key' => 'history_value_community_title',
                'value' => 'Community Engagement',
            ],
            [
                'key' => 'history_value_community_desc',
                'value' => 'We actively engage with and contribute to the communities we serve, recognizing our responsibility to make a positive impact beyond business operations.',
            ],
        ];

        foreach ($historyContent as $content) {
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
