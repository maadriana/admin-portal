<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MTCCareContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.mtc-care.preview');
    }

    public function preview()
    {
        $sections = [
            'mtc_care_title' => 'Main Title',
            'mtc_care_subtitle' => 'Subtitle',
            'mtc_care_csr_title' => 'CSR Title',
            'mtc_care_csr_description' => 'CSR Description',
            'mtc_care_galleries_title' => 'Galleries Title',
            'mtc_care_galleries_description' => 'Galleries Description',
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

        return view('pages.mtc-care', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            'mtc_care_title' => Content::where('key', 'mtc_care_title')->value('value'),
            'mtc_care_subtitle' => Content::where('key', 'mtc_care_subtitle')->value('value'),
            'mtc_care_csr_title' => Content::where('key', 'mtc_care_csr_title')->value('value'),
            'mtc_care_csr_description' => Content::where('key', 'mtc_care_csr_description')->value('value'),
            'mtc_care_galleries_title' => Content::where('key', 'mtc_care_galleries_title')->value('value'),
            'mtc_care_galleries_description' => Content::where('key', 'mtc_care_galleries_description')->value('value'),
        ];

        return view('pages.mtc-care.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'mtc_care_title' => 'required|string|max:255',
            'mtc_care_subtitle' => 'required|string',
            'mtc_care_csr_title' => 'required|string|max:255',
            'mtc_care_csr_description' => 'required|string',
            'mtc_care_galleries_title' => 'required|string|max:255',
            'mtc_care_galleries_description' => 'required|string',
        ]);

        $hasChanged = false;

        $fields = [
            'mtc_care_title',
            'mtc_care_subtitle',
            'mtc_care_csr_title',
            'mtc_care_csr_description',
            'mtc_care_galleries_title',
            'mtc_care_galleries_description',
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
            ? redirect()->route('admin.mtc-care.preview')->with('success', 'MTC Care content updated successfully!')
            : redirect()->route('admin.mtc-care.preview');
    }
}
