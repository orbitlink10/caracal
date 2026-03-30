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
            width: min(1200px, 92vw);
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
            margin: 0 0 14px;
            font-size: 1.2rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
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
        textarea { min-height: 95px; resize: vertical; }
        .card-box {
            border: 1px solid #dce4ea;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 12px;
            background: #fbfcfd;
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
        .btn-primary { background: #8c140f; color: #fff; }
        .btn-ghost { background: #fff; color: #203848; border: 1px solid #cad5dc; }
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
    $destinationCards = old('destination_cards', $content->destination_cards ?? []);
    $safariCards = old('safari_cards', $content->safari_cards ?? []);
@endphp

<header>
    <div>
        <div style="font-size:1.35rem; font-weight:800;">Homepage Content Manager</div>
        <div style="opacity:0.86;">Update texts and images that appear on the public homepage</div>
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
            <h2>Top Area</h2>
            <div class="grid">
                <div class="field">
                    <label for="topbar_text">Topbar Text</label>
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
            <h2>Hero Section</h2>
            <div class="field">
                <label for="hero_badge">Hero Badge</label>
                <input id="hero_badge" name="hero_badge" value="{{ old('hero_badge', $content->hero_badge) }}" required>
            </div>
            <div class="field">
                <label for="hero_title">Hero Title</label>
                <input id="hero_title" name="hero_title" value="{{ old('hero_title', $content->hero_title) }}" required>
            </div>
            <div class="field">
                <label for="hero_description">Hero Description</label>
                <textarea id="hero_description" name="hero_description" required>{{ old('hero_description', $content->hero_description) }}</textarea>
            </div>
            <div class="field">
                <label for="hero_image_url">Hero Image URL</label>
                <input id="hero_image_url" name="hero_image_url" value="{{ old('hero_image_url', $content->hero_image_url) }}" required>
            </div>
        </section>

        <section class="section">
            <h2>Destination Section</h2>
            <div class="field">
                <label for="destination_intro">Destination Intro Text</label>
                <textarea id="destination_intro" name="destination_intro" required>{{ old('destination_intro', $content->destination_intro) }}</textarea>
            </div>

            @foreach($destinationCards as $index => $card)
                <div class="card-box">
                    <h3 style="margin:0 0 10px;">Destination Card {{ $index + 1 }}</h3>
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
                            <label>Offer Label</label>
                            <input name="destination_cards[{{ $index }}][offer_label]" value="{{ data_get($card, 'offer_label') }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2>Safari Image Section</h2>
            @foreach($safariCards as $index => $card)
                <div class="card-box">
                    <h3 style="margin:0 0 10px;">Safari Card {{ $index + 1 }}</h3>
                    <div class="grid">
                        <div class="field">
                            <label>Title</label>
                            <input name="safari_cards[{{ $index }}][title]" value="{{ data_get($card, 'title') }}" required>
                        </div>
                        <div class="field">
                            <label>Image URL</label>
                            <input name="safari_cards[{{ $index }}][image_url]" value="{{ data_get($card, 'image_url') }}" required>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="section">
            <h2>Contact Banner</h2>
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

