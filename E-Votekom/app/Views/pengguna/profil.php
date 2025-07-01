<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      max-width: 480px;
      width: 100%;
      background-color: #fff;
      padding: 30px 25px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
      color: #333;
    }

    h3 {
      font-size: 18px;
      margin: 25px 0 15px;
      color: #333;
    }

    p {
      font-size: 16px;
      margin-bottom: 5px;
      color: #444;
    }

    label {
      font-weight: 500;
      margin: 10px 0 6px;
      display: block;
      color: #222;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      margin-bottom: 12px;
      background-color: #fdfdfd;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #000;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #222;
    }

    .btn {
      display: inline-block;
      background-color: #6c757d;
      color: white;
      padding: 10px 14px;
      text-decoration: none;
      border-radius: 8px;
      font-size: 14px;
      margin-top: 15px;
      text-align: center;
    }

    .btn:hover {
      background-color: #5a6268;
    }

    .bottom-actions {
      text-align: center;
      margin-top: 20px;
    }

    .flash-message {
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-weight: 500;
      font-size: 14px;
    }

    .flash-message.success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .flash-message.error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    ul {
      padding-left: 20px;
    }

    li {
      font-size: 14px;
      color: #444;
    }

    @media (max-width: 520px) {
      .container {
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Profil Pengguna</h2>
    <p><strong>Username:</strong> <?= esc($user['username']) ?></p>

    <h3>Ubah Kata Sandi</h3>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="flash-message success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
      <div class="flash-message error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="flash-message error">
        <ul>
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('pengguna/ubahPassword') ?>">
      <?= csrf_field() ?>
      <label>Password Lama</label>
      <input type="password" name="password_lama" required>

      <label>Password Baru</label>
      <input type="password" name="password_baru" required>

      <label>Konfirmasi Password Baru</label>
      <input type="password" name="konfirmasi_password" required>

      <button type="submit">Ubah Password</button>

      <div class="bottom-actions">
        <a href="<?= base_url('user/index'); ?>" class="btn">Kembali ke Halaman Utama</a>
      </div>
    </form>
  </div>
</body>
</html>
