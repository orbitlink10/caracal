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
        $defaults = HomepageContent::defaults();

        $mergeCardPayload = function ($cards, array $base): array {
            $cards = is_array($cards) ? array_values($cards) : [];

            foreach ($cards as $index => $card) {
                $cards[$index] = array_merge(
                    is_array($base[$index] ?? null) ? $base[$index] : [],
                    is_array($card) ? $card : [],
                );
            }

            return $cards;
        };

        $request->merge([
            'destination_cards' => $mergeCardPayload($request->input('destination_cards', []), $defaults['destination_cards'] ?? []),
            'safari_cards' => $mergeCardPayload($request->input('safari_cards', []), $defaults['safari_cards'] ?? []),
        ]);

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
            'destination_cards.*.duration_days' => ['required', 'integer', 'min:1', 'max:30'],
            'destination_cards.*.country' => ['required', 'string', 'max:60'],
            'destination_cards.*.start_location' => ['required', 'string', 'max:80'],
            'destination_cards.*.tour_type' => ['required', 'string', 'max:80'],
            'destination_cards.*.comfort' => ['required', 'string', 'max:80'],
            'destination_cards.*.accommodation' => ['required', 'string', 'max:120'],
            'destination_cards.*.group_size_note' => ['nullable', 'string', 'max:80'],
            'destination_cards.*.price_from' => ['required', 'integer', 'min:0', 'max:1000000'],
            'destination_cards.*.price_to' => ['required', 'integer', 'min:0', 'max:1000000'],
            'destination_cards.*.visits' => ['required', 'string', 'max:255'],
            'destination_cards.*.operator_name' => ['required', 'string', 'max:100'],
            'destination_cards.*.operator_logo_url' => ['nullable', 'string', 'max:2048'],
            'destination_cards.*.operator_rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'destination_cards.*.review_count' => ['required', 'integer', 'min:0', 'max:100000'],
            'safari_cards' => ['required', 'array', 'min:1', 'max:8'],
            'safari_cards.*.title' => ['required', 'string', 'max:80'],
            'safari_cards.*.subtitle' => ['required', 'string', 'max:140'],
            'safari_cards.*.image_url' => ['required', 'string', 'max:2048'],
            'safari_cards.*.offer_label' => ['nullable', 'string', 'max:30'],
            'safari_cards.*.duration_days' => ['required', 'integer', 'min:1', 'max:30'],
            'safari_cards.*.country' => ['required', 'string', 'max:60'],
            'safari_cards.*.start_location' => ['required', 'string', 'max:80'],
            'safari_cards.*.tour_type' => ['required', 'string', 'max:80'],
            'safari_cards.*.comfort' => ['required', 'string', 'max:80'],
            'safari_cards.*.accommodation' => ['required', 'string', 'max:120'],
            'safari_cards.*.group_size_note' => ['nullable', 'string', 'max:80'],
            'safari_cards.*.price_from' => ['required', 'integer', 'min:0', 'max:1000000'],
            'safari_cards.*.price_to' => ['required', 'integer', 'min:0', 'max:1000000'],
            'safari_cards.*.visits' => ['required', 'string', 'max:255'],
            'safari_cards.*.operator_name' => ['required', 'string', 'max:100'],
            'safari_cards.*.operator_logo_url' => ['nullable', 'string', 'max:2048'],
            'safari_cards.*.operator_rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'safari_cards.*.review_count' => ['required', 'integer', 'min:0', 'max:100000'],
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

