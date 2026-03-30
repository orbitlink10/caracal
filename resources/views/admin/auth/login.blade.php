<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Caracal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Nunito Sans", sans-serif;
            background: linear-gradient(135deg, #0f4f56, #18373d);
            color: #1e3242;
            padding: 24px;
        }
        .card {
            width: min(460px, 100%);
            background: #ffffff;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 26px 50px rgba(0, 0, 0, 0.25);
        }
        h1 {
            margin: 0 0 8px;
            font-size: 1.65rem;
            color: #17384b;
        }
        p {
            margin: 0 0 20px;
            color: #607383;
        }
        label {
            display: block;
            font-weight: 700;
            margin-bottom: 6px;
        }
        input {
            width: 100%;
            border: 1px solid #d8e0e5;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 14px;
            font-size: 0.97rem;
        }
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }
        .btn {
            width: 100%;
            border: 0;
            border-radius: 10px;
            padding: 12px;
            background: #8c140f;
            color: #fff;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
        }
        .error {
            margin-bottom: 12px;
            border-radius: 8px;
            padding: 10px;
            background: #fff2f2;
            color: #a62a2a;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="card">
    <h1>Admin Login</h1>
    <p>Sign in to manage system settings and homepage content.</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.authenticate') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <div class="row">
            <label style="display:flex; align-items:center; gap:8px; margin:0; font-weight:600;">
                <input style="width:auto; margin:0;" type="checkbox" name="remember" value="1"> Remember me
            </label>
            <a href="{{ route('home') }}">Back to website</a>
        </div>

        <button class="btn" type="submit">Login to Dashboard</button>
    </form>
</div>
</body>
</html>

