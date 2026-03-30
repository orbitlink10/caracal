<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Homepage | Caracal Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Nunito Sans", sans-serif;
            background: #f3f5f7;
            color: #233847;
        }

        header {
            background: #0f4f56;
            color: #fff;
            padding: 18px 4vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        main {
            width: min(1280px, 92vw);
            margin: 24px auto 40px;
        }

        .section {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(21, 42, 58, 0.08);
            margin-bottom: 18px;
        }

        .section h2 {
            margin: 0 0 8px;
            font-size: 1.2rem;
        }

        .section-note {
            margin: 0 0 16px;
            color: #617282;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
        }

        .field { margin-bottom: 12px; }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #d7e0e5;
            border-radius: 10px;
            padding: 10px;
            font: inherit;
        }

        textarea {
            min-height: 95px;
            resize: vertical;
        }

        .card-box {
            border: 1px solid #dce4ea;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 12px;
            background: #fbfcfd;
        }

        .card-box h3 {
            margin: 0 0 10px;
        }

        .btn {
            border: 0;
            border-radius: 10px;
            padding: 12px 16px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #8c140f;
            color: #fff;
        }

        .btn-ghost {
            background: #fff;
            color: #203848;
            border: 1px solid #cad5dc;
        }

        .errors {
            margin-bottom: 14px;
            border-radius: 10px;
            background: #fff2f2;
            color: #ad2d2d;
            padding: 12px;
        }

        .success {
            margin-bottom: 14px;
            border-radius: 10px;
            background: #ecf9f0;
            color: #1f7a3d;
            padding: 12px;
        }
    </style>
</head>
<body>
@php
    $defaultContent = \App\Models\HomepageContent::defaults();

    $prepareCards = function ($cards, array $defaults): array {
        $cards = is_array($cards) ? array_values($cards) : [];
        $count = max(count($cards), count($defaults));
        $items = [];

        for ($index = 0; $index < $count; $index++) {
            $items[] = array_merge(
                is_array($defaults[$index] ?? null) ? $defaults[$index] : [],
                is_array($cards[$index] ?? null) ? $cards[$index] : [],
            );
        }

        return $items;
    };

    $destinationCards = $prepareCards(old('destination_cards', $content->destination_cards ?? []), $defaultContent['destination_cards'] ?? []);
    $safariCards = $prepareCards(old('safari_cards', $content->safari_cards ?? []), $defaultContent['safari_cards'] ?? []);
@endphp

<header>
    <div>
        <div style="font-size:1.35rem; font-weight:800;">Homepage Content Manager</div>
        <div style="opacity:0.86;">Update the listing-style homepage content, package cards and call-to-action text</div>
    </div>
    <div style="display:flex; gap:10px;">
        <a class="btn btn-ghost" href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
        <a class="btn btn-ghost" href="{{ route('home') }}" target="_blank" rel="noreferrer">Preview Website</a>
    </div>
</header>

