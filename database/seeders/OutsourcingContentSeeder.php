<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutsourcingContentSeeder extends Seeder
{
    public function run()
    {
        $outsourcingContent = [
            // Header Section
            [
                'key' => 'outsourcing_page_title',
                'value' => 'Business Outsourcing',
            ],
            [
                'key' => 'outsourcing_page_subtitle',
                'value' => 'Tailored bookkeeping and financial support to help optimize your business resources and focus on growth.',
            ],

            // Service Image
            [
                'key' => 'outsourcing_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'outsourcing_overview_title',
                'value' => 'Tailored Solutions for Every Need',
            ],
            [
                'key' => 'outsourcing_overview_paragraph1',
                'value' => 'At Mendoza Tugano & Co., CPAs (MTC), we have an outsourcing division to provide our clients with tailored solutions for all bookkeeping requirements.',
            ],
            [
                'key' => 'outsourcing_overview_paragraph2',
                'value' => 'Our approach focuses on building strong relationships with our clients to understand their unique business needs and provide strategic insights that drive growth and success.',
            ],

            // Approach Section
            [
                'key' => 'outsourcing_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'outsourcing_approach_item1_title',
                'value' => 'Resource Optimization',
            ],
            [
                'key' => 'outsourcing_approach_item1_description',
                'value' => 'Outsource financial and admin functions to reduce overhead, free up time, and focus on what matters most for your business growth and development.',
            ],
            [
                'key' => 'outsourcing_approach_item2_title',
                'value' => 'Focus on Core Business',
            ],
            [
                'key' => 'outsourcing_approach_item2_description',
                'value' => 'Let us handle complex financial operations so you can refocus on business strategy and growth. We invest time in understanding your business to provide tailored solutions.',
            ],
            [
                'key' => 'outsourcing_approach_item3_title',
                'value' => 'Comprehensive Support',
            ],
            [
                'key' => 'outsourcing_approach_item3_description',
                'value' => 'By involving the most experienced members of our team right from the start, we focus on your specific strategic needs and ensure the highest quality of service delivery.',
            ],

            // Services Section
            [
                'key' => 'outsourcing_services_title',
                'value' => 'Our Services Include',
            ],
            [
                'key' => 'outsourcing_service1_title',
                'value' => 'Bookkeeping & Accounting',
            ],
            [
                'key' => 'outsourcing_service1_description',
                'value' => 'Stay compliant and organized with our expert accounting and ledger maintenance services. We provide comprehensive bookkeeping solutions tailored to your business needs.',
            ],
            [
                'key' => 'outsourcing_service2_title',
                'value' => 'Payroll, Forecasting & More',
            ],
            [
                'key' => 'outsourcing_service2_description',
                'value' => 'From payslips to performance modeling — our team handles it all with precision and confidentiality. We help ensure your business operations meet industry standards and requirements.',
            ],

            // Benefits Section
            [
                'key' => 'outsourcing_benefits_title',
                'value' => 'Benefits of Our Outsourcing Services',
            ],
            [
                'key' => 'outsourcing_benefit1_title',
                'value' => 'Lower Costs',
            ],
            [
                'key' => 'outsourcing_benefit1_description',
                'value' => 'Avoid hiring costs and reduce overhead by letting us manage back-office tasks efficiently.',
            ],
            [
                'key' => 'outsourcing_benefit2_title',
                'value' => 'Expert Handling',
            ],
            [
                'key' => 'outsourcing_benefit2_description',
                'value' => 'Work with experienced professionals without the hassle of in-house training or turnover.',
            ],
            [
                'key' => 'outsourcing_benefit3_title',
                'value' => 'Time Savings',
            ],
            [
                'key' => 'outsourcing_benefit3_description',
                'value' => 'More time for innovation, leadership, and managing what really matters for your business.',
            ],
            [
                'key' => 'outsourcing_benefit4_title',
                'value' => 'Adaptability',
            ],
            [
                'key' => 'outsourcing_benefit4_description',
                'value' => 'Scale our services to your needs — from startups to enterprises with flexible solutions.',
            ],

            // Sidebar Content
            [
                'key' => 'outsourcing_cta_title',
                'value' => 'Get Started Today',
            ],
            [
                'key' => 'outsourcing_cta_description',
                'value' => 'Talk to us about outsourcing. Let\'s make your operations leaner and smarter.',
            ],
            [
                'key' => 'outsourcing_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'outsourcing_fact1_label',
                'value' => 'Years of Experience',
            ],
            [
                'key' => 'outsourcing_fact1_value',
                'value' => '10+',
            ],
            [
                'key' => 'outsourcing_fact2_label',
                'value' => 'Team Members',
            ],
            [
                'key' => 'outsourcing_fact2_value',
                'value' => '50+',
            ],
            [
                'key' => 'outsourcing_fact3_label',
                'value' => 'Client Focus',
            ],
            [
                'key' => 'outsourcing_fact3_value',
                'value' => '100%',
            ],

            // Related Services
            [
                'key' => 'outsourcing_related_service1',
                'value' => 'Taxation Services',
            ],
            [
                'key' => 'outsourcing_related_service2',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'outsourcing_related_service3',
                'value' => 'Audit & Assurance',
            ],
        ];

        foreach ($outsourcingContent as $content) {
            DB::table('contents')->updateOrInsert(
                ['key' => $content['key']],
                [
                    'key' => $content['key'],
                    'value' => $content['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
