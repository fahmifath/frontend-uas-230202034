#  Aplikasi Manajemen Pasien & Obat

##  Fitur Utama

- ✅ Menampilkan daftar pasien dan obat
- ➕ Tambah data pasien dan obat
- ✏️ Edit data pasien dan obat
- 🗑️ Hapus data pasien dan obat
- 🔗 Konsumsi REST API eksternal (dengan `Http::get/post/put/delete`)
- 🧪 Validasi input menggunakan Laravel
- 🎨 Tampilan sederhana dan responsif (Bootstrap)

---

## 🚀 Cara Menjalankan Project Laravel

### 1. Clone Repository

```bash
git clone https://github.com/fahmifath/frontend-uas-230202034.git
cd frontend-uas-230202034

```
### 2. Install Dependency dengan Composer
```bash
composer install
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

### 4. Jalankan Laravel Server
```bash
php artisan serve
```
lalu buka di browser
```bash
localhost:8000
```

### Struktur folder
```bash
app/Http/Controllers/
    ├── Pasien.php
    └── Obat.php

resources/views/
    ├── pasien/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    └── obat/
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php

routes/
    └── web.php
```
