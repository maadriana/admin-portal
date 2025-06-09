<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class HomeContentController extends Controller
{
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
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_button' => 'required|string|max:50',
            'about_text' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_image' => 'nullable|boolean'
        ]);

        $fields = ['hero_title', 'hero_subtitle', 'hero_button', 'about_text'];

        foreach ($fields as $key) {
            Content::updateOrCreate(
                ['key' => $key],
                ['value' => $request->input($key)]
            );
        }

        // Handle image removal
        if ($request->has('remove_image') && $request->remove_image) {
            $currentImage = Content::where('key', 'about_image')->value('value');
            if ($currentImage) {
                $path = public_path('assets/img/' . $currentImage);
                if (file_exists($path)) {
                    unlink($path);
                }
                // Clear DB entry
                Content::updateOrCreate(
                    ['key' => 'about_image'],
                    ['value' => null]
                );
            }
        }

        // Handle new image upload
        if ($request->hasFile('about_image')) {
            // Delete old image if exists and not already removed
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

            // Save to public/assets/img
            $file->move(public_path('assets/img'), $filename);

            // Save filename only in DB
            Content::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => $filename]
            );
        }

        return redirect()->route('admin.home.preview')->with('success', 'Homepage updated successfully!');
    }

    public function preview()
    {
        $data = [
            'hero_title'    => Content::where('key', 'hero_title')->value('value'),
            'hero_subtitle' => Content::where('key', 'hero_subtitle')->value('value'),
            'hero_button'   => Content::where('key', 'hero_button')->value('value'),
            'about_text'    => Content::where('key', 'about_text')->value('value'),
            'about_image'   => Content::where('key', 'about_image')->value('value'),
        ];

        return view('pages.home.preview', $data);
    }

    // Keep this method for backward compatibility if needed
    public function removeImage()
    {
        $image = Content::where('key', 'about_image')->value('value');
        if ($image) {
            $path = public_path('assets/img/' . $image);
            if (file_exists($path)) {
                unlink($path);
            }
            // Clear DB entry
            Content::updateOrCreate(
                ['key' => 'about_image'],
                ['value' => null]
            );
        }

        return redirect()->route('admin.home.edit')->with('success', 'Image removed successfully.');
    }
}
