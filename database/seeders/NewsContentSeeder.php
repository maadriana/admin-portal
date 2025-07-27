<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsContentSeeder extends Seeder
{
    public function run()
    {
        $newsContent = [
            // Homepage News Section
            [
                'key' => 'news_section_title',
                'value' => 'NEWS AND UPDATES',
            ],
            [
                'key' => 'news_section_subtitle',
                'value' => '<span>Stay Informed with</span> <span class="description-title">Latest Developments</span>',
            ],
            [
                'key' => 'news_intro_description',
                'value' => 'Stay informed with the latest developments in tax, audit, and business regulations in the Philippines. Our News and Updates section brings you timely insights, regulatory issuances, and industry trends that matter to your business.',
            ],

            // News Updates Page
            [
                'key' => 'news_page_title',
                'value' => 'News & Updates',
            ],
            [
                'key' => 'news_page_subtitle',
                'value' => 'Stay informed with the latest developments in tax, audit, and business regulations in the Philippines.',
            ],
            [
                'key' => 'news_description_paragraph1',
                'value' => 'Our News and Updates section brings you timely insights, regulatory issuances, and industry trends that matter to your business.',
            ],
            [
                'key' => 'news_description_paragraph2',
                'value' => 'We provide concise updates on new BIR and SEC regulations, changes in financial reporting standards, government circulars, and other policy shifts that impact compliance and operations. Whether it\'s a tax deadline reminder or a recent legal ruling, our goal is to keep you ahead of the curve with credible, practical information.',
            ],

            // Search and Filter
            [
                'key' => 'news_search_title',
                'value' => 'Search News',
            ],
            [
                'key' => 'news_search_placeholder',
                'value' => 'Search articles...',
            ],
            [
                'key' => 'news_filter_year_title',
                'value' => 'View by Year',
            ],
            [
                'key' => 'news_filter_month_title',
                'value' => 'View by Month',
            ],
            [
                'key' => 'news_filter_all_news',
                'value' => 'View All News',
            ],
            [
                'key' => 'news_load_more_text',
                'value' => 'Load More Articles',
            ],

            // Article 1 (BIR Digital Tax Receipts)
            [
                'key' => 'news_article1_title',
                'value' => 'New BIR Revenue Regulation on Digital Tax Receipts',
            ],
            [
                'key' => 'news_article1_category',
                'value' => 'Tax Updates',
            ],
            [
                'key' => 'news_article1_date',
                'value' => 'January 15, 2025',
            ],
            [
                'key' => 'news_article1_read_time',
                'value' => '8 min read',
            ],
            [
                'key' => 'news_article1_excerpt',
                'value' => 'The Bureau of Internal Revenue has issued new guidelines requiring businesses to implement digital tax receipts by March 2025. This regulation affects all registered taxpayers with annual gross receipts exceeding PHP 3 million and introduces significant changes to existing invoicing systems.',
            ],
            [
                'key' => 'news_article1_external_link',
                'value' => '',
            ],
            [
                'key' => 'news_article1_read_more_text',
                'value' => 'Read More',
            ],

            // Article 2 (SEC Financial Reporting)
            [
                'key' => 'news_article2_title',
                'value' => 'SEC Announces Updated Financial Reporting Standards for 2025',
            ],
            [
                'key' => 'news_article2_category',
                'value' => 'SEC Regulations',
            ],
            [
                'key' => 'news_article2_date',
                'value' => 'January 10, 2025',
            ],
            [
                'key' => 'news_article2_read_time',
                'value' => '5 min read',
            ],
            [
                'key' => 'news_article2_excerpt',
                'value' => 'The Securities and Exchange Commission has released comprehensive updates to financial reporting standards effective June 2025. These changes include enhanced disclosure requirements for related party transactions and revised guidelines for revenue recognition in service industries.',
            ],
            [
                'key' => 'news_article2_external_link',
                'value' => '',
            ],
            [
                'key' => 'news_article2_read_more_text',
                'value' => 'Read More',
            ],

            // Article 3 (PSA Updates)
            [
                'key' => 'news_article3_title',
                'value' => 'Philippine Standards on Auditing (PSA) Updates for 2025',
            ],
            [
                'key' => 'news_article3_category',
                'value' => 'Audit Standards',
            ],
            [
                'key' => 'news_article3_date',
                'value' => 'January 8, 2025',
            ],
            [
                'key' => 'news_article3_read_time',
                'value' => '4 min read',
            ],
            [
                'key' => 'news_article3_excerpt',
                'value' => 'The Auditing and Assurance Standards Council has issued revisions to several Philippine Standards on Auditing, including enhanced procedures for assessing fraud risks and updated requirements for auditor independence. These changes take effect for audits of financial statements for periods beginning on or after April 15, 2025.',
            ],
            [
                'key' => 'news_article3_external_link',
                'value' => '',
            ],
            [
                'key' => 'news_article3_read_more_text',
                'value' => 'Read More',
            ],

            // Article Images (placeholders)
            [
                'key' => 'news_article1_image',
                'value' => '',
            ],
            [
                'key' => 'news_article2_image',
                'value' => '',
            ],
            [
                'key' => 'news_article3_image',
                'value' => '',
            ],

            // Sidebar Counts
            [
                'key' => 'news_count_all',
                'value' => '3',
            ],
            [
                'key' => 'news_count_2025',
                'value' => '3',
            ],
            [
                'key' => 'news_count_2024',
                'value' => '0',
            ],
            [
                'key' => 'news_count_january',
                'value' => '3',
            ],
            [
                'key' => 'news_count_december',
                'value' => '0',
            ],

            // Year and Month Labels
            [
                'key' => 'news_year_2025',
                'value' => '2025',
            ],
            [
                'key' => 'news_year_2024',
                'value' => '2024',
            ],
            [
                'key' => 'news_month_january',
                'value' => 'January 2025',
            ],
            [
                'key' => 'news_month_december',
                'value' => 'December 2024',
            ],

            // Individual BIR Article Content (for detailed articles)
            [
                'key' => 'bir_article_title',
                'value' => 'New BIR Revenue Regulation on Digital Tax Receipts',
            ],
            [
                'key' => 'bir_article_category',
                'value' => 'Tax Updates',
            ],
            [
                'key' => 'bir_article_date',
                'value' => 'January 15, 2025',
            ],
            [
                'key' => 'bir_article_read_time',
                'value' => '8 min read',
            ],
            [
                'key' => 'bir_article_author',
                'value' => 'MTC Editorial Team',
            ],
            [
                'key' => 'bir_article_subtitle',
                'value' => 'Understanding the new requirements and implementation timeline for digital tax receipt systems in the Philippines.',
            ],
            [
                'key' => 'bir_article_intro',
                'value' => 'The Bureau of Internal Revenue (BIR) has issued Revenue Regulation No. 25-2024, introducing mandatory digital tax receipt requirements that will fundamentally change how businesses handle invoicing and receipt systems in the Philippines. This comprehensive regulation affects all registered taxpayers with annual gross receipts exceeding PHP 3 million, marking a significant step toward the country\'s digital transformation in tax administration.',
            ],

            // BIR Article Content Sections
            [
                'key' => 'bir_article_requirements_title',
                'value' => 'Key Requirements and Compliance Standards',
            ],
            [
                'key' => 'bir_article_requirements_intro',
                'value' => 'Under the new regulation, affected businesses must implement digital receipt systems that comply with specific technical and security standards:',
            ],
            [
                'key' => 'bir_article_requirements_details',
                'value' => 'The regulation specifically requires that all sales transactions, regardless of amount, must be recorded through the digital system. This includes cash sales, credit transactions, and any form of revenue generation. Businesses operating multiple locations must ensure all branches are connected to a centralized digital receipt system.',
            ],
            [
                'key' => 'bir_article_technical_title',
                'value' => 'Technical Specifications',
            ],
            [
                'key' => 'bir_article_technical_content',
                'value' => 'Digital receipts must include encrypted QR codes, sequential numbering systems, and real-time data transmission capabilities to BIR servers. The system must also maintain offline backup functionality to ensure continuous operation during network interruptions.',
            ],

            // Timeline Section
            [
                'key' => 'bir_article_timeline_title',
                'value' => 'Implementation Timeline and Phases',
            ],
            [
                'key' => 'bir_article_phase1_date',
                'value' => 'March 2025',
            ],
            [
                'key' => 'bir_article_phase1_title',
                'value' => 'Phase 1: Large Corporations',
            ],
            [
                'key' => 'bir_article_phase1_desc',
                'value' => 'Companies with annual gross receipts exceeding PHP 50 million must implement digital receipt systems.',
            ],
            [
                'key' => 'bir_article_phase2_date',
                'value' => 'June 2025',
            ],
            [
                'key' => 'bir_article_phase2_title',
                'value' => 'Phase 2: Medium Enterprises',
            ],
            [
                'key' => 'bir_article_phase2_desc',
                'value' => 'Businesses with annual gross receipts between PHP 10-50 million must comply.',
            ],
            [
                'key' => 'bir_article_phase3_date',
                'value' => 'Sept 2025',
            ],
            [
                'key' => 'bir_article_phase3_title',
                'value' => 'Phase 3: Small Businesses',
            ],
            [
                'key' => 'bir_article_phase3_desc',
                'value' => 'All remaining businesses with annual gross receipts exceeding PHP 3 million.',
            ],

            // Impact Section
            [
                'key' => 'bir_article_impact_title',
                'value' => 'Impact on Business Operations',
            ],
            [
                'key' => 'bir_article_impact_intro',
                'value' => 'The transition to digital tax receipts will require significant changes to current business processes and systems. Organizations must prepare for both technological and operational adjustments:',
            ],
            [
                'key' => 'bir_article_challenges_title',
                'value' => 'Key Implementation Challenges',
            ],
            [
                'key' => 'bir_article_challenge1',
                'value' => 'System integration with existing point-of-sale and accounting software',
            ],
            [
                'key' => 'bir_article_challenge2',
                'value' => 'Staff training on new digital processes and troubleshooting procedures',
            ],
            [
                'key' => 'bir_article_challenge3',
                'value' => 'Network connectivity requirements and backup system establishment',
            ],
            [
                'key' => 'bir_article_challenge4',
                'value' => 'Compliance monitoring and audit trail maintenance',
            ],
            [
                'key' => 'bir_article_impact_benefits',
                'value' => 'Despite the implementation challenges, the digital receipt system offers substantial benefits including reduced paper costs, improved transaction tracking, enhanced audit capabilities, and better customer experience through digital receipt delivery options.',
            ],

            // Recommendations Section
            [
                'key' => 'bir_article_recommendations_title',
                'value' => 'MTC Recommendations for Compliance',
            ],
            [
                'key' => 'bir_article_action_title',
                'value' => 'Immediate Action Items',
            ],
            [
                'key' => 'bir_article_action_intro',
                'value' => 'To ensure smooth compliance with the new regulations, we recommend the following steps:',
            ],
            [
                'key' => 'bir_article_action1',
                'value' => 'Conduct a comprehensive assessment of current invoicing systems',
            ],
            [
                'key' => 'bir_article_action2',
                'value' => 'Research and select BIR-accredited digital receipt solution providers',
            ],
            [
                'key' => 'bir_article_action3',
                'value' => 'Develop an implementation timeline based on your compliance phase',
            ],
            [
                'key' => 'bir_article_action4',
                'value' => 'Establish staff training programs for the new digital systems',
            ],
            [
                'key' => 'bir_article_action5',
                'value' => 'Create backup procedures and contingency plans for system failures',
            ],
            [
                'key' => 'bir_article_conclusion',
                'value' => 'The successful implementation of digital tax receipts requires careful planning and professional guidance. Our team at Mendoza Tugano & Co., CPAs is ready to assist your organization through this transition, ensuring full compliance while minimizing operational disruption.',
            ],

            // CTA Content
            [
                'key' => 'bir_cta_title',
                'value' => 'Need Compliance Assistance?',
            ],
            [
                'key' => 'bir_cta_description',
                'value' => 'Our team can help you navigate the new BIR digital receipt requirements and ensure full compliance.',
            ],
            [
                'key' => 'bir_cta_button',
                'value' => 'Contact Us Today',
            ],

            // Related Articles
            [
                'key' => 'bir_related_article1_title',
                'value' => 'SEC Announces Updated Financial Reporting Standards for 2025',
            ],
            [
                'key' => 'bir_related_article1_date',
                'value' => 'January 10, 2025',
            ],
            [
                'key' => 'bir_related_article2_title',
                'value' => 'Philippine Standards on Auditing (PSA) Updates for 2025',
            ],
            [
                'key' => 'bir_related_article2_date',
                'value' => 'January 8, 2025',
            ],
            [
                'key' => 'bir_view_all_news',
                'value' => 'View All News',
            ],
            [
                'key' => 'bir_article_back_button',
                'value' => 'Back to News & Updates',
            ],

            // Featured Image
            [
                'key' => 'bir_article_featured_image',
                'value' => '',
            ],
        ];

        foreach ($newsContent as $content) {
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
