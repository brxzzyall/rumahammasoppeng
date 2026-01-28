<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Amma Soppeng - Masakan Rumahan Berkualitas</title>
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
            background: #ffffff;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }
        
        /* Navigation */
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
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
        }
        
        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(90deg, #E74C3C, #C0392B);
            transition: width 0.3s ease;
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        nav .phone {
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            color: #fff;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            transition: all 0.3s ease;
        }
        
        nav .phone:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            padding: 8rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(231, 76, 60, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 87, 34, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }
        
        .hero .container {
            position: relative;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 800;
            line-height: 1.2;
            animation: slideInDown 0.8s ease;
        }

        .hero h1 .highlight {
            background: linear-gradient(90deg, #FF6B35, #FFD60A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            animation: slideInUp 0.8s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .btn {
            display: inline-block;
            padding: 0.95rem 2.5rem;
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(231, 76, 60, 0.4);
        }

        .btn.secondary {
            background: rgba(231, 76, 60, 0.1);
            color: #E74C3C;
            border: 2px solid #E74C3C;
        }

        .btn.secondary:hover {
            background: #E74C3C;
            color: #fff;
        }
        
        /* About Section */
        .about {
            padding: 6rem 2rem;
            background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 3.5rem;
            color: #1a1a1a;
            font-weight: 700;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #E74C3C, #FF6B35);
            margin: 1rem auto 0;
            border-radius: 2px;
        }
        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        
        .about-text h2 {
            font-size: 2.3rem;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
            font-weight: 700;
        }

        .about-text h2 .text-primary {
            color: #E74C3C;
        }
        
        .about-text p {
            margin-bottom: 1.2rem;
            color: #666;
            line-height: 1.9;
            font-size: 1.05rem;
        }

        .about-text .highlight-text {
            color: #E74C3C;
            font-weight: 600;
        }
        
        .about-image {
            position: relative;
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #E74C3C 0%, #FF6B35 100%);
            border-radius: 20px;
            z-index: -1;
            opacity: 0.1;
        }
        
        .about-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Menu Section */
        .menu {
            padding: 6rem 2rem;
            background: #ffffff;
        }
        
        .menu-categories {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3.5rem;
            flex-wrap: wrap;
        }
        
        .menu-categories button {
            padding: 0.8rem 1.8rem;
            border: 2px solid #e0e0e0;
            background: #fff;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.95rem;
            color: #666;
        }
        
        .menu-categories button.active {
            background: linear-gradient(135deg, #E74C3C, #C0392B);
            color: #fff;
            border-color: #E74C3C;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .menu-categories button:hover {
            border-color: #E74C3C;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2.5rem;
        }
        
        .menu-item {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }
        
        .menu-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(231, 76, 60, 0.15);
        }
        
        .menu-item-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #e0e0e0, #f0f0f0);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .menu-item-image::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.1));
        }
        
        .menu-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-item:hover .menu-item-image img {
            transform: scale(1.08);
        }
        
        .menu-item-content {
            padding: 1.8rem;
        }
        
        .menu-item h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
            font-weight: 700;
        }
        
        .menu-item .category {
            display: inline-block;
            background: rgba(231, 76, 60, 0.1);
            color: #E74C3C;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
        }
        
        .menu-item p {
            color: #888;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .menu-item .price {
            font-size: 1.5rem;
            color: #E74C3C;
            font-weight: 700;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 6rem 2rem;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
        }
        
        .testimonial {
            background: #fff;
            padding: 2.2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #E74C3C;
            transition: all 0.3s ease;
            position: relative;
        }

        .testimonial::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 3rem;
            color: #E74C3C;
            opacity: 0.2;
        }

        .testimonial:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(231, 76, 60, 0.15);
        }
        
        .testimonial p {
            color: #666;
            margin-bottom: 1.2rem;
            font-style: italic;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .testimonial .stars {
            color: #f39c12;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }
        
        .testimonial .author {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 0.95rem;
        }

        /* Review Form Section */
        .review-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%);
            padding: 4rem 2rem;
        }

        .review-form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .review-form-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.8rem;
            color: #1a1a1a;
        }

        .review-form-subtitle {
            text-align: center;
            color: #888;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .review-input-group {
            margin-bottom: 1.5rem;
        }

        .review-input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.9rem;
        }

        .review-input-group input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .review-input-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .review-input-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 100px;
        }

        .review-input-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .review-rating-group {
            margin-bottom: 1.5rem;
        }

        .review-rating-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.9rem;
        }

        .review-stars {
            display: flex;
            gap: 12px;
            font-size: 2.5rem;
        }

        .review-star {
            cursor: pointer;
            color: #ddd;
            transition: all 0.2s ease;
        }

        .review-star:hover,
        .review-star.active {
            color: #ffc107;
            transform: scale(1.15);
        }

        .review-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .review-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .stars {
            color: #FFD60A;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
        }
        
        /* Gallery */
        .gallery {
            padding: 6rem 2rem;
            background: #ffffff;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            background: linear-gradient(135deg, #e0e0e0, #f0f0f0);
            aspect-ratio: 1;
            cursor: pointer;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.3), rgba(255, 107, 53, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover::before {
            opacity: 0;
        }
        
        .gallery-item:hover img {
            transform: scale(1.12);
        }
        
        /* Contact Section */
        .contact {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
        }

        .contact .section-title {
            color: #fff;
        }

        .contact .section-title::after {
            background: linear-gradient(90deg, #FF6B35, #FFD60A);
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }
        
        .contact-item {
            background: rgba(255, 255, 255, 0.08);
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .contact-item .icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .contact-item h3 {
            margin-bottom: 1rem;
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .contact-item p {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.8;
        }
        
        .contact-item a {
            color: #FF6B35;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .contact-item a:hover {
            color: #FFD60A;
        }

        .social-links {
            text-align: center;
            margin-top: 3rem;
        }

        .social-links h3 {
            color: #fff;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #E74C3C, #FF6B35);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 6px 25px rgba(231, 76, 60, 0.4);
        }
        
        /* Footer */
        footer {
            background: #0d0d0d;
            color: #fff;
            text-align: center;
            padding: 2.5rem;
            border-top: 1px solid rgba(231, 76, 60, 0.2);
        }

        footer p {
            margin: 0.5rem 0;
            opacity: 0.9;
        }
        
        footer a {
            color: #FF6B35;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #FFD60A;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                gap: 1.5rem;
                font-size: 0.9rem;
            }

            nav .phone {
                padding: 0.6rem 1.2rem;
                font-size: 0.85rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }
            
            .about-content {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .section-title {
                font-size: 2.2rem;
            }
            
            .menu-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 1rem 1rem;
            }

            nav .logo {
                font-size: 1.3rem;
            }

            nav ul {
                gap: 1rem;
                flex-wrap: wrap;
            }

            .hero {
                padding: 4rem 1rem;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <link rel="icon" type="image/png" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png">
    <nav>
        <div class="container">
            <div class="logo">🍴 Rumah Amma Soppeng</div>
            <ul>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#gallery">Galeri</a></li>
                <li><a href="#contact">Kontak</a></li>
                <li><a href="{{ route('order.check-form') }}">📋 Cek Pesanan</a></li>
                <li><a href="{{ route('order.cart') }}" class="phone" style="position: relative;">🛒 Keranjang
                @php
                    $cartCount = count(session()->get('cart', []));
                @endphp
                @if($cartCount > 0)
                    <span style="position: absolute; top: -8px; right: -8px; background: #FFD60A; color: #1a1a1a; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: bold;">{{ $cartCount }}</span>
                @endif
                </a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Enjoy Your <span class="highlight">Healthy Delicious Food</span></h1>
            <p>Masakan rumahan dengan cita rasa bintang lima 🌟</p>
            <a href="#menu" class="btn">🍽️ Lihat Menu Kami</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <h2 class="section-title">TENTANG KAMI</h2>
            <div class="about-content">
                <div class="about-text">
                    <h2>Pelajari Lebih Lanjut <span class="text-primary">Tentang Kami</span></h2>
                    <p>Kami menyajikan makanan berkualitas dengan rasa yang konsisten, suasana yang nyaman, serta pelayanan ramah yang membuat Anda betah.</p>
                    <p>Ditambah dengan <span class="highlight-text">harga yang terjangkau</span> dan menu unik yang sulit ditemukan di tempat lain.</p>
                    <blockquote style="border-left: 4px solid #E74C3C; padding-left: 1rem; margin: 1.5rem 0; font-style: italic; color: #E74C3C;">
                        "Masakan rumahan dengan cita rasa bintang lima. Rasanya dijamin bikin balik lagi!"
                    </blockquote>
                    <a href="#contact" class="btn secondary">📞 Hubungi Kami</a>
                </div>
                <div class="about-image">
                    <div style="background: linear-gradient(135deg, #FF6B35 0%, #FFD60A 100%); height: 400px; border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 5rem; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);">
                        👨‍🍳
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu" id="menu">
        <div class="container">
            <h2 class="section-title">MENU KAMI</h2>
            
            <div class="menu-categories">
                <button class="active" onclick="filterMenu('all')">🍴 Semua Menu</button>
                <button onclick="filterMenu('Makanan')">🍲 Makanan</button>
                <button onclick="filterMenu('Minuman')">🥤 Minuman</button>
                <button onclick="filterMenu('Snack')">🍪 Snack</button>
            </div>

            <div class="menu-grid">
                @foreach($menuItems as $item)
                <div class="menu-item" data-category="{{ $item->category }}">
                    <div class="menu-item-image">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                        @else
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FF6B35, #FFD60A); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3rem;">
                                🍽️
                            </div>
                        @endif
                    </div>
                    <div class="menu-item-content">
                        <span class="category">{{ $item->category }}</span>
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                        <div class="price">{{ $item->formatted_price }}</div>
                        <form action="{{ route('order.add-to-cart') }}" method="POST" style="margin-top: 1rem;">
                            @csrf
                            <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                            <div style="display: flex; gap: 0.5rem; margin-bottom: 1rem;">
                                <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 0.5rem; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 0.9rem;">
                                <button type="submit" class="btn" style="flex: 1; padding: 0.6rem; margin: 0; font-size: 0.9rem;">🛒 Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">APA KATA PELANGGAN ⭐</h2>
            
            <div class="testimonials-grid">
                @if($reviews && count($reviews) > 0)
                    @foreach($reviews as $review)
                    <div class="testimonial">
                        <div class="stars">
                            @for($i = 0; $i < $review->rating; $i++)
                                ★
                            @endfor
                            @for($i = $review->rating; $i < 5; $i++)
                                <span style="color: #ddd;">★</span>
                            @endfor
                        </div>
                        <p>"{{ $review->comment }}"</p>
                        <div class="author">— {{ $review->name }}</div>
                    </div>
                    @endforeach
                @else
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #999;">
                        <p>Belum ada review dari pelanggan. Jadilah yang pertama!</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Review Section -->
    <section class="review-section">
        <div class="container">
            <div class="review-form-container">
                <h2 class="review-form-title">⭐ Berikan Review Anda</h2>
                <p class="review-form-subtitle">Bagikan pengalaman Anda tentang produk kami</p>

                @if(session('success'))
                    <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
                        ✗ Terjadi kesalahan. Silakan coba lagi.
                    </div>
                @endif

                @if($errors->any())
                    <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
                        <strong>Error:</strong>
                        @foreach($errors->all() as $error)
                            <div>• {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('order.direct-review') }}" method="POST" id="directReviewForm">
                    @csrf

                    <div class="review-input-group">
                        <label>Nama Anda *</label>
                        <input 
                            type="text" 
                            name="name" 
                            placeholder="Masukkan nama Anda" 
                            required
                            style="border-radius: 10px;"
                        >
                    </div>

                    <div class="review-rating-group">
                        <label>Rating *</label>
                        <div class="review-stars" id="reviewStars">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="review-star" data-value="{{ $i }}" onclick="setReviewRating({{ $i }})">★</span>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="reviewRatingInput" value="0" required>
                    </div>

                    <div class="review-input-group">
                        <label>Komentar Anda *</label>
                        <textarea 
                            name="comment" 
                            placeholder="Tuliskan pengalaman Anda (minimal 10 karakter)" 
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="review-btn">
                        Kirim Review
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <h2 class="section-title">GALERI 📸</h2>
            
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                <div class="gallery-item">
                    @if($gallery->image)
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                    @else
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #E74C3C, #FF6B35); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3rem;">
                            🖼️
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title">HUBUNGI KAMI 💬</h2>
            
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="icon">📍</div>
                    <h3>Lokasi</h3>
                    <p>Bumi Handayani Permai (BHP)<br>Blok A/1 Lolloe<br>Lalabata Rilau, Kec. Lalabata<br>Kabupaten Soppeng, Sulawesi Selatan 90851</p>
                </div>
                <div class="contact-item">
                    <div class="icon">📞</div>
                    <h3>Hubungi Kami</h3>
                    <p>
                        <strong>Telepon:</strong><br>
                        <a href="tel:+6285242031902">+62 852-4203-1902</a><br><br>
                        <strong>Email:</strong><br>
                        <a href="mailto:info@example.com">info@rumahammasoppeng.com</a>
                    </p>
                </div>
                <div class="contact-item">
                    <div class="icon">🕐</div>
                    <h3>Jam Operasional</h3>
                    <p>
                        <strong>Senin - Sabtu:</strong><br>
                        11:00 - 23:00<br><br>
                        <strong>Minggu:</strong><br>
                        Tutup
                    </p>
                </div>
            </div>

            <div class="social-links">
                <h3>Ikuti Kami di Media Sosial</h3>
                <div class="social-icons">
                    <a href="https://www.instagram.com/rumah_ammasoppeng" target="_blank" class="social-icon" title="Instagram">📷</a>
                    <a href="https://www.tiktok.com/@rumah_ammasoppeng" target="_blank" class="social-icon" title="TikTok">🎵</a>
                    <a href="https://www.facebook.com/avril.collection" target="_blank" class="social-icon" title="Facebook">👍</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; Copyright Rumah Amma Soppeng All Rights Reserved</p>
        <p>Designed by <a href="https://instagram.com/brxzzyall" target="_blank">Developer IT Rumah Amma Soppeng</a></p>
    </footer>

    <script>
        function filterMenu(category) {
            const items = document.querySelectorAll('.menu-item');
            const buttons = document.querySelectorAll('.menu-categories button');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Direct Review Rating Function
        function setReviewRating(value) {
            document.getElementById('reviewRatingInput').value = value;
            updateReviewStars(value);
        }

        function updateReviewStars(rating) {
            const stars = document.querySelectorAll('.review-star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        // Hover effect for rating stars
        document.querySelectorAll('.review-star').forEach(star => {
            star.addEventListener('mouseover', function() {
                updateReviewStars(this.dataset.value);
            });
        });

        const reviewStarsContainer = document.getElementById('reviewStars');
        if (reviewStarsContainer) {
            reviewStarsContainer.addEventListener('mouseout', function() {
                const rating = document.getElementById('reviewRatingInput').value;
                if (rating) {
                    updateReviewStars(parseInt(rating));
                }
            });
        }

        // Form validation
        document.getElementById('directReviewForm').addEventListener('submit', function(e) {
            const rating = document.getElementById('reviewRatingInput').value;
            if (rating == 0) {
                e.preventDefault();
                alert('Silakan pilih rating terlebih dahulu');
                return false;
            }
        });
    </script>
</body>
</html>
