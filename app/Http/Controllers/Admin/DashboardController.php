<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total content items
        $totalContent = Content::count();

        // Get total images (content items with image data)
        $totalImages = Content::whereNotNull('image')->count();

        // Get recent updates (last 7 days)
        $recentUpdatesCount = Content::where('updated_at', '>=', Carbon::now()->subDays(7))->count();

        // Get total users
        $totalUsers = User::count();

        // Get recent content updates with user information (last 10)
        $recentUpdates = Content::with('editor')
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        // Get content counts by section
        $homeContentCount = Content::where('key', 'like', 'hero_%')
            ->orWhere('key', 'like', 'about_%')
            ->count();

        $aboutContentCount = Content::where('key', 'like', 'about_%')->count();

        $auditContentCount = Content::where('key', 'like', 'audit_%')->count();

        $advisoryContentCount = Content::where('key', 'like', 'advisory_%')->count();

        return view('dashboard', compact(
            'totalContent',
            'totalImages',
            'recentUpdatesCount',
            'totalUsers',
            'recentUpdates',
            'homeContentCount',
            'aboutContentCount',
            'auditContentCount',
            'advisoryContentCount'
        ));
    }
}
