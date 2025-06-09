<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class HomeContentController extends Controller
{
    public function index()
    {
        $sections = [
            'hero_title' => 'Hero Title',
            'hero_subtitle' => 'Hero Subtitle',
            'hero_button' => 'Hero Button Text',
            'about_text' => 'About Text',
            'about_image' => 'About Image',
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

        return view('pages.home.home', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            'hero_title'    => Content::where('key', 'hero_title')->value('value'),
            'hero_subtitle' => Content::where('key', 'hero_subtitle')->value('value'),
            'hero_button'   => Content::where('key', 'hero_button')->value('value'),
            'about_text'    => Content::where('key', 'about_text')->value('value'),
            'about_image'   => Content::where('key', 'about_image')->value('value'),
        ];

        return view('pages.home.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title'     => 'required|string|max:255',
            'hero_subtitle'  => 'required|string|max:255',
            'hero_button'    => 'required|string|max:50',
            'about_text'     => 'required|string',
            'about_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_image'   => 'nullable|boolean'
        ]);

        $fields = ['hero_title', 'hero_subtitle', 'hero_button', 'about_text'];

        foreach ($fields as $key) {
            Content::updateOrCreate(
                ['key' => $key],
                [
                    'value'       => $request->input($key),
                    'updated_by'  => Auth::id()
                ]
            );
        }

        // Remove image
        if ($request->has('remove_image') && $request->remove_image) {
            $currentImage = Content::where('key', 'about_image')->value('value');
            if ($currentImage) {
                $path = public_path('assets/img/' . $currentImage);
                if (file_exists($path)) {
                    unlink($path);
                }

                Content::updateOrCreate(
                    ['key' => 'about_image'],
                    ['value' => null, 'updated_by' => Auth::id()]
                );
            }
        }

        // Upload new image
        if ($request->hasFile('about_image')) {
            if (!$request->has('remove_image') || !$request->remove_image) {
                $oldImage = Content::where('key', 'about_image')->value('value');
                if ($oldImage) {
                    $oldPath = public_path('assets/img/' . $oldImage);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }

            $file = $request->file('about_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $filename);

            Content::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => $filename, 'updated_by' => Auth::id()]
            );
        }

        return redirect()->route('admin.home.preview')->with('success', 'Homepage updated successfully!');
    }

    public function preview()
    {
        // Get the content data for preview
        $sections = [
            'hero_title' => 'Hero Title',
            'hero_subtitle' => 'Hero Subtitle',
            'hero_button' => 'Hero Button Text',
            'about_text' => 'About Text',
            'about_image' => 'About Image',
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

        return view('pages.home.preview', compact('contentData'));
    }

    public function removeImage()
    {
        $image = Content::where('key', 'about_image')->value('value');
        if ($image) {
            $path = public_path('assets/img/' . $image);
            if (file_exists($path)) {
                unlink($path);
            }

            Content::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => null, 'updated_by' => Auth::id()]
            );
        }

        return redirect()->route('admin.home.edit')->with('success', 'Image removed successfully.');
    }
}
