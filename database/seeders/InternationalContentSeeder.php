<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternationalContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('contents')->insert([
            // Hero Section
            [
                'key' => 'international_hero_subtitle',
                'value' => 'Through strategic international partnerships and deep cross-border expertise, we empower Philippine businesses to thrive in global markets with confidence and precision.',
            ],
            [
                'key' => 'international_trust_indicator1',
                'value' => '25+ Countries',
            ],
            [
                'key' => 'international_trust_indicator2',
                'value' => '150+ Global Clients',
            ],
            [
                'key' => 'international_hub_title',
                'value' => 'Philippines Hub',
            ],
            [
                'key' => 'international_hub_subtitle',
                'value' => 'Your Gateway to Global Markets',
            ],

            // Expertise Section
            [
                'key' => 'expertise_title',
                'value' => 'Cross-Border Excellence in Every Transaction',
            ],
            [
                'key' => 'expertise_description',
                'value' => 'Our deep understanding of international markets, regulatory frameworks, and cultural nuances positions us as your trusted partner in global business expansion.',
            ],
            [
                'key' => 'expertise_card1_title',
                'value' => 'Regulatory Compliance',
            ],
            [
                'key' => 'expertise_card1_description',
                'value' => 'Navigate complex international regulations with confidence through our comprehensive compliance frameworks and local market insights.',
            ],
            [
                'key' => 'expertise_card2_title',
                'value' => 'Tax Optimization',
            ],
            [
                'key' => 'expertise_card2_description',
                'value' => 'Maximize tax efficiency across multiple jurisdictions through strategic planning and advanced transfer pricing methodologies.',
            ],
            [
                'key' => 'expertise_card3_title',
                'value' => 'Market Entry Strategy',
            ],
            [
                'key' => 'expertise_card3_description',
                'value' => 'Strategic guidance for entering new markets with comprehensive feasibility studies and localization strategies.',
            ],
            [
                'key' => 'expertise_card4_title',
                'value' => 'Global Partnerships',
            ],
            [
                'key' => 'expertise_card4_description',
                'value' => 'Access our extensive network of international partners for seamless service delivery across all major business jurisdictions.',
            ],

            // Services Section
            [
                'key' => 'services_title',
                'value' => 'International Business Services',
            ],
            [
                'key' => 'services_description',
                'value' => 'From cross-border transactions to global compliance, we provide end-to-end solutions that enable your business to operate seamlessly across international markets.',
            ],
            [
                'key' => 'timeline_service1_title',
                'value' => 'Cross-Border Tax Advisory',
            ],
            [
                'key' => 'timeline_service1_description',
                'value' => 'Navigate international tax complexities with expert guidance on transfer pricing, treaty optimization, and multi-jurisdictional compliance strategies.',
            ],
            [
                'key' => 'timeline_service2_title',
                'value' => 'Global Financial Reporting',
            ],
            [
                'key' => 'timeline_service2_description',
                'value' => 'Ensure seamless compliance with IFRS and local GAAP requirements across multiple jurisdictions through our specialized reporting expertise.',
            ],
            [
                'key' => 'timeline_service3_title',
                'value' => 'International Business Setup',
            ],
            [
                'key' => 'timeline_service3_description',
                'value' => 'Comprehensive support for international entity formation, licensing, and regulatory compliance to establish your global presence.',
            ],
            [
                'key' => 'timeline_service4_title',
                'value' => 'M&A Advisory Services',
            ],
            [
                'key' => 'timeline_service4_description',
                'value' => 'Expert guidance for cross-border mergers and acquisitions, including due diligence, valuation, and post-transaction integration support.',
            ],

            // Global Network Section
            [
                'key' => 'network_title',
                'value' => 'Trusted Partners Across Continents',
            ],
            [
                'key' => 'network_description',
                'value' => 'Our strategic partnerships with leading international firms create a seamless global network, ensuring consistent quality and local expertise wherever your business operates.',
            ],
            [
                'key' => 'benefit1_title',
                'value' => 'Consistent Global Standards',
            ],
            [
                'key' => 'benefit1_description',
                'value' => 'Unified quality protocols across all partner jurisdictions',
            ],
            [
                'key' => 'benefit2_title',
                'value' => 'Local Market Intelligence',
            ],
            [
                'key' => 'benefit2_description',
                'value' => 'Deep regional insights from our local partner networks',
            ],
            [
                'key' => 'benefit3_title',
                'value' => 'Seamless Coordination',
            ],
            [
                'key' => 'benefit3_description',
                'value' => 'Synchronized project management across time zones',
            ],
            [
                'key' => 'network_cta',
                'value' => 'Connect with Our Network',
            ],
            [
                'key' => 'map_title',
                'value' => 'Global Coverage',
            ],
            [
                'key' => 'map_subtitle',
                'value' => 'Professional services across 25+ countries',
            ],
            [
                'key' => 'region1_name',
                'value' => 'Asia Pacific',
            ],
            [
                'key' => 'region2_name',
                'value' => 'Americas',
            ],
            [
                'key' => 'region3_name',
                'value' => 'Europe',
            ],
            [
                'key' => 'region4_name',
                'value' => 'MENA',
            ],

            // Call to Action Section
            [
                'key' => 'cta_title',
                'value' => 'Take Your Business Global',
            ],
            [
                'key' => 'cta_description',
                'value' => 'Partner with us to navigate international markets with confidence. Our global expertise and local insights will accelerate your expansion strategy.',
            ],
            [
                'key' => 'action1_title',
                'value' => 'Free Consultation',
            ],
            [
                'key' => 'action1_subtitle',
                'value' => 'Strategic planning session',
            ],
            [
                'key' => 'action2_title',
                'value' => 'Market Analysis',
            ],
            [
                'key' => 'action2_subtitle',
                'value' => 'Comprehensive assessment',
            ],
            [
                'key' => 'cta_primary_button',
                'value' => 'Start Your Global Journey',
            ],
            [
                'key' => 'cta_phone_button',
                'value' => 'Call +632 8887 1888',
            ],
            [
                'key' => 'contact_card_title',
                'value' => 'International Team',
            ],
            [
                'key' => 'contact_card_description',
                'value' => 'Our global specialists are ready to discuss your expansion plans.',
            ],
            [
                'key' => 'contact_email',
                'value' => 'international@mtco.com.ph',
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Available 24/7 across time zones',
            ],
        ]);
    }
}
