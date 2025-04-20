<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
    <link rel="stylesheet" href="<?= base_url('CSS/l_candidate.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>

    <!-- Logo kiri atas -->
    <div class="logo-container">
        <img src="<?= base_url('image/logo.png'); ?>" alt="Logo" class="logo">
    </div>

    <div class="wrapper">
        <h1>Candidate List</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Biography</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candidates as $candidate): ?>
                    <tr>
                        <td><?= esc($candidate['nama']); ?></td>
                        <td><?= esc($candidate['bio']); ?></td>
                        <td><?= esc($candidate['vote']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="create-link">
            <a href="<?= base_url('candidates/create'); ?>">+ Create Candidate</a>
        </div>
    </div>

</body>
</html>
