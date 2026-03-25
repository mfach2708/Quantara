# Quantara — Laravel Project

Platform analisis bisnis untuk membantu UMKM memahami performa finansial mereka.

---

## Struktur Project

```
quantara/
├── app/
│   └── Http/
│       └── Controllers/
│           └── PageController.php       ← Controller untuk Home & About
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php            ← Layout utama (HTML wrapper)
│       │   ├── navbar.blade.php         ← Navbar (dipakai semua halaman)
│       │   └── footer.blade.php         ← Footer (dipakai semua halaman)
│       └── pages/
│           ├── home.blade.php           ← Halaman Home
│           └── about.blade.php          ← Halaman About
├── public/
│   ├── css/
│   │   ├── style.css                    ← CSS untuk Home page
│   │   └── about.css                    ← CSS untuk About page
│   └── js/
│       ├── script.js                    ← JS chart animasi (Home)
│       └── about.js                     ← JS card stack (About)
└── routes/
    └── web.php                          ← Route definitions
```

---

## Cara Instalasi

### 1. Buat project Laravel baru

```bash
composer create-project laravel/laravel quantara
cd quantara
```

### 2. Salin file dari project ini

Salin semua file sesuai struktur di atas ke dalam folder Laravel Anda:

- `app/Http/Controllers/PageController.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/layouts/navbar.blade.php`
- `resources/views/layouts/footer.blade.php`
- `resources/views/pages/home.blade.php`
- `resources/views/pages/about.blade.php`
- `public/css/style.css`
- `public/css/about.css`
- `public/js/script.js`
- `public/js/about.js`
- `routes/web.php` (replace isi file routes/web.php yang ada)

### 3. Jalankan server

```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

---

## Routes

| URL       | Controller Method       | View                   | Nama Route |
|-----------|------------------------|------------------------|------------|
| `/`       | `PageController@home`  | `pages.home`           | `home`     |
| `/about`  | `PageController@about` | `pages.about`          | `about`    |

---

## Cara Menambah Halaman Baru

1. **Tambah route** di `routes/web.php`:
   ```php
   Route::get('/analisis', [PageController::class, 'analisis'])->name('analisis');
   ```

2. **Tambah method** di `app/Http/Controllers/PageController.php`:
   ```php
   public function analisis()
   {
       return view('pages.analisis');
   }
   ```

3. **Buat view** `resources/views/pages/analisis.blade.php`:
   ```blade
   @extends('layouts.app')
   @section('title', 'Analisis - Quantara')
   @section('styles')
   <link rel="stylesheet" href="{{ asset('css/analisis.css') }}">
   @endsection
   @section('content')
       {{-- Konten halaman --}}
   @endsection
   ```

4. Navbar **otomatis tampil** di semua halaman karena sudah di-include di `layouts/app.blade.php`.

---

## Cara Kerja Navbar

Navbar di `layouts/navbar.blade.php` menggunakan helper `request()->routeIs()` untuk mendeteksi halaman aktif dan menambahkan class `active-nav` secara otomatis:

```blade
<a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active-nav' : '' }}">Home</a>
```
