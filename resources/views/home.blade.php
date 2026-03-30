<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracal Expeditions Kenya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --teal-950: #083b40;
            --teal-900: #0e5960;
            --sand-50: #f4f2ed;
            --ink-900: #1d3244;
            --ink-700: #637386;
            --sun-500: #e39a2d;
            --brick-700: #8c140f;
            --white: #ffffff;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: "Nunito Sans", "Segoe UI", sans-serif;
            color: var(--ink-900);
            background:
                radial-gradient(circle at 8% 10%, #fdf8ed 0%, transparent 34%),
                radial-gradient(circle at 88% 88%, #e8f0ed 0%, transparent 26%),
                var(--sand-50);
        }

        a { color: inherit; text-decoration: none; }

        .topbar {
            min-height: 62px;
            background: linear-gradient(90deg, var(--teal-950), var(--teal-900));
            color: #d9edf0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-weight: 700;
            letter-spacing: 0.2px;
            padding: 12px 18px;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid #e8e1d4;
        }

        .nav-shell {
            width: min(1220px, 92vw);
            margin: 0 auto;
            min-height: 88px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(140deg, var(--sun-500), #f6b84f);
            color: #793e05;
            font-family: "Sora", sans-serif;
            font-size: 20px;
            font-weight: 800;
            display: grid;
            place-items: center;
        }

        .brand-name {
            font-family: "Sora", sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #8a1b11;
            line-height: 1.05;
        }

        .brand-sub {
            font-size: 12px;
            color: #6f7d8a;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            font-weight: 700;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 26px;
            font-weight: 700;
        }

        nav a {
            position: relative;
            padding: 6px 0;
        }

        nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: var(--sun-500);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s ease;
        }

        nav a:hover::after {
            transform: scaleX(1);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .phone-pill {
            border: 1px solid #ecd6cf;
            color: #783028;
            font-weight: 800;
            border-radius: 999px;
            padding: 11px 16px;
            background: #fffaf8;
        }

        .quote-btn {
            border: 0;
            border-radius: 10px;
            background: var(--brick-700);
            color: var(--white);
            padding: 12px 20px;
            font-weight: 800;
            letter-spacing: 0.3px;
            box-shadow: 0 14px 34px rgba(140, 20, 15, 0.23);
        }

        main {
            width: min(1220px, 92vw);
            margin: 18px auto 62px;
        }

        .hero {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            min-height: 560px;
            display: grid;
            align-items: end;
            padding: 44px 48px;
            background-size: cover;
            background-position: center;
            animation: heroReveal 900ms ease-out both;
        }

        .hero-content {
            max-width: 760px;
            color: #ffffff;
        }

        .hero-eyebrow {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            font-size: 12px;
            letter-spacing: 1.1px;
            text-transform: uppercase;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .hero h1 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(2rem, 4.2vw, 4rem);
            line-height: 1.04;
            text-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            margin: 14px 0 24px;
            max-width: 640px;
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: #f2f2ee;
            line-height: 1.6;
        }

        .hero-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .solid-btn,
        .ghost-btn {
            border-radius: 999px;
            padding: 12px 20px;
            font-weight: 800;
            border: 1px solid transparent;
        }

        .solid-btn {
            background: var(--sun-500);
            color: #352203;
        }

        .ghost-btn {
            border-color: rgba(255, 255, 255, 0.6);
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
        }

        .section {
            margin-top: 72px;
        }

        .section-title {
            text-align: center;
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.95rem, 4vw, 3.35rem);
            color: #253c53;
        }

        .section-title span {
            color: var(--sun-500);
        }

        .section-rule {
            width: 220px;
            margin: 14px auto 20px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #c9cfce 18%, #c9cfce 82%, transparent);
            position: relative;
        }

        .section-rule::after {
            content: "";
            width: 14px;
            height: 14px;
            border-radius: 999px;
            border: 2px solid var(--sun-500);
            position: absolute;
            left: 50%;
            top: 50%;
            background: var(--sand-50);
            transform: translate(-50%, -50%);
        }

        .section-intro {
            text-align: center;
            max-width: 880px;
            margin: 0 auto;
            color: var(--ink-700);
            font-size: clamp(1rem, 2vw, 1.1rem);
            line-height: 1.6;
        }

        .destination-grid {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .destination-card {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 12px 30px rgba(17, 37, 54, 0.13);
            transform: translateY(16px);
            opacity: 0;
            animation: liftIn 600ms ease forwards;
        }

        .destination-card:nth-child(2) { animation-delay: 90ms; }
        .destination-card:nth-child(3) { animation-delay: 180ms; }
        .destination-card:nth-child(4) { animation-delay: 270ms; }

        .destination-card img {
            display: block;
            width: 100%;
            height: 235px;
            object-fit: cover;
        }

        .discount-ribbon {
            position: absolute;
            left: 14px;
            top: 0;
            width: 70px;
            background: linear-gradient(180deg, #f7b71b 0%, #f29d0e 100%);
            color: #ffffff;
            font-family: "Sora", sans-serif;
            font-size: 17px;
            font-weight: 800;
            line-height: 1.05;
            text-align: center;
            padding: 16px 8px 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .discount-ribbon::after {
            content: "";
            position: absolute;
            bottom: -16px;
            left: 0;
            width: 0;
            height: 0;
            border-left: 35px solid #f29d0e;
            border-right: 35px solid #f29d0e;
            border-bottom: 16px solid transparent;
        }

        .card-content {
            padding: 16px 18px 18px;
        }

        .card-title {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: 1.35rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .card-sub {
            margin: 8px 0 0;
            color: var(--ink-700);
            font-size: 0.96rem;
        }

        .card-meta {
            margin-top: 14px;
            display: flex;
            gap: 7px;
        }

        .meta-dot {
            width: 13px;
            height: 13px;
            border-radius: 50%;
        }

        .meta-dot.green { background: #56b843; }
        .meta-dot.teal { background: #2cab95; }
        .meta-dot.gold { background: #f0ae34; }
        .meta-dot.blue { background: #4877c8; }

        .safari-grid {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .safari-card {
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            min-height: 280px;
        }

        .safari-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s ease;
        }

        .safari-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(8deg, rgba(9, 15, 11, 0.68), rgba(10, 17, 13, 0.12));
            z-index: 1;
        }

        .safari-label {
            position: absolute;
            left: 20px;
            bottom: 22px;
            z-index: 2;
            color: #ffffff;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.55rem, 3vw, 2.3rem);
            margin: 0;
            text-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
        }

        .safari-card:hover img { transform: scale(1.08); }

        .contact-banner {
            margin-top: 66px;
            border-radius: 16px;
            background: linear-gradient(115deg, #0f4f56, #0f6670);
            color: #e9f5f7;
            padding: 32px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .contact-banner h3 {
            margin: 0;
            font-family: "Sora", sans-serif;
            font-size: clamp(1.3rem, 2vw, 2rem);
        }

        .contact-banner p {
            margin: 6px 0 0;
            color: #c7e3e6;
            font-size: 1.02rem;
        }

        footer {
            margin: 34px 0 18px;
            text-align: center;
            color: #6b7c8f;
            font-weight: 600;
            font-size: 0.95rem;
        }

        @keyframes heroReveal {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes liftIn {
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1120px) {
            .destination-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .safari-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            nav { display: none; }
        }

        @media (max-width: 700px) {
            .topbar { font-size: 0.88rem; }
            .nav-shell { min-height: 76px; }
            .brand-mark { width: 42px; height: 42px; font-size: 17px; }
            .brand-name { font-size: 16px; }
            .brand-sub { font-size: 10px; }
            .phone-pill { display: none; }
            .quote-btn { padding: 10px 14px; font-size: 0.84rem; }
            .hero { min-height: 470px; padding: 30px 22px; }
            .destination-grid,
            .safari-grid { grid-template-columns: 1fr; }
            .contact-banner { padding: 22px 18px; }
        }
    </style>
</head>
<body>
@php
    $phoneHref = preg_replace('/[^0-9+]/', '', $content->phone_number);
    $destinationCards = $content->destination_cards ?? [];
    $safariCards = $content->safari_cards ?? [];
@endphp

<div class="topbar">{{ $content->topbar_text }}</div>

<header>
    <div class="nav-shell">
        <a class="brand" href="#home">
            <div class="brand-mark">CE</div>
            <div>
                <div class="brand-name">{{ $content->brand_name }}</div>
                <div class="brand-sub">{{ $content->brand_sub }}</div>
            </div>
        </a>

        <nav>
            <a href="#home">Home</a>
            <a href="#destinations">Destinations</a>
            <a href="#safaris">Safaris</a>
            <a href="#contact">Contact</a>
            <a href="{{ route('admin.login') }}">Admin</a>
        </nav>

        <div class="actions">
            <a class="phone-pill" href="tel:{{ $phoneHref }}">Call Us: {{ $content->phone_number }}</a>
            <a class="quote-btn" href="mailto:{{ $content->quote_email }}?subject=Request%20A%20Quote">Request A Quote</a>
        </div>
    </div>
</header>

<main id="home">
    <section
        class="hero"
        style="background-image:linear-gradient(0deg, rgba(9, 17, 14, 0.65), rgba(9, 17, 14, 0.2)), url('{{ $content->hero_image_url }}');"
    >
        <div class="hero-content">
            <div class="hero-eyebrow">{{ $content->hero_badge }}</div>
            <h1>{{ $content->hero_title }}</h1>
            <p>{{ $content->hero_description }}</p>
            <div class="hero-cta">
                <a class="solid-btn" href="#destinations">View Destination Deals</a>
                <a class="ghost-btn" href="#safaris">Browse Safari Images</a>
            </div>
        </div>
    </section>

    <section class="section" id="destinations">
        <h2 class="section-title">International <span>Destinations</span></h2>
        <div class="section-rule" aria-hidden="true"></div>
        <p class="section-intro">{{ $content->destination_intro }}</p>

        <div class="destination-grid">
            @foreach($destinationCards as $card)
                <article class="destination-card">
                    <div class="discount-ribbon">{{ data_get($card, 'offer_label', '30% Off') }}</div>
                    <img src="{{ data_get($card, 'image_url') }}" alt="{{ data_get($card, 'title') }} destination image">
                    <div class="card-content">
                        <h3 class="card-title">{{ data_get($card, 'title') }}</h3>
                        <p class="card-sub">{{ data_get($card, 'subtitle') }}</p>
                        <div class="card-meta" aria-hidden="true">
                            <span class="meta-dot green"></span>
                            <span class="meta-dot teal"></span>
                            <span class="meta-dot gold"></span>
                            <span class="meta-dot blue"></span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section" id="safaris">
        <h2 class="section-title">Featured <span>Safari Images</span></h2>
        <div class="section-rule" aria-hidden="true"></div>
        <div class="safari-grid">
            @foreach($safariCards as $card)
                <article class="safari-card">
                    <img src="{{ data_get($card, 'image_url') }}" alt="{{ data_get($card, 'title') }}">
                    <h3 class="safari-label">{{ data_get($card, 'title') }}</h3>
                </article>
            @endforeach
        </div>
    </section>

    <section class="contact-banner" id="contact">
        <div>
            <h3>{{ $content->contact_title }}</h3>
            <p>{{ $content->contact_text }}</p>
        </div>
        <div class="hero-cta">
            <a class="solid-btn" href="mailto:{{ $content->quote_email }}?subject=Safari%20Inquiry">Send Email</a>
            <a class="ghost-btn" href="tel:{{ $phoneHref }}">Call Planner</a>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} {{ $content->brand_name }} | Licensed tour operator | Nairobi
    </footer>
</main>
</body>
</html>

