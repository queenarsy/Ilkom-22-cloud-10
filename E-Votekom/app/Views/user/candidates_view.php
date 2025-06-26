<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kandidat</title>
    <link rel="stylesheet" href="<?= base_url('CSS/d_candidate.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>

    <!-- Logo kiri atas -->
    <div class="logo-container">
        <img src="<?= base_url('image/Evotkom.png'); ?>" alt="Logo" class="logo">
    </div>

    <div class="wrapper">
        <h1>Daftar Kandidat</h1>
                <?php if (session()->getFlashdata('message')): ?>
            <div class="alert success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>


        <?php if (empty($candidates)): ?>
            <p class="no-candidates">Belum ada Kandidat.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Biografi</th>
                        <th>Suara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidates as $candidate): ?>
                    <tr>
                        <td><?= esc($candidate['nama']); ?></td>
                        <td><?= esc($candidate['bio']); ?></td>
                        <td><?= esc($candidate['vote']); ?></td>
                        <td>
                            <form action="<?= base_url('candidates/vote/' . $candidate['kadidat_id']); ?>" method="post">
                                <button type="submit" class="vote-btn">Vote</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="footer-link">
            <a href="<?= base_url('user/index'); ?>">← Kembali</a>
        </div>
    </div>

</body>
</html>
