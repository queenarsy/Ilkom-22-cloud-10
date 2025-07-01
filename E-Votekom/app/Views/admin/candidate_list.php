<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .top-actions {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #333;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #b02a37;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 16px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 6px;
        }

        p {
            text-align: center;
            color: green;
            font-weight: bold;
        }

        td form {
            display: inline;
        }

        td a {
            margin-right: 10px;
            text-decoration: none;
            color: #000;
            font-weight: 500;
        }

        td button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #b02a37;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Candidate List</h1>

    <div class="top-actions">
        <a href="<?= base_url('Candidates/create') ?>" class="btn">Create New Candidate</a>
        <a href="<?= base_url('admin/index'); ?>" class="btn">Kembali ke Admin</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <div class="table-wrapper">
        <table>
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
                                <img src="<?= base_url('uploads/' . $candidate['photo']) ?>" alt="Candidate Photo">
                            <?php else: ?>
                                <img src="<?= base_url('uploads/default.png') ?>" alt="Default Photo">
                            <?php endif; ?>
                        </td>
                        <td><?= esc($candidate['nama']) ?></td>
                        <td><?= esc($candidate['bio']) ?></td>
                        <td><?= esc($candidate['vote']) ?></td>
                        <td>
                            <a href="<?= base_url('candidates/edit/' . $candidate['kadidat_id']) ?>">Edit</a>
                            <form action="<?= base_url('candidates/delete/' . $candidate['kadidat_id'] ) ?>" method="post" onsubmit="return confirm('Are you sure?')">
                                <?= csrf_field() ?>
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No candidates found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
