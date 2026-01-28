<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Review - Admin Rumah Amas Oppeng</title>
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

        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .review-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s;
            position: relative;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .review-customer {
            font-weight: 700;
            color: #333;
            font-size: 16px;
        }

        .stars {
            display: flex;
            gap: 3px;
        }

        .star {
            color: #ffc107;
            font-size: 18px;
        }

        .star.empty {
            color: #ddd;
        }

        .review-order-id {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 8px;
        }

        .review-comment {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
            padding: 12px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            border-left: 3px solid #667eea;
        }

        .review-date {
            font-size: 12px;
            color: #999;
            display: flex;
            align-items: center;
            gap: 5px;
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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #667eea;
            background: white;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            font-weight: 500;
        }

        .pagination a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .pagination span.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .pagination span.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        .rating-avg {
            font-size: 24px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="bi bi-star-fill"></i> Riwayat Review</h1>
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
            <a href="{{ route('admin.pending-orders') }}" class="nav-link">
                <i class="bi bi-clock-history"></i> Pesanan Menunggu
            </a>
            <a href="{{ route('admin.order-history') }}" class="nav-link">
                <i class="bi bi-calendar-check"></i> Riwayat Pesanan
            </a>
            <a href="{{ route('admin.review-history') }}" class="nav-link active">
                <i class="bi bi-star-fill"></i> Riwayat Review
            </a>
        </nav>

        <div class="content">
            <h2><i class="bi bi-chat-left-quote"></i> Semua Review Pelanggan</h2>
            
            @if($reviews->isNotEmpty())
                <div class="stats">
                    <div class="stat-box">
                        <div class="stat-number">{{ $reviews->total() }}</div>
                        <div class="stat-label">Total Review</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">
                            {{ number_format($reviews->pluck('rating')->avg(), 1) }}
                            <span class="rating-avg" style="font-size: 18px; margin-left: 5px;">
                                <i class="bi bi-star-fill"></i>
                            </span>
                        </div>
                        <div class="stat-label">Rating Rata-rata</div>
                    </div>
                </div>
            @endif

            @if($reviews->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-chat-left-quote"></i>
                    <p>Belum ada review</p>
                    <small>Tunggu pelanggan memberikan review untuk pesanan mereka</small>
                </div>
            @else
                <div class="reviews-grid">
                    @foreach($reviews as $review)
                        <div class="review-card">
                            <div class="review-header">
                                <div>
                                    <div class="review-customer">{{ $review->name }}</div>
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star-fill star @if($i > $review->rating) empty @endif"></i>
                                        @endfor
                                    </div>
                                    <span class="review-order-id">Order #{{ $review->order_id }}</span>
                                </div>
                            </div>
                            
                            <div class="review-comment">
                                {{ $review->comment }}
                            </div>

                            <div class="review-date">
                                <i class="bi bi-calendar-event"></i>
                                {{ $review->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($reviews->hasPages())
                    <div class="pagination">
                        {{-- Previous Page Link --}}
                        @if($reviews->onFirstPage())
                            <span class="disabled">&laquo;</span>
                        @else
                            <a href="{{ $reviews->previousPageUrl() }}">&laquo;</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($reviews->getUrlRange(1, $reviews->lastPage()) as $page => $url)
                            @if($page == $reviews->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($reviews->hasMorePages())
                            <a href="{{ $reviews->nextPageUrl() }}">&raquo;</a>
                        @else
                            <span class="disabled">&raquo;</span>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </div>
</body>
</html>
