<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class CareersContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.careers.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'careers_main_title' => 'Careers Main Title',
            'careers_subtitle' => 'Careers Subtitle',

            // Description Paragraphs
            'careers_description_paragraph1' => 'Description Paragraph 1',
            'careers_description_paragraph2' => 'Description Paragraph 2',
            'careers_description_paragraph3' => 'Description Paragraph 3',
            'careers_description_paragraph4' => 'Description Paragraph 4',

            // Career Opportunity Cards
            'career_card1_title' => 'Current Vacancies - Title',
            'career_card1_description' => 'Current Vacancies - Description',
            'career_card1_icon' => 'Current Vacancies - Icon Class',

            'career_card2_title' => 'Experienced Professionals - Title',
            'career_card2_description' => 'Experienced Professionals - Description',
            'career_card2_icon' => 'Experienced Professionals - Icon Class',

            'career_card3_title' => 'Graduate - Title',
            'career_card3_description' => 'Graduate - Description',
            'career_card3_icon' => 'Graduate - Icon Class',

            'career_card4_title' => 'Internship Opportunities - Title',
            'career_card4_description' => 'Internship Opportunities - Description',
            'career_card4_icon' => 'Internship Opportunities - Icon Class',
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

        return view('pages.careers', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'careers_main_title' => Content::where('key', 'careers_main_title')->value('value'),
            'careers_subtitle' => Content::where('key', 'careers_subtitle')->value('value'),

            // Description Paragraphs
            'careers_description_paragraph1' => Content::where('key', 'careers_description_paragraph1')->value('value'),
            'careers_description_paragraph2' => Content::where('key', 'careers_description_paragraph2')->value('value'),
            'careers_description_paragraph3' => Content::where('key', 'careers_description_paragraph3')->value('value'),
            'careers_description_paragraph4' => Content::where('key', 'careers_description_paragraph4')->value('value'),

            // Career Opportunity Cards
            'career_card1_title' => Content::where('key', 'career_card1_title')->value('value'),
            'career_card1_description' => Content::where('key', 'career_card1_description')->value('value'),
            'career_card1_icon' => Content::where('key', 'career_card1_icon')->value('value'),

            'career_card2_title' => Content::where('key', 'career_card2_title')->value('value'),
            'career_card2_description' => Content::where('key', 'career_card2_description')->value('value'),
            'career_card2_icon' => Content::where('key', 'career_card2_icon')->value('value'),

            'career_card3_title' => Content::where('key', 'career_card3_title')->value('value'),
            'career_card3_description' => Content::where('key', 'career_card3_description')->value('value'),
            'career_card3_icon' => Content::where('key', 'career_card3_icon')->value('value'),

            'career_card4_title' => Content::where('key', 'career_card4_title')->value('value'),
            'career_card4_description' => Content::where('key', 'career_card4_description')->value('value'),
            'career_card4_icon' => Content::where('key', 'career_card4_icon')->value('value'),
        ];

        return view('pages.careers.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'careers_main_title' => 'required|string|max:255',
            'careers_subtitle' => 'required|string|max:500',

            // Description Paragraphs
            'careers_description_paragraph1' => 'required|string',
            'careers_description_paragraph2' => 'required|string',
            'careers_description_paragraph3' => 'required|string',
            'careers_description_paragraph4' => 'required|string',

            // Career Opportunity Cards
            'career_card1_title' => 'required|string|max:255',
            'career_card1_description' => 'required|string|max:500',
            'career_card1_icon' => 'required|string|max:100',

            'career_card2_title' => 'required|string|max:255',
            'career_card2_description' => 'required|string|max:500',
            'career_card2_icon' => 'required|string|max:100',

            'career_card3_title' => 'required|string|max:255',
            'career_card3_description' => 'required|string|max:500',
            'career_card3_icon' => 'required|string|max:100',

            'career_card4_title' => 'required|string|max:255',
            'career_card4_description' => 'required|string|max:500',
            'career_card4_icon' => 'required|string|max:100',
        ]);

        $hasChanged = false;

        // Get all field keys
        $fields = [
            'careers_main_title', 'careers_subtitle',
            'careers_description_paragraph1', 'careers_description_paragraph2',
            'careers_description_paragraph3', 'careers_description_paragraph4',
            'career_card1_title', 'career_card1_description', 'career_card1_icon',
            'career_card2_title', 'career_card2_description', 'career_card2_icon',
            'career_card3_title', 'career_card3_description', 'career_card3_icon',
            'career_card4_title', 'career_card4_description', 'career_card4_icon'
        ];

        // Update each field
        foreach ($fields as $key) {
            $newValue = $request->input($key);
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
            ? redirect()->route('admin.careers.preview')->with('success', 'Careers page updated successfully!')
            : redirect()->route('admin.careers.preview');
    }
}
