<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Galeri - Rumah Amma Soppeng</title>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body{font-family:Arial,Helvetica,sans-serif;background:#f8f9fa;padding:1rem} .container{max-width:1100px;margin:0 auto} .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px} .card{background:#fff;padding:8px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.05)} .thumb{width:100%;height:140px;object-fit:cover;border-radius:6px}</style>
</head>
<body>
    <div class="container">
        <h1>📸 Galeri</h1>

        @if(session('success'))
            <div id="successAlert" style="background:#efe;padding:8px;border-radius:6px;margin-bottom:8px;animation:slideOut 0.3s ease-out 4.7s forwards">{{ session('success') }}</div>
        @endif

        <div style="background:#fff;padding:12px;border-radius:8px;margin-bottom:12px">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" accept="image/*" required />
                <input type="text" name="title" placeholder="Judul (opsional)" />
                <button type="submit">Unggah</button>
            </form>
        </div>

        <div class="grid">
            @foreach($galleries as $g)
                <div class="card">
                    <img src="{{ asset('storage/' . $g->image) }}" class="thumb" alt="{{ $g->title }}">
                    <div style="margin-top:6px;display:flex;justify-content:space-between;align-items:center">
                        <div>{{ $g->title }}</div>
                        <form action="{{ route('admin.gallery.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:12px">{{ $galleries->links() }}</div>
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
    </script>
</body>
</html>
