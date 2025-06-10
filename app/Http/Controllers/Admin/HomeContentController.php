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

        return view('pages.home', compact('contentData'));
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

    $hasChanged = false;

    // Check if this is an image-only operation
    $isImageRemoval = $request->has('remove_image') && $request->remove_image;
    $isImageUpload = $request->hasFile('about_image');
    $isImageOnlyOperation = ($isImageRemoval || $isImageUpload) && !$this->hasTextFieldChanges($request);

    // Handle text fields - skip if this is an image-only operation
    if (!$isImageOnlyOperation) {
        $textFields = ['hero_title', 'hero_subtitle', 'hero_button', 'about_text'];
        foreach ($textFields as $key) {
            $newValue = $request->input($key);
            $existing = Content::where('key', $key)->first();

            // Only update if value actually changed
            if (!$existing || $existing->value !== $newValue) {
                Content::updateOrCreate(
                    ['key' => $key],
                    ['value' => $newValue, 'updated_by' => Auth::id()]
                );
                $hasChanged = true;
            }
        }
    }

    // Handle image removal - only affects image field
    if ($request->has('remove_image') && $request->remove_image) {
        $existing = Content::where('key', 'about_image')->first();
        if ($existing && $existing->value) {
            Storage::delete('public/assets/img/' . $existing->value);

            // Update only the image record
            $existing->value = null;
            $existing->updated_by = Auth::id();
            $existing->save();
            $hasChanged = true;
        }
    }

    // Handle image upload - only affects image field
    if ($request->hasFile('about_image')) {
        $file = $request->file('about_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        Storage::putFileAs('public/assets/img', $file, $filename);

        // Delete old image if exists
        $existing = Content::where('key', 'about_image')->first();
        if ($existing && $existing->value && $existing->value !== $filename) {
            Storage::delete('public/assets/img/' . $existing->value);
        }

        // Find or create the about_image record specifically
        $imageContent = Content::where('key', 'about_image')->first();
        if ($imageContent) {
            $imageContent->value = $filename;
            $imageContent->updated_by = Auth::id();
            $imageContent->save();
        } else {
            Content::create([
                'key' => 'about_image',
                'value' => $filename,
                'updated_by' => Auth::id()
            ]);
        }

        $hasChanged = true;
    }

    return $hasChanged
        ? redirect()->route('admin.home.preview')->with('success', 'Homepage updated successfully!')
        : redirect()->route('admin.home.preview');
}

/**
 * Check if any text fields have actually changed
 */
private function hasTextFieldChanges(Request $request)
{
    $textFields = ['hero_title', 'hero_subtitle', 'hero_button', 'about_text'];

    foreach ($textFields as $key) {
        $newValue = $request->input($key);
        $existing = Content::where('key', $key)->first();

        if (!$existing || $existing->value !== $newValue) {
            return true;
        }
    }

    return false;
}
}
