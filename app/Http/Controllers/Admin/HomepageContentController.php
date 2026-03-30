<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageContentController extends Controller
{
    /**
     * Show the homepage content edit form.
     */
    public function edit(): View
    {
        return view('admin.homepage.edit', [
            'content' => HomepageContent::current(),
        ]);
    }

    /**
     * Update homepage content.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'topbar_text' => ['required', 'string', 'max:255'],
            'brand_name' => ['required', 'string', 'max:80'],
            'brand_sub' => ['required', 'string', 'max:80'],
            'phone_number' => ['required', 'string', 'max:30'],
            'quote_email' => ['required', 'email', 'max:255'],
            'hero_badge' => ['required', 'string', 'max:120'],
            'hero_title' => ['required', 'string', 'max:180'],
            'hero_description' => ['required', 'string', 'max:1000'],
            'hero_image_url' => ['required', 'string', 'max:2048'],
            'destination_intro' => ['required', 'string', 'max:1200'],
            'destination_cards' => ['required', 'array', 'min:1', 'max:8'],
            'destination_cards.*.title' => ['required', 'string', 'max:80'],
            'destination_cards.*.subtitle' => ['required', 'string', 'max:140'],
            'destination_cards.*.image_url' => ['required', 'string', 'max:2048'],
            'destination_cards.*.offer_label' => ['nullable', 'string', 'max:30'],
            'safari_cards' => ['required', 'array', 'min:1', 'max:8'],
            'safari_cards.*.title' => ['required', 'string', 'max:80'],
            'safari_cards.*.image_url' => ['required', 'string', 'max:2048'],
            'contact_title' => ['required', 'string', 'max:180'],
            'contact_text' => ['required', 'string', 'max:1000'],
        ]);

        $validated['destination_cards'] = array_values($validated['destination_cards']);
        $validated['safari_cards'] = array_values($validated['safari_cards']);
        $validated['updated_by'] = $request->user()->id;

        $content = HomepageContent::current();
        $content->fill($validated);
        $content->save();

        return back()->with('status', 'Homepage content updated successfully.');
    }
}

