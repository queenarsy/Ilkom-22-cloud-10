<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate List</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #555;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #b02a37;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }
        h1 {
            text-align: center;
        }
        .top-actions {
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Candidate List</h1>

<div class="top-actions">
    <a href="<?= base_url('Candidates/create') ?>" class="btn">Create New Candidate</a>
    <a href="<?= base_url('admin/index'); ?>" class="btn">Kembali ke Admin</a>
</div>


<?php if(session()->getFlashdata('success')): ?>
    <p><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Vote</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($candidates) && !empty($candidates)): ?>
        <?php foreach($candidates as $candidate): ?>
            <tr>
                <td>
                    <?php if (!empty($candidate['photo'])): ?>
                        <img src="<?= base_url('uploads/' . $candidate['photo']) ?>" width="100" alt="Candidate Photo">
                    <?php else: ?>
                        <img src="<?= base_url('uploads/default.png') ?>" width="100" alt="Default Photo"> <!-- Default image if no photo -->
                    <?php endif; ?>
                </td>
                <td><?= esc($candidate['nama']) ?></td>
                <td><?= esc($candidate['bio']) ?></td>
                <td><?= esc($candidate['vote']) ?></td>
                <td>
                <a href="<?= base_url('candidates/edit/' . $candidate['kadidat_id']) ?>">Edit</a>|
                    <form action="<?= base_url('candidates/delete/' . $candidate['kadidat_id'] ) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No candidates found.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>