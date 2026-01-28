<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Rumah Amma Soppeng</title>
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
            background: #f8f9fa;
            color: #1a1a1a;
        }

        header {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            padding: 1.5rem 2rem;
        }

        header a {
            color: #FF6B35;
            text-decoration: none;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        .order-card {
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .order-header h1 {
            font-size: 1.8rem;
            color: #1a1a1a;
        }

        .status-badge {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item h3 {
            color: #888;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .info-item p {
            font-size: 1rem;
            color: #1a1a1a;
            line-height: 1.6;
        }

        .items-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .items-section h2 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-name {
            font-weight: 600;
            color: #1a1a1a;
        }

        .item-qty {
            color: #888;
            font-size: 0.9rem;
        }

        .item-price {
            color: #E74C3C;
            font-weight: 700;
        }

        .total-section {
            background: linear-gradient(135deg, #f8f9fa, #e8e9eb);
            padding: 1.5rem;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .total-section h3 {
            font-size: 1.5rem;
            color: #1a1a1a;
        }

        .total-amount {
            font-size: 2rem;
            font-weight: 700;
            color: #E74C3C;
        }

        .status-form {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            display: flex;
            gap: 1rem;
            align-items: flex-end;
        }

        .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: #888;
        }

        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }

        .update-btn {
            background: linear-gradient(135deg, #E74C3C, #FF6B35);
            color: #fff;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .update-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }

        .back-link {
            color: #E74C3C;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 1rem;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .order-header {
                flex-direction: column;
                text-align: center;
                align-items: flex-start;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .total-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .status-form {
                flex-direction: column;
            }

            .form-group {
                width: 100%;
            }

            .update-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div style="max-width: 1200px; margin: 0 auto;">
            <h1>📋 Detail Pesanan</h1>
            <p style="margin-top: 0.5rem;"><a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a></p>
        </div>
    </header>

    <div class="container">
        @if(session('success'))
            <div id="successAlert" style="background: #efe; border: 1px solid #cfc; color: #060; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; animation: slideOut 0.3s ease-out 4.7s forwards;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="order-card">
            <div class="order-header">
                <h1>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h1>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                    @if($order->status === 'completed')
                        <div style="background: #ffe6e6; border: 1px solid #ffcccc; color: #c00; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600; font-size: 0.9rem;">
                            ⏱️ Akan dihapus dalam <span id="deleteCountdown">{{ $autoDeleteDelay }}</span> detik
                        </div>
                    @endif
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <h3>👤 Nama Customer</h3>
                    <p>{{ $order->name }}</p>
                </div>
                <div class="info-item">
                    <h3>📞 Telepon</h3>
                    <p><a href="tel:{{ $order->phone }}" style="color: #E74C3C; text-decoration: none;">{{ $order->phone }}</a></p>
                </div>
                <div class="info-item">
                    <h3> Tanggal Pesanan</h3>
                    <p>{{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="info-item" style="grid-column: 1 / -1;">
                    <h3>📍 Alamat Pengiriman</h3>
                    <p>{{ $order->address }}</p>
                </div>
                @if($order->notes)
                    <div class="info-item" style="grid-column: 1 / -1;">
                        <h3>📝 Catatan</h3>
                        <p>{{ $order->notes }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="order-card">
            <div class="items-section">
                <h2>🛒 Item Pesanan</h2>
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div>
                            <div class="item-name">{{ $item->menuItem->name }}</div>
                            <div class="item-qty">{{ $item->menuItem->description }}</div>
                        </div>
                        <div>
                            <div class="item-qty">Qty: {{ $item->quantity }}</div>
                            <div class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="total-section">
                <h3>💰 Total Pembayaran</h3>
                <div class="total-amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
            </div>

            <div class="status-form">
                @if($order->status !== 'completed')
                    <form action="{{ route('admin.order.update-status', $order->id) }}" method="POST" style="display:flex;gap:1rem;width:100%;align-items:flex-end;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="completed" />
                        <div style="flex:1">
                            <label>&nbsp;</label>
                            <p style="margin:0;color:#888">Tekan tombol di samping untuk menandai pesanan selesai.</p>
                        </div>
                        <button type="submit" class="update-btn">✅ Pesanan Selesai</button>
                    </form>
                @else
                    <div style="width:100%;">
                        <p style="margin:0;color:#155724;font-weight:700">Pesanan sudah selesai.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(-100%); opacity: 0; }
        }
    </style>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) alert.style.display = 'none';
        }, 5000);

        // Auto-delete completed order after configured delay
        @if($order->status === 'completed')
            let autoDeleteDelay = {{ $autoDeleteDelay }};
            let countdownSeconds = autoDeleteDelay;
            const countdownEl = document.getElementById('deleteCountdown');

            if (countdownEl) {
                setInterval(() => {
                    countdownSeconds--;
                    countdownEl.textContent = countdownSeconds;
                    if (countdownSeconds <= 0) {
                        deleteOrder();
                    }
                }, 1000);
            }

            setTimeout(() => {
                deleteOrder();
            }, autoDeleteDelay * 1000);

            function deleteOrder() {
                fetch('{{ route("admin.order.delete", $order->id) }}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    window.location.href = '{{ route("admin.order-history") }}';
                })
                .catch(error => console.error('Error:', error));
            }
        @endif
    </script>
</body>
</html>
