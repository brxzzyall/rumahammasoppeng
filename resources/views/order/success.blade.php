<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Rumah Amma Soppeng</title>
    <link rel="icon" type="image/png" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
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
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #1a1a1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 600px;
            padding: 2rem;
        }

        .success-box {
            background: #fff;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .success-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .success-box h1 {
            font-size: 2.2rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .order-number {
            background: linear-gradient(135deg, #E74C3C, #FF6B35);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 1.5rem 0;
        }

        .order-details {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #888;
            font-weight: 600;
        }

        .detail-value {
            color: #1a1a1a;
            font-weight: 600;
        }

        .items-list {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #f0f0f0;
            margin: 1.5rem 0;
            overflow: hidden;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: 600;
            color: #1a1a1a;
        }

        .item-price {
            color: #E74C3C;
            font-weight: 700;
        }

        .message {
            color: #666;
            margin: 1.5rem 0;
            line-height: 1.8;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            color: #fff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #1a1a1a;
            border: 1px solid #e0e0e0;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .status-badge {
            display: inline-block;
            background: #ffe0e0;
            color: #E74C3C;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            margin: 1rem 0;
        }

        @media (max-width: 480px) {
            .success-box {
                padding: 2rem 1.5rem;
            }

            .success-box h1 {
                font-size: 1.8rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-box">
            <div class="success-icon">✅</div>
            <h1>Pesanan Berhasil Dibuat!</h1>
            <div class="order-number">Nomor Pesanan: #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</div>

            <div class="status-badge">Status: PENDING</div>

            <div class="order-details">
                <div class="detail-item">
                    <span class="detail-label">Kode Tracking:</span>
                    <span class="detail-value" style="color: #e74c3c; font-family: monospace;">{{ $order->tracking_code }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Nama:</span>
                    <span class="detail-value">{{ $order->name }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Telepon:</span>
                    <span class="detail-value">{{ $order->phone }}</span>
                </div>
                <div class="detail-item">

                    <span class="detail-label">Alamat:</span>
                    <span class="detail-value" style="text-align: right;">{{ substr($order->address, 0, 40) }}...</span>
                </div>
            </div>

            <h3 style="text-align: left; margin: 1.5rem 0 1rem; color: #1a1a1a;">📦 Item Pesanan:</h3>
            <div class="items-list">
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div>
                            <div class="item-name">{{ $item->menuItem->name }}</div>
                            <div style="color: #888; font-size: 0.85rem;">Qty: {{ $item->quantity }}</div>
                        </div>
                        <div class="item-price">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>

            <div class="detail-item" style="padding: 1rem 0; border: none; border-top: 2px solid #f0f0f0;">
                <span class="detail-label" style="font-size: 1.1rem;">TOTAL:</span>
                <span class="detail-value" style="font-size: 1.2rem; color: #E74C3C;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>

            <div class="message">
                ✓ Pesanan Anda telah kami terima. Tim kami akan segera memproses pesanan Anda.<br>
                ✓ Kami akan menghubungi Anda melalui nomor telepon yang telah Anda berikan.
            </div>

            <div class="action-buttons">
                <a href="{{ route('home') }}" class="btn btn-primary">🏠 Kembali ke Beranda</a>
                <a href="https://wa.me/6285242031902?text=Halo, saya ingin mengkonfirmasi pesanan %23{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}" target="_blank" class="btn btn-secondary">💬 Hubungi Kami</a>
            </div>
        </div>
    </div>
</body>
</html>
