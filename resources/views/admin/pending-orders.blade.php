<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Menunggu - Admin Rumah Amas Oppeng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .header h1 {
            color: #667eea;
            font-size: 28px;
            font-weight: 700;
        }

        .logout-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .navbar {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
        }

        .nav-link {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #555;
            background: #f0f0f0;
            transition: all 0.3s;
            font-weight: 500;
            border: 2px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: white;
        }

        .content {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .content h2 {
            color: #667eea;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .orders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }

        .order-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .order-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .order-id {
            color: #667eea;
            font-weight: 700;
            font-size: 16px;
        }

        .status-badge {
            background: #ff9800;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .order-details {
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .detail-label {
            color: #666;
            font-weight: 500;
        }

        .detail-value {
            color: #333;
            font-weight: 600;
        }

        .order-items {
            background: rgba(255, 255, 255, 0.8);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        .item {
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }

        .item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .item-name {
            font-weight: 600;
            color: #333;
        }

        .item-qty {
            color: #999;
            font-size: 12px;
        }

        .total-price {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s;
        }

        .btn-detail {
            background: #667eea;
            color: white;
        }

        .btn-detail:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-confirm {
            background: #4caf50;
            color: white;
        }

        .btn-confirm:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .btn-reject {
            background: #f44336;
            color: white;
        }

        .btn-reject:hover {
            background: #da190b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .empty-state small {
            display: block;
            color: #bbb;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .modal-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .modal-btn-cancel {
            background: #f0f0f0;
            color: #333;
        }

        .modal-btn-confirm {
            background: #4caf50;
            color: white;
        }

        .modal-btn-reject {
            background: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="bi bi-clock-history"></i> Pesanan Menunggu</h1>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>

        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="bi bi-graph-up"></i> Dashboard
            </a>
            <a href="{{ route('admin.pending-orders') }}" class="nav-link active">
                <i class="bi bi-clock-history"></i> Pesanan Menunggu
            </a>
            <a href="{{ route('admin.order-history') }}" class="nav-link">
                <i class="bi bi-calendar-check"></i> Riwayat Pesanan
            </a>
            <a href="{{ route('admin.review-history') }}" class="nav-link">
                <i class="bi bi-star-fill"></i> Riwayat Review
            </a>
        </nav>

        <div class="content">
            <h2><i class="bi bi-hourglass-split"></i> Pesanan yang Menunggu Konfirmasi</h2>
            
            @if($orders->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>Tidak ada pesanan menunggu</p>
                    <small>Semua pesanan telah diproses!</small>
                </div>
            @else
                <div class="orders-grid">
                    @foreach($orders as $order)
                        <div class="order-card">
                            <div class="order-card-header">
                                <span class="order-id">Order #{{ $order->id }}</span>
                                <span class="status-badge">{{ ucfirst($order->status) }}</span>
                            </div>
                            
                            <div class="order-details">
                                <div class="detail-row">
                                    <span class="detail-label">Nama:</span>
                                    <span class="detail-value">{{ $order->name }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Telepon:</span>
                                    <span class="detail-value">{{ $order->phone }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Alamat:</span>
                                    <span class="detail-value">{{ Str::limit($order->address, 20) }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Waktu:</span>
                                    <span class="detail-value">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <div class="order-items">
                                <strong style="display: block; margin-bottom: 8px;">Pesanan:</strong>
                                @foreach($order->items as $item)
                                    <div class="item">
                                        <div class="item-name">{{ $item->menuItem->name }}</div>
                                        <div class="item-qty">{{ $item->quantity }}x Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="total-price">
                                Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>

                            <div class="action-buttons">
                                <a href="{{ route('admin.order.view', $order->id) }}" class="btn btn-detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        // No action buttons on this page; detail links lead to individual order view.
    </script>
</body>
</html>
