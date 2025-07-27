<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleriesContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.galleries.preview');
    }

    public function preview()
    {
        $sections = [
            // Hero Section
            'galleries_hero_title' => 'Hero Title',
            'galleries_hero_subtitle' => 'Hero Subtitle',
            'galleries_cta_csr' => 'CSR Button Text',
            'galleries_cta_team' => 'Team Button Text',

            // Overview Section
            'galleries_overview_badge' => 'Overview Badge',
            'galleries_overview_title' => 'Overview Title',
            'galleries_overview_paragraph1' => 'Overview Paragraph 1',
            'galleries_overview_paragraph2' => 'Overview Paragraph 2',

            // CSR Gallery Section
            'csr_gallery_badge' => 'CSR Badge',
            'csr_gallery_title' => 'CSR Title',
            'csr_gallery_description' => 'CSR Description',
            'csr_gallery_item1_title' => 'CSR Item 1 Title',
            'csr_gallery_item2_title' => 'CSR Item 2 Title',
            'csr_gallery_item3_title' => 'CSR Item 3 Title',

            // CSR Gallery Images
            'csr_gallery_image1' => 'CSR Image 1',
            'csr_gallery_image2' => 'CSR Image 2',
            'csr_gallery_image3' => 'CSR Image 3',
            'csr_gallery_image4' => 'CSR Image 4',

            // Team Gallery Section
            'team_gallery_badge' => 'Team Badge',
            'team_gallery_title' => 'Team Title',
            'team_gallery_description' => 'Team Description',
            'team_gallery_item1_title' => 'Team Item 1 Title',
            'team_gallery_item2_title' => 'Team Item 2 Title',

            // Team Gallery Images
            'team_gallery_image1' => 'Team Image 1',
            'team_gallery_image2' => 'Team Image 2',
            'team_gallery_image3' => 'Team Image 3',
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

        return view('pages.galleries', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            'galleries_hero_title' => Content::where('key', 'galleries_hero_title')->value('value'),
            'galleries_hero_subtitle' => Content::where('key', 'galleries_hero_subtitle')->value('value'),
            'galleries_cta_csr' => Content::where('key', 'galleries_cta_csr')->value('value'),
            'galleries_cta_team' => Content::where('key', 'galleries_cta_team')->value('value'),
            'galleries_overview_badge' => Content::where('key', 'galleries_overview_badge')->value('value'),
            'galleries_overview_title' => Content::where('key', 'galleries_overview_title')->value('value'),
            'galleries_overview_paragraph1' => Content::where('key', 'galleries_overview_paragraph1')->value('value'),
            'galleries_overview_paragraph2' => Content::where('key', 'galleries_overview_paragraph2')->value('value'),
            'csr_gallery_badge' => Content::where('key', 'csr_gallery_badge')->value('value'),
            'csr_gallery_title' => Content::where('key', 'csr_gallery_title')->value('value'),
            'csr_gallery_description' => Content::where('key', 'csr_gallery_description')->value('value'),
            'csr_gallery_item1_title' => Content::where('key', 'csr_gallery_item1_title')->value('value'),
            'csr_gallery_item2_title' => Content::where('key', 'csr_gallery_item2_title')->value('value'),
            'csr_gallery_item3_title' => Content::where('key', 'csr_gallery_item3_title')->value('value'),
            'team_gallery_badge' => Content::where('key', 'team_gallery_badge')->value('value'),
            'team_gallery_title' => Content::where('key', 'team_gallery_title')->value('value'),
            'team_gallery_description' => Content::where('key', 'team_gallery_description')->value('value'),
            'team_gallery_item1_title' => Content::where('key', 'team_gallery_item1_title')->value('value'),
            'team_gallery_item2_title' => Content::where('key', 'team_gallery_item2_title')->value('value'),
        ];

        return view('pages.galleries.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'galleries_hero_title' => 'required|string|max:255',
            'galleries_hero_subtitle' => 'required|string',
            'galleries_cta_csr' => 'required|string|max:255',
            'galleries_cta_team' => 'required|string|max:255',
            'galleries_overview_badge' => 'required|string|max:255',
            'galleries_overview_title' => 'required|string|max:255',
            'galleries_overview_paragraph1' => 'required|string',
            'galleries_overview_paragraph2' => 'required|string',
            'csr_gallery_badge' => 'required|string|max:255',
            'csr_gallery_title' => 'required|string|max:255',
            'csr_gallery_description' => 'required|string',
            'csr_gallery_item1_title' => 'required|string|max:255',
            'csr_gallery_item2_title' => 'required|string|max:255',
            'csr_gallery_item3_title' => 'required|string|max:255',
            'team_gallery_badge' => 'required|string|max:255',
            'team_gallery_title' => 'required|string|max:255',
            'team_gallery_description' => 'required|string',
            'team_gallery_item1_title' => 'required|string|max:255',
            'team_gallery_item2_title' => 'required|string|max:255',
            'csr_gallery_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'csr_gallery_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'csr_gallery_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'csr_gallery_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_gallery_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_gallery_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_gallery_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hasChanged = false;

        $fields = [
            'galleries_hero_title', 'galleries_hero_subtitle', 'galleries_cta_csr', 'galleries_cta_team',
            'galleries_overview_badge', 'galleries_overview_title', 'galleries_overview_paragraph1', 'galleries_overview_paragraph2',
            'csr_gallery_badge', 'csr_gallery_title', 'csr_gallery_description',
            'csr_gallery_item1_title', 'csr_gallery_item2_title', 'csr_gallery_item3_title',
            'team_gallery_badge', 'team_gallery_title', 'team_gallery_description',
            'team_gallery_item1_title', 'team_gallery_item2_title',
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

        // Handle image uploads
        $imageKeys = [
            'csr_gallery_image1', 'csr_gallery_image2', 'csr_gallery_image3', 'csr_gallery_image4',
            'team_gallery_image1', 'team_gallery_image2', 'team_gallery_image3',
        ];

        foreach ($imageKeys as $imageKey) {
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageData = file_get_contents($image->getRealPath());

                Content::updateOrCreate(
                    ['key' => $imageKey],
                    [
                        'value' => $imageKey,
                        'image' => $imageData,
                        'updated_by' => Auth::id(),
                    ]
                );
                $hasChanged = true;
            }
        }

        return $hasChanged
            ? redirect()->route('admin.galleries.preview')->with('success', 'Galleries content updated successfully!')
            : redirect()->route('admin.galleries.preview');
    }

    public function removeImage(Request $request)
    {
        $request->validate([
            'image_key' => 'required|string'
        ]);

        $content = Content::where('key', $request->image_key)->first();
        if ($content) {
            $content->update([
                'image' => null,
                'updated_by' => Auth::id(),
            ]);
        }

        return response()->json(['success' => true]);
    }
}
