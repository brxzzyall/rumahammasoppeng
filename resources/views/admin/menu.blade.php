<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="https://rumahammasoppeng.vercel.app/assets/img/hero-img.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu - Rumah Amma Soppeng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background:#f8f9fa; }
        header{background:linear-gradient(135deg,#1a1a2e,#0f3460);color:#fff;padding:1rem 2rem}
        .navbar{background:#fff;padding:12px 2rem;display:flex;gap:8px}
        .nav-link{padding:10px 14px;border-radius:8px;text-decoration:none;color:#555;background:#f0f0f0}
        .container{max-width:1100px;margin:1.5rem auto;padding:1rem}
        table{width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden}
        th,td{padding:0.9rem;border-bottom:1px solid #f0f0f0;text-align:left}
        /* Action buttons: consistent size, spacing, and inline layout */
        form.inline{display:inline-block;margin:0;padding:0}
        .action-btn{background:#E74C3C;color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none;border:none;display:inline-flex;align-items:center;gap:8px;font-size:0.95rem;cursor:pointer}
        td > form.inline + form.inline {margin-left:8px}
        td > form.inline {vertical-align:middle}

        /* Improved form layout */
        .form-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:12px;align-items:center}
        .form-grid input[type="text"],
        .form-grid input[type="number"],
        .form-grid select,
        .form-grid input[name="stock"]{
            padding:10px;border-radius:8px;border:1px solid #e6e6e6;background:#fff;font-size:0.95rem;width:100%;box-sizing:border-box
        }
        .form-grid input::placeholder{color:#9aa0a6}
        .file-btn{background:#fff;border:1px dashed #dcdcdc;padding:8px 10px;border-radius:8px;cursor:pointer;display:inline-flex;align-items:center;gap:8px}
        .file-name{font-size:0.9rem;color:#666;margin-left:6px}
        #img-preview{width:56px;height:56px;object-fit:cover;border-radius:6px;border:1px solid #eee;display:none;margin-left:6px}
        .submit-btn{background:#E74C3C;color:#fff;border:none;padding:10px 14px;border-radius:6px;cursor:pointer}
        @media (max-width:640px){
            .form-grid{grid-template-columns:1fr}
            #img-preview{margin-left:0}
        }
    </style>
</head>
<body>
    <header>
        <h1>🍽️ Admin - Menu</h1>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </header>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('admin.pending-orders') }}" class="nav-link">Pesanan Menunggu</a>
        <a href="{{ route('admin.order-history') }}" class="nav-link">Riwayat Pesanan</a>
        <a href="{{ route('admin.review-history') }}" class="nav-link">Riwayat Review</a>
        <a href="{{ route('admin.menu.index') }}" class="nav-link active">Menu</a>
    </nav>

    <div class="container">
        @if(session('success'))
            <div id="successAlert" style="background:#efe;border:1px solid #cfc;color:#060;padding:1rem;border-radius:8px;margin-bottom:1rem;animation:slideOut 0.3s ease-out 4.7s forwards">✓ {{ session('success') }}</div>
        @endif

        <div style="margin-bottom:1rem;background:#fff;padding:1rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <h3>Tambah Menu Baru</h3>
            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <input type="text" name="name" placeholder="Nama" required />
                    <select name="category">
                    <option value="">Pilih Kategori</option>
                    <option value="Makanan">🍲 Makanan</option>
                    <option value="Minuman">🥤 Minuman</option>
                    <option value="Snack">🍪 Snack</option>
                </select>
                    <input type="number" name="price" placeholder="Harga (angka, tanpa Rp)" required step="1" />
                    <div style="display:flex;align-items:center">
                        <input type="file" id="imageInput" name="image" accept="image/*" style="display:none">
                        <label for="imageInput" class="file-btn">Pilih Gambar</label>
                        <span id="fileName" class="file-name">Tidak ada file</span>
                        <img id="img-preview" src="#" alt="preview">
                    </div>
                    <input type="number" name="stock" placeholder="Stok (angka)" />
                    <button class="submit-btn" type="submit">Tambah</button>
                </div>
            </form>
        </div>

        <div style="background:#fff;padding:0.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.04)">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Ketersediaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->formatted_price }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="width:60px;height:40px;object-fit:cover;border-radius:4px">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->is_available ? 'Tersedia' : 'Habis' }}</td>
                            <td>
                                <form class="inline" action="{{ route('admin.menu.toggle', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="action-btn" type="submit">{{ $item->is_available ? 'Set Habis' : 'Set Tersedia' }}</button>
                                </form>

                                <form class="inline" action="{{ route('admin.menu.outofstock', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="action-btn" type="submit">Habiskan</button>
                                </form>

                                <form class="inline" action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-btn" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top:1rem">{{ $items->links() }}</div>
        </div>
    </div>
    <script>
        const imageInput = document.getElementById('imageInput');
        const fileName = document.getElementById('fileName');
        const preview = document.getElementById('img-preview');

        if (imageInput) {
            imageInput.addEventListener('change', function(e){
                const file = this.files && this.files[0];
                if (file) {
                    fileName.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function(ev){
                        preview.src = ev.target.result;
                        preview.style.display = 'inline-block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    fileName.textContent = 'Tidak ada file';
                    preview.style.display = 'none';
                }
            });
        }

        // Auto-hide alert
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) alert.style.display = 'none';
        }, 5000);
    </script>

    <style>
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(-100%); opacity: 0; }
        }
    </style>
</body>
</html>
