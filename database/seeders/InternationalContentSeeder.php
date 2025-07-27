<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;

class InternationalContentSeeder extends Seeder
{
    public function run()
    {
        // First, let's clean up old international content keys that are no longer needed
        $oldKeys = [
            'international_hero_subtitle', 'international_trust_indicator1', 'international_trust_indicator2',
            'international_hub_title', 'international_hub_subtitle', 'expertise_title', 'expertise_description',
            'expertise_card1_title', 'expertise_card1_description', 'expertise_card2_title', 'expertise_card2_description',
            'expertise_card3_title', 'expertise_card3_description', 'expertise_card4_title', 'expertise_card4_description',
            'services_title', 'services_description', 'timeline_service1_title', 'timeline_service1_description',
            'timeline_service2_title', 'timeline_service2_description', 'timeline_service3_title', 'timeline_service3_description',
            'timeline_service4_title', 'timeline_service4_description', 'network_title', 'network_description',
            'network_cta', 'map_title', 'map_subtitle', 'region1_name', 'region2_name', 'region3_name', 'region4_name',
            'cta_title', 'cta_description', 'action1_title', 'action1_subtitle', 'action2_title', 'action2_subtitle',
            'cta_primary_button', 'cta_phone_button', 'contact_card_title', 'contact_card_description',
            'contact_email', 'contact_hours'
        ];

        // Delete old keys that are no longer used
        Content::whereIn('key', $oldKeys)->delete();

        // Now insert/update the new AGN International content
        $agnContent = [
            // Hero Section - AGN International
            'agn_hero_title' => 'AGN International',
            'agn_hero_subtitle' => 'Global accounting and advisory network',
            'agn_member_firms_count' => '200+',
            'agn_member_firms_label' => 'Member Firms',
            'agn_countries_count' => '80+',
            'agn_countries_label' => 'Countries',
            'agn_reach_count' => 'Global',
            'agn_reach_label' => 'Reach',

            // MTC and AGN International Section
            'mtc_agn_title' => 'MTC and AGN International',
            'mtc_agn_description' => 'MTC is a proud member of AGN International, one of the world\'s leading associations of separate and independent accounting and advisory firms. As part of this global network, we are connected to over 200 member firms in more than 80 countries, enabling us to deliver local expertise backed by global insight.',

            // Network Information (Stats)
            'network_stats_firms_count' => '200+',
            'network_stats_firms_label' => 'Member Firms',
            'network_stats_countries_count' => '80+',
            'network_stats_countries_label' => 'Countries',
            'network_stats_global_count' => 'Global',
            'network_stats_global_label' => 'Network',

            // Trusted Experts Section
            'trusted_experts_title' => 'A Network of Trusted Experts',
            'trusted_experts_description_1' => 'Our affiliation with AGN enhances our ability to support clients with cross-border needs, access international technical resources, and benchmark best practices in accounting, audit, and tax. Whether you\'re a Philippine-based company expanding globally, or a multinational doing business in the Philippines, we leverage our AGN network to bring solutions that are both locally relevant and internationally informed.',
            'trusted_experts_description_2' => 'As an AGN member firm, we remain fully independent and responsible for the services we provide to our clients. Our membership simply gives us access to a trusted network of professionals across the globe who share our commitment to service excellence, ethical standards, and technical competence.',

            // Client Benefits Section
            'client_benefits_title' => 'Our clients benefit from:',
            'benefit1_title' => 'Local knowledge, global support',
            'benefit1_description' => 'Direct access to local expertise in major markets around the world through a trusted global community.',
            'benefit2_title' => 'International business support',
            'benefit2_description' => 'Seamless coordination with fellow AGN members for cross-border transactions, market entry, or overseas expansion.',
            'benefit3_title' => 'Shared standards, global best practices',
            'benefit3_description' => 'Our AGN membership ensures access to global technical updates, benchmarking tools, and regulatory resources.',

            // About AGN International Section
            'about_agn_title' => 'About AGN International',
            'about_agn_description_1' => 'AGN International Ltd is a not-for-profit worldwide membership association of separate and independent accounting and advisory businesses.',
            'about_agn_description_2' => 'To learn more about AGN and its member firms, please visit the AGN International website at',
            'agn_website_url' => 'https://agn.org/',

            // Disclaimer Section
            'disclaimer_title' => 'Disclaimer',
            'disclaimer_content' => 'AGN International Ltd is a company limited by guarantee registered in England & Wales, number 3132548, registered office 24 Greville Street, London EC1N 8SS, United Kingdom. AGN International Ltd (and its regional affiliates; together "AGN") is a not-for-profit worldwide membership association of separate and independent accounting and advisory businesses. AGN does not provide and is not responsible for services to the clients of its members. Members provide services to their clients under their own local agreements with those clients. Members are not in partnership together, they are neither agents of nor obligate one another and are not responsible for the services of other members.',

            // Contact CTA Section
            'contact_cta_title' => 'Ready to leverage our global network?',
            'contact_cta_description' => 'Connect with our team to learn how AGN International can support your business growth.',
            'contact_cta_button' => 'Contact Us Today',
        ];

        // Use updateOrCreate to handle existing records properly
        foreach ($agnContent as $key => $value) {
            Content::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->command->info('AGN International content seeded successfully!');
    }
}
