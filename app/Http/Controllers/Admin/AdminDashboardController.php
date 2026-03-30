<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $content = HomepageContent::current();

        return view('admin.dashboard', [
            'totalUsers' => User::query()->count(),
            'adminUsers' => User::query()->where('is_admin', true)->count(),
            'homepageLastUpdatedAt' => $content->updated_at,
            'environment' => app()->environment(),
            'dbConnection' => config('database.default'),
        ]);
    }
}

