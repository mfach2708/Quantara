<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up — Quantara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-layout">

    {{-- LEFT PANEL --}}
    <div class="auth-left">
        <a href="{{ route('landing') }}" class="auth-brand">Quantara.</a>
        <div class="auth-left-body">
            <div class="auth-left-quote">
                <div class="auth-quote-icon">
                    <i data-lucide="rocket"></i>
                </div>
                <h2>Mulai perjalanan bisnis yang lebih cerdas.</h2>
                <p>Bergabung bersama ratusan UMKM yang sudah mengelola keuangan mereka dengan Quantara.</p>
            </div>
            <div class="auth-left-stats">
                <div class="auth-ls">
                    <span class="auth-ls-num">150<span>+</span></span>
                    <span class="auth-ls-lbl">UMKM Mitra</span>
                </div>
                <div class="auth-ls-divider"></div>
                <div class="auth-ls">
                    <span class="auth-ls-num">98<span>%</span></span>
                    <span class="auth-ls-lbl">Kepuasan</span>
                </div>
                <div class="auth-ls-divider"></div>
                <div class="auth-ls">
                    <span class="auth-ls-num">Gratis<span></span></span>
                    <span class="auth-ls-lbl">Mulai Pakai</span>
                </div>
            </div>
        </div>
        <div class="auth-left-accent"></div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="auth-right">
        <div class="auth-form-wrap">

            <div class="auth-form-header">
                <h1>Buat Akun</h1>
                <p>Daftar dan mulai kelola bisnis Anda</p>
            </div>

            <form class="auth-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="auth-field-row">
                    <div class="auth-field">
                        <label>Nama Lengkap</label>
                        <div class="auth-input-wrap">
                            <i data-lucide="user"></i>
                            <input type="text" placeholder="Nama lengkap" required>
                        </div>
                    </div>
                    <div class="auth-field">
                        <label>No. Telepon</label>
                        <div class="auth-input-wrap">
                            <i data-lucide="phone"></i>
                            <input type="text" placeholder="+62 8xx xxxx xxxx">
                        </div>
                    </div>
                </div>
                <div class="auth-field">
                    <label>Email</label>
                    <div class="auth-input-wrap">
                        <i data-lucide="mail"></i>
                        <input type="email" placeholder="nama@email.com" required>
                    </div>
                </div>
                <div class="auth-field">
                    <label>Nama Usaha</label>
                    <div class="auth-input-wrap">
                        <i data-lucide="briefcase"></i>
                        <input type="text" placeholder="Nama toko / usaha Anda">
                    </div>
                </div>
                <div class="auth-field">
                    <label>Password</label>
                    <div class="auth-input-wrap">
                        <i data-lucide="lock"></i>
                        <input type="password" id="pw-signup" placeholder="Min. 8 karakter" required>
                        <button type="button" class="auth-eye" onclick="togglePw('pw-signup', this)">
                            <i data-lucide="eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="auth-btn-primary">Buat Akun</button>
            </form>

            <div class="auth-divider"><span>atau</span></div>

            <p class="auth-switch">
                Sudah punya akun?
                <a href="{{ route('signin') }}">Masuk di sini</a>
            </p>

        </div>
    </div>

</div>

<script>
    lucide.createIcons();
    function togglePw(id, btn) {
        const input = document.getElementById(id);
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        btn.innerHTML = isText
            ? '<i data-lucide="eye"></i>'
            : '<i data-lucide="eye-off"></i>';
        lucide.createIcons();
    }
</script>
</body>
</html>
