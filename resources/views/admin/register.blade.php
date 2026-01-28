<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - Rumah Amma Soppeng</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            background: #fff;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .register-header h1 {
            font-size: 2rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: #888;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            color: #1a1a1a;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #E74C3C;
        }

        .form-group input::placeholder {
            color: #ccc;
        }

        .error-message {
            color: #E74C3C;
            font-size: 0.85rem;
            margin-top: 0.4rem;
        }

        .register-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .register-btn:active {
            transform: translateY(-1px);
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #E74C3C;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #C0392B;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 2rem;
                margin: 1rem;
            }

            .register-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>📝 Daftar Admin</h1>
            <p>Buat akun baru untuk mengakses panel admin</p>
        </div>

        <form method="POST" action="{{ route('admin.register.submit') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Masukkan nama lengkap Anda"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Masukkan email Anda"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Minimal 8 karakter"
                    required
                >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Ulangi password Anda"
                    required
                >
            </div>

            <button type="submit" class="register-btn">✓ Daftar</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.login') }}">← Sudah punya akun? Login</a>
        </div>

        <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #f0f0f0; text-align: center; color: #888; font-size: 0.85rem;">
            <a href="{{ route('home') }}" style="color: #E74C3C; text-decoration: none;">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
