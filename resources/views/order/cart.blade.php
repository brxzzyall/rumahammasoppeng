<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <link rel="shortcut icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
    <link rel="apple-touch-icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
    <!-- Fallback: place favicon.ico in public/ if browser ignores external PNG -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Rumah Amma Soppeng</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            color: #1a1a1a;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        header {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        header a {
            color: #FF6B35;
            text-decoration: none;
        }

        .cart-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .cart-items {
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-cart {
            text-align: center;
            padding: 3rem;
            color: #888;
        }

        .empty-cart-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .cart-item {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #FF6B35, #FFD60A);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-details h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        .item-details p {
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .item-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #E74C3C;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: flex-end;
        }

        .remove-btn {
            background: #ff4444;
            color: #fff;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #cc0000;
        }

        .cart-summary {
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            height: fit-content;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            color: #888;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 2px solid #f0f0f0;
            font-size: 1.3rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
        }

        .checkout-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea {
            padding: 0.8rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            color: #fff;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
        }

        .back-link {
            display: inline-block;
            margin-bottom: 2rem;
            color: #E74C3C;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #C0392B;
        }

        @media (max-width: 768px) {
            .cart-container {
                grid-template-columns: 1fr;
            }

            header h1 {
                font-size: 1.8rem;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .quantity-control {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>🛒 Keranjang Belanja</h1>
            <p><a href="{{ route('home') }}">← Kembali ke Menu</a></p>
        </div>
    </header>

    <div class="container">
        @if($errors->any())
            <div style="background: #fee; border: 1px solid #fcc; color: #c00; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <strong>Terjadi Kesalahan:</strong>
                <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div style="background: #efe; border: 1px solid #cfc; color: #060; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="cart-container">
            <div class="cart-items">
                @if(empty($cartItems))
                    <div class="empty-cart">
                        <div class="empty-cart-icon">🛒</div>
                        <h2>Keranjang Anda Kosong</h2>
                        <p style="margin-top: 1rem;">Silakan kembali ke menu untuk memilih makanan favorit Anda.</p>
                        <a href="{{ route('home') }}" class="back-link" style="display: inline-block; margin-top: 1rem; padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #E74C3C, #C0392B); color: #fff;">← Kembali ke Menu</a>
                    </div>
                @else
                    @foreach($cartItems as $item)
                        <div class="cart-item">
                            <div class="item-image">🍽️</div>
                            <div class="item-details">
                                <h3>{{ $item['menu_item']->name }}</h3>
                                <p>{{ $item['menu_item']->description }}</p>
                                <div class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                            </div>
                            <div class="quantity-control">
                                <div>
                                    <div style="color: #888; font-size: 0.85rem; margin-bottom: 0.5rem;">Qty: {{ $item['quantity'] }}</div>
                                    <div style="font-weight: 700; color: #E74C3C;">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</div>
                                </div>
                                <form action="{{ route('order.remove-from-cart', $item['menu_item']->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-btn">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="cart-summary">
                <h2 style="margin-bottom: 1.5rem; font-size: 1.5rem;">📋 Ringkasan</h2>
                <div class="summary-item">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>
                <div class="summary-item">
                    <span>Ongkir:</span>
                    <span>Gratis</span>
                </div>
                <div class="summary-total">
                    <span>Total:</span>
                    <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>

                @if(!empty($cartItems))
                    <form action="{{ route('order.checkout') }}" method="POST" class="checkout-form">
                        @csrf
                        
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <input type="text" name="name" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon *</label>
                            <input type="tel" name="phone" required value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label>Alamat Pengiriman *</label>
                            <textarea name="address" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Catatan (Opsional)</label>
                            <textarea name="notes" placeholder="Contoh: Tidak pakai cabai, dsb...">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="checkout-btn">✓ Lanjutkan Checkout</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