<main>
    @if(session('status'))
        <div class="success">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="errors">
            <strong>There were validation errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.homepage.update') }}">
        @csrf
        @method('PUT')

        <section class="section">
            <h2>Brand and Contact</h2>
            <p class="section-note">These values appear in the top announcement, header and support callouts.</p>
            <div class="grid">
                <div class="field">
                    <label for="topbar_text">Announcement Text</label>
                    <input id="topbar_text" name="topbar_text" value="{{ old('topbar_text', $content->topbar_text) }}" required>
                </div>
                <div class="field">
                    <label for="brand_name">Brand Name</label>
                    <input id="brand_name" name="brand_name" value="{{ old('brand_name', $content->brand_name) }}" required>
                </div>
                <div class="field">
                    <label for="brand_sub">Brand Subtitle</label>
                    <input id="brand_sub" name="brand_sub" value="{{ old('brand_sub', $content->brand_sub) }}" required>
                </div>
                <div class="field">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" name="phone_number" value="{{ old('phone_number', $content->phone_number) }}" required>
                </div>
                <div class="field">
                    <label for="quote_email">Quote Email</label>
                    <input type="email" id="quote_email" name="quote_email" value="{{ old('quote_email', $content->quote_email) }}" required>
                </div>
            </div>
        </section>

        <section class="section">
            <h2>Listing Header</h2>
            <p class="section-note">Controls the page intro, summary panel image and the descriptive text above the package grid.</p>
            <div class="field">
                <label for="hero_badge">Highlight Badge</label>
                <input id="hero_badge" name="hero_badge" value="{{ old('hero_badge', $content->hero_badge) }}" required>
            </div>
            <div class="field">
                <label for="hero_title">Intro Supporting Line</label>
                <input id="hero_title" name="hero_title" value="{{ old('hero_title', $content->hero_title) }}" required>
            </div>
            <div class="field">
                <label for="hero_description">Main Description</label>
                <textarea id="hero_description" name="hero_description" required>{{ old('hero_description', $content->hero_description) }}</textarea>
            </div>
            <div class="field">
                <label for="destination_intro">Comparison Note</label>
                <textarea id="destination_intro" name="destination_intro" required>{{ old('destination_intro', $content->destination_intro) }}</textarea>
            </div>
            <div class="field">
                <label for="hero_image_url">Header Panel Image URL</label>
                <input id="hero_image_url" name="hero_image_url" value="{{ old('hero_image_url', $content->hero_image_url) }}" required>
            </div>
        </section>

        <section class="section">
            <h2>Primary Package Cards</h2>
            <p class="section-note">These cards render in the main tour listing grid. Prices should be entered as whole USD amounts.</p>

            @foreach($destinationCards as $index => $card)
                <div class="card-box">
                    <h3>Primary Card {{ $index + 1 }}</h3>
                    <div class="grid">
                        <div class="field">
                            <label>Title</label>
                            <input name="destination_cards[{{ $index }}][title]" value="{{ data_get($card, 'title') }}" required>
                        </div>
                        <div class="field">
                            <label>Subtitle</label>
                            <input name="destination_cards[{{ $index }}][subtitle]" value="{{ data_get($card, 'subtitle') }}" required>
                        </div>
                        <div class="field">
                            <label>Image URL</label>
                            <input name="destination_cards[{{ $index }}][image_url]" value="{{ data_get($card, 'image_url') }}" required>
                        </div>
                        <div class="field">
                            <label>Badge Label</label>
                            <input name="destination_cards[{{ $index }}][offer_label]" value="{{ data_get($card, 'offer_label') }}">
                        </div>
                        <div class="field">
                            <label>Duration Days</label>
                            <input type="number" min="1" max="30" name="destination_cards[{{ $index }}][duration_days]" value="{{ data_get($card, 'duration_days') }}" required>
                        </div>
                        <div class="field">
                            <label>Country</label>
                            <input name="destination_cards[{{ $index }}][country]" value="{{ data_get($card, 'country') }}" required>
                        </div>
                        <div class="field">
                            <label>Start Location</label>
                            <input name="destination_cards[{{ $index }}][start_location]" value="{{ data_get($card, 'start_location') }}" required>
                        </div>
                        <div class="field">
                            <label>Tour Type</label>
                            <input name="destination_cards[{{ $index }}][tour_type]" value="{{ data_get($card, 'tour_type') }}" required>
                        </div>
                        <div class="field">
                            <label>Comfort</label>
                            <input name="destination_cards[{{ $index }}][comfort]" value="{{ data_get($card, 'comfort') }}" required>
                        </div>
                        <div class="field">
                            <label>Accommodation</label>
                            <input name="destination_cards[{{ $index }}][accommodation]" value="{{ data_get($card, 'accommodation') }}" required>
                        </div>
                        <div class="field">
                            <label>Group Size Note</label>
                            <input name="destination_cards[{{ $index }}][group_size_note]" value="{{ data_get($card, 'group_size_note') }}">
                        </div>
                        <div class="field">
                            <label>Price From (USD)</label>
                            <input type="number" min="0" name="destination_cards[{{ $index }}][price_from]" value="{{ data_get($card, 'price_from') }}" required>
                        </div>
                        <div class="field">
                            <label>Price To (USD)</label>
                            <input type="number" min="0" name="destination_cards[{{ $index }}][price_to]" value="{{ data_get($card, 'price_to') }}" required>
                        </div>
                        <div class="field">
                            <label>You Visit</label>
                            <input name="destination_cards[{{ $index }}][visits]" value="{{ data_get($card, 'visits') }}" required>
                        </div>
                        <div class="field">
                            <label>Operator Name</label>
                            <input name="destination_cards[{{ $index }}][operator_name]" value="{{ data_get($card, 'operator_name') }}" required>
                        </div>
                        <div class="field">
                            <label>Operator Logo URL</label>
                            <input name="destination_cards[{{ $index }}][operator_logo_url]" value="{{ data_get($card, 'operator_logo_url') }}">
                        </div>
                        <div class="field">
                            <label>Operator Rating</label>
                            <input type="number" min="0" max="5" step="0.1" name="destination_cards[{{ $index }}][operator_rating]" value="{{ data_get($card, 'operator_rating') }}" required>
                        </div>
                        <div class="field">
                            <label>Review Count</label>
                            <input type="number" min="0" name="destination_cards[{{ $index }}][review_count]" value="{{ data_get($card, 'review_count') }}" required>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2>Additional Package Cards</h2>
            <p class="section-note">These continue the same card pattern further down the homepage grid.</p>

            @foreach($safariCards as $index => $card)
                <div class="card-box">
                    <h3>Additional Card {{ $index + 1 }}</h3>
                    <div class="grid">
                        <div class="field">
                            <label>Title</label>
                            <input name="safari_cards[{{ $index }}][title]" value="{{ data_get($card, 'title') }}" required>
                        </div>
                        <div class="field">
                            <label>Subtitle</label>
                            <input name="safari_cards[{{ $index }}][subtitle]" value="{{ data_get($card, 'subtitle') }}" required>
                        </div>
                        <div class="field">
                            <label>Image URL</label>
                            <input name="safari_cards[{{ $index }}][image_url]" value="{{ data_get($card, 'image_url') }}" required>
                        </div>
                        <div class="field">
                            <label>Badge Label</label>
                            <input name="safari_cards[{{ $index }}][offer_label]" value="{{ data_get($card, 'offer_label') }}">
                        </div>
                        <div class="field">
                            <label>Duration Days</label>
                            <input type="number" min="1" max="30" name="safari_cards[{{ $index }}][duration_days]" value="{{ data_get($card, 'duration_days') }}" required>
                        </div>
                        <div class="field">
                            <label>Country</label>
                            <input name="safari_cards[{{ $index }}][country]" value="{{ data_get($card, 'country') }}" required>
                        </div>
                        <div class="field">
                            <label>Start Location</label>
                            <input name="safari_cards[{{ $index }}][start_location]" value="{{ data_get($card, 'start_location') }}" required>
                        </div>
                        <div class="field">
                            <label>Tour Type</label>
                            <input name="safari_cards[{{ $index }}][tour_type]" value="{{ data_get($card, 'tour_type') }}" required>
                        </div>
                        <div class="field">
                            <label>Comfort</label>
                            <input name="safari_cards[{{ $index }}][comfort]" value="{{ data_get($card, 'comfort') }}" required>
                        </div>
                        <div class="field">
                            <label>Accommodation</label>
                            <input name="safari_cards[{{ $index }}][accommodation]" value="{{ data_get($card, 'accommodation') }}" required>
                        </div>
                        <div class="field">
                            <label>Group Size Note</label>
                            <input name="safari_cards[{{ $index }}][group_size_note]" value="{{ data_get($card, 'group_size_note') }}">
                        </div>
                        <div class="field">
                            <label>Price From (USD)</label>
                            <input type="number" min="0" name="safari_cards[{{ $index }}][price_from]" value="{{ data_get($card, 'price_from') }}" required>
                        </div>
                        <div class="field">
                            <label>Price To (USD)</label>
                            <input type="number" min="0" name="safari_cards[{{ $index }}][price_to]" value="{{ data_get($card, 'price_to') }}" required>
                        </div>
                        <div class="field">
                            <label>You Visit</label>
                            <input name="safari_cards[{{ $index }}][visits]" value="{{ data_get($card, 'visits') }}" required>
                        </div>
                        <div class="field">
                            <label>Operator Name</label>
                            <input name="safari_cards[{{ $index }}][operator_name]" value="{{ data_get($card, 'operator_name') }}" required>
                        </div>
                        <div class="field">
                            <label>Operator Logo URL</label>
                            <input name="safari_cards[{{ $index }}][operator_logo_url]" value="{{ data_get($card, 'operator_logo_url') }}">
                        </div>
                        <div class="field">
                            <label>Operator Rating</label>
                            <input type="number" min="0" max="5" step="0.1" name="safari_cards[{{ $index }}][operator_rating]" value="{{ data_get($card, 'operator_rating') }}" required>
                        </div>
                        <div class="field">
                            <label>Review Count</label>
                            <input type="number" min="0" name="safari_cards[{{ $index }}][review_count]" value="{{ data_get($card, 'review_count') }}" required>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2>Support Call To Action</h2>
            <div class="field">
                <label for="contact_title">Contact Title</label>
                <input id="contact_title" name="contact_title" value="{{ old('contact_title', $content->contact_title) }}" required>
            </div>
            <div class="field">
                <label for="contact_text">Contact Text</label>
                <textarea id="contact_text" name="contact_text" required>{{ old('contact_text', $content->contact_text) }}</textarea>
            </div>
        </section>

        <button class="btn btn-primary" type="submit">Save Homepage Changes</button>
    </form>
</main>
</body>
</html>
