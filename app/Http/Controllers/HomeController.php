<?php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the public homepage.
     */
    public function index(): View
    {
        return view('home', [
            'content' => HomepageContent::current(),
        ]);
    }
}

