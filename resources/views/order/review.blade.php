<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berikan Review - Rumah Amma Soppeng</title>
    <link rel="icon" type="image/png" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
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
            max-width: 600px;
            margin: 0 auto;
        }

        .review-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #667eea;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #999;
            font-size: 14px;
        }

        .order-info {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 4px solid #667eea;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .info-label {
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .rating-group {
            margin-bottom: 25px;
        }

        .rating-label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .stars {
            display: flex;
            gap: 10px;
            font-size: 40px;
        }

        .star {
            cursor: pointer;
            color: #ddd;
            transition: all 0.2s;
        }

        .star:hover,
        .star.active {
            color: #ffc107;
            transform: scale(1.2);
        }

        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c00;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success-message {
            background: #efe;
            border: 1px solid #cfc;
            color: #060;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-cancel {
            background: #f0f0f0;
            color: #333;
        }

        .btn-cancel:hover {
            background: #e0e0e0;
        }

        .existing-review {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 2px solid #e0e0e0;
        }

        .existing-review-title {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .review-stars {
            color: #ffc107;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .review-comment {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 480px) {
            .review-card {
                padding: 25px;
            }

            .header h1 {
                font-size: 22px;
            }

            .stars {
                font-size: 32px;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="review-card">
            <div class="header">
                <h1>⭐ Berikan Review</h1>
                <p>Bagikan pengalaman Anda tentang produk kami</p>
            </div>

            @if($errors->any())
                <div class="error-message">
                    <strong>Oops! Ada kesalahan:</strong>
                    @foreach($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="order-info">
                <div class="info-row">
                    <span class="info-label">📦 Order ID:</span>
                    <span class="info-value">#{{ $order->id }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">📅 Tanggal:</span>
                    <span class="info-value">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">💰 Total:</span>
                    <span class="info-value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            @if($existingReview)
                <div class="existing-review">
                    <div class="existing-review-title">✓ Review Anda:</div>
                    <div class="review-stars">
                        @for($i = 0; $i < $existingReview->rating; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        @for($i = $existingReview->rating; $i < 5; $i++)
                            <i class="bi bi-star" style="opacity: 0.3;"></i>
                        @endfor
                    </div>
                    <div><strong>{{ $existingReview->name }}</strong></div>
                    <div class="review-comment">{{ $existingReview->comment }}</div>
                </div>
            @endif

            <form action="{{ route('order.review.submit', $order->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Anda *</label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        placeholder="Masukkan nama Anda"
                        value="{{ old('name', $existingReview?->name ?? '') }}"
                    >
                </div>

                <div class="rating-group">
                    <label class="rating-label">Rating *</label>
                    <div class="stars" id="ratingStars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star" data-value="{{ $i }}" onclick="setRating({{ $i }})">
                                <i class="bi bi-star-fill"></i>
                            </span>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', $existingReview?->rating ?? 0) }}" required>
                </div>

                <div class="form-group">
                    <label>Komentar Anda *</label>
                    <textarea 
                        name="comment" 
                        required 
                        placeholder="Tuliskan pengalaman Anda (minimal 10 karakter)"
                    >{{ old('comment', $existingReview?->comment ?? '') }}</textarea>
                </div>

                <div class="button-group">
                    <a href="{{ route('home') }}" class="btn btn-cancel">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-submit">
                        <i class="bi bi-check-circle"></i> Kirim Review
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function setRating(value) {
            document.getElementById('ratingInput').value = value;
            updateStars(value);
        }

        function updateStars(rating) {
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        // Initialize stars based on current rating
        window.addEventListener('load', function() {
            const rating = document.getElementById('ratingInput').value;
            if (rating) {
                updateStars(parseInt(rating));
            }
        });

        // Hover effect
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('mouseover', function() {
                updateStars(this.dataset.value);
            });
        });

        document.getElementById('ratingStars').addEventListener('mouseout', function() {
            const rating = document.getElementById('ratingInput').value;
            if (rating) {
                updateStars(parseInt(rating));
            }
        });
    </script>
</body>
</html>
