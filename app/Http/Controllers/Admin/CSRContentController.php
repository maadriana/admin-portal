<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CSRContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.csr.preview');
    }

    public function preview()
    {
        $sections = [
            // Hero Section
            'csr_hero_title' => 'Hero Title',
            'csr_hero_subtitle' => 'Hero Subtitle',
            'csr_cta_overview' => 'Overview Button Text',
            'csr_cta_programs' => 'Programs Button Text',

            // Overview Section
            'csr_overview_badge' => 'Overview Badge',
            'csr_overview_title' => 'Overview Title',
            'csr_overview_paragraph1' => 'Overview Paragraph 1',
            'csr_overview_paragraph2' => 'Overview Quote',

            // Programs Section
            'csr_programs_badge' => 'Programs Badge',
            'csr_programs_title' => 'Programs Title',
            'csr_programs_description' => 'Programs Description',

            // Education Program
            'csr_education_title' => 'Education Title',
            'csr_education_description' => 'Education Description',
            'csr_education_focus' => 'Education Focus',

            // Environmental Program
            'csr_environment_title' => 'Environment Title',
            'csr_environment_description' => 'Environment Description',
            'csr_environment_focus' => 'Environment Focus',

            // Community Program
            'csr_community_title' => 'Community Title',
            'csr_community_description' => 'Community Description',
            'csr_community_donation' => 'Donation Text',
            'csr_community_support' => 'Support Text',
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

        return view('pages.csr', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            'csr_hero_title' => Content::where('key', 'csr_hero_title')->value('value'),
            'csr_hero_subtitle' => Content::where('key', 'csr_hero_subtitle')->value('value'),
            'csr_cta_overview' => Content::where('key', 'csr_cta_overview')->value('value'),
            'csr_cta_programs' => Content::where('key', 'csr_cta_programs')->value('value'),
            'csr_overview_badge' => Content::where('key', 'csr_overview_badge')->value('value'),
            'csr_overview_title' => Content::where('key', 'csr_overview_title')->value('value'),
            'csr_overview_paragraph1' => Content::where('key', 'csr_overview_paragraph1')->value('value'),
            'csr_overview_paragraph2' => Content::where('key', 'csr_overview_paragraph2')->value('value'),
            'csr_programs_badge' => Content::where('key', 'csr_programs_badge')->value('value'),
            'csr_programs_title' => Content::where('key', 'csr_programs_title')->value('value'),
            'csr_programs_description' => Content::where('key', 'csr_programs_description')->value('value'),
            'csr_education_title' => Content::where('key', 'csr_education_title')->value('value'),
            'csr_education_description' => Content::where('key', 'csr_education_description')->value('value'),
            'csr_education_focus' => Content::where('key', 'csr_education_focus')->value('value'),
            'csr_environment_title' => Content::where('key', 'csr_environment_title')->value('value'),
            'csr_environment_description' => Content::where('key', 'csr_environment_description')->value('value'),
            'csr_environment_focus' => Content::where('key', 'csr_environment_focus')->value('value'),
            'csr_community_title' => Content::where('key', 'csr_community_title')->value('value'),
            'csr_community_description' => Content::where('key', 'csr_community_description')->value('value'),
            'csr_community_donation' => Content::where('key', 'csr_community_donation')->value('value'),
            'csr_community_support' => Content::where('key', 'csr_community_support')->value('value'),
        ];

        return view('pages.csr.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'csr_hero_title' => 'required|string',
            'csr_hero_subtitle' => 'required|string',
            'csr_cta_overview' => 'required|string|max:255',
            'csr_cta_programs' => 'required|string|max:255',
            'csr_overview_badge' => 'required|string|max:255',
            'csr_overview_title' => 'required|string|max:255',
            'csr_overview_paragraph1' => 'required|string',
            'csr_overview_paragraph2' => 'required|string',
            'csr_programs_badge' => 'required|string|max:255',
            'csr_programs_title' => 'required|string|max:255',
            'csr_programs_description' => 'required|string',
            'csr_education_title' => 'required|string|max:255',
            'csr_education_description' => 'required|string',
            'csr_education_focus' => 'required|string|max:255',
            'csr_environment_title' => 'required|string|max:255',
            'csr_environment_description' => 'required|string',
            'csr_environment_focus' => 'required|string|max:255',
            'csr_community_title' => 'required|string|max:255',
            'csr_community_description' => 'required|string',
            'csr_community_donation' => 'required|string|max:255',
            'csr_community_support' => 'required|string|max:255',
        ]);

        $hasChanged = false;

        $fields = [
            'csr_hero_title', 'csr_hero_subtitle', 'csr_cta_overview', 'csr_cta_programs',
            'csr_overview_badge', 'csr_overview_title', 'csr_overview_paragraph1', 'csr_overview_paragraph2',
            'csr_programs_badge', 'csr_programs_title', 'csr_programs_description',
            'csr_education_title', 'csr_education_description', 'csr_education_focus',
            'csr_environment_title', 'csr_environment_description', 'csr_environment_focus',
            'csr_community_title', 'csr_community_description', 'csr_community_donation', 'csr_community_support',
        ];

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
            ? redirect()->route('admin.csr.preview')->with('success', 'CSR content updated successfully!')
            : redirect()->route('admin.csr.preview');
    }
}
