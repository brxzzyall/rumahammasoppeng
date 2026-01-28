<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Rumah Amma Soppeng</title>
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.8rem;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #fff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #E74C3C;
        }

        .stat-card h3 {
            color: #888;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #E74C3C;
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

        .profile-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .profile-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
        }

        .profile-info p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .alert-message {
            animation: slideIn 0.3s ease-out, slideOut 0.3s ease-out 4.7s forwards;
            transition: opacity 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            header h1 {
                font-size: 1.3rem;
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
        <h1>📊 Admin Dashboard</h1>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </header>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <i class="bi bi-graph-up"></i> Dashboard
        </a>
        <a href="{{ route('admin.pending-orders') }}" class="nav-link">
            <i class="bi bi-clock-history"></i> Pesanan Menunggu
        </a>
        <a href="{{ route('admin.order-history') }}" class="nav-link">
            <i class="bi bi-calendar-check"></i> Riwayat Pesanan
        </a>
        <a href="{{ route('admin.review-history') }}" class="nav-link">
            <i class="bi bi-star-fill"></i> Riwayat Review
        </a>
        <a href="{{ route('admin.gallery.index') }}" class="nav-link">
            <i class="bi bi-images"></i> Galeri
        </a>
        <a href="{{ route('admin.menu.index') }}" class="nav-link">
            <i class="bi bi-list"></i> Menu
        </a>
    </nav>

    <div class="container">
        @if(session('success'))
            <div id="successAlert" class="alert-message" style="background: #efe; border: 1px solid #cfc; color: #060; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div id="errorAlert" class="alert-message" style="background: #fee; border: 1px solid #fcc; color: #c00; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                @foreach($errors->all() as $error)
                    ✗ {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <!-- User Profile Card -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">👤</div>
                <div class="profile-info">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Pesanan</h3>
                <div class="number">{{ $totalOrders }}</div>
            </div>
            <div class="stat-card">
                <h3>Pesanan Pending</h3>
                <div class="number">{{ $pendingOrders }}</div>
            </div>
            <div class="stat-card">
                <h3>Pesanan Selesai</h3>
                <div class="number">{{ $completedOrders }}</div>
            </div>
            <div class="stat-card">
                <h3>Link Riwayat</h3>
                <a href="{{ route('admin.order-history') }}" class="action-btn" style="margin-top: 0.5rem;">📋 Lihat Riwayat</a>
            </div>
        </div>

        <div class="orders-section">
            <h2>📋 Pesanan Terbaru</h2>

            @if($orders->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <h3>Tidak Ada Pesanan</h3>
                    <p>Belum ada pesanan yang masuk.</p>
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

                <div style="margin-top: 2rem; display: flex; justify-content: center;">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        // Auto-hide success and error alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');

            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 5000);
            }

            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html>
