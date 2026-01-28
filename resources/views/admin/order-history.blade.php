<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Rumah Amma Soppeng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #FF6B35;
            text-decoration: none;
        }

        .logout-btn {
            background: #E74C3C;
            color: #fff;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #C0392B;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 15px 2rem;
            display: flex;
            gap: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .orders-section {
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .orders-section h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
            border-bottom: 2px solid #e0e0e0;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        td {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        .order-id {
            font-weight: 700;
            color: #E74C3C;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
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

        .action-btn {
            background: linear-gradient(135deg, #E74C3C, #FF6B35);
            color: #fff;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #888;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            header a {
                display: block;
                margin-bottom: 1rem;
            }

            th, td {
                padding: 0.8rem 0.5rem;
                font-size: 0.85rem;
            }

            .action-btn {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>📋 Riwayat Pesanan</h1>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </header>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="bi bi-graph-up"></i> Dashboard
        </a>
        <a href="{{ route('admin.pending-orders') }}" class="nav-link">
            <i class="bi bi-clock-history"></i> Pesanan Menunggu
        </a>
        <a href="{{ route('admin.order-history') }}" class="nav-link active">
            <i class="bi bi-calendar-check"></i> Riwayat Pesanan
        </a>
        <a href="{{ route('admin.review-history') }}" class="nav-link">
            <i class="bi bi-star-fill"></i> Riwayat Review
        </a>
    </nav>

    <div class="container">
        <div class="orders-section">
            <h2>📊 Semua Pesanan</h2>

            @if($orders->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <h3>Tidak Ada Pesanan</h3>
                    <p>Belum ada pesanan dalam riwayat.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Nama Customer</th>
                                <th>Telepon</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="order-id">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $order->status }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.order.view', $order->id) }}" class="action-btn">👁️ Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
