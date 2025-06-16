<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class TeamContentController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.team.preview');
    }

    public function preview()
    {
        $sections = [
            // Header Section
            'team_main_title' => 'Team Main Title',
            'team_subtitle' => 'Team Subtitle',

            // Team Members
            'team_member1_name' => 'Team Member 1 - Name',
            'team_member1_role' => 'Team Member 1 - Role',
            'team_member1_slug' => 'Team Member 1 - URL Slug',
            'team_member1_image' => 'Team Member 1 - Image',
            'team_member1_twitter' => 'Team Member 1 - Twitter',
            'team_member1_facebook' => 'Team Member 1 - Facebook',
            'team_member1_instagram' => 'Team Member 1 - Instagram',
            'team_member1_linkedin' => 'Team Member 1 - LinkedIn',

            'team_member2_name' => 'Team Member 2 - Name',
            'team_member2_role' => 'Team Member 2 - Role',
            'team_member2_slug' => 'Team Member 2 - URL Slug',
            'team_member2_image' => 'Team Member 2 - Image',
            'team_member2_twitter' => 'Team Member 2 - Twitter',
            'team_member2_facebook' => 'Team Member 2 - Facebook',
            'team_member2_instagram' => 'Team Member 2 - Instagram',
            'team_member2_linkedin' => 'Team Member 2 - LinkedIn',

            'team_member3_name' => 'Team Member 3 - Name',
            'team_member3_role' => 'Team Member 3 - Role',
            'team_member3_slug' => 'Team Member 3 - URL Slug',
            'team_member3_image' => 'Team Member 3 - Image',
            'team_member3_twitter' => 'Team Member 3 - Twitter',
            'team_member3_facebook' => 'Team Member 3 - Facebook',
            'team_member3_instagram' => 'Team Member 3 - Instagram',
            'team_member3_linkedin' => 'Team Member 3 - LinkedIn',

            'team_member4_name' => 'Team Member 4 - Name',
            'team_member4_role' => 'Team Member 4 - Role',
            'team_member4_slug' => 'Team Member 4 - URL Slug',
            'team_member4_image' => 'Team Member 4 - Image',
            'team_member4_twitter' => 'Team Member 4 - Twitter',
            'team_member4_facebook' => 'Team Member 4 - Facebook',
            'team_member4_instagram' => 'Team Member 4 - Instagram',
            'team_member4_linkedin' => 'Team Member 4 - LinkedIn',
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

        return view('pages.team', compact('contentData'));
    }

    public function edit()
    {
        $data = [
            // Header Section
            'team_main_title' => Content::where('key', 'team_main_title')->value('value'),
            'team_subtitle' => Content::where('key', 'team_subtitle')->value('value'),
        ];

        // Team Members (1-4)
        for ($i = 1; $i <= 4; $i++) {
            $data["team_member{$i}_name"] = Content::where('key', "team_member{$i}_name")->value('value');
            $data["team_member{$i}_role"] = Content::where('key', "team_member{$i}_role")->value('value');
            $data["team_member{$i}_slug"] = Content::where('key', "team_member{$i}_slug")->value('value');
            $data["team_member{$i}_image"] = Content::where('key', "team_member{$i}_image")->first();
            $data["team_member{$i}_twitter"] = Content::where('key', "team_member{$i}_twitter")->value('value');
            $data["team_member{$i}_facebook"] = Content::where('key', "team_member{$i}_facebook")->value('value');
            $data["team_member{$i}_instagram"] = Content::where('key', "team_member{$i}_instagram")->value('value');
            $data["team_member{$i}_linkedin"] = Content::where('key', "team_member{$i}_linkedin")->value('value');
        }

        return view('pages.team.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            // Header Section
            'team_main_title' => 'required|string|max:255',
            'team_subtitle' => 'required|string|max:500',

            // Team Members validation
            'team_member1_name' => 'required|string|max:255',
            'team_member1_role' => 'required|string|max:255',
            'team_member1_slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            'team_member1_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_member1_twitter' => 'nullable|url',
            'team_member1_facebook' => 'nullable|url',
            'team_member1_instagram' => 'nullable|url',
            'team_member1_linkedin' => 'nullable|url',
            'remove_team_member1_image' => 'nullable|boolean',

            'team_member2_name' => 'required|string|max:255',
            'team_member2_role' => 'required|string|max:255',
            'team_member2_slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            'team_member2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_member2_twitter' => 'nullable|url',
            'team_member2_facebook' => 'nullable|url',
            'team_member2_instagram' => 'nullable|url',
            'team_member2_linkedin' => 'nullable|url',
            'remove_team_member2_image' => 'nullable|boolean',

            'team_member3_name' => 'required|string|max:255',
            'team_member3_role' => 'required|string|max:255',
            'team_member3_slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            'team_member3_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_member3_twitter' => 'nullable|url',
            'team_member3_facebook' => 'nullable|url',
            'team_member3_instagram' => 'nullable|url',
            'team_member3_linkedin' => 'nullable|url',
            'remove_team_member3_image' => 'nullable|boolean',

            'team_member4_name' => 'required|string|max:255',
            'team_member4_role' => 'required|string|max:255',
            'team_member4_slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            'team_member4_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_member4_twitter' => 'nullable|url',
            'team_member4_facebook' => 'nullable|url',
            'team_member4_instagram' => 'nullable|url',
            'team_member4_linkedin' => 'nullable|url',
            'remove_team_member4_image' => 'nullable|boolean',
        ]);

        $hasChanged = false;

        // Handle text fields
        $textFields = [
            'team_main_title', 'team_subtitle'
        ];

        // Add team member text fields
        for ($i = 1; $i <= 4; $i++) {
            $textFields = array_merge($textFields, [
                "team_member{$i}_name",
                "team_member{$i}_role",
                "team_member{$i}_slug",
                "team_member{$i}_twitter",
                "team_member{$i}_facebook",
                "team_member{$i}_instagram",
                "team_member{$i}_linkedin"
            ]);
        }

        foreach ($textFields as $key) {
            $newValue = $request->input($key) ?? '';
            $existing = Content::where('key', $key)->first();

            if (!$existing || $existing->value !== $newValue) {
                Content::updateOrCreate(
                    ['key' => $key],
                    ['value' => $newValue, 'updated_by' => Auth::id()]
                );
                $hasChanged = true;
            }
        }

        // Handle images for all 4 team members
        for ($i = 1; $i <= 4; $i++) {
            $imageKey = "team_member{$i}_image";
            $removeKey = "remove_team_member{$i}_image";

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
                $filename = "team_member{$i}_" . time() . '.' . $file->getClientOriginalExtension();

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
            ? redirect()->route('admin.team.preview')->with('success', 'Team page updated successfully!')
            : redirect()->route('admin.team.preview');
    }
}
