<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Praktikum 1</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #0a0a0a;
            color: #ededec;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #161615;
            padding: 40px;
            border-radius: 12px;
            box-shadow: inset 0px 0px 0px 1px #fffaed2d;
            width: 350px;
            text-align: left;
        }

        .nama {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .nim {
            font-size: 14px;
            color: #a1a09a;
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            background-color: #eeeeec;
            color: #1c1c1a;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #ffffff;
        }

        .auth-nav {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 15px;
        }

        .auth-link {
            color: #a1a09a;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .auth-link:hover {
            color: #eeeeec;
        }
    </style>
</head>

<body>
    @if (Route::has('login'))
        <div class="auth-nav">
            @auth
                <a href="{{ url('/dashboard') }}" class="auth-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="auth-link">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="card">
        <div class="nama">Hikmatyar Alghifary</div>
        <div class="nim">20230140193</div>
        <a href="https://github.com/code-worker-me/PWF-Genap-2025/blob/main/pertemuan-1.md" class="button">Modul
            Pertemuan 1</a>
    </div>
</body>

</html>