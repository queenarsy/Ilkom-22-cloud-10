<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Kota Kendari</title>
    <link rel="stylesheet" href="<?= base_url('CSS/stylelgn.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Tambahkan ikon WhatsApp dari Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Gambar Samping Login" class="login-image">
    <h4>Connect Together</h4>

    <div class="wrapper">
        <form action="<?= site_url('auth/loginProcess') ?>"  method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Masukkan NIM" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">Masuk</button>

            <!-- Tautan WhatsApp dengan ikon dan isi chat otomatis -->
            <p style="text-align: center; margin-top: 20px;">
                Belum terdaftar sebagai kandidat? Hubungi Admin via
                <a href="https://wa.me/6281231284607?text=Halo%20Admin%2C%20saya%20ingin%20daftar%20kandidat" 
                   target="_blank" 
                   style="color: #25D366; font-weight: bold; text-decoration: none;">
                    <i class="bi bi-whatsapp"></i> WhatsApp (0812-3128-4607)
                </a>
            </p>
        </form>
    </div>
</body>
</html>
