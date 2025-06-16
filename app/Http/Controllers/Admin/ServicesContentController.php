<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServicesContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.services.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'services_main_title' => 'Services Main Title',
            'services_subtitle' => 'Services Subtitle',
            'services_description_paragraph1' => 'Services Description Paragraph 1',
            'services_description_paragraph2' => 'Services Description Paragraph 2',

            // Service Cards
            'service1_title' => 'Audit and Assurance Title',
            'service1_description' => 'Audit and Assurance Description',
            'service1_image' => 'Audit and Assurance Image',

            'service2_title' => 'Business Advisory Title',
            'service2_description' => 'Business Advisory Description',
            'service2_image' => 'Business Advisory Image',

            'service3_title' => 'Outsourcing Title',
            'service3_description' => 'Outsourcing Description',
            'service3_image' => 'Outsourcing Image',

            'service4_title' => 'Business Restructuring Title',
            'service4_description' => 'Business Restructuring Description',
            'service4_image' => 'Business Restructuring Image',

            'service5_title' => 'Corporate Finance Title',
            'service5_description' => 'Corporate Finance Description',
            'service5_image' => 'Corporate Finance Image',

            'service6_title' => 'Forensic Title',
            'service6_description' => 'Forensic Description',
            'service6_image' => 'Forensic Image',

            'service7_title' => 'Governance Title',
            'service7_description' => 'Governance Description',
            'service7_image' => 'Governance Image',

            'service8_title' => 'Taxation Title',
            'service8_description' => 'Taxation Description',
            'service8_image' => 'Taxation Image',
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

        return view('pages.services', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'services_main_title' => Content::where('key', 'services_main_title')->value('value'),
            'services_subtitle' => Content::where('key', 'services_subtitle')->value('value'),
            'services_description_paragraph1' => Content::where('key', 'services_description_paragraph1')->value('value'),
            'services_description_paragraph2' => Content::where('key', 'services_description_paragraph2')->value('value'),

            // Service Cards
            'service1_title' => Content::where('key', 'service1_title')->value('value'),
            'service1_description' => Content::where('key', 'service1_description')->value('value'),
            'service1_image' => Content::where('key', 'service1_image')->first(),

            'service2_title' => Content::where('key', 'service2_title')->value('value'),
            'service2_description' => Content::where('key', 'service2_description')->value('value'),
            'service2_image' => Content::where('key', 'service2_image')->first(),

            'service3_title' => Content::where('key', 'service3_title')->value('value'),
            'service3_description' => Content::where('key', 'service3_description')->value('value'),
            'service3_image' => Content::where('key', 'service3_image')->first(),

            'service4_title' => Content::where('key', 'service4_title')->value('value'),
            'service4_description' => Content::where('key', 'service4_description')->value('value'),
            'service4_image' => Content::where('key', 'service4_image')->first(),

            'service5_title' => Content::where('key', 'service5_title')->value('value'),
            'service5_description' => Content::where('key', 'service5_description')->value('value'),
            'service5_image' => Content::where('key', 'service5_image')->first(),

            'service6_title' => Content::where('key', 'service6_title')->value('value'),
            'service6_description' => Content::where('key', 'service6_description')->value('value'),
            'service6_image' => Content::where('key', 'service6_image')->first(),

            'service7_title' => Content::where('key', 'service7_title')->value('value'),
            'service7_description' => Content::where('key', 'service7_description')->value('value'),
            'service7_image' => Content::where('key', 'service7_image')->first(),

            'service8_title' => Content::where('key', 'service8_title')->value('value'),
            'service8_description' => Content::where('key', 'service8_description')->value('value'),
            'service8_image' => Content::where('key', 'service8_image')->first(),
        ];

        return view('pages.services.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'services_main_title' => 'required|string|max:255',
            'services_subtitle' => 'required|string|max:500',
            'services_description_paragraph1' => 'required|string',
            'services_description_paragraph2' => 'required|string',

            // Service Cards
            'service1_title' => 'required|string|max:255',
            'service1_description' => 'required|string|max:500',
            'service1_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service1_image' => 'nullable|boolean',

            'service2_title' => 'required|string|max:255',
            'service2_description' => 'required|string|max:500',
            'service2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service2_image' => 'nullable|boolean',

            'service3_title' => 'required|string|max:255',
            'service3_description' => 'required|string|max:500',
            'service3_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service3_image' => 'nullable|boolean',

            'service4_title' => 'required|string|max:255',
            'service4_description' => 'required|string|max:500',
            'service4_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service4_image' => 'nullable|boolean',

            'service5_title' => 'required|string|max:255',
            'service5_description' => 'required|string|max:500',
            'service5_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service5_image' => 'nullable|boolean',

            'service6_title' => 'required|string|max:255',
            'service6_description' => 'required|string|max:500',
            'service6_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service6_image' => 'nullable|boolean',

            'service7_title' => 'required|string|max:255',
            'service7_description' => 'required|string|max:500',
            'service7_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service7_image' => 'nullable|boolean',

            'service8_title' => 'required|string|max:255',
            'service8_description' => 'required|string|max:500',
            'service8_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_service8_image' => 'nullable|boolean',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'services_main_title', 'services_subtitle', 'services_description_paragraph1', 'services_description_paragraph2',
            'service1_title', 'service1_description', 'service2_title', 'service2_description',
            'service3_title', 'service3_description', 'service4_title', 'service4_description',
            'service5_title', 'service5_description', 'service6_title', 'service6_description',
            'service7_title', 'service7_description', 'service8_title', 'service8_description'
        ];

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

        // Handle images for all 8 services
        for ($i = 1; $i <= 8; $i++) {
            $imageKey = "service{$i}_image";
            $removeKey = "remove_service{$i}_image";

            // Handle image removal
            if ($request->has($removeKey) && $request->input($removeKey)) {
                $existing = Content::where('key', $imageKey)->first();
                if ($existing && $existing->image) {
                    $existing->image = null;
                    $existing->value = null;
                    $existing->updated_by = Auth::id();
                    $existing->save();
                    $hasChanged = true;
                }
            }

            // Handle image upload
            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $binaryData = file_get_contents($file);
                $filename = "service{$i}_" . time() . '.' . $file->getClientOriginalExtension();

                $existing = Content::where('key', $imageKey)->first();
                if ($existing) {
                    $existing->image = $binaryData;
                    $existing->value = $filename;
                    $existing->updated_by = Auth::id();
                    $existing->save();
                } else {
                    Content::create([
                        'key' => $imageKey,
                        'image' => $binaryData,
                        'value' => $filename,
                        'updated_by' => Auth::id(),
                    ]);
                }
                $hasChanged = true;
            }
        }

        return $hasChanged
            ? redirect()->route('admin.services.preview')->with('success', 'Services page updated successfully!')
            : redirect()->route('admin.services.preview');
    }
}
