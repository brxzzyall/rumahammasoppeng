<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Pesanan - Rumah Amma Soppeng</title>
    <link rel="icon" type="image/png" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(231, 76, 60, 0.1);
        }
        
        nav .container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        nav .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e74c3c;
            text-decoration: none;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: #1a1a1a;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #e74c3c;
        }

        .check-order-section {
            max-width: 600px;
            margin: 60px auto;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.05) 0%, rgba(52, 152, 219, 0.05) 100%);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .check-order-section h1 {
            font-size: 2rem;
            color: #e74c3c;
            margin-bottom: 1rem;
            text-align: center;
        }

        .check-order-section p {
            text-align: center;
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e74c3c;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #c0392b;
            box-shadow: 0 0 10px rgba(231, 76, 60, 0.3);
        }

        .btn-check {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-check:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.4);
        }

        .btn-check:active {
            transform: translateY(0);
        }

        .info-box {
            background: rgba(52, 152, 219, 0.1);
            border-left: 4px solid #3498db;
            padding: 1rem;
            border-radius: 5px;
            margin-top: 2rem;
            color: #2c3e50;
        }

        .info-box strong {
            color: #3498db;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 4rem;
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <a href="{{ route('home') }}" class="logo">Rumah Amma Soppeng</a>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('order.check-form') }}">Cek Pesanan</a></li>
            </ul>
        </div>
    </nav>

    <section class="check-order-section">
        <h1>🔍 Cek Status Pesanan</h1>
        <p>Masukkan kode tracking pesanan Anda untuk melihat detail dan status pesanan</p>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Error:</strong>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('order.check') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tracking_code">Kode Tracking Pesanan *</label>
                <input 
                    type="text" 
                    id="tracking_code" 
                    name="tracking_code" 
                    placeholder="Contoh: ORD-65B4A7C123" 
                    value="{{ old('tracking_code') }}"
                    required
                    autofocus
                >
            </div>

            <button type="submit" class="btn-check">Cek Pesanan</button>
        </form>

        <div class="info-box">
            <strong>💡 Informasi:</strong><br>
            Kode tracking pesanan Anda telah dikirimkan melalui notifikasi setelah melakukan pemesanan. Gunakan kode tersebut untuk melacak status pesanan Anda kapan saja.
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Rumah Amma Soppeng. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
