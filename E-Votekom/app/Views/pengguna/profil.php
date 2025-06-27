<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2, h3 {
      color: #333;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      color: #444;
    }

    label {
      font-weight: 500;
      display: block;
      margin: 10px 0 5px;
    }

    input[type="password"] {
      width: 100%;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }

    button {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    .btn {
      display: inline-block;
      margin-top: 15px;
      background-color: #6c757d;
      color: white;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #5a6268;
    }

    .bottom-actions {
      margin-top: 20px;
    }

    .flash-message {
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
    }

    .flash-message.success {
      background-color: #d4edda;
      color: #155724;
    }

    .flash-message.error {
      background-color: #f8d7da;
      color: #721c24;
    }

    ul {
      padding-left: 20px;
    }

    li {
      font-size: 14px;
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
      <label>Password Lama:</label>
      <input type="password" name="password_lama" required>

      <label>Password Baru:</label>
      <input type="password" name="password_baru" required>

      <label>Konfirmasi Password Baru:</label>
      <input type="password" name="konfirmasi_password" required>

      <button type="submit">Ubah Password</button>

      <div class="bottom-actions">
        <a href="<?= base_url('user/index'); ?>" class="btn">Kembali ke Halaman Utama</a>
      </div>
    </form>
  </div>
</body>
</html>
