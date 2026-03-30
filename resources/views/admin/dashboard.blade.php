<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Caracal Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Nunito Sans", sans-serif;
            background: #f4f6f8;
            color: #223746;
        }
        header {
            background: #113f47;
            color: #fff;
            padding: 18px 4vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        main {
            width: min(1200px, 92vw);
            margin: 26px auto;
        }
        .btn {
            border: 0;
            border-radius: 10px;
            padding: 10px 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: #8c140f; color: #fff; }
        .btn-ghost { background: #fff; color: #1d3548; }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .card {
            background: #fff;
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 8px 24px rgba(21, 42, 58, 0.08);
        }
        .label { color: #678; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.7px; }
        .value { margin-top: 6px; font-size: 1.5rem; font-weight: 800; }
        .panel {
            background: #fff;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(21, 42, 58, 0.08);
        }
        ul { margin: 0; padding-left: 18px; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>
<header>
    <div>
        <div style="font-weight:800; font-size:1.4rem;">Admin Dashboard</div>
        <div style="opacity:0.85;">Manage system data and homepage content</div>
    </div>
    <div style="display:flex; gap:10px; align-items:center;">
        <a class="btn btn-ghost" href="{{ route('home') }}" target="_blank" rel="noreferrer">View Website</a>
        <a class="btn btn-primary" href="{{ route('admin.homepage.edit') }}">Edit Homepage</a>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin:0;">
            @csrf
            <button class="btn btn-ghost" type="submit">Logout</button>
        </form>
    </div>
</header>

<main>
    <section class="grid">
        <article class="card">
            <div class="label">Total users</div>
            <div class="value">{{ $totalUsers }}</div>
        </article>
        <article class="card">
            <div class="label">Admin users</div>
            <div class="value">{{ $adminUsers }}</div>
        </article>
        <article class="card">
            <div class="label">Environment</div>
            <div class="value" style="font-size:1.1rem;">{{ strtoupper($environment) }}</div>
        </article>
        <article class="card">
            <div class="label">Database</div>
            <div class="value" style="font-size:1.1rem;">{{ strtoupper($dbConnection) }}</div>
        </article>
    </section>

    <section class="panel">
        <h2 style="margin:0 0 12px;">System Quick Actions</h2>
        <ul>
            <li><a href="{{ route('admin.homepage.edit') }}">Change homepage copy, hero image, destination cards, and safari cards</a></li>
            <li>Last homepage content update: <strong>{{ optional($homepageLastUpdatedAt)->format('M d, Y h:i A') ?? 'Not updated yet' }}</strong></li>
            <li>Login URL: <code>{{ route('admin.login') }}</code></li>
        </ul>
    </section>
</main>
</body>
</html>

