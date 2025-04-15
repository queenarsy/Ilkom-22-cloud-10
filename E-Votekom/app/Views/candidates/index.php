<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kandidat</title>
</head>
<body>
    <h1>Daftar Kandidat</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Biografi</th>
            <th>Suara</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($candidates as $candidate): ?>
        <tr>
            <td><?php echo $candidate['nama']; ?></td>
            <td><?php echo $candidate['bio']; ?></td>
            <td><?php echo $candidate['vote']; ?></td>
            <td>
                <form action="<?php echo base_url('candidates/vote/' . $candidate['kadidat_id']); ?>" method="post">
                    <button type="submit">Vote</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?php echo base_url('admin/index'); ?>">View Candidates</a>
</body>
</html>