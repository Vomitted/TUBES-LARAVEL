<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Modul B - Vendor & Supplier')</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #242323;
            color: #e0e0e0;
            line-height: 1.5;
        }

        .header-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-logo {
            display: block;
            margin: 10px auto;
            width: 110px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

        .header-title {
            color: #ffffff;
            margin-top: 10px;
            font-size: 26px;
        }

        .header-subtitle {
            color: #aaaaaa;
            margin-top: -2px;
            font-weight: normal;
            font-size: 14px;
        }

        .divider {
            border: 0;
            border-top: 1px solid #444;
            margin: 20px 0;
        }

        .alert-success {
            background-color: #1b5e20;
            color: #c8e6c9;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #2e7d32;
            font-weight: bold;
        }

        .alert-danger {
            background-color: #b71c1c;
            color: #ffcdd2;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c62828;
        }

        .alert-danger ul {
            margin-left: 20px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 16px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: opacity 0.2s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-success {
            background-color: rgb(86, 134, 14);
            color: white;
        }

        .btn-cancel {
            background-color: rgb(231, 9, 9);
            color: white;
        }

        .btn-primary {
            background-color: #0288d1;
            color: #ffffff;
        }

        .btn-save {
            background-color: #07ad3f;
            color: #ffffff;
        }

        .form-container {
            background-color: #292828;
            padding: 25px;
            border-radius: 8px;
            max-width: 700px;
            margin: 0 auto;
            border: 1px solid #3a3a3a;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #e0e0e0;
            font-weight: bold;
            font-size: 14px;
        }

        .form-control {
            background-color: #242424;
            border: 1px solid #444;
            color: #fff;
            padding: 8px 10px;
            width: 100%;
            max-width: 450px;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #64b5f6;
            box-shadow: 0 0 5px rgba(100, 181, 246, 0.4);
        }

        .field-error {
            color: #ff6b6b;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>
</head>
<body>

    <div class="header-section">
        <a href="{{ route('vendors.index') }}">
            <img src="{{ asset('placeholderLogo.png') }}" alt="Logo Sistem Inventaris" class="header-logo">
        </a>
        <h1 class="header-title">Sistem Informasi Inventaris Gudang</h1>
        <h4 class="header-subtitle">(Placeholder)</h4>
    </div>

    <hr class="divider">

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Terjadi kesalahan input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</body>
</html>
