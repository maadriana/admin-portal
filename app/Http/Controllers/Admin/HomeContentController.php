<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.home.preview');
    }

    public function preview()
    {
        $sections = [
            // Hero Section
            'hero_title' => 'Hero Title',
            'hero_subtitle' => 'Hero Subtitle',
            'hero_button' => 'Hero Button Text',

            // About Section
            'about_section_title' => 'About Section Title',
            'about_text' => 'About Text',
            'about_image' => 'About Image',
            'about_button_text' => 'About Button Text',
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

        return view('pages.home', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Hero Section
            'hero_title'    => Content::where('key', 'hero_title')->value('value'),
            'hero_subtitle' => Content::where('key', 'hero_subtitle')->value('value'),
            'hero_button'   => Content::where('key', 'hero_button')->value('value'),

            // About Section
            'about_section_title' => Content::where('key', 'about_section_title')->value('value'),
            'about_text'    => Content::where('key', 'about_text')->value('value'),
            'about_image'   => Content::where('key', 'about_image')->first(),
            'about_button_text' => Content::where('key', 'about_button_text')->value('value'),
        ];

        return view('pages.home.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Hero Section
            'hero_title'     => 'required|string|max:255',
            'hero_subtitle'  => 'required|string|max:255',
            'hero_button'    => 'required|string|max:50',

            // About Section
            'about_section_title' => 'required|string|max:255',
            'about_text'     => 'required|string',
            'about_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_button_text' => 'required|string|max:50',
            'remove_about_image' => 'nullable|boolean'
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = ['hero_title', 'hero_subtitle', 'hero_button', 'about_section_title', 'about_text', 'about_button_text'];
        foreach ($textFields as $key) {
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

        // Handle image removal
        if ($request->has('remove_about_image') && $request->remove_about_image) {
            $existing = Content::where('key', 'about_image')->first();
            if ($existing && $existing->image) {
                $existing->image = null;
                $existing->value = null; // Clear both columns
                $existing->updated_by = Auth::id();
                $existing->save();
                $hasChanged = true;
            }
        }

        // Handle image upload (BLOB)
        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $binaryData = file_get_contents($file);

            // Generate a unique filename for reference
            $filename = 'about_' . time() . '.' . $file->getClientOriginalExtension();

            $existing = Content::where('key', 'about_image')->first();
            if ($existing) {
                $existing->image = $binaryData;
                $existing->value = $filename; // Store filename in value column for reference
                $existing->updated_by = Auth::id();
                $existing->save();
            } else {
                Content::create([
                    'key' => 'about_image',
                    'image' => $binaryData,
                    'value' => $filename,
                    'updated_by' => Auth::id(),
                ]);
            }

            $hasChanged = true;
        }

        return $hasChanged
            ? redirect()->route('admin.home.preview')->with('success', 'Homepage updated successfully!')
            : redirect()->route('admin.home.preview');
    }
}
