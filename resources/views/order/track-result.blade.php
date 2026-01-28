<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Rumah Amma Soppeng</title>
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
            background: #f8f9fa;
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

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        .order-header {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            border-left: 5px solid #e74c3c;
        }

        .order-header h1 {
            color: #2c3e50;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .tracking-code {
            background: #ecf0f1;
            padding: 1rem;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 1.3rem;
            font-weight: bold;
            color: #e74c3c;
            text-align: center;
            margin-bottom: 1rem;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .order-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 1.5rem;
        }

        .info-item h3 {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .info-item p {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .order-items {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .order-items h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #ecf0f1;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-name {
            flex: 1;
            font-weight: 500;
            color: #2c3e50;
        }

        .item-qty {
            color: #7f8c8d;
            margin: 0 1rem;
        }

        .item-price {
            color: #e74c3c;
            font-weight: 600;
            min-width: 100px;
            text-align: right;
        }

        .order-total {
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.1) 0%, rgba(52, 152, 219, 0.1) 100%);
            padding: 1.5rem;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .order-total .label {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .order-total .amount {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e74c3c;
        }

        .order-notes {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .order-notes h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .notes-content {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            color: #555;
            line-height: 1.8;
        }

        .review-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .review-section h3 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .review-item {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #f39c12;
        }

        .review-rating {
            color: #f39c12;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .review-comment {
            color: #555;
            font-style: italic;
            line-height: 1.8;
        }

        .btn-back {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .btn-back:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        .btn-review {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-review:hover {
            background: #229954;
            transform: translateY(-2px);
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
        <div class="container" style="max-width: 1400px;">
            <a href="{{ route('home') }}" class="logo">Rumah Amma Soppeng</a>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('order.check-form') }}">Cek Pesanan</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <a href="{{ route('order.check-form') }}" class="btn-back">← Kembali</a>

        <div class="order-header">
            <h1>📋 Detail Pesanan Anda</h1>
            
            <div class="tracking-code">{{ $order->tracking_code }}</div>
            
            <span class="status-badge status-{{ $order->status }}">
                @switch($order->status)
                    @case('pending')
                        ⏳ Menunggu Konfirmasi
                    @break
                    @case('confirmed')
                        ✓ Pesanan Dikonfirmasi
                    @break
                    @case('completed')
                        ✓ Pesanan Selesai
                    @break
                    @case('cancelled')
                        ✗ Pesanan Dibatalkan
                    @break
                @endswitch
            </span>

            <div class="order-info">
                <div class="info-item">
                    <h3>Nama Pemesan</h3>
                    <p>{{ $order->name }}</p>
                </div>
                <div class="info-item">
                    <h3>Nomor Telepon</h3>
                    <p>{{ $order->phone }}</p>
                </div>
                <div class="info-item">
                    <h3>Alamat Pengiriman</h3>
                    <p>{{ $order->address }}</p>
                </div>
                <div class="info-item">
                    <h3>Tanggal Pesanan</h3>
                    <p>{{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="order-items">
            <h2>📦 Item Pesanan</h2>
            
            @foreach ($order->items as $item)
                <div class="item-row">
                    <div class="item-name">{{ $item->menuItem->name }}</div>
                    <div class="item-qty">x{{ $item->quantity }}</div>
                    <div class="item-price">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>
                </div>
            @endforeach

            <div class="order-total">
                <div class="label">Total Pesanan:</div>
                <div class="amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
            </div>
        </div>

        @if ($order->notes)
            <div class="order-notes">
                <h3>📝 Catatan Pesanan</h3>
                <div class="notes-content">
                    {{ $order->notes }}
                </div>
            </div>
        @endif

        @if ($order->review)
            <div class="review-section">
                <h3>⭐ Review Pesanan</h3>
                <div class="review-item">
                    <div class="review-rating">
                        @for ($i = 0; $i < $order->review->rating; $i++)
                            ★
                        @endfor
                        ({{ $order->review->rating }}/5)
                    </div>
                    <div class="review-comment">
                        "{{ $order->review->comment }}"
                    </div>
                    <div style="margin-top: 0.5rem; color: #7f8c8d; font-size: 0.9rem;">
                        Oleh: {{ $order->review->name }}
                    </div>
                </div>
            </div>
        @else
            <div class="review-section">
                <h3>⭐ Berikan Review</h3>
                <p style="margin-bottom: 1rem; color: #555;">Bagikan pengalaman Anda dengan pesanan ini</p>
                <a href="{{ route('order.review', $order->id) }}" class="btn-review">Tulis Review</a>
            </div>
        @endif
    </div>

    <footer>
        <p>&copy; 2024 Rumah Amma Soppeng. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
